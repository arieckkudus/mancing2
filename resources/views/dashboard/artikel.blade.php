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
        <h1 class="app-page-title">Table Artikel</h1>

        {{-- Tombol Tambah Artikel --}}
        <div class="mb-3">
            <a href="{{ route('form_artikel') }}" class="btn btn-primary">
                + Tambah Artikel
            </a>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-body">

                	<div class="d-flex justify-content-between mb-3 flex-wrap">
						<form action="{{ route('dashboard.artikel') }}" method="GET" class="d-flex mb-2" style="max-width: 300px;">
							<input type="text" name="search" class="form-control me-2"
								placeholder="Cari artikel" value="{{ request('search') }}">
							<button type="submit" class="btn btn-primary btn-sm">Cari</button>
						</form>
					</div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-header-green">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Thumbnail</th>
                                <th>Isi Konten</th>
                                <th>Penerbit</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($artikel as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
									<td>
                            @if ($item->pict)
                                <img src="{{ asset($item->pict) }}" 
                                    alt="Thumbnail" 
                                    style="width:80px; height:60px; object-fit:cover;" 
                                    class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                                    <td>{!! Str::limit($item->content, 20) !!}</td>
                                    <td>{{ $item->penerbit }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                                    <td>
                                        {{-- Tombol Lihat (nanti disambung ke detail) --}}
                                        <a href="#" class="btn btn-sm btn-info">Lihat</a>

                                        {{-- Tampilkan tombol Terima hanya jika accept masih kosong --}}
                                        @if (empty($item->accept))
                                            <form action="{{ route('dashboard.artikel-delete', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data artikel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $artikel->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>