<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran Usaha</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card shadow">
    <div class="card-header text-center">
      <h5 class="mb-0">FORMULIR PENDAFTARAN USAHA / CLUB</h5>
      <small>Asosiasi Pemancingan Indonesia - DPP Kalimantan Timur</small>
    </div>
    <div class="card-body">

      <form class="settings-form" action="{{ route('daftar-anggota-usaha.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h6 class="fw-bold mb-3">Data Usaha</h6>
        <div class="row g-3">

          <div class="col-md-6 mb-3">
              <label for="provinsi" class="form-label">DPP</label>
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
              <label for="kota" class="form-label">DPK</label>
              <select class="form-select select2" id="kota" name="kota_kabupaten">
                  <option value="">-- Pilih Kota/Kabupaten --</option>
              </select>
          </div>
            <div class="col-md-6">
              <label for="nama_usaha" class="form-label">Nama Usaha</label>
              <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Masukkan nama usaha">
            </div>
            <div class="col-md-6">
              <label for="logo_usaha" class="form-label">Upload Logo</label>
              <input type="file" class="form-control" id="logo_usaha" name="logo_usaha" accept="image/*">
            </div>
            <div class="col-md-6">
              <label for="tanggal_berdiri" class="form-label">Tanggal Berdiri</label>
              <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri">
            </div>
            @php
                $jenis_usaha = json_decode(file_get_contents(public_path('json/jenis_usaha.json')), true);
            @endphp
            <div class="col-md-6">
              <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
              <select class="form-select" id="jenis_usaha" name="jenis_usaha">
                <option value="">-- Pilih Jenis Usaha --</option>
                @foreach($jenis_usaha as $ju)
                  <option value="{{ strtolower($ju) }}">{{ $ju }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label for="nomor_izin_usaha" class="form-label">Nomor Izin Usaha</label>
              <input type="number" class="form-control" id="nomor_izin_usaha" name="nomor_izin_usaha" placeholder="Masukkan Nomor Izin Usaha">
            </div>
            <div class="col-md-6">
              <label for="produk_jasa" class="form-label">Produk / Jasa Utama</label>
              <input type="text" class="form-control" id="produk_jasa" name="produk_jasa" placeholder="Masukkan nama usaha">
            </div>
            <div class="col-md-6">
              <label for="alamat_usaha" class="form-label">Alamat Usaha / Industri</label>
              <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" placeholder="Masukkan alamat usaha">
            </div>
            <div class="col-md-6">
              <label for="nomor_telepon_usaha" class="form-label">Nomor Telepon Usaha / Industri</label>
              <input type="number" class="form-control" id="nomor_telepon_usaha" name="nomor_telepon_usaha" placeholder="Masukkan Nomor Telepon Usaha">
            </div>
            <div class="col-md-6">
              <label for="email_usaha" class="form-label">Email Usaha / Industri</label>
              <input type="email" class="form-control" id="email_usaha" name="email_usaha" placeholder="Masukkan Email Usaha">
            </div>
            <div class="col-md-6">
              <label for="website_usaha" class="form-label">Website</label>
              <input type="text" class="form-control" id="website_usaha" name="website_usaha" placeholder="Masukkan website anda jika ada">
            </div>
            <div class="col-md-6">
              <label for="nama_penanggung_jawab" class="form-label">Nama Penanggung Jawab</label>
              <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab" placeholder="Masukkan nama usaha">
            </div>
            <div class="col-md-6">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan nama usaha">
            </div>
            <div class="col-md-6">
              <label for="nomor_telepon_penanggung" class="form-label">Nomor Telepon Penanggung jawab</label>
              <input type="number" class="form-control" id="nomor_telepon_penanggung" name="nomor_telepon_penanggung" placeholder="Contoh: 2015">
            </div>
            <div class="col-md-6">
              <label class="form-label">Alamat Email</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Tanda Tangan Usaha</label>
              <div>
                <canvas id="signature_usaha" width="600" height="200"
                  style="border:2px solid #bbb; border-radius:8px; background:#fff;">
                </canvas>
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-sm btn-danger" id="clear_usaha">Clear</button>
              </div>
              <!-- hidden input untuk kirim base64 ke server -->
              <input type="hidden" name="signature_usaha" id="ttd">
            </div>
        <hr>

        <!-- Komitmen -->
        <h6 class="fw-bold mb-3">Komitmen Pernyataan</h6>
        <h6 class="mb-3">Dengan mengisi dan menandatangani formulir ini, saya menyatakan bahwa:</h6>
        <ul>
          <li>Saya telah membaca, memahami, dan menyetujui Anggaran Dasar (AD) dan Anggaran Rumah Tangga (ART) Asosiasi
            Permancingan Indonesia serta peraturan-peraturan lain yang berlaku di dalamnya.</li>
          <li>.Saya bersedia untuk aktif berpartisipasi dalam kegiatan-kegiatan Asosiasi Permancingan Indonesia sesuai dengan
            kemampuan dan minat saya.</li>
          <li>Saya akan menjunjung tinggi nama baik Asosiasi Permancingan Indonesia dan menjaga etika serta integritas sebagai
            anggota.</li>
          <li>Saya akan memenuhi kewajiban sebagai anggota sesuai dengan ketentuan yang berlaku.</li>
          <li>Saya memberikan izin kepada Asosiasi Permancingan Indonesia untuk menyimpan dan menggunakan data pribadi saya
            sesuai dengan kebijakan privasi yang berlaku untuk kepentingan organisasi.</li>
          <li>Saya menyadari bahwa keanggotaan saya dapat ditinjau atau dihentikan sesuai dengan ketentuan AD/ART Asosiasi
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
$(document).ready(function() {
    $('#provinsi').select2({
        placeholder: "-- Pilih Provinsi --",
        allowClear: true
    });
    $('#kota').select2({
        placeholder: "-- Pilih Kota/Kabupaten --",
        allowClear: true
    });

    const dataRegion = @json($regions);

    $('#provinsi').on('change', function() {
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
    $('#status').on('change', function() {
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
