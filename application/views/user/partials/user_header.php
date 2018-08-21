<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png'); ?>"/>

    <title><?php echo $params['name']; ?></title>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110319921-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
          dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-110319921-1');
  </script>


      <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
	<!--date picker -->
	<link href="<?php echo base_url("assets/datepicker3.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet">


    <link href="<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/vendors/fullcalendar/dist/fullcalendar.css"); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets/build/css/custom.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/build2/css/custom.min.css"); ?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet">
      <style>
          #loading {
              width: 100%;
              height: 100%;
              top: 0px;
              left: 0px;
              position: fixed;
              opacity: 0.7;
              background-color: #fff;
              z-index: 999999;
              text-align: center;
              display: none;
          }

          #loading-image {
              position: absolute;
              top: 20%;
              z-index: 10000;
          }

          .img-circle.profile_img{
              width:65px !important;
              height:65px !important;
          }
      </style>

      <style>
          #userAccount{
              background: #f7f7f7;
          }
          #userAccount .company_name{
              font-size: 19px;
          }
          #userAccount .left_col{
              background-color: white;
          }

          #userAccount .site_title{
              background-color: white;
          }

          #userAccount .navbar.nav_title{
              background-color: white;
          }
          #userAccount .main_container{
              background: white;
          }
          #userAccount .nav.child_menu>li>a,#userAccount .nav.side-menu>li>a{
              color: black;
          }
          #userAccount i.fa{
              color: red;
          }
          #userAccount .navbar-brand,#userAccount  .navbar-nav>li>a,#userAccount  .site_title{
              color: black !important;
          }
          #userAccount .site_title img{
              width: 25px;
          }
          #userAccount .nav.side-menu>li>a:hover{
              color: red !important;
          }
          #userAccount .profile_info span{
              color: red;
          }
          #userAccount .profile_info h2{
              color: black;
          }
          #userAccount .sidebar-footer.hidden-small,#userAccount .sidebar-footer.hidden-small a{
              background: white;
          }

          /*main style*/
          #userAccount .profile_details:nth-child(2n) {
              clear: none;
          }
          #userAccount .profile_details:nth-child(3n) {
              clear: none;
          }
          #userAccount .right_col{
              color: black;
          }
          #userAccount i.fa{
              font-size: 1.5em;
              padding-right: 10px;
          }
          #userAccount .counter{
              color: black;
          }
          #userAccount .nav_menu{
              margin-bottom: 0px;
          }
          #userAccount .header{
              background: red;
              padding: 20px 50px;
          }
          #userAccount .header h2{
              color: white;
          }
          #userAccount .slider{
              text-align: center;
              position: relative;
          }
          #userAccount .bottom-left {
              position: absolute;
              bottom: 8px;
              background-color: rgba(20,20,02,0.3);
              color: white;
              padding: 10px;
          }
          #userAccount .mgbt10{
              margin-bottom: 10px !important;
          }
          #userAccount .mglt0{
              margin-left: 0px !important;
          }
          #userAccount .pdg0{
              padding: 0px !important;
          }
          #userAccount img.width100{
              width: 100%;
          }
          #userAccount .large-title{
              background-color: red;
              padding: 10px 5px;
              text-transform: uppercase;
              color: white;
              margin: 10px 0px;
              margin-bottom: 0px;
          }
          #userAccount .large-title-reverse{
              background-color: white;
              padding: 10px 5px;
              text-transform: uppercase;
              color: red;
              margin: 10px 0px;
              margin-bottom: 0px;
              border-top: red solid 1px;
          }
          #userAccount .recap{
              text-align: center;
              text-transform: uppercase;
              font-size: 12px;
              padding: 20px 0px;
          }
          #userAccount .recap div:nth-child(1){
              font-weight: bold;
          }
          #userAccount .panel.training{
              margin-bottom: 5px;
          }
          #userAccount .panel.training.coming{
              margin-bottom: 5px;
              min-height: 125px;
          }
          #userAccount .panel.training.counters{
              padding-top: 10px;
              padding-bottom: 15px;
          }
          #userAccount .nothing{
              margin-bottom: 23px;
          }
          #userAccount .courseTitle{
              background: white;
              color: red;
              padding: 5px 0px;
              text-align: center;
          }
          #userAccount .half-width{
              width: 50%;
          }
          .gray{
              background: #BCBABE;
          }
          .nav.side-menu>li.active>a{
              background: #f7f7f7;
          }

      </style>


  </head>

  <body class="nav-md" id="userAccount">
  <div id="loading">
      <img id="loading-image" src="<?php echo base_url("assets/images/loader.gif"); ?>" alt="Loading..."/>
  </div>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <?php
                    $link="";
                ?>
             <a href="<?= $link ?>" class="site_title"><img src="<?php echo base_url('assets/images/public/favicon.gif') ?>"> <span class="company_name"><?php echo $params['name']; ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?= base_url($params['photo']); ?>" alt="icon" class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Bienvenu,</span>
                    <h2><?= $this->session->userdata('first_name'); ?></h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">


                    <?php if ($this->session->userdata('type') == "trainee") : ?>

                        <li>
                            <a href="<?= base_url('user/welcome'); ?>"><i class="fa fa-home"></i>Acceuil</a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/training/getAll'); ?>"><i class="fa fa-bookmark-o"></i>Mes formations</a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/training/allSynth'); ?>"><i class="fa fa-check"></i>Mes synthèses</a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/trainee/show'); ?>"><i class="fa fa-user"></i>Mes compte</a>
                        </li>
                        <!--
                        <li>
                            <a href="<?/*= base_url('admin/department/showDepartmentStock'); */?>"><i class="fa fa-coffee"></i>Mes tests</a>
                        </li>

                        <li>
                            <a href="<?/*= base_url('admin/department/showDepartmentStock'); */?>"><i class="fa fa-coffee"></i>Changer mot de passe</a>
                        </li>-->
                    <?php endif; ?>

                  <li>
                 </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout"
                 href="<?php echo base_url() . 'admin/dashboard/logout'; ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>




              <ul class="nav navbar-nav navbar-right">

                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?= $this->session->userdata('first_name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo base_url() . 'admin/dashboard/logout'; ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
