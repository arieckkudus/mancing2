<!DOCTYPE html>
<html lang="en">
<style>
    .table-header-green th {
        background-color: #42d4b7ff !important;
        /* hijau toska */
        color: #ffffffff !important;
        /* teks kuning misalnya */
    }

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

@extends('layouts.app')

@section('title', 'Table Anggota APRI')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-fluid px-0">
            <h1 class="app-page-title">Table Anggota</h1>

            <div class="card shadow-sm mt-4">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3 flex-wrap">
                        {{-- Form Pencarian --}}
                        <form action="{{ route('dashboard.anggota') }}" method="GET" class="d-flex mb-2"
                            style="max-width: 300px;">
                            <input type="text" name="search" class="form-control me-2" placeholder="Cari anggota..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                        </form>

                        {{-- Dropdown Filter --}}
                        <form action="{{ route('dashboard.anggota') }}" method="GET" class="d-flex mb-2">
                            {{-- kalau ada search, ikutkan biar ga hilang --}}
                            <input type="hidden" name="search" value="{{ request('search') }}">

                            <select name="accept_filter" class="form-select me-2" onchange="this.form.submit()">
                                <option value="">-- Semua Data --</option>
                                <option value="filled" {{ request('accept_filter') == 'filled' ? 'selected' : '' }}>Anggota
                                    Diterima</option>
                                <option value="null" {{ request('accept_filter') == 'null' ? 'selected' : '' }}>Menunggu
                                    keanggotaan</option>
                            </select>
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
                                        <td class="text-center">
                                            <div style="display: flex; align-items: center; column-gap: 0.5rem;">
                                                {{-- Tombol Lihat --}}
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#showDataModal" data-show-id="{{ $item->id }}">
                                                    Lihat
                                                </button>

                                                {{-- Tombol Terima atau Kartu --}}
                                                @if (empty($item->accept))
                                                    <form action="{{ route('anggota.accept', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            onclick="return confirm('Yakin ingin menerima anggota ini?')">
                                                            Terima
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('kartu_anggota', $item->id) }}"
                                                        class="btn btn-primary">Kartu</a>
                                                @endif

                                                {{-- Tombol Delete --}}
                                                <form id="form-delete-{{ $item->id }}"
                                                    action="{{ route('daftar-anggota.delete') }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button type="button" class="btn btn-danger btn-delete"
                                                        data-id="{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </form>

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
                    <h1 class="modal-title fs-5" id="showDataModalLabel">Screening Data Anggota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Edit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(function (button) {
            button.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Yakin hapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form-delete-' + id).submit();
                    }
                });
            });
        });
    });
</script>

<script>
    $(document).ready(() => {
        const anggota = @json($anggota);

        $('button[data-show-id]').on('click', ({ currentTarget }) => {
            const finded = anggota.data.find(({ id }) => id == $(currentTarget).data('show-id'));

            let html = `
                <table class="table table-bordered">
                    <tr>
                        <th>Foto</th>
                        <td>
                            <img src="/storage/${finded.foto}" 
                                alt="Foto ${finded.nama_lengkap}" 
                                style="max-width: 120px; max-height: 120px; object-fit: cover; border-radius: 6px;">
                        </td>
                    </tr>
                    <tr><th>Nama Lengkap</th><td>${finded.nama_lengkap}</td></tr>
                    <tr><th>Tempat Lahir</th><td>${finded.tempat_lahir}</td></tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>${new Date(finded.tanggal_lahir).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</td>
                    </tr>
                    <tr><th>Gender</th><td>${finded.gender === 'L' ? 'Laki-laki' : 'Perempuan'}</td></tr>
                    <tr><th>Alamat</th><td>${finded.alamat}</td></tr>
                    <tr><th>Kota/Kabupaten</th><td>${finded.kota_kabupaten}</td></tr>
                    <tr><th>Provinsi</th><td>${finded.provinsi}</td></tr>
                    <tr><th>Pekerjaan</th><td>${finded.pekerjaan}</td></tr>
                    <tr><th>No HP</th><td>${finded.no_hp}</td></tr>
                    <tr><th>Email</th><td>${finded.email}</td></tr>
                    <tr><th>Tipe Pendaftaran</th><td>${finded.tipe_pendaftaran}</td></tr>
                    <tr><th>Nama Komunitas</th><td>${finded.nama_komunitas ?? '-'}</td></tr>
                    <tr><th>Jenis Pemancingan</th>
                        <td>
                            ${JSON.parse(finded.jenis_pemancingan)
                    .map(j => `<span class="badge bg-primary me-1">${j}</span>`)
                    .join('')}
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>${new Date(finded.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</td>
                    </tr>
                    <tr>
                        <th>Diupdate</th>
                        <td>${new Date(finded.updated_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</td>
                    </tr>
                </table>
            `;

            $('#showDataModal .modal-body').html(html);
        });
    });
</script>

</html>