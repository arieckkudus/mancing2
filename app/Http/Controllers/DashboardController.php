<?php

namespace App\Http\Controllers;
use App\Models\data_anggota;
use App\Models\artikel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        $accept = data_anggota::whereNotNull('accept')->count();
        $pending = data_anggota::whereNull('accept')->count();
        $total = $accept + $pending;

        $persenPending = $total > 0 ? round(($pending / $total) * 100, 1) : 0;
        $persenAktif = $total > 0 ? round(($accept / $total) * 100, 1) : 0;

        $artikelTampil = artikel::whereNotNull('show')->count();
        $artikelArsip = artikel::whereNull('show')->count();

        $domisili = data_anggota::select('kota_kabupaten', DB::raw('COUNT(*) as total'))
            ->groupBy('kota_kabupaten')
            ->whereNotNull('accept')
            ->orderByDesc('total') // urut dari yang paling banyak
            ->get();

        $labels = $domisili->take(7)->pluck('kota_kabupaten');
        $counts = $domisili->take(7)->pluck('total');

        return view('dashboard.dashboard', compact('accept', 'pending', 'persenPending', 'persenAktif', 'artikelTampil', 'artikelArsip', 'domisili', 'labels', 'counts'));
    }
}
