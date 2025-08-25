<!DOCTYPE html>
<html lang="en">

@extends('layouts.app')

@section('title', 'Dashbaord APRI')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Dashboard Admin</h1>
				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Anggota Aktif</h4>
								<div class="stats-figure">{{ $accept }}</div>
								<div class="stats-meta text-success">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
									</svg> {{ $accept > 0 ? round(($accept / ($accept + $accept)) * 100, 1) : 0 }}%
									{{ $accept > 0 ? $persenAktif.'% anggota aktif' : 'Semua sudah diterima' }}
								</div>
							</div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Menunggu Keanggotaan</h4>
								<div class="stats-figure">{{ $pending }}</div>
								<div class="stats-meta text-success">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
									</svg>
									{{ $pending > 0 ? $persenPending.'% anggota menunggu' : 'Semua sudah diterima' }}
								</div>
							</div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Artikel Tampil</h4>
							    <div class="stats-figure">{{ $artikelTampil }}</div>
							    <div class="stats-meta">
								    Tampil</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Artikel Arsip</h4>
							    <div class="stats-figure">{{ $artikelArsip }}</div>
							    <div class="stats-meta">Diarsipkan</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    <div class="row g-4 mb-4">
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-chart h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">Line Chart Example</h4>
							        </div>
							        <div class="col-auto">
							        </div>
						        </div>
					        </div>
					        <div class="app-card-body p-3 p-lg-4">
							    <div class="mb-3 d-flex">   
							        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
									    <option value="1" selected>This week</option>
									    <option value="2">Today</option>
									    <option value="3">This Month</option>
									    <option value="3">This Year</option>
									</select>
							    </div>
						        <div class="chart-container">
				                    <canvas id="canvas-linechart" ></canvas>
						        </div>
					        </div>
				        </div>
			        </div>
			        <div class="col-12 col-lg-6">
						<div class="app-card app-card-chart h-100 shadow-sm">
							<div class="app-card-header p-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<h4 class="app-card-title">Domisili Anggota</h4>
									</div>
									<div class="col-auto">
									</div>
								</div>
							</div>
							<div class="app-card-body p-3 p-lg-4">
								<div class="chart-container">
									<canvas id="canvas-barchart"></canvas>
								</div>
							</div>
						</div>
					</div>
			    </div>
		    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('canvas-barchart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels), // nama kota_kabupaten
            datasets: [{
                label: 'Jumlah Anggota',
                data: @json($counts), // jumlah per kota
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            indexAxis: 'y', // supaya yang banyak muncul di atas kiri
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        precision:0
                    }
                }
            }
        }
    });
</script>


</html>