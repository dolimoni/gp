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
    <link href="<?php echo base_url("assets/build/css/custom.min.css"); ?>" rel="stylesheet">
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
  </head>

  <body class="nav-md">
  <div id="loading">
      <img id="loading-image" src="<?php echo base_url("assets/images/loader.gif"); ?>" alt="Loading..."/>
  </div>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <?php
                    if($this->session->userdata('type') == "admin"){
                        $link= base_url('admin/training/getAll');
                    }
                ?>
             <a href="<?= $link ?>" class="site_title"><i class="fa fa-coffee"></i> <span><?php echo $params['name']; ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?= base_url('assets/images/'.$params['photo']); ?>" alt="icon" class="img-circle profile_img">
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
                  <?php if($this->session->userdata('type') == "admin") : ?>

                      <li><a><i class="fa fa-bookmark"></i> Groupes <span
                                      class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/training/add'); ?>">Ajouter un groupe</a></li>
                              <?php endif; ?>
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/training/getAll'); ?>">Liste des groupes</a></li>
                              <?php endif; ?>
                          </ul>
                      </li>

                      <li><a><i class="fa fa-users"></i>Utilisateurs<span
                                      class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/trainee/createUser'); ?>">Ajouter un utilisateur</a></li>
                              <?php endif; ?>
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/trainee/getAll'); ?>">Liste des utilisateurs</a></li>
                              <?php endif; ?>
                          </ul>
                      </li>

                      <li><a><i class="fa fa-users"></i>Formateurs<span
                                      class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/former/create'); ?>">Ajouter un formateur</a></li>
                              <?php endif; ?>
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/former/getAll'); ?>">Liste des formateurs</a></li>
                              <?php endif; ?>
                          </ul>
                      </li>

                      <li><a><i class="fa fa-users"></i>Entreprises<span
                                      class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/company/create'); ?>">Ajouter une entreprise</a></li>
                              <?php endif; ?>
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/company/getAll'); ?>">Liste des entreprises</a></li>
                              <?php endif; ?>
                          </ul>
                      </li>

                      <li><a><i class="fa fa-folder-open"></i>Thème de formation<span
                                      class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/subject/create'); ?>">Ajouter un thème</a></li>
                              <?php endif; ?>
                              <?php if ($this->session->userdata('type') === "admin"): ?>
                                  <li><a href="<?= base_url('admin/subject'); ?>">Liste des thèmes</a></li>
                              <?php endif; ?>
                          </ul>
                      </li>

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
