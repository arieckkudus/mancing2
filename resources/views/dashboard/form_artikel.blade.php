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

</head> 

<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Daftar Keanggotaan</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">General</h3>
		                <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
	                </div>
	              <div class="col-12 col-md-8">
		          <div class="app-card app-card-settings shadow-sm p-4">
	
				    <div class="app-card-body">
                    <form class="settings-form" action="{{ route('daftar-artikel.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						{{-- kalau edit, kirim id --}}
						<input type="hidden" name="id" value="{{ $artikel->id ?? '' }}">

						<div class="mb-3">
							<label for="title" class="form-label">Judul Artikel</label>
							<input type="text" 
								class="form-control" 
								id="title" 
								name="title" 
								value="{{ old('title', $artikel->title ?? '') }}" 
								required>
						</div>

						<div class="mb-3">
							<label for="content" class="form-label">Isi Artikel</label>
							<textarea class="form-control summernote" 
									id="content" 
									name="content">{{ old('content', $artikel->content ?? '') }}</textarea>
						</div>

						<div class="mb-3">
							<label for="pict" class="form-label">Gambar Thumbnail</label>
							<input type="file" class="form-control" id="pict" name="pict" accept="image/*">
							
							{{-- kalau edit dan ada gambar --}}
							@if(!empty($artikel->pict))
								<div class="mt-2">
									<small>Gambar sekarang:</small><br>
									<img src="{{ asset($artikel->pict) }}" width="120" class="rounded">
								</div>
							@endif
						</div>

						<button type="submit" class="btn app-btn-primary">
							{{ isset($artikel) ? 'Update' : 'Simpan' }}
						</button>
					</form>

                </div>
						    				    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
</div>

@include('sweetalert::alert')

<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

<!-- Summernote JS -->

<!-- Tambahkan sebelum </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

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
        $('.summernote').summernote({
            placeholder: 'Tulis isi artikel di sini...',
            tabsize: 2,
            height: 200
        });
    });
</script>
</html>