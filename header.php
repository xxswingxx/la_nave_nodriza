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
        <?php 
            $meta = array();
            if (is_front_page()){
                $meta['title'] = 'La nave nodriza';
                $meta['subtitle'] = "Lanavenodriza.com surge con la vocación de crear nuevas experiencias formativas en el campo del diseño, formas diferentes de aprender";
                $meta['img'] = get_template_directory_uri() . "/images/logo.png";
            } else {
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' );
                $meta = get_page_metadata($post->ID);
                $meta['subtitle'] = substr($meta['subtitle'],0,193) . '...';
                $meta['title'] = get_the_title($post->ID) . " - Lanavenodriza.com"; 
                $meta['img'] = $thumbnail[0];
            }
        ?>
        <title><?php echo $meta['title'] ?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="Lanavenodriza.com surge con la vocación de crear nuevas experiencias formativas en el campo del diseño, formas diferentes de aprender">
        <link rel="author" type="text/plain" href="humans.txt">

        <!-- favicon -->        
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
        <link href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png" rel="apple-touch-icon-precomposed">
        <link href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">      
        
        <!-- metadata -->
        <meta itemprop="name" content="<?php echo $meta['title']; ?>">
        <meta itemprop="description" content="<?php echo $meta['subtitle']; ?>">
        <meta itemprop="image" content="<?php echo $meta['img']; ?>">
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@Nodrizismo">
        <meta name="twitter:creator" content="@Nodrizismo">
        <meta name="twitter:title" content="<?php echo $meta['title']; ?>">
        <meta name="twitter:description" content="<?php echo $meta['subtitle']; ?>">
        <meta name="twitter:url" content="<?php echo get_permalink($post->ID); ?>">
        <meta name="twitter:image:src" content="<?php echo $meta['img']; ?>">
        
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?php echo $meta['title']; ?>">
        <meta property="og:url" content="<?php echo get_permalink($post->ID); ?>">
        <meta property="og:description" content="<?php echo $meta['subtitle']; ?>">
        <meta property="og:image" content="<?php echo $meta['img']; ?>">
        <meta property="og:site_name" content="La Nave Nodriza - Todos tenemos algo que aprender">
         <!-- /metadata -->

        <!-- styles -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Vollkorn:400" rel="stylesheet" type="text/css">
        <!-- styles -->

        <!-- scripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.appear.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.stickit.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.lockfixed.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.konami.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
        <script type="text/javascript" id="cookiebanner" src="<?php echo get_template_directory_uri(); ?>/js/cookiebanner.js"
                data-message="Las cookies nos permiten ofrecer nuestros servicios y mejorar su experiencia en Internet. Al utilizar nuestros servicios, aceptas el uso que hacemos de las cookies."
                data-linkmsg="Más información.">
        </script>

        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->
        <!--[if lt IE 8]>
        <link media="all" href="css/ie.min.css" rel="stylesheet" />
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body>
        <!--[if lt IE 8]>
        <div class="get_updated">
            <div class="inner">
                <h1>Lanavenodriza.com</h1>
                <h2>Parece que tu navegador web está desactualizado.<br/>Por favor, actualiza tu navegador web tan pronto como sea posible.</h2>
            </div>
        </div>
        <![endif]-->

        <!-- navigation bar -->
        <div id="navbar">
            <div class="content">
                <!-- logo -->
                <div id="logo">
                    <?php $host = is_front_page() ? '': get_home_url() ?>
                    <a href="<?php echo $host ?>#home" accesskey="1"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="La Nave Nodriza" width="211" height="19"></a>
                    <div id="claim"><a href="<?php echo $host ?>#home">Todos tenemos algo que aprender</a></div>
                </div> 
                <!-- /logo -->

                <!-- global navigation -->
                <nav role="navigation">
                    <ul> 
                        <li><a href="<?php echo $host ?>#la-nave-nodriza" accesskey="2">Qué es</a></li>
                        <li><a href="<?php echo $host ?>#founders" accesskey="3">Quién está detrás</a></li>
                        <li><a href="<?php echo $host ?>#courses" accesskey="4">Qué ofrecemos</a></li>
                        <li><a href="<?php echo $host ?>#who-is-for" accesskey="5">Para quién</a></li>
                        <li><a href="<?php echo (is_home() ? $host : '') ?>#contact" accesskey="6">Contacta</a></li>       
                        <li class="<?php echo (is_home() ? 'active' :  '') ?>">
                            <a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>" accesskey="7">Bitácora</a>
                        </li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
        </div>

        <hr>