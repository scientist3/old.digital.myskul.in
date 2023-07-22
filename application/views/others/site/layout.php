<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
//get site_align setting
$settings = $this->db->select("site_align")
    ->get('setting')
    ->row();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Valley Diagnostic Centre</title>

	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>siteassets/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>siteassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>siteassets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>siteassets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>siteassets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>siteassets/css/style.css" />
</head>

    <body>

    <!-- ################# Header Starts Here####################### -->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 left-item">
                        <ul>
                            <!--<li><i class="fas fa-envelope-square"></i> <?php echo $email; ?></li>-->
                            <li><i class="fas fa-phone-square"></i> <?php echo $phone; ?></li>
							<li><a class="" href="<?php echo base_url('user'); ?>"><i class="fas fa-user"> Patient Login</i></a></li>
                            <li><a href="<?php echo base_url('login'); ?>"><i class="fas fa-user-lock"> Admin</i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block right-item">
                        <ul>
                            <li><a><i class="fab fa-google-plus-g"></i></a></li>
                            <li> <a><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a><i class="fab fa-twitter"></i></a></li>
                            <li> <a><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                        <img src="<?php echo base_url()?>assetslte/images/logo.png" alt="Logo">
                       <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>services">Services</a></li>
                            <li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
							<li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>							
                            
                        </ul>
                    </div>
					<!--<div class="col-sm-2 d-none d-lg-block appoint">
						<button class="btn btn-info"><a href="<?php echo base_url('user'); ?>"> Patient Login</a></button>
                    </div> -->
                </div>

            </div>
        </div>
    </header>
	
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content">
			<!-- content START -->
			<?php echo (!empty($content)?$content:null) ?>
			<!-- content END -->
		</section>
	</div>
	
    <!-- ################# Footer Starts Here#######################-->
	<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>About Us</h2>
                    <p>
                        Established in Feb 1998, Valley Diagnostic Centre is one of top clinics of quality diagnosis with 22 years of expertise in this area.</p><br>
                    <p>Valley Diagnostic Centre moto is to serve people of state at low cost with 100% accuracy in test results.</p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Request for Home Collection</h2>
                    <p>Now we have provided a facility of collecting blood samples at your home. Click on Book Now button.</p>
					<div class="col-sm-12">
						<center>
							<a class="btn" href="<?php echo base_url('contact_us');?>" style="background-color: #66b146;color: white;">Book Now</a>
						</center>
					</div>
					<!--<ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#/about">About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#/portfolio">Portfolio</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="#/products">Latest jobs</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="#/gallery">Gallery</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" href="#/contact">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>-->
                </div>
                <div class="col-md-4 col-sm-12 map-img">
                    <h2>Contact Us</h2>
                    <address class="md-margin-bottom-40">
                        Valley Diagnostic Centre<br>
                        Sheikh Shopping Complex<br>
						Opposite Candid Hr.Sec School<br>
						Nowgam Bypass Chowk Srinagar<br>
						Phone: 0194-2314919<br>
						Email: <a href="mailto:valley.vdc@gmail.com" class="">valley.vdc@gmail.com</a><br>
                        Web: <a target="_BLANK"href="http://www.valleydiagnosticentre.com" class="">www.valleydiagnosticentre.com</a>
                    </address>

                </div>
            </div>
        </div>
        

    </footer>
    <div class="copy">
            <div class="container">
                2020 &copy; All Rights Reserved <!--| Designed and Developed by <a href="https://www.linkedin.com/in/aasim-bashir/"> Aasim Bashir (Frontend) <i class="fab fa-linkedin"></i></a> & <a href="https://www.facebook.com/scientist33"> Mohammad Aamir (Backend) <i class="fab fa-facebook-f"></i></a><!--<?php //echo $footer_text; ?>-->
                
                <span>
                <!--<a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>-->
                <a href="https://www.facebook.com/valleyDC/"><i class="fab fa-facebook-f"></i></a>
        </span>
            </div>

        </div>
    
    </body>

<script src="<?php echo base_url(); ?>siteassets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>siteassets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>siteassets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>siteassets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>siteassets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>siteassets/js/script.js"></script>


</html>