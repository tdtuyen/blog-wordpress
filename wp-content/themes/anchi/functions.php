<?php
/**
@ Thiết lập các hằng dữ liệu quan trọng
@ THEME_URL = get_stylesheet_directory() – đường dẫn tới thư mục theme
@ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
 **/
define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

/**
@ Load file /core/init.php
@ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
 **/
require_once( CORE . '/init.php' );
require_once( THEME_URL. '/inc/bootstrap-navwalker.php' );

/**
@ Chèn CSS và Javascript vào theme
 **/
function anchi_enqueue_styles() {

    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
//    wp_enqueue_style( 'base', get_template_directory_uri() . '/assets/css/base.css', 'all' );
//    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', 'all' );
//    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', 'all' );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', 'all' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css', 'all' );
//    wp_enqueue_style( 'vendor', get_template_directory_uri() . '/assets/css/vendor.min.css', 'all' );
    wp_enqueue_style( "font-awesome-5-all" , get_template_directory_uri(). "/assets/font-awesome/css/all.min.css",array(),123);
    wp_enqueue_style( 'dashicons' );

    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'anchi_enqueue_styles' );

/**
@ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
if ( ! isset( $content_width ) ) {
    /*
     * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
     */
    $content_width = 620;
}
/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'anchi_theme_setup' ) ) {

    function anchi_theme_setup() {
        /*
        * Thiết lập theme có thể dịch được
        */
        //$language_folder = THEME_URL . '/languages';
        //load_theme_textdomain( 'anchi', $language_folder );

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
        register_nav_menu ( 'primary-menu', __('Primary Menu', 'anchi') );

        /*
        * Tạo sidebar cho theme
        */
        $sidebar = array(
            'name' => __('Main Sidebar', 'anchi'),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for Anchi theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        );
        register_sidebar( $sidebar );
    }

    add_action ( 'init', 'anchi_theme_setup' );
}

/**
@ Thiết lập hàm hiển thị logo
@ anchi_logo()
 **/
if ( ! function_exists( 'anchi_logo' ) ) {
    function anchi_logo() {?>
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
                        '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
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
@ Thiết lập hàm hiển thị menu
@ anchi_menu( $slug )
 **/
if ( ! function_exists( 'anchi_menu' ) ) {
    function anchi_menu() {
        $menu = array(
            'menu'            => 'primary-menu',
            'theme_location'  => 'primary-menu',
            'container'       => null,
            'menu_class'      => 'navbar-nav',
            'depth'           => 1,
            'walker'          => new eCademy_Bootstrap_Navwalker(),
            'fallback_cb'     => 'eCademy_Bootstrap_Navwalker::fallback',
        );
        wp_nav_menu( $menu );
    }
}

/**
@ Tạo hàm phân trang cho index, archive.
@ Hàm này sẽ hiển thị liên kết phân trang theo dạng chữ: Newer Posts & Older Posts
@ anchi_pagination()
 **/
if ( ! function_exists( 'anchi_pagination' ) ) {
    function anchi_pagination() {
        /*
         * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
         */
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return '';
        }
        ?>
        <nav class="pagination" role="navigation">
        <?php if ( get_next_post_link() ) : ?>
            <div class="prev"><?php next_posts_link( __('Older Posts', 'wp.test') ); ?></div>
        <?php endif; ?>


        <?php if ( get_previous_post_link() ) : ?>
            <div class="next"><?php previous_posts_link( __('Newer Posts', 'wp.test') ); ?></div>
        <?php endif; ?>


        </nav><?php
    }
}

/**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ thachpham_thumbnail( $size )
 **/
if ( ! function_exists( 'anchi_thumbnail' ) ) {
    function anchi_thumbnail( $size ) {
        // Chỉ hiển thumbnail với post không có mật khẩu
        if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
            <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
        endif;
    }
}

/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ anchi_entry_header()
 **/
if ( ! function_exists( 'anchi_entry_header' ) ) {
    function anchi_entry_header() {
        if ( is_single() ) : ?>
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
        <?php else : ?>
            <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
            </h2><?php


        endif;
    }
}

/**
@ Hàm hiển thị thông tin của post (Post Meta)
@ anchi_entry_meta()
 **/
if( ! function_exists( 'anchi_entry_meta' ) ) {
    function anchi_entry_meta() {
        if ( ! is_page() ) :
            echo '<div class="entry-meta">';
            // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
            printf( __('<span class="author">Posted by %1$s</span>', 'thachpham'),
                get_the_author() );


            printf( __('<span class="date-published"> at %1$s</span>', 'thachpham'),
                get_the_date() );


            printf( __('<span class="category"> in %1$s</span>', 'thachpham'),
                get_the_category_list( ', ' ) );


            // Hiển thị số đếm lượt bình luận
            if ( comments_open() ) :
                echo ' <span class="meta-reply">';
                comments_popup_link(
                    __('Leave a comment', 'wp.test'),
                    __('One comment', 'wp.test'),
                    __('% comments', 'wp.test'),
                    __('Read all comments', 'wp.test')
                );
                echo '</span>';
            endif;
            echo '</div>';
        endif;
    }
}

/*
   * Thêm chữ Read More vào excerpt
   */
function anchi_readmore() {
    return '…<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'anchi') . '</a>';
}
add_filter( 'excerpt_more', 'anchi_readmore' );

/**
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
@ anchi_entry_content()
 **/
if ( ! function_exists( 'anchi_entry_content' ) ) {
    function anchi_entry_content() {
        if ( ! is_single() ) :
            the_excerpt();
        else :
            the_content();
            /*
             * Code hiển thị phân trang trong post type
             */
            $link_pages = array(
                'before' => __('<p>Page:', 'anchi'),
                'after' => '</p>',
                'nextpagelink'     => __( 'Next page', 'anchi' ),
                'previouspagelink' => __( 'Previous page', 'anchi' )
            );
            wp_link_pages( $link_pages );
        endif;
    }
}