<?php get_header(); ?>

<section id="main-content">
    <!--        --><?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!---->
    <!--            --><?php //get_template_part( 'content', get_post_format() ); ?>
    <!--        --><?php //endwhile; ?>
    <!--            --><?php //thachpham_pagination(); ?>
    <!--        --><?php //else : ?>
    <!--            --><?php //get_template_part( 'content', 'none' ); ?>
    <!--        --><?php //endif; ?>
</section>
<section id="sidebar">
    <!--        --><?php //get_sidebar(); ?>
</section>

<?php //get_footer(); ?>

<!-- Slideshow container -->
<div class="grid slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="<?php echo get_template_directory_uri() . '/assets/images/img_mountains_wide.jpeg' ?>">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="<?php echo get_template_directory_uri() . '/assets/images/img_nature_wide.jpeg' ?>">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="<?php echo get_template_directory_uri() . '/assets/images/img_snow_wide.jpeg' ?>">
        <div class="text">Caption Three</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>
<?php
$lastest_posts = get_posts();
$posts = [];
foreach ($lastest_posts as $lastest_post) {
    $post = (object)[];
    $post->thumb = get_the_post_thumbnail_url($lastest_post);
    $post->title = get_the_title($lastest_post);
    $post->desc = wp_trim_words(get_the_excerpt($lastest_post), 25, '...');
    $post->url = get_permalink($lastest_post);
    array_push($posts, $post);
}

//echo "<pre>";
//print_r($posts);
//echo "</pre>";
//die();

?>

<div class="grid wide">
    <h1 class="title">Xu hướng nổi bật</h1>
    <div class="row">
        <?php foreach ($posts as $post): ?>
        <div class="col l-3 m-4 c-12">
            <div class="course">
                <a href="<?php echo $post->url ?>" class="course-image-area">
                    <?php if ($post->thumb): ?>
                        <img
                                src="<?php echo $post->thumb ?>"
                                alt="<?php echo $post->title ?>"
                                class="course-image"
                        >
                    <?php else: ?>
                        <p class="course-image"></p>
                    <?php endif; ?>
                    <p class="course-price">123</p>
                </a>
                <div class="course-content">
                    <a href="<?php echo $post->url ?>" class="course-title-area">
                        <h3 class="course-title">
                            <?php echo $post->title ?>
                        </h3>
                    </a>
                    <div class="course-descr">
                        <?php echo $post->desc ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <h1 class="title">Được quan tâm nhất</h1>
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col l-3 m-4 c-12">
                <div class="course">
                    <a href="<?php echo $post->url ?>" class="course-image-area">
                        <?php if ($post->thumb): ?>
                            <img
                                    src="<?php echo $post->thumb ?>"
                                    alt="<?php echo $post->title ?>"
                                    class="course-image"
                            >
                        <?php else: ?>
                            <p class="course-image"></p>
                        <?php endif; ?>
                        <p class="course-price">123</p>
                    </a>
                    <div class="course-content">
                        <a href="<?php echo $post->url ?>" class="course-title-area">
                            <h3 class="course-title">
                                <?php echo $post->title ?>
                            </h3>
                        </a>
                        <div class="course-descr">
                            <?php echo $post->desc ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h1 class="title">Mới nhất</h1>
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col l-3 m-4 c-12">
                <div class="course">
                    <a href="<?php echo $post->url ?>" class="course-image-area">
                        <?php if ($post->thumb): ?>
                            <img
                                    src="<?php echo $post->thumb ?>"
                                    alt="<?php echo $post->title ?>"
                                    class="course-image"
                            >
                        <?php else: ?>
                            <p class="course-image"></p>
                        <?php endif; ?>
                        <p class="course-price">123</p>
                    </a>
                    <div class="course-content">
                        <a href="<?php echo $post->url ?>" class="course-title-area">
                            <h3 class="course-title">
                                <?php echo $post->title ?>
                            </h3>
                        </a>
                        <div class="course-descr">
                            <?php echo $post->desc ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php get_footer(); ?>
</div>

<div class="modal" style="display:none">
    <div class="modal__overlay">

    </div>
    <div class="modal__body">
        <div class="auth-form">
            <div class="auth-form--container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class="auth-form__switch-btn">Đăng ký</span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" placeholder="Email của bạn">
                    </div>
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" placeholder="Mật khẩu của bạn">
                    </div>

                </div>

                <div class="auth-form__aside">
                    <div class="auth-form__help">
                        <a href="" class="auth-form__link auth-form__link-forgot ">Quên mật khẩu</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="" class="auth-form__link">Cần trợ giúp?</a>
                    </div>
                </div>

                <div class="auth-form__controls">
                    <a href="" class="btn auth-form__controls-back">TRỞ LẠI</a>
                    <button class="btn btn--primary">ĐĂNG NHẬP</button>
                </div>
            </div>
        </div>

    </div>
</div>

