@extends('layouts.app')

@section('title', 'Dashbaord APRI')

@section('content')
    <style>
        .app-card-stat {
            text-align: left;
        }

        .stats-type {
            color: #000 !important;
        }

        .app-card {
            border-radius: 8px;
        }
    </style>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container px-0">
            <div class="row" style="--bs-gutter-x: 32px; --bs-gutter-y: 32px; margin-bottom: 32px;">
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Anggota Aktif</h4>
                            <div class="stats-figure" style="margin-bottom: 16px; font-size: 40px; font-weight: bold;">
                                {{ $acceptAnggota }}
                            </div>
                            <div class="stats-meta">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                </svg> {{ $acceptAnggota > 0 ? round(($acceptAnggota / ($acceptAnggota + $acceptAnggota)) * 100, 1) : 0 }}%
                                {{ $acceptAnggota > 0 ? $persenAktifAnggota . '% anggota aktif' : 'Semua sudah diterima' }}
                            </div>
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>

                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Menunggu Keanggotaan</h4>
                            <div class="stats-figure" style="margin-bottom: 16px; font-size: 40px; font-weight: bold;">
                                {{ $pendingAnggota }}
                            </div>
                            <div class="stats-meta">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                </svg>
                                {{ $pendingAnggota > 0 ? $persenPendingAnggota . '% anggota menunggu' : 'Semua sudah diterima' }}
                            </div>
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Artikel Tampil</h4>
                            <div class="stats-figure" style="margin-bottom: 16px; font-size: 40px; font-weight: bold;">
                                {{ $artikelTampil1 }}
                            </div>
                            <div class="stats-meta">Tampil</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div><!--//col-->

                <!-- komunitas aktif -->
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Komunitas Aktif</h4>
                            <div class="stats-figure" style="margin-bottom: 16px; font-size: 40px; font-weight: bold;">
                                {{ $acceptKomunitas }}
                            </div>
                            <div class="stats-meta">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                </svg> {{ $acceptKomunitas > 0 ? round(($acceptKomunitas / ($acceptKomunitas + $acceptKomunitas)) * 100, 1) : 0 }}%
                                {{ $acceptKomunitas > 0 ? $persenAktifKomunitas . '% komunitas aktif' : 'Semua sudah diterima' }}
                            </div>
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>

                <!-- menunggu komunitas -->
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Menunggu Aktivasi Komunitas</h4>
                            <div class="stats-figure" style="margin-bottom: 16px; font-size: 40px; font-weight: bold;">
                                {{ $pendingKomunitas }}
                            </div>
                            <div class="stats-meta">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                </svg> {{ $pendingKomunitas > 0 ? round(($pendingKomunitas / ($pendingKomunitas + $pendingKomunitas)) * 100, 1) : 0 }}%
                                {{ $pendingKomunitas > 0 ? $persenPendingKomunitas . '% anggota aktif' : 'Semua sudah diterima' }}
                            </div>
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>
                
            </div><!--//row-->
            <div class="row" style="--bs-gutter-x: 32px; --bs-gutter-y: 32px; margin-bottom: 32px;">
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Artikel</h4>
                            <span style="font-size: 16px; color: #828282;"><strong>Judul</strong></span>
                            <ul class="list-group" style="border-radius: 0px;">
                                @forelse ($artikelTampil as $artikel)
                                    <li class="list-group-item px-0"
                                        style="border-left: none; border-right: none; padding-block: 12px;">
                                        {{ $artikel }} {{-- karena $artikel sudah string --}}
                                    </li>
                                @empty
                                    <li class="list-group-item px-0 text-center"
                                        style="border-left: none; border-right: none; padding-block: 12px;">
                                        Belum ada artikel
                                    </li>
                                @endforelse
                            </ul>
                            {{-- <div class="stats-figure">{{ $artikelArsip }}</div>
                            <div class="stats-meta">Diarsipkan</div> --}}
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="app-card app-card-chart" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-header p-3 pb-0" style="border: none;">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 style="font-size: 1rem;">Domisili Anggota Terbanyak</h4>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 pt-lg-2 p-lg-4">
                            <div class="chart-container">
                                <canvas id="canvas-barchart-domisili" style="max-height: 450px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(() => {
        const ctx = document.getElementById('canvas-barchart-domisili').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(65, 162, 185, 0.3)');
        gradient.addColorStop(1, 'rgba(65, 162, 185, 0.9)');

        new Chart($('#canvas-barchart-domisili'), {
            type: 'bar',

            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Anggota',
                    backgroundColor: gradient,
                    borderColor: gradient,
                    borderWidth: 1,
                    maxBarThickness: 32,

                    data: @json($counts),
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 1.5,
                legend: {
                    position: 'bottom',
                    align: 'end',
                },
                title: {
                    display: false,
                    text: 'Chart.js Bar Chart Example',
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    titleMarginBottom: 10,
                    bodySpacing: 10,
                    xPadding: 16,
                    yPadding: 16,
                    borderColor: window.chartColors.border,
                    borderWidth: 1,
                    backgroundColor: '#fff',
                    bodyFontColor: window.chartColors.text,
                    titleFontColor: window.chartColors.text,

                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            drawBorder: false,
                            color: window.chartColors.border,
                        },

                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            drawBorder: false,
                            color: window.chartColors.borders,
                        },
                        ticks: {
                            beginAtZero: true,
                            userCallback: (label, index, labels) => Math.floor(label) === label ? label : undefined,
                        }
                    }]
                }
            }
        });
    });
</script>