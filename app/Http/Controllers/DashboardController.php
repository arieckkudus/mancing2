<?php

namespace App\Http\Controllers;
use App\Models\data_anggota;
use App\Models\data_komunitas;
use App\Models\data_usaha;
use App\Models\artikel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        // ===== untuk anggota =====
        $acceptAnggota = data_anggota::whereNotNull('accept')->count();
        $pendingAnggota = data_anggota::whereNull('accept')->count();
        $totalAnggota = $acceptAnggota + $pendingAnggota;

        $persenPendingAnggota = $totalAnggota > 0 ? round(($pendingAnggota / $totalAnggota) * 100, 1) : 0;
        $persenAktifAnggota = $totalAnggota > 0 ? round(($acceptAnggota / $totalAnggota) * 100, 1) : 0;

        // ===== untuk komunitas =====
        $acceptKomunitas = data_komunitas::whereNotNull('accept')->count();
        $pendingKomunitas = data_komunitas::whereNull('accept')->count();
        $totalKomunitas = $acceptKomunitas + $pendingKomunitas;

        $persenPendingKomunitas = $totalKomunitas > 0 ? round(($pendingKomunitas / $totalKomunitas) * 100, 1) : 0;
        $persenAktifKomunitas = $totalKomunitas > 0 ? round(($acceptKomunitas / $totalKomunitas) * 100, 1) : 0;

        // ===== untuk usaha & industri =====
        $acceptUsaha = data_usaha::whereNotNull('accept')->count();
        $pendingUsaha = data_usaha::whereNull('accept')->count();
        $totalUsaha = $acceptUsaha + $pendingUsaha;

        $persenPendingUsaha = $totalUsaha > 0 ? round(($pendingUsaha / $totalUsaha) * 100, 1) : 0;
        $persenAktifUsaha = $totalUsaha > 0 ? round(($acceptUsaha / $totalUsaha) * 100, 1) : 0;

        // ===== artikel =====
        $artikelTampil = artikel::whereNotNull('show')
            ->latest()
            ->take(10)
            ->pluck('title');

        $artikelTampil1 = artikel::whereNotNull('show')->count();
        $artikelArsip = artikel::whereNull('show')->count();

        // ===== domisili anggota =====
        $domisili = data_anggota::select('kota_kabupaten', DB::raw('COUNT(*) as total'))
            ->groupBy('kota_kabupaten')
            ->whereNotNull('accept')
            ->orderByDesc('total') // urut dari yang paling banyak
            ->get();

        $labels = $domisili->take(7)->pluck('kota_kabupaten');
        $counts = $domisili->take(7)->pluck('total');

        return view('dashboard.dashboard', compact(
            // anggota
            'acceptAnggota',
            'pendingAnggota',
            'persenPendingAnggota',
            'persenAktifAnggota',
            // komunitas
            'acceptKomunitas',
            'pendingKomunitas',
            'persenPendingKomunitas',
            'persenAktifKomunitas',
            // usaha
            'acceptUsaha',
            'pendingUsaha',
            'persenPendingUsaha',
            'persenAktifUsaha',
            // artikel & domisili
            'artikelTampil',
            'artikelTampil1',
            'artikelArsip',
            'domisili',
            'labels',
            'counts'
        ));
    }

}
