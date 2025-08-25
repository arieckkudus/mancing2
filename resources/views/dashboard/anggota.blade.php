<!DOCTYPE html>
<html lang="en">
	<style>
		.table-header-green th {
			background-color: #42d4b7ff !important; /* hijau toska */
			color: #ffffffff !important;            /* teks kuning misalnya */
		}
	</style>

@extends('layouts.app')

@section('title', 'Table Anggota APRI')

@section('content')
				<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Table Anggota</h1>

			<div class="card shadow-sm mt-4">
				<div class="card-body">

					<div class="d-flex justify-content-between mb-3 flex-wrap">
						<form action="{{ route('dashboard.anggota') }}" method="GET" class="d-flex mb-2" style="max-width: 300px;">
							<input type="text" name="search" class="form-control me-2"
								placeholder="Cari anggota..." value="{{ request('search') }}">
							<button type="submit" class="btn btn-primary btn-sm">Cari</button>
						</form>
					</div>

					<div class="table-responsive">
						<table class="table table-bordered table-striped align-middle">
							<thead class="table-header-green">
								<tr>
									<th>No</th>
									<th>Nama Lengkap</th>
									<th>Tempat & Tanggal Lahir</th>
									<th>Alamat Lengkap</th>
									<th>No HP</th>
									<th>Tipe Pendaftaran</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($anggota as $key => $item)
									<tr>
										{{-- Nomor urut mengikuti pagination --}}
										<td>{{ $anggota->firstItem() + $key }}</td>
										<td>{{ $item->nama_lengkap }}</td>
										<td>
											{{ $item->tempat_lahir }},
											{{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}
										</td>
										<td>
											{{ $item->alamat }},
											{{ $item->kota_kabupaten }},
											{{ $item->provinsi }}
										</td>
										<td>{{ $item->no_hp }}</td>
										<td class="text-capitalize">{{ $item->tipe_pendaftaran }}</td>
										<td>
											{{-- Tombol Lihat (nanti disambung ke detail) --}}
											<a href="#" class="btn btn-sm btn-info">Lihat</a>

											{{-- Tampilkan tombol Terima hanya jika accept masih kosong --}}
											@if (empty($item->accept))
												<form action="{{ route('anggota.accept', $item->id) }}" 
													method="POST" class="d-inline">
													@csrf
													<button type="submit" 
															class="btn btn-sm btn-success"
															onclick="return confirm('Yakin ingin menerima anggota ini?')">
														Terima
													</button>
												</form>
											@endif
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="7" class="text-center">Belum ada data anggota</td>
									</tr>
								@endforelse
							</tbody>
						</table>

						{{-- Pagination responsif --}}
						<div class="d-flex justify-content-center">
							{{ $anggota->links('pagination::bootstrap-5') }}
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>