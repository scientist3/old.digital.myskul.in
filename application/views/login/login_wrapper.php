<?php
defined('BASEPATH') or exit('No direct script access allowed');
//get site_align setting
$settings = $this->db->select("*,site_align")
	->get('setting')
	->row();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title><?= display('login') ?> - <?php echo (!empty($title) ? $title : null) ?></title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetslte/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetslte/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetslte/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetslte/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetslte/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page" style="background-color: #232426;">
	<div class="login-box">
		<?php //echo '<pre>'; print_r($settings); echo '</pre>';
		?>
		<div class="login-logo">

		</div>
		<!-- /.login-logo -->

		<div class="login-box-body" style="display: block;box-sizing: border-box;">
			<!--<a href="<?php echo base_url(); ?>"> <img style="margin: auto 5%;" src="<?php echo base_url('assetslte/images/logo.png'); //echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) 
																																									?>" alt="Logo"></a> -->
			<h3>
				<p class="login-box-msg"><?php echo (!empty($title) ? $title : null) ?></p>
			</h3>
			<!-- alert message -->
			<?php if ($this->session->flashdata('message') != null) {  ?>
				<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php } ?>

			<?php if ($this->session->flashdata('exception') != null) {  ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->flashdata('exception'); ?>
				</div>
			<?php } ?>

			<?php if (validation_errors()) {  ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo validation_errors(); ?>
				</div>
			<?php } ?>

			<?php echo form_open('login', 'id="loginForm" novalidate'); ?>
			<div class="form-group has-feedback">
				<input type="text" placeholder="<?= display('email') ?>" name="email" id="email" class="form-control">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" placeholder="<?= display('password') ?>" name="password" id="password" class="form-control">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<?php echo form_dropdown('user_role', $user_role_list, 1/*$user->user_role*/, 'class="form-control" id="user_role" '); ?>
			</div>
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assetslte/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assetslte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url(); ?>assetslte/plugins/iCheck/icheck.min.js"></script>
</body>

</html>