<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_anggota;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Builder\Builder;

class AnggotaController extends Controller
{
    public function form_daftar()
    {

        $regions = json_decode(file_get_contents(public_path('json/region.json')), true);

        return view('front.form_daftar', compact('regions'));
    }

    public function daftar_anggota(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'gender' => 'required|in:L,P',
                'alamat' => 'required|string',
                'kota_kabupaten' => 'nullable|string|max:255',
                'status' => 'required|string|in:anggota,pengurus',
                'provinsi' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20|unique:data_anggota,no_hp',
                'email' => 'required|email|max:255|unique:data_anggota,email',
                'tipe_pendaftaran' => 'required|in:individu,komunitas',
                'nama_komunitas' => 'max:255',
                'jenis_pemancingan' => 'required|array',
                'signature' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // --- proses signature ---
            $signaturePath = null;
            if (!empty($validated['signature'])) {
                $folderPath = storage_path('app/public/signatures/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $image_parts = explode(";base64,", $validated['signature']);
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
                file_put_contents($folderPath . $fileName, $image_base64);
                $signaturePath = 'signatures/' . $fileName;
            }

            // --- proses foto ---
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('foto_anggota', 'public');
            }

            // ambil json
            $regions = json_decode(file_get_contents(public_path('json/region.json')), true);

            $provinsiKode = $request->provinsi;
            $kotaKode     = $request->kota_kabupaten;

            // cari nama provinsi berdasarkan kode
            $provData = collect($regions)->firstWhere('provinsi.kode', $provinsiKode);
            $provinsiNama = $provData ? $provData['provinsi']['nama'] : null;

            // cari nama kota (kalau status anggota)
            $kotaNama = null;
            if ($kotaKode && $provData) {
                $kota = collect($provData['kota'])->firstWhere('kode', $kotaKode);
                $kotaNama = $kota ? $kota['nama'] : null;
            }

            if ($validated['status'] === 'pengurus') {
                // hitung jumlah pengurus yang sudah ada
                $lastNumber = data_anggota::where('status', 'pengurus')->count() + 1;
                if ($lastNumber > 49) {
                    throw new \Exception("Slot pengurus sudah penuh (maks 49).");
                }
                $kode = "DPP-" . $provinsiKode . "." . str_pad($lastNumber, 2, "0", STR_PAD_LEFT);
            } else {
                // hitung jumlah anggota yang sudah ada
                $lastNumber = data_anggota::where('status', 'anggota')->count() + 50;
                $kode = "DPK-" . $provinsiKode . "." . $kotaKode . "." . str_pad($lastNumber, 2, "0", STR_PAD_LEFT);
            }

            data_anggota::create([
                'kode' => $kode,
                'nama_lengkap' => $validated['nama_lengkap'],
                'tempat_lahir' => $validated['tempat_lahir'] ?? null,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
                'gender' => $validated['gender'] ?? null,
                'alamat' => $validated['alamat'] ?? null,
                'provinsi' => $provinsiNama, // simpan nama
                'kota_kabupaten' => $kotaNama, // simpan nama
                'status' => $validated['status'],
                'pekerjaan' => $validated['pekerjaan'] ?? null,
                'no_hp' => $validated['no_hp'] ?? null,
                'email' => $validated['email'] ?? null,
                'accept' => null,
                'tipe_pendaftaran' => $validated['tipe_pendaftaran'],
                'nama_komunitas' => $validated['nama_komunitas'] ?? null,
                'jenis_pemancingan' => isset($validated['jenis_pemancingan'])
                    ? json_encode($validated['jenis_pemancingan'])
                    : null,
                'signature' => $signaturePath,
                'foto' => $fotoPath,
            ]);

            Alert::success('Pendaftaran berhasil! Silakan menunggu admin untuk melakukan verifikasi.');
            return redirect()->route('landing_page');

        } catch (ValidationException $e) {
            if ($e->validator->errors()->has('no_hp') || $e->validator->errors()->has('email')) {
                Alert::error('Data sudah terdaftar!', 'Nomor HP atau Email sudah digunakan.');
            } else {
                Alert::error('Error Validasi', $e->getMessage());
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function show_table_anggota(Request $request)
    {
        $query = data_anggota::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('tempat_lahir', 'like', "%{$search}%")
                    ->orWhere('tanggal_lahir', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('kota_kabupaten', 'like', "%{$search}%")
                    ->orWhere('provinsi', 'like', "%{$search}%");
            });
        }

        // Accept filter
        if ($request->accept_filter == 'filled') {
            $query->whereNotNull('accept')->where('accept', '!=', '');
        } elseif ($request->accept_filter == 'null') {
            $query->whereNull('accept')->orWhere('accept', '');
        }

        $anggota = $query->paginate(10)->appends($request->query());

        return view('dashboard.anggota', compact('anggota'));
    }

    public function accept($id)
    {
        $anggota = data_anggota::findOrFail($id);
        $anggota->accept = 'anggota';
        $anggota->save();

        return redirect()->back()->with('success', 'Anggota berhasil diterima!');
    }

    public function show_kartu_anggota(Request $request, $id)
    {
        try {
            $anggota = data_anggota::findOrFail($id);

            $qrCode = new QrCode(
                data: $anggota->kode,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::Low,
                size: 300,
                margin: 10,
                roundBlockSizeMode: RoundBlockSizeMode::Margin
            );

            $writer = new PngWriter();
            $result = $writer->write($qrCode);

            $qr = 'data:image/png;base64,' . base64_encode($result->getString());

            return view('dashboard.kartu_anggota', compact('anggota', 'qr'));
        } catch (\Throwable $th) {
            dd($th);
            abort(404);
        }
    }

}
