<?php
/**
@ Chèn CSS và Javascript vào theme
 **/
function chiaki_enqueue_styles() {

    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
    wp_enqueue_style( 'base', get_template_directory_uri() . '/assets/css/base.css', 'all' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', 'all' );
    wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css', 'all' );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', 'all' );

    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'chiaki_enqueue_styles' );

/**
@ Thiết lập hàm hiển thị logo
@ thachpham_logo()
 **/
if ( ! function_exists( 'chiaki_logo' ) ) {
    function chiaki_logo() {?>
        <div class="logo">
            <div class="site-name">
                <?php if ( is_home() ) {
                    printf(
                        '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } else {
                    printf(
                        '</p><a href="%1$s" title="%2$s">%3$s</a></p>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } // endif ?>
            </div>
            <div class="site-description"><?php bloginfo( 'description' ); ?></div>
        </div>
    <?php }
}

/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'chiaki_theme_setup' ) ) {
    /*
     * Nếu chưa có hàm chiaki_theme_setup() thì sẽ tạo mới hàm đó
     */
    function chiaki_theme_setup() {
        /*
        * Thiết lập theme có thể dịch được
        */
//        $language_folder = THEME_URL . '/languages';
//        load_theme_textdomain( 'wp.test', $language_folder );

        /*
         * Tự chèn RSS Feed links trong <head>
         */
        add_theme_support( 'automatic-feed-links' );

        /*
        * Thêm chức năng post thumbnail
        */
        add_theme_support( 'post-thumbnails' );

        /*
        * Thêm chức năng post format
        */
        add_theme_support( 'post-formats',
            array(
                'image',
                'video',
                'gallery',
                'quote',
                'link'
            )
        );

        /*
        * Thêm chức năng title-tag để tự thêm <title>
        */
        add_theme_support( 'title-tag' );

        /*
        * Thêm chức năng custom background
        */
        $default_background = array(
            'default-color' => '#e8e8e8',
        );
        add_theme_support( 'custom-background', $default_background );

        /*
        * Tạo menu cho theme
        */
        register_nav_menu ( 'primary-menu', __('Primary Menu', 'chiaki') );

        /*
        * Tạo sidebar cho theme
        */
        $sidebar = array(
            'name' => __('Main Sidebar', 'wp.test'),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for Thachpham theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        );
        register_sidebar( $sidebar );




    }

    add_action ( 'init', 'chiaki_theme_setup' );
}

/**
@ Thiết lập hàm hiển thị menu
@ thachpham_menu( $slug )
 **/
if ( ! function_exists( 'chiaki_menu' ) ) {
    function chiaki_menu( $slug ) {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => $slug,
            'items_wrap'      => '<ul id="%1$s" class="%2$s main-menu">%3$s</ul>',
        );
        wp_nav_menu( $menu );
    }
}