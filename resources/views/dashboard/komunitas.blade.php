<!DOCTYPE html>
<html lang="en">
<style>
    .table-header-green th {
        background-color: #42d4b7ff !important;
        /* hijau toska */
        color: #ffffffff !important;
        /* teks kuning misalnya */
    }
</style>

@extends('layouts.app')

@section('title', 'Table Anggota APRI')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-fluid px-0">
            <h1 class="app-page-title">Table Komunitas</h1>

            <div class="card shadow-sm mt-4">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3 flex-wrap">
                        {{-- Form Pencarian --}}
                        <form action="{{ route('dashboard.komunitas') }}" method="GET" class="d-flex mb-2"
                            style="max-width: 300px;">
                            <input type="text" name="search" class="form-control me-2" placeholder="Cari Komunitas..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        </form>

                        {{-- Dropdown Filter --}}
                        <form action="{{ route('dashboard.komunitas') }}" method="GET" class="d-flex mb-2">
                            {{-- kalau ada search, ikutkan biar ga hilang --}}
                            <input type="hidden" name="search" value="{{ request('search') }}">

                            <select name="accept_filter" class="form-select me-2" onchange="this.form.submit()">
                                <option value="">-- Semua Data --</option>
                                <option value="filled" {{ request('accept_filter') == 'filled' ? 'selected' : '' }}>Anggota Diterima</option>
                                <option value="null" {{ request('accept_filter') == 'null' ? 'selected' : '' }}>Menunggu</option>
                            </select>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-header-green">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Komunitas</th>
                                    <th>Nama Ketua</th>
                                    <th>Alamat</th>
                                    <th>DPP</th>
                                    <th>DPK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggota as $key => $item)
                                    <tr>
                                        {{-- Nomor urut mengikuti pagination --}}
                                        <td>{{ $anggota->firstItem() + $key }}</td>
                                        <td>{{ $item->nama_komunitas }}</td>
                                        <td>{{ $item->nama_ketua }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->provinsi }}</td>
                                        <td>{{ $item->kota_kabupaten }}</td>
                                        <td class="text-center">
                                            <div style="display: flex; align-items: center; column-gap: 0.5rem;">
                                                {{-- Tombol Lihat (nanti disambung ke detail) --}}
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#showDataModal" data-show-id="{{ $item->id }}">
                                                    Lihat
                                                </button>

                                                {{-- Tampilkan tombol Terima hanya jika accept masih kosong --}}
                                                @if (empty($item->accept))
                                                    <form action="{{ route('komunitas.accept', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            onclick="return confirm('Yakin ingin menerima komunitas ini?')">
                                                            Terima
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('kartu_anggota', $item->id) }}"
                                                        class="btn btn-primary">Kartu</a>
                                                @endif
                                            </div>
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

    <div class="modal fade" id="showDataModal" tabindex="-1" aria-labelledby="showDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="showDataModalLabel">Screening Data Komunitas / Club</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(() => {
        const anggota = @json($anggota);

        $('button[data-show-id]').on('click', ({ currentTarget }) => {
            const finded = anggota.data.find(({ id }) => id == $(currentTarget).data('show-id'));

            let html = `
                <table class="table table-bordered">
                    <tr><th>Logo</th><td>${finded.logo}</td></tr>
                    <tr><th>Nama Komunitas</th><td>${finded.nama_komunitas}</td></tr>
                    <tr><th>Nama Ketua</th><td>${finded.nama_ketua}</td></tr>
                    <tr><th>Tanggal Berdiri</th><td>${new Date(finded.tanggal_berdiri).toLocaleDateString()}</td></tr>
                    <tr><th>Nama Narahubung</th><td>${finded.nama_narahubung}</td></tr>
                    <tr><th>No Hp</th><td>${finded.no_hp}</td></tr>
                    <tr><th>Email</th><td>${finded.email}</td></tr>
                    <tr><th>DPP</th><td>${finded.provinsi}</td></tr>
                    <tr><th>DPK</th><td>${finded.kota_kabupaten}</td></tr>
                    <tr><th>Alamat</th><td>${finded.alamat}</td></tr>
                    <tr><th>Visi & Misi</th><td>${finded.visi_misi ?? '-'}</td></tr>
                    <tr><th>Fokus Kegiatan</th><td>${finded.fokus_kegiatan ?? '-'}</td></tr>
                    <tr><th>Facebook</th><td>${finded.facebook ?? '-'}</td></tr>
                    <tr><th>Instagram</th><td>${finded.instagram ?? '-'}</td></tr>
                    <tr><th>Tiktok</th><td>${finded.tiktok ?? '-'}</td></tr>
                    <tr><th>Lainnya</th><td>${finded.lainnya ?? '-'}</td></tr>
                    <tr><th>Dibuat</th><td>${new Date(finded.created_at).toLocaleString()}</td></tr>
                    <tr><th>Diupdate</th><td>${new Date(finded.updated_at).toLocaleString()}</td></tr>
                </table>
            `;

            $('#showDataModal .modal-body').html(html);
        });
    });
</script>

</html>
