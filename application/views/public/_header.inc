<?php
//define("CURRENT_PAGE", str_replace(".php", "", basename($_SERVER["PHP_SELF"])));
define("CURRENT_PAGE", $this->router->fetch_method());
?>
<?php require_once('_bootstrap.inc'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="fr"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php echo (isset($title) == TRUE) ? $title : DEFAULT_TITLE; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="<?php echo DEFAULT_DESCIPTION; ?>" />
  <meta name="keywords" content="<?php echo (isset($keywords) == TRUE) ? $keywords : DEFAULT_KEYWORDS; ?>" />
  <meta name="copyright" content="<?php echo DEFAULT_COPYRIGHT; ?>" />
  <meta name="author" content="<?php echo DEFAULT_AUTHOR; ?>" />

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- CSS
  ================================================== -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/public/style.css') ?>" type="text/css"  media="all" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/public/font-awesome.css') ?>" type="text/css"  media="all" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/public/flexslider.css') ?>" type="text/css"  media="all" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/public/superfish.css') ?>" type="text/css"  media="all" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/public/responsive.css') ?>" type="text/css"  media="all" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/public/colour.css') ?>" type="text/css"  media="all" />

    <!-- sweet-alert -->
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet">

  <?php if(CURRENT_PAGE=='contact'): ?>
  <link rel="stylesheet" href="js/lightbox/themes/default/jquery.lightbox.css">
  <style type="text/css">
  .main-content{
    width: 73% !important;
  }
  </style>
  <?php endif; ?>
  <!-- Google Fonts
  ================================================== -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,700,900' rel='stylesheet' type='text/css'>

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/public/favicon.gif') ?>" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png" />

  <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="<?php echo base_url('assets/js/public/selectivizr-min.js') ?>"></script>
  <![endif]-->

</head>
<!-- BEGIN body -->
<body id="top" class="loading">
<div id="header-wrapper"> <!-- BEGIN #header-wrapper -->
  <div id="header-border"> <!-- BEGIN #header-border -->
    <div id="header-top" class="clearfix"> <!-- BEGIN #header-top -->
        <ul class="page-header__content-right">
            <li class="client">
                <a rel="nofollow" href="#">
                    <!-- <i class="icon"></i>-->
                    <span class="menu-label">Espace Client</span></a>
                <div class="substitutionMyAccount">
                    <div class="page-header__account page-header__account--login">
                        <div class="page-header__account-header"><span><strong>Identifiez-vous</strong></span></div>
                        <div class="page-header__account-body">
                            <?php
                                $attributes = array('id' => 'loginForm');
                                echo form_open('login/checkUserlogin',$attributes);
                            ?>
                                <div class="page-header__account-form">
                                    <input name="email" placeholder="Votre e-mail" class="form-control">
                                </div>
                                <div class="page-header__account-form">
                                    <input type="password" name="password" placeholder="Votre mot de passe" class="form-control" />
                                </div>
                                <div class="error-login-message">
                                    <span><?php echo validation_errors(); ?></span>
                                </div>
                                <div class="page-header__account-form">
                                    <input type="submit" value="Se connecter" id="loginFormButton" class="cta-default cta-default--main"/>
                                </input>
                            </form>

                        </div>
                        <div class="page-header__account-footer">
                            <ul>
                                <li><a href="">Mot de passe oublié</a></li>
                                <li><a href="<?php echo base_url('signup') ?>">Créer un compte</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
      <ul class="top-right-nav clearfix">
        <li class="phone-icon">+212(0) 661 375 999</li>
        <li class="email-icon">contact@gp.ma</li>
      </ul>
    </div> <!-- END #header-top -->
    <div id="header-content-wrapper" class="clearfix"> <!-- BEGIN #header-content-wrapper -->
      <div id="logo"> <h1><a href="index"><img src="<?php echo base_url('assets/images/public/logo.png') ?>" alt=""><a></h1> </div>
      <ul class="social-icons clearfix">
        <?php foreach($socials as $key => $options): ?>
          <li><a target="_blank" href="<?= $options['link'] ?>"><span class="<?= $options['class'] ?>"></span></a></li>
        <?php endforeach; ?>
      </ul>
    </div> <!-- END #header-content-wrapper -->
    <div id="main-menu-wrapper" class="clearfix"> <!-- BEGIN #main-menu-wrapper -->
      <ul id="main-menu"> <!-- BEGIN #main-menu -->
        
        <?php foreach($menus as $link => $options):
          $current = ($link==$current_page) ? "class='current_page_item'" : NULL; ?>
          <li <?= $current ?> ><a href="<?= $link ?>"><?= $options['label'] ?></a>
            <?php if(is_array($options['submenu'])): ?>
              <ul>
                <?php foreach($options['submenu'] as $lien => $submenu): ?>
                <li><a href="<?= $lien ?>"><?= $submenu['label'] ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul><!-- END #main-menu -->
      <div class="menu-search-button"></div>
        <form method="get" action="#" class="menu-search-form">
          <input class="menu-search-field" type="text" onblur="if(this.value=='')this.value='To search, type and hit enter';" onfocus="if(this.value=='To search, type and hit enter')this.value='';" value="To search, type and hit enter" name="s" />
        </form>
      </div> <!-- END #main-menu-wrapper -->
    </div> <!-- END #header-border -->
  </div> <!-- END #header-wrapper -->
<?php 
if(CURRENT_PAGE=="index"):
  require '_slides.inc';
  require '_page_header.inc';
else: ?>
  <div class="page-header clearfix"> <!-- BEGIN .page-header -->
    <div class="page-header-inner clearfix">
      <div class="page-title"> <h2><?= $titre_page ?></h2> <div class="page-title-block"></div>  </div>
      <div class="breadcrumbs"> <p>
        <a href="index.php">Accueil</a> &#187; 
        <?= isset($current_link) ? $current_link : NULL; ?>
        <?= '<span class="red">'. $titre_page.'</span>' ?></p>
      </div>
    </div>
  </div> <!-- END .page-header -->
<?php endif; ?>
  

  <!-- BEGIN .content-wrapper -->
  <?php if(CURRENT_PAGE=="index"): ?>
  <div class="content-wrapper clearfix">
  <?php else: ?>
  <div class="content-wrapper page-content-wrapper clearfix">
  <?php endif; ?>