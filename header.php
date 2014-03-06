<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since La Nave Nodriza 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
   
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title>Lanavenodriza.com</title>
    <meta name="description" content="">
    <meta name="keywords" content="curso, diseño">
    <meta name="author" content="topxel.com">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Vollkorn:400" rel="stylesheet" type="text/css">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
    <script type="text/javascript" id="cookiebanner" src="<?php echo get_template_directory_uri(); ?>/js/cookiebanner.js"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <link media="all" href="css/ie.min.css" rel="stylesheet" />
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body data-spy="scroll" data-target="#navbar">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=140978915248";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!--[if lt IE 8]>
    <div class="get_updated">
        <div class="inner">
            <h1>Lanavenodriza.com</h1>
            <h2>Parece que tu navegador web está desactualizado.<br/>Por favor, actualiza tu navegador web tan pronto como sea posible.</h2>
        </div>
    </div>
    <![endif]-->
    <nav id="navbar">
        <div class="nav-content">
            <div class="logo">
                <a href="<?php echo get_home_url() . '#what' ?>"><span>L</span>a <span>N</span>ave <span>N</span>odriza</a>
                <div class="fb-like" data-href="http://www.lanavenodriza.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            </div>
            <ul class="nav">
                <?php if (is_front_page()) { ?>
                    <li><a href="#what"></a></li>
                    <li><a href="#la-nave">Qué es</a></li>
                    <li class="separator">/</li>
                    <li><a href="#founders">Quién está detrás</a></li>
                    <li class="separator">/</li>
                    <li><a href="#program">Qué ofrecemos</a></li>
                    <li class="separator">/</li>
                    <li><a href="#to-whom">Para quién</a></li>
                    <li class="separator">/</li>
                    <li><a href="#contact">Contacta</a></li>
                <? } else { ?>
                    <li><a href="<?php echo get_home_url() . '#what' ?>"></a></li>
                    <li><a href="<?php echo get_home_url() . '#la-nave' ?>">Qué es</a></li>
                    <li class="separator">/</li>
                    <li><a href="<?php echo get_home_url() . '#founders' ?>">Quién está detrás</a></li>
                    <li class="separator">/</li>
                    <li><a href="<?php echo get_home_url() . '#program' ?>">Qué ofrecemos</a></li>
                    <li class="separator">/</li>
                    <li><a href="<?php echo get_home_url() . '#to-whom' ?>">Para quién</a></li>
                    <li class="separator">/</li>
                    <li><a href="<?php echo get_home_url() . '#contact' ?>">Contacta</a></li>
                <? } ?>
                <li class="separator">/</li>
                <li><a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>">Bitácora</a></li>
            </ul>

            <div class="clear"></div>
        </div>
    </nav>