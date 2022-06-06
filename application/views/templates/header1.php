<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap-4.5.2.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/fontawesome.all.min.css"> -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/fontawesome.all.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/datatables.min.css">
    <!-- Datetimepicker -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/jquery.datetimepicker.min.css">
    <!-- Smart Wizard -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/swcss/smart_wizard.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/swcss/smart_wizard_theme_circles.min.css">
      
  </head>
  <body>
  	
  	<!-- Navbar -->
  	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
		  <div class="container">
		    <a class="navbar-brand" href="<?= base_url(); ?>">
		    	<img src="<?= base_url(); ?>assets/img/LOGOsilolamanik.png" style="width: 150px; height: auto;"  >
		    </a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		      <ul class="navbar-nav">
		        <li class="nav-item active">
		          <a class="nav-link" href="<?= base_url(); ?>">Home</a>
		        </li>		        		        		        
		        <li class="nav-item dropdown">
				      <a class="nav-link dropdown-toggle" href="<?= base_url(); ?>" id="navbardrop" data-toggle="dropdown">
				        Menu Diklat
				      </a>
				      <div class="dropdown-menu">
				        <a class="dropdown-item" href="<?= base_url(); ?>institusi">Institusi</a>
				        <a class="dropdown-item" href="<?= base_url(); ?>jurusan">Jurusan</a>
				        <!-- <a class="dropdown-item" href="<?= base_url(); ?>praktek">Praktek</a> -->
				        <a class="dropdown-item" href="<?= base_url(); ?>ruangan">Ruangan</a>
				        <a class="dropdown-item" href="<?= base_url(); ?>pembimbing">Pembimbing</a>
				      </div>
				    </li>		        
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="<?= base_url(); ?>" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		            Menu Institusi
		          </a>
		          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">		            
		            <a class="dropdown-item" href="<?= base_url(); ?>schedule">Buat Jadwal</a>
		            <a class="dropdown-item" href="<?= base_url(); ?>dashboard">Kirim Jadwal</a>
		          </div>
		        </li>
		      </ul>
		    </div>
		  </div>
		  <!-- End Container -->  
		</nav>
		<!-- End Navbar -->