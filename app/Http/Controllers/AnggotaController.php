<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_anggota;
use RealRashid\SweetAlert\Facades\Alert;


class AnggotaController extends Controller
{
    public function form_daftar()
    {

        $regions = json_decode(file_get_contents(public_path('json/region.json')), true);

        return view('front.form_daftar', compact('regions'));
    }

    public function show_table_anggota(Request $request)
    {

        $query = data_anggota::query();

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

        $anggota = $query->paginate(10)->appends($request->query());

        return view('dashboard.anggota', compact('anggota'));
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
                'kota_kabupaten' => 'required|string|max:255',
                'kode_kabupaten' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20|unique:data_anggota,no_hp',
                'email' => 'required|email|max:255|unique:data_anggota,email',
                'tipe_pendaftaran' => 'required|in:individu,komunitas',
                'nama_komunitas' => 'max:255',
                'jenis_pemancingan' => 'required|array',
            ]);

            // simpan ke database
            data_anggota::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'tempat_lahir' => $validated['tempat_lahir'] ?? null,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
                'gender' => $validated['gender'] ?? null,
                'alamat' => $validated['alamat'] ?? null,
                'kota_kabupaten' => $validated['kota_kabupaten'] ?? null,
                'kode_kabupaten' => $validated['kode_kabupaten'] ?? null,
                'provinsi' => $validated['provinsi'] ?? null,
                'pekerjaan' => $validated['pekerjaan'] ?? null,
                'no_hp' => $validated['no_hp'] ?? null,
                'email' => $validated['email'] ?? null,
                'accept' => null,
                'tipe_pendaftaran' => $validated['tipe_pendaftaran'],
                'nama_komunitas' => $validated['nama_komunitas'] ?? null,
                'jenis_pemancingan' => isset($validated['jenis_pemancingan'])
                    ? json_encode($validated['jenis_pemancingan'])
                    : null,
            ]);
            Alert::success('Pendaftaran berhasil! Silakan menunggu admin untuk melakukan verifikasi.');
            return redirect()->route('landing_page');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }


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
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('dashboard.kartu_anggota_pdf', compact('anggota'))->setPaper('a4', 'landscape');
            return $pdf->stream('kartu_anggota.pdf');
        } catch (\Throwable $th) {
            abort(404);
        }
    }
}
