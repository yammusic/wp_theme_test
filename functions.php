<?php

    include_once( TEMPLATEPATH . '/includes/widgets/MY_HomeWidget.php' );
    include_once( TEMPLATEPATH . '/includes/widgets/MY_SlideShowWidget.php' );

    add_theme_support( 'nav-menus' );
    add_theme_support( 'post-thumbnails' );

    add_action( 'init', 'initMethod' );
    add_action( 'widgets_init', 'load_my_widgets' );

    set_post_thumbnail_size( 150, 150, true );

    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus( array( 'main' => 'Main' ) );
    }

    if ( function_exists( 'register_sidebar' ) ) {

        register_sidebar( array(
            'name' => 'mywidget name',
            'id' => 'mywidget-id',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ) );

        register_sidebar( array(
            'name' => 'mywidget slideshow',
            'id' => 'mywidget-slideshow',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ) );
    }

    function initMethod() {
        wp_register_script( 'jquery', TEMPLATEPATH . '/js/jquery.js' );
    }

    function load_my_widgets() {
        register_widget( 'MY_HomeWidget' );
        register_widget( 'MY_SlideShowWidget' );
    }

    if ( is_admin() ) {
        function styles_for_the_admin_pages() {
            wp_register_style( 'mytheme-admin-css', ( '/wp-content/themes/mytheme/css/admin.css' ) );
            wp_enqueue_style( 'mytheme-admin-css' );
        }

        function scripts_for_the_admin_pages() {
            wp_enqueue_media();
            wp_register_script( 'mytheme-admin-js', '/wp-content/themes/mytheme/js/admin.js' );
            wp_enqueue_script( 'mytheme-admin-js' );
        }

        add_action( 'admin_enqueue_scripts', 'styles_for_the_admin_pages' );
        add_action( 'admin_enqueue_scripts', 'scripts_for_the_admin_pages' );
    }

    //Loading theme textdomain
    load_theme_textdomain( 'mytheme', ( TEMPLATEPATH . '/languages' ) );
