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
                                {{ $accept }}
                            </div>
                            <div class="stats-meta">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
                                </svg> {{ $accept > 0 ? round(($accept / ($accept + $accept)) * 100, 1) : 0 }}%
                                {{ $accept > 0 ? $persenAktif . '% anggota aktif' : 'Semua sudah diterima' }}
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
                                {{ $pending }}
                            </div>
                            <div class="stats-meta">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                </svg>
                                {{ $pending > 0 ? $persenPending . '% anggota menunggu' : 'Semua sudah diterima' }}
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
                                {{ $artikelTampil }}
                            </div>
                            <div class="stats-meta">Tampil</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div><!--//col-->
            </div><!--//row-->
            <div class="row" style="--bs-gutter-x: 32px; --bs-gutter-y: 32px; margin-bottom: 32px;">
                <div class="col-6 col-lg-4">
                    <div class="app-card app-card-stat h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type" style="margin-bottom: 16px;">Artikel</h4>
                            <span style="font-size: 16px; color: #828282;">Judul</span>
                            <ul class="list-group" style="border-radius: 0px;">
                                <li class="list-group-item px-0"
                                    style="border-left: none; border-right: none; padding-block: 12px;">An item</li>
                                <li class="list-group-item px-0"
                                    style="border-left: none; border-right: none; padding-block: 12px;">A second item</li>
                                <li class="list-group-item px-0"
                                    style="border-left: none; border-right: none; padding-block: 12px;">A third item</li>
                                <li class="list-group-item px-0"
                                    style="border-left: none; border-right: none; padding-block: 12px;">A fourth item</li>
                                <li class="list-group-item px-0"
                                    style="border-left: none; border-right: none; padding-block: 12px;">And a fifth one</li>
                            </ul>
                            {{-- <div class="stats-figure">{{ $artikelArsip }}</div>
                            <div class="stats-meta">Diarsipkan</div> --}}
                        </div>
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="app-card app-card-chart h-100" style="box-shadow: 0 4px 12px rgba(0,0,0,0.25)">
                        <div class="app-card-header p-3 pb-0" style="border: none;">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 style="font-size: 1rem;">Domisili Anggota</h4>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body p-3 pt-lg-2 p-lg-4">
                            <div class="chart-container">
                                <canvas id="canvas-barchart-domisili"></canvas>
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
