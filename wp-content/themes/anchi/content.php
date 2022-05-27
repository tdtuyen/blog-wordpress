<!--<div id="post---><?php //the_ID(); ?><!--" class="courses">-->
<!--    <div class="entry-thumbnail">-->
<!--        --><?php //anchi_thumbnail('thumbnail'); ?>
<!--    </div>-->
<!--    <header class="entry-header">-->
<!--        --><?php //anchi_entry_header(); ?>
<!--        --><?php //anchi_entry_meta() ?>
<!--    </header>-->
<!--    <div class="entry-content">-->
<!--        --><?php //anchi_entry_content(); ?>
<!--<!--        -->--><?php ////( is_single() ? anchi_entry_tag() : '' ); ?>
<!--    </div>-->
<!--</div>-->

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



<div class="courses">
    <?php foreach ($posts as $post): ?>
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
                <p class="course-price"><?php echo $post->price ?></p>
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
                <p class="course-price"><?php echo $post->price ?></p>
                <div class="detail-area">
                    <div class="progress-coursesitem">
                        <p><span><?php echo $post->coursesitem ?></span> <a href="<?php echo $post->url ?>"
                                                                            class="course-title-area">bài học</a></p>
                    </div>
                    <div class="progress-interested">
                        <p><span><?php echo $post->interested ?></span> <a href="<?php echo $post->url ?>"
                                                                           class="course-title-area">người quan tâm</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>