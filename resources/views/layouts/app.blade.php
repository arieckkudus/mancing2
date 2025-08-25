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

</head> 

<body class="app"> 
@include('layouts.header')
    
    <div class="app-wrapper">
	    
  @yield('content')
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div>			

@include('sweetalert::alert')
 
    <!-- Javascript -->          
	<script src="{{ asset('dashboard-assets/assets/plugins/popper.min.js') }}"></script>
	<script src="{{ asset('dashboard-assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>  

	<!-- Charts JS -->
	<script src="{{ asset('dashboard-assets/assets/plugins/chart.js/chart.min.js') }}"></script> 
	<script src="{{ asset('dashboard-assets/assets/js/index-charts.js') }}"></script> 

	<!-- Page Specific JS -->
	<script src="{{ asset('dashboard-assets/assets/js/app.js') }}"></script> 
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html> 

