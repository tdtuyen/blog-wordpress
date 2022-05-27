<!DOCTYPE html>
<!–[if IE 8]>
<html <?php language_attributes(); ?> class="ie8"> <![endif]–>
<!–[if !IE]>
<html <?php language_attributes(); ?>> <![endif]–>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmgp.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?> >
<div id="container" class="container">
    <header id="header">
        <!--        --><?php //anchi_logo(); ?>
        <!--        --><?php //anchi_menu( 'primary-menu' ); ?>

        <div class="anchi-nav">
            <div class="<?php echo esc_attr($nav_layout); ?>">
                <nav class="navbar navbar-expand-md navbar-light">
                    <!--                    hien thi logo-->

                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_template_directory_uri() . '/assets/images/logo.svg' ?>
                        <?php if ($logo != ''): ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>">
                        <?php else: ?>
                            <h2><?php bloginfo('name'); ?></h2>
                        <?php endif; ?>
                    </a>

                    <!--                    Hien thi menu-->

                    <div class="collapse navbar-collapse mean-menu">
                        <?php
                        if (has_nav_menu('primary-menu')) {
                            anchi_menu('primary-menu');
                        }
                        ?>

                        <!--                        Hien thi form tim kiem-->
                        <?php
                        $enable_search_bar = true;
                        $value = '';
                        $search_placeholder_text = 'Search';
                        ?>
                        <?php if ($enable_search_bar == true): ?>
                            <form class="search-box a1" method="get" action="<?php echo site_url('/'); ?>">
                                <?php
                                if (class_exists('LearnPress')) {
                                    $value = 'lp_course';
                                }
                                if (class_exists('SFWD_LMS')) {
                                    $value = 'sfwd-courses';
                                }
                                if (class_exists('Tutor')) {
                                    $value = 'courses';
                                } else {
                                    $value = 'courses';
                                }
                                ?>
                                <input type="text" value="" name="s" class="input-search"
                                       placeholder="<?php echo esc_attr($search_placeholder_text); ?>">
                                <input type="hidden" placeholder="" value="course" name="ref"/>
                                <input type="hidden" name="post_type" value="<?php echo esc_attr($value); ?>">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        <?php endif; ?>

                        <!--                         phan goi dien thoai-->

                        <a href="#" data-toggle="modal" data-target="#contactList" class="ringphone"><img height="15px"
                                    src="<?php echo get_stylesheet_directory_uri() . '/assets/images/phone.png' ?>"></a>

                        <!--                        phan dang nhap-->
                        <div class="others-option d-flex align-items-center">
                            <div class="option-item dropdown">
                                <?php if (is_user_logged_in()):
                                    $user = wp_get_current_user();
//                                        $profile = LP_Profile::instance($user->ID);
//                                        $users  = $profile->get_user();
//                                    $avatar = '';
//                                    if (!empty(get_user_meta($user->ID, '_lp_profile_picture', true))) {
//                                        $avatar = home_url('/wp-content/uploads/') . get_user_meta($user->ID, '_lp_profile_picture', true);
//                                    }
//                                        $gravatar_img = $users->get_profile_picture( 'gravatar' );
//                                    if ($avatar && WP_HOME != 'https://oec.wayarmy.net') {
//                                        $avatar = str_replace(WP_HOME, S3_BASE_URL, $avatar);
//                                    }
//
                                    ?>
                                    <div class="user-box dropbtn">
                                        <span class="dashicons dashicons-menu"></span>
                                        <div class="user-img">
                                            <?php if ($avatar): ?>
                                                <img class="avatar ssss" src="<?php echo $avatar; ?>" width="31"
                                                     height="31">
                                            <?php else: ?>
                                                <img class="user-img"
                                                     src="<?= home_url(); ?>/wp-content/themes/anchi/assets/images/user-default.png">
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="dropdown-content">
                                        <!-- there should be add more language -->
                                        <a href="<?php echo esc_url($profile_page_link); ?>"><i
                                                    class="far fa-user-circle" aria-hidden="true"></i>&nbsp;Trang cá
                                            nhân</a>
                                        <!--                                                <a href="#">Chỉnh sửa thông tin</a>-->
                                        <a href="<?php echo wp_logout_url() ?>" class="drp-logout"><i
                                                    class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;Đăng
                                            xuất</a>
                                    </div>
                                <?php else: ?>
                                    <div class="user-box dropbtn">
                                        <span class="dashicons dashicons-menu"></span>
                                        <div class="user-img">
                                            <img class="user-img"
                                                 src="<?= home_url(); ?>/wp-content/themes/anchi/assets/images/user-default.png">
                                        </div>
                                    </div>
                                    <div class="dropdown-content">
                                        <!-- there should be add more language -->
                                        <a href="<?php echo home_url('/wp-admin.php?action=register'); ?>"><i
                                                    class="fas fa-user-plus" aria-hidden="true"></i>&nbsp;Đăng ký</a>
                                        <a href="<?php echo home_url('/wp-admin'); ?>"
                                           class="drp-login"><i class="fas fa-sign-in-alt" aria-hidden="true"></i>&nbsp;Đăng
                                            nhập</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(19).webp" class="d-block w-100" style="height: 300px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(35).webp" class="d-block w-100" style="height: 300px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(19).webp" class="d-block w-100" style="height: 300px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
