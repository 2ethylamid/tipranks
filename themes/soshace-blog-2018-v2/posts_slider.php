<?php

    global $post;

    $category = get_the_category();

    $last_category = end($category);

    $args = array(
        'post_type' => 'post',
        'cat'   => $last_category->term_id,
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'ignore_sticky_posts' => true,
        'paged' => 1,
        'post__not_in'  => array($post->ID),
        );

    $new_query = new WP_Query($args);

    $slider_posts = $new_query->posts;

    if (count($slider_posts) > 3) : ?>
        <section class="carousel owl-carousel">
            <?php $i=0 ?>
            <?php foreach($slider_posts as $_post) : ?>
                <?php if ($i<3) :?>

                    <div><img class="clickable" data-link="<?php echo $_post->guid ?>" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($_post->ID), 'thumbnail' ) ?>" alt="<?php echo $_post->post_title ?>"></div>

                    <?php $i++; ?>

                <?php else : ?>

                    <?php break; ?>

                <?php endif ?>
            <?php endforeach ?>
        </section><!-- /carusel -->
    <?php endif ?>

