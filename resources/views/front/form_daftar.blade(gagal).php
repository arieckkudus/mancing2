<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal APRI</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
	<script defer src="{{ asset('dashboard-assets/assets/plugins/fontawesome/js/all.min.js') }}"></script>

	<!-- App CSS -->  
	<link id="theme-style" rel="stylesheet" href="{{ asset('dashboard-assets/assets/css/portal.css') }}">
    <!-- Tambahkan di <head> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

    <style>
        .select2.select2-container{
            width: 100% !important;
        }
    </style>

</head> 

<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl me-5">			    
			    <h1 class="app-page-title">Daftar Keanggotaan</h1>
                <div class="row g-4 settings-section">
	              <div class="col-12 col-md-8">
		          <div class="app-card app-card-settings shadow-sm p-4">
	
						    <div class="app-card-body">
                    <form class="settings-form" action="{{ route('daftar-anggota.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label><br>
                            <select class="form-select" name="gender">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>

                        <div class="mb-3">
                          <label for="provinsi" class="form-label">Provinsi</label>
                          <select class="form-select select2" id="provinsi" name="provinsi">
                              <option value="">-- Pilih Provinsi --</option>
                              @foreach($regions as $r)
                                  <option value="{{ $r['provinsi'] }}">{{ $r['provinsi'] }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="kota" class="form-label">Kota/Kabupaten</label>
                          <select class="form-select select2" id="kota" name="kota_kabupaten">
                              <option value="">-- Pilih Kota/Kabupaten --</option>
                          </select>
                      </div>

                        <div class="mb-3">
                            <label for="kode_kabupaten" class="form-label">Kode Kabupaten</label>
                            <input type="text" class="form-control" id="kode_kabupaten" name="kode_kabupaten">
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipe Pendaftaran</label>
                            <select class="form-select" name="tipe_pendaftaran" id="tipe_pendaftaran">
                                <option value="individu">Individu</option>
                                <option value="komunitas">Komunitas</option>
                            </select>
                        </div>

                        <div class="mb-3" id="form_nama_komunitas" style="display: none;">
                            <label for="nama_komunitas" class="form-label">Nama Komunitas</label>
                            <input type="text" class="form-control" id="nama_komunitas" name="nama_komunitas">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Pemancingan yang Diminati</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]" value="laut" id="laut">
                                <label class="form-check-label" for="laut">Laut</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]" value="sungai" id="sungai">
                                <label class="form-check-label" for="sungai">Sungai</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]" value="kolam" id="kolam">
                                <label class="form-check-label" for="kolam">Kolam</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]" value="muara" id="muara">
                                <label class="form-check-label" for="muara">Muara</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]" value="danau" id="danau">
                                <label class="form-check-label" for="danau">Danau</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenis_pemancingan[]" value="lainnya" id="lainnya">
                                <label class="form-check-label" for="lainnya">Lainnya</label>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <label class="form-check-label">Saya menyetujui syarat & ketentuan</label>
                        </div>

                        <button type="submit" class="btn app-btn-primary">Simpan</button>
                    </form>
                </div>
						    				    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
</div>

@include('sweetalert::alert')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tipeSelect = document.getElementById("tipe_pendaftaran");
        const formKomunitas = document.getElementById("form_nama_komunitas");

        function toggleKomunitas() {
            if (tipeSelect.value === "komunitas") {
                formKomunitas.style.display = "block";
            } else {
                formKomunitas.style.display = "none";
                document.getElementById("nama_komunitas").value = ""; // reset nilai
            }
        }

        // jalan saat load pertama kali
        toggleKomunitas();

        // jalan saat select berubah
        tipeSelect.addEventListener("change", toggleKomunitas);
    });
</script>

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
              let selectedProv = $(this).val();
              let kotaSelect = $('#kota');

              // kosongkan opsi kota
              kotaSelect.empty().append('<option value="">-- Pilih Kota/Kabupaten --</option>');

              // cari provinsi di JSON
              let provData = dataRegion.find(r => r.provinsi === selectedProv);

              if (provData) {
                  provData.kota.forEach(k => {
                      kotaSelect.append(new Option(k, k));
                  });
              }

              // refresh select2 (harus trigger 'change' setelah append)
              kotaSelect.val(null).trigger('change');
          });
      });
  </script>

</html>