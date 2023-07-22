<?php
defined('BASEPATH') or exit('No direct script access allowed');
//get site_align setting
$settings = $this->db->select("site_align")
	->get('setting')
	->row();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>
		<?= display('dashboard') ?> -
		<?php echo (!empty($title) ? $title : null) ?>
	</title>

	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="<?= base_url($this->session->userdata('favicon')) ?>">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet"
		href="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

	<?php if (!empty($settings->site_align) && $settings->site_align == "RTL") { ?>
		<!-- THEME RTL -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/custom-rtl.css') ?>" rel="stylesheet" type="text/css" />
	<?php } ?>

	<!-- Font Awesome -->
	<link rel="stylesheet"
		href="<?php echo base_url('assetslte/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- semantic css -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>dist/css/semantic.min.css" type="text/css" />
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>dist/css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet"
		href="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet"
		href="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet"
		href="<?php echo base_url('assetslte/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?php echo base_url('siteassets/'); ?>css/select2.min.css" type="text/css" />
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>plugins/iCheck/all.css">
	<!-- DataTables CSS -->
	<link href="<?= base_url('assetslte/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- jQuery 3 -->
	<script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<?php $logo = $this->session->userdata('logo'); ?>
			<a href="<?php echo base_url('dashboard_ani/dashboard_ani/index') ?>" class="logo" style="padding:0px;">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><img src="<?= base_url('siteassets/animator_logo_min.png') ?>" alt="Logo"
						style="width: 68%;"></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img src="<?= base_url('siteassets/animator_logo.png') ?>" alt="Logo"
						style="width: 100%;"></span>
			</a>

			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->

				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- <?php foreach ($this->session->userdata('top_menu_center_list') as $cid => $cname) { ?>
							<?php if ($this->session->userdata('active_center_id') == $cid) { ?>
								<li class="active disabled">
									<a style="background-color: #ecf0f5;color: black;border-bottom: 2px solid green;" href="<?php echo base_url('dashboard_ani/dashboard_ani/center/') . $cid . '#'; ?>"><?php echo ucfirst($cname); ?> Center</a>
									</li>
							<?php } else { ?>
								<li>
									<a class="" href="<?php echo base_url('dashboard_ani/dashboard_ani/center/') . $cid; ?>"><?php echo ucfirst($cname); ?> Center</a>
								</li>
							<?php } ?>
						<?php } ?> -->
						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-building"> Centers Alloted</i>
								<span class="label label-success"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have
									<?php echo count($this->session->userdata('top_menu_center_list')); ?> centers alloted
								</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<?php foreach ($this->session->userdata('top_menu_center_list') as $cid => $cname) { ?>
											<?php if ($this->session->userdata('active_center_id') == $cid) { ?>
												<li class="active disabled">
													<a style="background-image: linear-gradient(#d0f517, #04afb7);color: black;border-bottom: 2px solid green;"
														href="<?php echo base_url('dashboard_ani/dashboard_ani/center/') . $cid . '#'; ?>"><?php echo ucfirst($cname); ?> Center</a>
												</li>
											<?php } else { ?>
												<li>
													<a class="" href="<?php echo base_url('dashboard_ani/dashboard_ani/center/') . $cid; ?>"><?php echo ucfirst($cname); ?> Center</a>
												</li>
											<?php } ?>
										<?php } ?>
										<!-- <li>< !- - start message - - >
														<a href="#">
															<div class="pull-left">
																<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
															</div>
															<h4>
																Support Team
																<small><i class="fa fa-clock-o"></i> 5 mins</small>
															</h4>
															<p>Why not buy a new awesome theme?</p>
														</a>
													</li> -->
										<!-- end message -->
									</ul>
								</li>
								<!-- <li class="footer"><a href="#">See All Messages</a></li> -->
							</ul>
						</li>
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<?php $picture = $this->session->userdata('picture'); ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo (!empty($picture) ? base_url($picture) : base_url("assets/images/no-img.png")) ?>"
									class="user-image" alt="User Image">
								<span class="hidden-xs">
									<?php echo $this->session->userdata('fullname') ?>
								</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img
										src="<?php echo (!empty($picture) ? base_url($picture) : base_url("assets/images/no-img.png")) ?>"
										class="img-circle" alt="User Image">

									<p>
										<?php echo $this->session->userdata('fullname') ?> - Admin
										<small>Member since
											<?php echo date('M. Y', strtotime($this->session->userdata('create_date'))); ?>
										</small>
									</p>
								</li>

								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="btn-group btn-group-justified">
										<a href="<?php echo base_url('dashboard_ani/dashboard_ani/profile'); ?>"
											class="btn btn-default btn-flat">Profile</a>
										<!--<a href="< ?php echo base_url('dashboard/screenlock') ?>" class="btn btn-default btn-flat">Lock</a>-->
										<a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
									</div>

								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo (!empty($picture) ? base_url($picture) : base_url("assets/images/no-img.png")) ?>"
							class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $this->session->userdata('fullname') ?>
						</p>
						<a href="#"><i class="fa fa-circle text-success"></i>
							<?php echo $user_role_list[$this->session->userdata('user_role')]; ?>
						</a>
					</div>
				</div>

				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>

					<li
						class="<?php echo (($this->uri->segment(1) == 'dashboard') && (($this->uri->segment(2) == 'index')) ? "active" : null) ?>">
						<!-- Dashboard -->
						<a href="<?php echo base_url('dashboard_ani/dashboard_ani/index') ?>">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
							<span class="pull-right-container">
								<!--<i class="fa fa-angle-left pull-right"></i>-->
							</span>
						</a>

					</li>
					<!--############################## Material ##############################-->
					<li class="treeview <?php echo (($this->uri->segment(2) == "material") ? "active" : null) ?>">
						<a href="#">
							<i class="fa fa-file-pdf-o"></i> <span>
								<?php echo display('material') ?>
							</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url("dashboard_ani/material/create") ?>">
									<i <?php echo (($this->uri->segment(2) == "material") && ($this->uri->segment(3) == "create") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('add_material') ?>
								</a>
							</li>
							<li><a href="<?php echo base_url("dashboard_ani/material/index") ?>">
									<i <?php echo (($this->uri->segment(2) == "material") && (($this->uri->segment(3) == "index") || ($this->uri->segment(3) == "")) ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('view_material') ?>
								</a>
							</li>
						</ul>
					</li>
					<!--############################## User ##############################-->
					<li class="treeview <?php echo (($this->uri->segment(2) == "user") ? "active" : null) ?>">
						<a href="#">
							<i class="fa fa-user-o"></i> <span>
								<?php echo display('add_student') ?>
							</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?php echo base_url("dashboard_ani/user/create_student") ?>">
									<i <?php echo (($this->uri->segment(2) == "user") && ($this->uri->segment(3) == "create_student") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('add_student') ?>
								</a>
							</li>
							<li><a href="<?php echo base_url("dashboard_ani/user/index") ?>">
									<i <?php echo (($this->uri->segment(2) == "user") && ($this->uri->segment(3) == "" || $this->uri->segment(3) == "index") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('list_student') ?>
								</a>
							</li>
							<!-- <li>
							<a href="<?php echo base_url("dashboard_ani/user/create_member") ?>">
								<i <?php echo (($this->uri->segment(2) == "user") && ($this->uri->segment(3) == "create_member") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
								<?php echo display('add_member') ?>
							</a>
							</li>
								<li><a href="<?php echo base_url("dashboard_ani/user/members") ?>">
							<i <?php echo (($this->uri->segment(2) == "user") && ($this->uri->segment(3) == "members") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
							<?php echo display('list_user') ?></a>
							</li> -->
						</ul>
					</li>
					<li class="treeview <?php echo (($this->uri->segment(2) == "activities") ? "active" : null) ?>">
						<a href="#">
							<i class="fa fa-user-o"></i> <span>Activities</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/session_completed_students'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "session_completed_students") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Session Completed Students </a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/cncp_enrolled'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "cncp_enrolled") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									CNCP Enrolled</a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/cncp_supported'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "cncp_supported") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									CNCP Supported</a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/psycho_educated'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "psycho_educated") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Psycho-Educated</a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/primary_counseling_status'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "primary_counseling_status") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Primary Counseling Status</a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/secondary_territiary_service'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "secondary_territiary_service") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Secondary/Territiary Services</a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/psycho_social_well_being'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "psycho_social_well_being") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Psycho-Social Well Being</a>
							</li>
							<li>
								<a href="<?php echo base_url('dashboard_ani/activities/care_plans'); ?>">
									<i <?php echo (($this->uri->segment(2) == "activities") && ($this->uri->segment(3) == "care_plans") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Care Plans</a>
							</li>
							<!-- <li>
							<a href="#/activities/create_member">
								<i class="fa fa-circle-o"></i>
								Add Member							</a>
							</li>
								<li><a href="#/user/members">
							<i class="fa fa-circle-o"></i>
							List Users</a>
							</li> -->
						</ul>
					</li>
					
					<li class="treeview <?php echo (($this->uri->segment(2) == "message") ? "active" : null) ?>">
						<a href="#">
							<i class="fa fa-users"></i> <span>
								Stakholders<!-- <?php echo display('message') ?> -->
							</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url("dashboard_ani/message/new_message") ?>">
									<i <?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "new_message") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Parent <!-- <?php echo display('new_message') ?> -->
								</a>
							</li>
							<li><a href="<?php echo base_url("dashboard_ani/message/") ?>">
									<i <?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Volunteers <!-- <?php echo display('inbox') ?> -->
								</a>
							</li>
							<li><a href="<?php echo base_url("dashboard_ani/message/sent") ?>">
									<i <?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "sent") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									Community <!-- <?php echo display('sent') ?> -->
								</a>
							</li>
						</ul>
					</li>
					<!--############################## Messages ##############################-->
					<li class="treeview <?php echo (($this->uri->segment(2) == "message") ? "active" : null) ?>">
						<a href="#">
							<i class="fa fa-pencil-square-o"></i> <span>
								<?php echo display('message') ?>
							</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url("dashboard_ani/message/new_message") ?>">
									<i <?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "new_message") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('new_message') ?>
								</a>
							</li>
							<li><a href="<?php echo base_url("dashboard_ani/message/") ?>">
									<i <?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('inbox') ?>
								</a>
							</li>
							<li><a href="<?php echo base_url("dashboard_ani/message/sent") ?>">
									<i <?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "sent") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i>
									<?php echo display('sent') ?>
								</a>
							</li>
						</ul>
					</li>
					<?php /*<li>
					 <a href="<?php echo base_url("contactus/index") ?>">
					 <i class="fa fa-envelope"></i> <span><?php echo display('feedback_message'); ?></span>
					 <span class="pull-right-container">
					 <!--
					 <small class="label pull-right bg-yellow">12</small>
					 <small class="label pull-right bg-red">5</small>
					 -->
					 <small class="label pull-right bg-green"><?php echo !empty($new_messages)?$new_messages:'';?></small>
					 </span>
					 </a>
				 </li>
				 <!--############################## Settings ##############################-->
				 <li class="treeview <?php echo (($this->uri->segment(1) == "setting" || ($this->uri->segment(1) == "dashboard_ani/dashboard_cfo" && $this->uri->segment(2) == "profile") || $this->uri->segment(1) == "language") ? "active" : null) ?>" > <!-- Settings -->
					 <a href="#">
					 <i class="fa fa-gears"></i> <span><?php echo display('settings'); ?></span>
					 <span class="pull-right-container">
						 <i class="fa fa-angle-left pull-right"></i>
					 </span>
					 </a>
					 <ul class="treeview-menu"> 
					 <li><a href="<?php echo base_url("setting") ?>">
						 <i <?php echo (($this->uri->segment(1) == "setting") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i> 
						 <?php echo display('app_setting') ?></a>
					 </li>
					 <li><a href="<?php echo base_url("dashboard_ani/dashboard_cfo/profile") ?>">
						 <i <?php echo (($this->uri->segment(1) == "dashboard_ani" && $this->uri->segment(2) == "profile") ? 'class="fa fa-circle" style="color: chartreuse;"' : 'class="fa fa-circle-o"') ?>></i> 
						 <?php echo display('profile') ?></a>
					 </li>
					 
					 </ul>
				 </li>*/?>

				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php echo str_replace('_', ' ', ucfirst($this->uri->segment(1))) ?>
					<small>
						<?php echo (!empty($title) ? $title : null) ?>
					</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">
						<?php echo str_replace('_', ' ', ucfirst($this->uri->segment(1))) ?>
					</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<?php if ($this->session->flashdata('active_center') != null) { ?>
					<div class="callout callout-info">
						<h4>
							<?php echo $this->session->flashdata('active_center'); ?>
						</h4>
					</div>
				<?php } ?>

				<!-- alert message -->
				<?php if ($this->session->flashdata('message') != null) { ?>
					<div class="alert alert-info alert-dismissable" style="font-size: 1rem;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('message'); ?>
					</div>
				<?php } ?>

				<?php if ($this->session->flashdata('exception') != null) { ?>
					<div class="alert alert-danger alert-dismissable" style="font-size: 1rem;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $this->session->flashdata('exception'); ?>
					</div>
				<?php } ?>

				<?php if (validation_errors()) { ?>
					<div class="alert alert-danger alert-dismissable" style="font-size: 1rem;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo validation_errors(); ?>
					</div>
				<?php } ?>

				<!-- content START -->
				<?php echo (!empty($content) ? $content : null) ?>
				<!-- content END -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.0
			</div>
			<strong>
				<?= ($this->session->userdata('footer_text') != null ? $this->session->userdata('footer_text') : null) ?>
				<!--<a href="https://www.facebook.com/scientist33">Click</a>.-->
			</strong>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- All Script-->
	<div>
		<!-- jQuery 3 -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script> $.widget.bridge('uibutton', $.ui.button); </script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/raphael/raphael.min.js"></script>
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/morris.js/morris.min.js"></script>
		<!-- Sparkline -->
		<script
			src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="<?php echo base_url('assetslte/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo base_url('assetslte/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/moment/min/moment.min.js"></script>
		<script
			src="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script
			src="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script
			src="<?php echo base_url('assetslte/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script
			src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- iCheck 1.0.1 -->
		<script src="<?php echo base_url('assetslte/'); ?>plugins/iCheck/icheck.min.js"></script>
		<!-- DataTables JavaScript -->
		<script src="<?php echo base_url("assetslte/datatables/js/dataTables.min.js") ?>"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url('assetslte/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
		<!-- Select2 -->
		<script src="<?php echo base_url('siteassets/'); ?>js/select2.min.js" type="text/javascript"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url('assetslte/'); ?>dist/js/adminlte.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="<?php echo base_url('assetslte/'); ?>dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url('assetslte/'); ?>dist/js/demo.js"></script>
		<!-- semantic js -->
		<script src="<?php echo base_url('assetslte/') ?>dist/js/semantic.min.js" type="text/javascript"></script>
		<!--  bs-custom-file-input  -->
		<script src="<?php echo base_url('assetslte/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"
			type="text/javascript"></script>

		<script>
			"use strict";
			$(document).ready(function () {

				bsCustomFileInput.init();
				//datatable
				$('.datatable').DataTable({
					responsive: true,
					dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					buttons: [
						{ extend: 'copy', className: 'btn-sm' },
						{ extend: 'csv', title: 'ExampleFile', className: 'btn-sm' },
						{ extend: 'excel', title: 'ExampleFile', className: 'btn-sm', title: 'exportTitle' },
						{ extend: 'pdf', title: 'ExampleFile', className: 'btn-sm' },
						{ extend: 'print', className: 'btn-sm' }
					]
				});
			});
			//print a div
			function printContent(el) {
				var restorepage = $('body').html();
				var printcontent = $('#' + el).clone();
				$('body').empty().html(printcontent);
				window.print();
				$('body').html(restorepage);
				location.reload();
			}
			$("select.form-control:not(.dont-select-me)").select2({
				placeholder: "Select option",
				allowClear: true
			});
		</script>
	</div>
	<!--./Script-->
</body>

</html>