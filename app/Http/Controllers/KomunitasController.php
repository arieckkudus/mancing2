<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use App\Models\data_komunitas;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    public function form_daftar_komunitas()
    {

        $regions = json_decode(file_get_contents(public_path('json/region.json')), true);

        return view('front.form_daftar_komunitas', compact('regions'));
    }

    public function daftar_anggota_komunitas(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_komunitas' => 'required|string|max:255',
                'nama_ketua' => 'required|string|max:255',
                'tanggal_berdiri' => 'nullable|date',
                'nama_narahubung' => 'nullable|string|max:255',
                'no_hp' => 'nullable|string|max:20|unique:data_komunitas,no_hp',
                'email' => 'nullable|email|max:255|unique:data_komunitas,email',
                'provinsi' => 'nullable|string|max:255',
                'kota_kabupaten' => 'nullable|string|max:255',
                'alamat' => 'nullable|string',
                'visi_misi' => 'nullable|string',
                'fokus_kegiatan' => 'nullable|string',
                'facebook' => 'nullable|string|max:255',
                'instagram' => 'nullable|string|max:255',
                'tiktok' => 'nullable|string|max:255',
                'lainnya' => 'nullable|string|max:255',
                'signature' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // --- proses signature ---
            $signaturePath = null;
            if (!empty($validated['signature'])) {
                $folderPath = storage_path('app/public/signatures/komunitas');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $image_parts = explode(";base64,", $validated['signature']);
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
                file_put_contents($folderPath . $fileName, $image_base64);
                $signaturePath = 'komunitas/signatures/' . $fileName;
            }

            // --- proses logo ---
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logo/komunitas', 'public');
            }

            // --- simpan data ---
            data_komunitas::create([
                'nama_komunitas' => $validated['nama_komunitas'],
                'nama_ketua' => $validated['nama_ketua'] ?? null,
                'tanggal_berdiri' => $validated['tanggal_berdiri'] ?? null,
                'nama_narahubung' => $validated['nama_narahubung'] ?? null,
                'no_hp' => $validated['no_hp'] ?? null,
                'email' => $validated['email'] ?? null,
                'provinsi' => $validated['provinsi'] ?? null,
                'kota_kabupaten' => $validated['kota_kabupaten'] ?? null,
                'alamat' => $validated['alamat'] ?? null,
                'visi_misi' => $validated['visi_misi'] ?? null,
                'fokus_kegiatan' => $validated['fokus_kegiatan'] ?? null,
                'facebook' => $validated['facebook'] ?? null,
                'instagram' => $validated['instagram'] ?? null,
                'tiktok' => $validated['tiktok'] ?? null,
                'lainnya' => $validated['lainnya'] ?? null,
                'signature' => $signaturePath,
                'logo' => $logoPath,
                'accept' => null,
            ]);

            Alert::success('Pendaftaran Komunitas berhasil! Silakan menunggu admin untuk melakukan verifikasi.');
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
        $anggota = data_komunitas::findOrFail($id);
        $anggota->accept = 'diterima';
        $anggota->save();

        return redirect()->back()->with('success', 'Komunitas berhasil diterima!');
    }

    public function show_table_komunitas(Request $request)
    {
        $query = data_komunitas::query();

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

        return view('dashboard.komunitas', compact('anggota'));
    }

}
