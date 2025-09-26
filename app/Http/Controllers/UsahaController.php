<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use App\Models\data_usaha;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    public function form_daftar_usaha()
    {
        $regions = json_decode(file_get_contents(public_path('json/region.json')), true);

        return view('front.form_daftar_usaha', compact('regions', 'regions'));
    }

    public function daftar_anggota_usaha(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_usaha' => 'required|string|max:255',
                'logo_usaha' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'tanggal_berdiri' => 'nullable|date',
                'jenis_usaha' => 'nullable|string|max:255',
                'nomor_izin_usaha' => 'nullable|string|max:255',
                'produk_jasa' => 'nullable|string|max:255',
                'alamat_usaha' => 'nullable|string',
                'nomor_telepon_usaha' => 'nullable|string|max:20',
                'email_usaha' => 'nullable|email|max:255',
                'website_usaha' => 'nullable|string|max:255',
                'nama_penanggung_jawab' => 'nullable|string|max:255',
                'jabatan' => 'nullable|string|max:255',
                'nomor_telepon_penanggung' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'signature_usaha' => 'nullable|string',
            ]);

            // --- proses signature usaha ---
            $signaturePath = null;
            if (!empty($validated['signature_usaha'])) {
                $folderPath = storage_path('app/public/signatures/usaha/');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $image_parts = explode(";base64,", $validated['signature_usaha']);
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
                file_put_contents($folderPath . $fileName, $image_base64);
                $signaturePath = 'signatures/usaha/' . $fileName;
            }

            // --- proses logo ---
            $logoPath = null;
            if ($request->hasFile('logo_usaha')) {
                $logoPath = $request->file('logo_usaha')->store('logo/usaha', 'public');
            }

            // --- simpan data ---
            data_usaha::create([
                'nama_usaha' => $validated['nama_usaha'],
                'logo_usaha' => $logoPath,
                'tanggal_berdiri' => $validated['tanggal_berdiri'] ?? null,
                'jenis_usaha' => $validated['jenis_usaha'] ?? null,
                'nomor_izin_usaha' => $validated['nomor_izin_usaha'] ?? null,
                'produk_jasa' => $validated['produk_jasa'] ?? null,
                'alamat_usaha' => $validated['alamat_usaha'] ?? null,
                'nomor_telepon_usaha' => $validated['nomor_telepon_usaha'] ?? null,
                'email_usaha' => $validated['email_usaha'] ?? null,
                'website_usaha' => $validated['website_usaha'] ?? null,
                'nama_penanggung_jawab' => $validated['nama_penanggung_jawab'] ?? null,
                'jabatan' => $validated['jabatan'] ?? null,
                'nomor_telepon_penanggung' => $validated['nomor_telepon_penanggung'] ?? null,
                'email' => $validated['email'] ?? null,
                'signature_usaha' => $signaturePath,
            ]);

            Alert::success('Pendaftaran Usaha / Industri berhasil! Silakan menunggu admin untuk melakukan verifikasi.');
            return redirect()->route('landing_page');

        } catch (ValidationException $e) {
            Alert::error('Error Validasi', $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }


    public function accept($id)
    {
        $anggota = data_usaha::findOrFail($id);
        $anggota->accept = 'diterima';
        $anggota->save();

        return redirect()->back()->with('success', 'Usaha / Industri berhasil diterima!');
    }

    public function show_table_usaha(Request $request)
    {
        $query = data_usaha::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_komunitas', 'like', "%{$search}%")
                    ->orWhere('nama_ketua', 'like', "%{$search}%")
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

        return view('dashboard.usaha', compact('anggota'));
    }

}
