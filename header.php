<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, minimum-scale=1" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css" media="all" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js" type="text/javascript"></script>


    <?php wp_head(); ?>
</head>
<body>

    <section class="wrapper">
        <header>
            <h1 class="btn"><a href="<?php echo get_option( 'home' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php wp_nav_menu( array( 'menu' => 'Main', 'container' => 'nav' ) ); ?>
        </header>