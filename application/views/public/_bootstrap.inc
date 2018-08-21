<?php
define("DOMAIN", "www.gp.ma");
define("DEFAULT_TITLE", "General Performance");
define("DEFAULT_DESCIPTION", " Générale performance ");
define("DEFAULT_KEYWORDS", "Générale performance ,ITIL ,ISO27002,Formation ,Formation SI ,Formation assurance ,Formation Management ,Formation PNL ,Formation Marketing ,Segmentation ,Compagnes Marketing ,Conseil ,CRM ,Intelligence Marketing ,Business intelligence ,Système d'information ,Séminaire");

define("DEFAULT_COPYRIGHT", "&copy; 2014 <a href='#'>General Performance</a> Tous les droits réservés");
define("DEFAULT_AUTHOR", "groupe allali");
//define("SIGNATURE", "- Crée par <a title='beone agence digitale' href='http://www.beone.ma'>BeOne</a>");
define("SIGNATURE", "");
define("WEBROOT", str_replace(basename($_SERVER["SCRIPT_NAME"]), '', $_SERVER["SCRIPT_NAME"]));
define("ROOT", str_replace(basename($_SERVER["SCRIPT_FILENAME"]), '', $_SERVER["SCRIPT_FILENAME"]));

$og =  array(
    "title"       => 'je suis titre open graph',
    "type"        => 'website',
    "url"         => 'http://www.gp.ma',
    "image"       => 'images/op/op-image.jpg',
    "site_name"   => 'Generale Performance',
    "description" => 'Description la GP'
);

//==============================================================================
//==============================================================================

$menus = array
(
  "index"=> array("label"=>"Accueil", "title" => "page d'accueil ", "submenu" => NULL),
  "qui-sommes-nous"=> array("label"=>"Qui sommes nous ?", "title" => "Qui sommes nous", "submenu" => NULL),
  "formation"  => array("label"=>"Formation ", "title" => "Formation ", "submenu" => array(
                                                                            "informatique" => array("label" => "Informatique"),
                                                                            "management" => array("label" => "Management"),
                                                                            "coaching" => array("label" => "Coaching")
                                                                          )
  ),
  "conseil"  => array("label"=>"Conseil ", "title" => "Conseil ", "submenu" => NULL),
  "seminaire"  => array("label"=>"Séminaire ", "title" => "Seminaire ", "submenu" => NULL),
  "contact"    => array("label"=>"Contact ", "title" => "Nous contactez ", "submenu" => NULL)
);

$socials = array
(
  "facebook" => array("class" => "facebook-icon", "link" => "#"),
  "twitter" => array("class" => "twitter-icon", "link" => "#")
)



?>