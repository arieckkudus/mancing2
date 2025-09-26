<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h5 class="mb-0">FORMULIR PENDAFTARAN ANGGOTA PERORANGAN</h5>
                <small>Asosiasi Pemancingan Indonesia - DPP Kalimantan Timur</small>
            </div>
            <div class="card-body">

                <form class="settings-form" action="{{ route('daftar-anggota-individu.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="fw-bold mb-3">Data Diri</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="1"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <select class="form-select select2" id="provinsi" name="provinsi">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach($regions as $r)
                                    <option value="{{ $r['provinsi']['kode'] }}">
                                        {{ $r['provinsi']['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" id="kota-container">
                            <label for="kota" class="form-label">Kota/Kabupaten</label>
                            <select class="form-select select2" id="kota" name="kota_kabupaten">
                                <option value="">-- Pilih Kota/Kabupaten --</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status Keanggotaan</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">-- Pilih --</option>
                                <option value="anggota">Anggota</option>
                                <option value="pengurus">Pengurus</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="foto" class="form-label">Upload Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3">Jenis Pemancingan yang Diminati</h6>
                    <div class="row">
                        <div class="col-md-12">
                            @php
                                $jenis = ['laut' => 'Laut', 'sungai' => 'Sungai', 'kolam' => 'Kolam/Galatama', 'muara' => 'Muara', 'danau' => 'Danau/Waduk', 'lainnya' => 'Lainnya'];
                            @endphp
                            @foreach($jenis as $key => $label)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]"
                                        id="{{ $key }}" value="{{ $key }}">
                                    <label class="form-check-label" for="{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
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

                    <h6 class="fw-bold mb-3">Daftar Atas Nama</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipe_pendaftaran" id="individu"
                                    value="individu" checked>
                                <label class="form-check-label" for="individu">Individu</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipe_pendaftaran" id="komunitas"
                                    value="komunitas">
                                <label class="form-check-label" for="komunitas">Komunitas / Club</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3" id="form_nama_komunitas">
                            <label for="nama_komunitas" class="form-label">Nama Komunitas / Club</label>
                            <select class="form-select select2" id="nama_komunitas" name="nama_komunitas">
                                <option value="">-- Pilih Komunitas --</option>
                                @foreach($komunitas as $k)
                                    <option value="{{ $k }}">{{ $k }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!-- Komitmen -->
                    <h6 class="fw-bold mb-3">Komitmen Pernyataan</h6>
                    <div>
                        <ul>
                            <li>Mematuhi semua aturan dan tata tertib yang ditetapkan oleh asosiasi</li>
                            <li>Berpartisipasi aktif dalam kegiatan, program kerja, dan pengembangan asosiasi</li>
                            <li>Menjaga nama baik asosiasi dan ikut menciptakan suasana yang solid</li>
                            <li>Bersedia memberikan kontribusi baik berupa waktu, tenaga, ide, maupun dukungan</li>
                        </ul>
                    </div>

                    <hr>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
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

    <!-- ttd anggota -->
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
            function toggleForms() {
                let tipe = $('input[name="tipe_pendaftaran"]:checked').val();
                let formKomunitas = $("#form_nama_komunitas");
                let formUsaha = $("#form_usaha");

                if (tipe === "individu") {
                    formKomunitas.hide();
                    formUsaha.hide();
                } else if (tipe === "komunitas") {
                    formKomunitas.show();
                    formUsaha.hide();
                } else if (tipe === "usaha") {
                    formKomunitas.hide();  // pastikan komunitas TIDAK muncul
                    formUsaha.show();
                }
            }

            toggleForms(); // jalankan pertama kali
            $('input[name="tipe_pendaftaran"]').on('change', toggleForms);
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#nama_komunitas').select2({
                placeholder: "-- Pilih Komunitas --",
                allowClear: true
            });
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
                let selectedProvKode = $(this).val(); // kode provinsi
                let kotaSelect = $('#kota');

                // kosongkan opsi kota
                kotaSelect.empty().append('<option value="">-- Pilih Kota/Kabupaten --</option>');

                // cari provinsi berdasarkan kode
                let provData = dataRegion.find(r => r.provinsi.kode === selectedProvKode);

                if (provData) {
                    provData.kota.forEach(k => {
                        kotaSelect.append(new Option(k.nama, k.kode));
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

    <!-- ttd usaha -->
    <script>
        const canvasUsaha = document.getElementById('signature_usaha');
        const signaturePadUsaha = new SignaturePad(canvasUsaha, {
            backgroundColor: 'transparent', // supaya transparan tidak hitam
        });

        document.getElementById('clear_usaha').addEventListener('click', function () {
            signaturePadUsaha.clear();
        });

        // sebelum submit form, simpan tanda tangan ke hidden input
        document.querySelector("form").addEventListener("submit", function (e) {
            if (!signaturePadUsaha.isEmpty()) {
                document.getElementById('ttd').value = signaturePadUsaha.toDataURL("image/png");
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
