<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
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
    <!-- Bootstrap 3.3.7 -->
    <title><?= display('dashboard') ?> - <?php echo (!empty($title)?$title:null) ?></title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="<?= base_url($this->session->userdata('favicon')) ?>">
    <link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

    <?php if (!empty($settings->site_align) && $settings->site_align == "RTL") {  ?>
        <!-- THEME RTL -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/css/custom-rtl.css') ?>" rel="stylesheet" type="text/css"/>
    <?php } ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url('assetslte/'); ?>plugins/iCheck/all.css">
    <!-- DataTables CSS -->
    <link href="<?= base_url('assets/datatables/css/dataTables.min.css') ?>" rel="stylesheet" type="text/css"/> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <?php $logo = $this->session->userdata('logo'); ?>
        <a href="<?php echo base_url('dashboard_incharge/home') ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?= base_url($this->session->userdata('favicon')) ?>" alt="Logo"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="<?php echo (!empty($logo)?base_url($logo):base_url("assets/images/logo.png")) ?>" alt="Logo"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <?php $picture = $this->session->userdata('picture'); ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets/images/no-img.png")) ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('fullname') ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets/images/no-img.png")) ?>" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $this->session->userdata('fullname') ?> - 
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="btn-group btn-group-justified">
                      <a href="<?php echo base_url('dashboard_incharge/home/form'); ?>" class="btn btn-default btn-flat">Profile</a>
                      <!--<a href="< ?php echo base_url('dashboard/screenlock') ?>" class="btn btn-default btn-flat">Lock</a>-->
                      <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                    <?php /* <div class="pull-left">
                      <a href="<?php echo base_url('dashboard/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div> */ ?>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button 
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
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
              <img src="<?php echo (!empty($picture)?base_url($picture):base_url("assets/images/no-img.png")) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('fullname') ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> 
                <?php echo $user_role_list[$this->session->userdata('user_role')]; ?>
              </a>
            </div>
          </div>
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="<?php echo (($this->uri->segment(1) == 'dashboard') ? "active" : null) ?>"> <!-- Dashboard -->
              <a href="<?php echo base_url('dashboard_incharge/home') ?>">
                <i class="fa fa-dashboard"></i> 
                <span>Dashboard</span>
                <span class="pull-right-container">
                  <!--<i class="fa fa-angle-left pull-right"></i>-->
                </span>
              </a>
            
            </li>
            <!--############################## Center ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "center") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-wheelchair"></i> <span><?php echo display('center') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (($this->uri->segment(2) == "create") ? "active" : null) ?>">
              <a href="<?php echo base_url("center/create") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "create") ? null:"-o")?>"></i><?php echo display('add_center') ?>
              </a>
              </li>
              <li class="<?php echo (($this->uri->segment(1) == "center") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index")) ? "active" : null) ?>">
              <a href="<?php echo base_url("center") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(1) == "center") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index"))? null:"-o")?>"></i><?php echo display('view_center') ?></a>
              </li>
              <li><a href="<?php echo base_url("center/add_category") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "add_category") ? null:"-o")?>"></i><?php echo display('add_category') ?></a></li>
              <li><a href="<?php echo base_url("center/view_category") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "view_category") ? null:"-o")?>"></i><?php echo display('view_category') ?></a></li>  
              <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
              <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
              */?>
            </ul>
          </li>
            <!--############################## PATIENTS ##############################-->
              <li class="treeview <?php echo (($this->uri->segment(1) == "patient") ? "active" : null) ?>">
                  <a href="#">
                      <i class="fa fa-wheelchair"></i> <span><?php echo display('patient') ?></span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo base_url("patient/create") ?>"><?php echo display('add_patient') ?></a></li>
                      <li><a href="<?php echo base_url("patient") ?>"><?php echo display('patient_list') ?></a></li> 
                      <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
                      <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
                      */?>
                  </ul>
              </li>

          <!--############################## Doctor ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "doctor") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-wheelchair"></i> <span><?php echo display('doctor') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (($this->uri->segment(2) == "create") ? "active" : null) ?>">
              <a href="<?php echo base_url("doctor/create") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "create") ? null:"-o")?>"></i><?php echo display('add_doctor') ?>
              </a>
              </li>
              <li class="<?php echo (($this->uri->segment(1) == "doctor") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index")) ? "active" : null) ?>">
              <a href="<?php echo base_url("doctor") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(1) == "doctor") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index"))? null:"-o")?>"></i><?php echo display('doctor_list') ?></a>
              </li>
              
              <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
              <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
              */?>
            </ul>
          </li>

          <!--############################## Administration ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "administration") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-wheelchair"></i> <span><?php echo display('administration') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (($this->uri->segment(2) == "create") ? "active" : null) ?>">
              <a href="<?php echo base_url("administration/create") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "create") ? null:"-o")?>"></i><?php echo display('add_administration') ?>
              </a>
              </li>
              <li class="<?php echo (($this->uri->segment(1) == "administration") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index")) ? "active" : null) ?>">
              <a href="<?php echo base_url("administration") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(1) == "administration") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index"))? null:"-o")?>"></i><?php echo display('administration_list') ?></a>
              </li>
              
              <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
              <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
              */?>
            </ul>
          </li>
          <!--############################## Hospital ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "hospital") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-wheelchair"></i> <span><?php echo display('hospital') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (($this->uri->segment(2) == "create") ? "active" : null) ?>">
              <a href="<?php echo base_url("hospital/create") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "create") ? null:"-o")?>"></i><?php echo display('add_hospital') ?>
              </a>
              </li>
              <li class="<?php echo (($this->uri->segment(1) == "hospital") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index")) ? "active" : null) ?>">
              <a href="<?php echo base_url("hospital") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(1) == "hospital") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index"))? null:"-o")?>"></i><?php echo display('hospital_list') ?></a>
              </li>
              
              <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
              <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
              */?>
            </ul>
          </li>
          <!--############################## Volunter ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "volunter") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-wheelchair"></i> <span><?php echo display('volunter') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (($this->uri->segment(2) == "create") ? "active" : null) ?>">
              <a href="<?php echo base_url("volunter/create") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "create") ? null:"-o")?>"></i><?php echo display('add_volunter') ?>
              </a>
              </li>
              <li class="<?php echo (($this->uri->segment(1) == "volunter") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index")) ? "active" : null) ?>">
              <a href="<?php echo base_url("volunter") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(1) == "volunter") && (($this->uri->segment(2) == "") || ($this->uri->segment(2) == "index"))? null:"-o")?>"></i><?php echo display('volunter_list') ?></a>
              </li>
              
              <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
              <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
              */?>
            </ul>
          </li>
          
          <!--############################## HUMAN RESOURCE ##############################-->
          <li class="treeview  <?php echo (($this->uri->segment(1) == "human_resources") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-users"></i> <span><?php echo display('human_resources') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url("human_resources/employee/form")  ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(3) == "form")  ? null:"-o")?>"></i><?php echo display('add_user') ?></a></li>
              <li><a href="<?php echo base_url("human_resources/employee/index") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(3) == "index") ? null:"-o")?>"></i><?php echo display('view_user') ?></a></li>
              <!--
              <li><a href="<?php echo base_url("human_resources/employee/index/District_Magistrate") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(4) == "District_Magistrate") ? null:"-o")?>"></i><?php echo display('view_dm') ?></a></li>
              <li><a href="<?php echo base_url("human_resources/employee/index/Divisional_Commissionar") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(4) == "Divisional_Commissionar") ? null:"-o")?>"></i><?php echo display('view_dc') ?></a></li>
              -->

              
            </ul>
          </li>
          <!--############################## Reported ##############################-->
          <li >
            <a href="<?php echo base_url("Repotedpersons") ?>"> <i class="fa fa-comments<?php echo (($this->uri->segment(1) == "Repotedpersons") ? null:"-o")?>"></i> <?php echo "Reported Persons";// display('new_message') ?> </a>
          </li>
          <!--############################## MESSAGES ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "messages") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-comments-o"></i> <span><?php echo display('messages') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url("messages/message/new_message") ?>"> <i class="fa fa-circle<?php echo (($this->uri->segment(3) == "new_message") ? null:"-o")?>"></i> <?php echo display('new_message') ?> </a></li> 
              <li><a href="<?php echo base_url("messages/message") ?>">             <i class="fa fa-circle<?php echo (($this->uri->segment(2) == "message") && ($this->uri->segment(3) == "") ? null:"-o")?>"></i> <?php echo display('inbox') ?> </a></li> 
              <li><a href="<?php echo base_url("messages/message/sent") ?>">        <i class="fa fa-circle<?php echo (($this->uri->segment(3) == "sent") ? null:"-o")?>"></i><?php echo display('sent') ?> </a></li>
            </ul>
          </li>
           
          <!--############################## MAIL ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "mail") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa fa-comments-o"></i> <span><?php echo display('mail') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo (($this->uri->segment(2) == "email") ? "active" : null) ?>"><a href="<?php echo base_url("mail/email") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "email") ? null:"-o")?>"></i><?php echo display('send_mail') ?> </a></li> 
              <li class="<?php echo (($this->uri->segment(2) == "setting") ? "active" : null) ?>"><a href="<?php echo base_url("mail/setting") ?>"><i class="fa fa-circle<?php echo (($this->uri->segment(2) == "setting") ? null:"-o")?>"></i><?php echo display('mail_setting') ?> </a></li>
            </ul>
          </li>
          <!--
          <li class="< ?php echo (($this->uri->segment(1) == "messages") ? "active" : null) ?>">   < !- - Mailbox - ->
            <a href="< ?php echo base_url('messages/message') ?>">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
            </a>
          </li>-->
          <!--############################## SETTINGS ##############################-->
          <li class="treeview <?php echo (($this->uri->segment(1) == "setting" || $this->uri->segment(1) == "language") ? "active" : null) ?>" > <!-- Settings -->
            <a href="#">
            <i class="fa fa-gears"></i> <span><?php echo display('settings'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo base_url("setting") ?>"><i class="fa fa-circle-o"></i> <?php echo display('app_setting') ?></a></li>
            <li><a href="<?php echo base_url("language") ?>"><i class="fa fa-circle-o"></i> <?php echo display('language_setting') ?></a></li>
            <!--<li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li> -->
            </ul>
          </li>
          <?php /*
            <!--############################## CAPACITY ##############################-->
              <li class="treeview <?php echo (($this->uri->segment(1) == "patient") ? "active" : null) ?>">
                  <a href="#">
                      <i class="fa fa-wheelchair"></i> <span><?php echo display('room_capacity') ?></span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo base_url("patient/create") ?>"><?php echo display('add_bed') ?></a></li>
                      <li><a href="<?php echo base_url("patient") ?>"><?php echo display('bed_status') ?></a></li> 
                      <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
                      <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
                      * /?>
                  </ul>
              </li> 
             <!--############################## REPOTED PERSONS ##############################-->
            <li >
              <a href="<?php echo base_url("dashboard_incharge/repotedpersons") ?>"> <i class="fa fa-comments<?php echo (($this->uri->segment(1) == "Repotedpersons") ? null:"-o")?>"></i> <?php echo "Reported Persons";// display('new_message') ?> </a>
            </li>

            <li class="treeview <?php echo (($this->uri->segment(1) == "content")? "active" : null) ?>" > <!-- Settings -->
              <a href="#">
                <i class="fa fa-gears"></i> <span><?php echo display('content'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo (($this->uri->segment(3) == "add_content")? "active" : null) ?>"><a href="<?php echo base_url("content/content/add_content") ?>"><i class="fa fa-circle-o"></i> <?php echo display('add_content') ?></a></li>
                <li class="<?php echo (($this->uri->segment(3) == "view_content")? "active" : null) ?>"><a href="<?php echo base_url("content/content/view_content") ?>"><i class="fa fa-circle-o"></i> <?php echo display('view_content') ?></a></li>
              
              </ul>
            </li>
            <li class="<?php echo (($this->uri->segment(1) == "messages") ? "active" : null) ?>">   <!-- Mailbox -->
              <a href="<?php echo base_url('messages/message') ?>">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">12</small>
                  <small class="label pull-right bg-green">16</small>
                  <small class="label pull-right bg-red">5</small>
                </span>
              </a>
            </li>
            <?php /*<li class="treeview <?php echo (($this->uri->segment(1) == "setting" || $this->uri->segment(1) == "language") ? "active" : null) ?>" > <!-- Settings -->
              <a href="#">
                <i class="fa fa-gears"></i> <span><?php echo display('settings'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url("setting") ?>"><i class="fa fa-circle-o"></i> <?php echo display('app_setting') ?></a></li>
                <li><a href="<?php echo base_url("language") ?>"><i class="fa fa-circle-o"></i> <?php echo display('language_setting') ?></a></li>
                <!--############################## CAPACITY ##############################-->
          <?php /*<!-- <li class="treeview <?php echo (($this->uri->segment(1) == "patient") ? "active" : null) ?>">
            <a href="#">
              <i class="fa fa-wheelchair"></i> <span><?php echo display('room_capacity') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url("patient/create") ?>"><?php echo display('add_bed') ?></a></li>
              <li><a href="<?php echo base_url("patient") ?>"><?php echo display('bed_status') ?></a></li> 
              <?php /*<li><a href="<?php echo base_url("patient/document_form") ?>"><?php echo display('add_document') ?></a></li> 
              <li><a href="<?php echo base_url("patient/document") ?>"><?php echo display('document_list') ?></a></li> 
              * /?>
            </ul>
          </li> --> * / ?>
              </ul>
            </li>*/ ?>
            
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
            <small><?php echo (!empty($title)?$title:null) ?> <?php //echo (!empty($center->name)?$center->name:null)." - ".(!empty($center->district)?$center->district:null) ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home - </a></li>
            <li class="active"><?php echo str_replace('_', ' ', ucfirst($this->uri->segment(1))) ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
      <?php 
        /*echo '<pre>';
        foreach($user_role_list as $row){
          $userRoles1[''.$row['ur_id']] = display($row['ur_role']);
        }
        print_r($userRoles1);
        echo '</pre>';*/ 
      ?>
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
          <!-- content -->
          <?php echo (!empty($content)?$content:null) ?>
        
        </section>      
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong><?= ($this->session->userdata('footer_text')!=null?$this->session->userdata('footer_text'):null) ?> <a href="https://adminlte.io">Click </a>.</strong> All rights
        reserved.
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
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Morris.js charts -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/raphael/raphael.min.js"></script>
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/morris.js/morris.min.js"></script>
      <!-- Sparkline -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url('assetslte/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?php echo base_url('assetslte/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/moment/min/moment.min.js"></script>
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('assetslte/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- Slimscroll -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- iCheck 1.0.1 -->
      <script src="<?php echo base_url('assetslte/'); ?>plugins/iCheck/icheck.min.js"></script>
      <!-- DataTables JavaScript -->
      <script src="<?php echo base_url("assets/datatables/js/dataTables.min.js") ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('assetslte/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url('assetslte/'); ?>dist/js/adminlte.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?php echo base_url('assetslte/'); ?>dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url('assetslte/'); ?>dist/js/demo.js"></script>
      <script>
        "use strict";
        $(document).ready(function () {
            //datatable
            $('.datatable').DataTable({ 
                responsive: true, 
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp", 
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 
                buttons: [  
                    {extend: 'copy', className: 'btn-sm'}, 
                    {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'}, 
                    {extend: 'excel', title: 'ExampleFile', className: 'btn-sm', title: 'exportTitle'}, 
                    {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}, 
                    {extend: 'print', className: 'btn-sm'} 
                ] 
            });    
        });
         

        //print a div
        function printContent(el){
            var restorepage  = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
            location.reload();
        }
      </script>
    </div>
    <!--./Script-->
  </body>
</html>
