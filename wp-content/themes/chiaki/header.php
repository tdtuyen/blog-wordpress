<!DOCTYPE html>
<!–[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]–>
<!–[if !IE]> <html <?php language_attributes(); ?>> <![endif]–>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?> >
<div id="container">
    <header id="header">
        <?php chiaki_logo(); ?>
        <button id="login">Đăng nhập</button>
        <div id="toggle">
            <i class="fa fa-bars"></i>
        </div>
        <?php chiaki_menu( 'primary-menu' ); ?>
    </header>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
