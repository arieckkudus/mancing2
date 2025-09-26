<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Komunitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h5 class="mb-0">FORMULIR PENDAFTARAN KOMUNITAS / CLUB</h5>
                <small>Asosiasi Pemancingan Indonesia - DPP Kalimantan Timur</small>
            </div>
            <div class="card-body">

                <form class="settings-form" action="{{ route('daftar-anggota-komunitas.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="fw-bold mb-3">Data Komunitas</h6>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nama Komunitas</label>
                            <input type="text" class="form-control" name="nama_komunitas" id="nama_komunitas">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Ketua</label>
                            <input type="text" class="form-control" name="nama_ketua" id="nama_ketua">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Berdiri</label>
                            <input type="date" class="form-control" name="tanggal_berdiri" id="tanggal_berdiri">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Narahubung</label>
                            <input type="text" class="form-control" name="nama_narahubung" id="nama_narahubung">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nomor Telepon/HP Narahubung</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="provinsi" class="form-label">DPP Asal</label>
                            <select class="form-select select2" id="provinsi" name="provinsi">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach($regions as $r)
                                    <option value="{{ $r['provinsi']['nama'] }}">
                                        {{ $r['provinsi']['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" id="kota-container">
                            <label for="kota" class="form-label">DPK Asal</label>
                            <select class="form-select select2" id="kota" name="kota_kabupaten">
                                <option value="">-- Pilih Kota/Kabupaten --</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Alamat Sekretariat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="1"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="logo" class="form-label">Logo Komunitas</label>
                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                        </div>

                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3">Informasi Lainnya</h6>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Visi & Misi</label>
                            <textarea class="form-control" name="visi_misi" id="visi_misi" rows="1"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Fokus Kegiatan</label>
                            <textarea class="form-control" name="fokus_kegiatan" id="fokus_kegiatan"
                                rows="1"></textarea>
                        </div>

                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3">Media Sosial</h6>
                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label">Facebook</label>
                            <textarea class="form-control" name="facebook" id="facebook" rows="1"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Instagram</label>
                            <textarea class="form-control" name="instagram" id="instagram" rows="1"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tiktok</label>
                            <textarea class="form-control" name="tiktok" id="tiktok" rows="1"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Lainnya</label>
                            <textarea class="form-control" name="lainnya" id="lainnya" rows="1"></textarea>
                        </div>

                    </div>

                    <hr>

                    <!-- Tanda Tangan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanda Tangan</label>
                        <div>
                            <canvas id="signature" width="600" height="200"
                                style="border:2px solid #bbb; border-radius:8px; background:#fff;">
                            </canvas>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-danger" id="clear">Clear</button>
                        </div>
                        <!-- hidden input untuk kirim base64 ke server -->
                        <input type="hidden" name="signature" id="ttd">
                    </div>

                    <hr>

                    <!-- Komitmen -->
                    <h6 class="fw-bold mb-3">Komitmen Pernyataan</h6>
                    <h6 class="mb-3">Dengan mengisi dan menandatangani formulir ini, saya menyatakan bahwa:</h6>
                    <ul>
                        <li>Saya telah membaca, memahami, dan menyetujui Anggaran Dasar (AD) dan Anggaran Rumah Tangga
                            (ART) Asosiasi
                            Permancingan Indonesia serta peraturan-peraturan lain yang berlaku di dalamnya.</li>
                        <li>.Saya bersedia untuk aktif berpartisipasi dalam kegiatan-kegiatan Asosiasi Permancingan
                            Indonesia sesuai dengan
                            kemampuan dan minat saya.</li>
                        <li>Saya akan menjunjung tinggi nama baik Asosiasi Permancingan Indonesia dan menjaga etika
                            serta integritas sebagai
                            anggota.</li>
                        <li>Saya akan memenuhi kewajiban sebagai anggota sesuai dengan ketentuan yang berlaku.</li>
                        <li>Saya memberikan izin kepada Asosiasi Permancingan Indonesia untuk menyimpan dan menggunakan
                            data pribadi saya
                            sesuai dengan kebijakan privasi yang berlaku untuk kepentingan organisasi.</li>
                        <li>Saya menyadari bahwa keanggotaan saya dapat ditinjau atau dihentikan sesuai dengan ketentuan
                            AD/ART Asosiasi
                            Permancingan Indonesia jika saya melanggar peraturan yang berlaku.</li>
                    </ul>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <!-- Tambahkan sebelum </body> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Javascript -->
    <script src="{{ asset('dashboard-assets/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('dashboard-assets/assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('dashboard-assets/assets/js/app.js') }}"></script>

    <script>
        const canvas = document.getElementById('signature');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'transparent', // supaya transparan tidak hitam
        });

        document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
        });

        // sebelum submit form, simpan tanda tangan ke hidden input
        document.querySelector("form").addEventListener("submit", function (e) {
            if (!signaturePad.isEmpty()) {
                document.getElementById('ttd').value = signaturePad.toDataURL("image/png");
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#provinsi').select2({
                placeholder: "-- Pilih Provinsi --",
                allowClear: true
            });
            $('#kota').select2({
                placeholder: "-- Pilih Kota/Kabupaten --",
                allowClear: true
            });

            const dataRegion = @json($regions);

            $('#provinsi').on('change', function () {
                let selectedProvNama = $(this).val(); // kode provinsi
                let kotaSelect = $('#kota');

                // kosongkan opsi kota
                kotaSelect.empty().append('<option value="">-- Pilih Kota/Kabupaten --</option>');

                // cari provinsi berdasarkan kode
                let provData = dataRegion.find(r => r.provinsi.nama === selectedProvNama);

                if (provData) {
                    provData.kota.forEach(k => {
                        kotaSelect.append(new Option(k.nama, k.nama));

                    });
                }

                kotaSelect.val(null).trigger('change');
            });

            // Hide kota kalau status = pengurus
            $('#status').on('change', function () {
                if ($(this).val() === 'pengurus') {
                    $('#kota-container').hide();
                } else {
                    $('#kota-container').show();
                }
            }).trigger('change');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
