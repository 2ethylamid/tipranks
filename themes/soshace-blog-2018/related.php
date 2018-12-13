<?php

global $post;

$current_post_ID = $post->ID;
$post_category_obj_arr = get_the_category();
$curren_post_category = $post_category_obj_arr[0]->cat_ID;

$args = array (
    'posts_per_page'    =>  3,
    'order'             => 'DESC',
    'orderby'           => 'ID',
    'post_status'       => 'publish',
    'post_type'         => 'post',
    'cat'               => $curren_post_category,
    'post__not_in'      => array($current_post_ID),
);

$query = new WP_Query($args);

if ($query->have_posts()) :
$i=0;
?>

<h3 class="mt50 mb20">Related articles</h3>

<div class="articles articles_col3 mb0">
    <?php while($query->have_posts() && $i<6) : $query->the_post(); ?>
    <?php $author_name_str = get_the_author_meta('first_name', $post->post_author)." ".get_the_author_meta('last_name', $post->post_author); ?>
    <div class="articles__item" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <div class="articles__item__image">
            <a href="<?php the_permalink() ?>"><?php soshaceblog_post_thumbnail() ?></a>
        </div>
        <div class="articles__item__info">
            <div class="user">
                <a href="<?php echo get_avatar_url($post->post_author) ?>">
                    <img src="<?php echo get_avatar_url($post->post_author) ?>" alt="<?php echo $author_name_str ?>" width="35px">
                    <span><?php echo $author_name_str ?></span>
                </a>
            </div>
            <div class="date"><?php echo get_the_date('j.m.Y') ?></div>
        </div>
        <div class="articles__item__desc">
            <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
            <p><?php echo get_excerpt(150, ">>>") ?></p>
        </div>
        <div class="articles__item__tag">
            <?php
                $post_category_obj_arr = get_the_category();
                $curren_post_category_name = $post_category_obj_arr[0]->name;
            ?>
            <span><?php echo $curren_post_category_name ?></span>
        </div>
    </div>
    <?php $i++; endwhile ?>

</div><!-- /articles -->

<?php endif ?>

<div class="text-c">
    <a href="<?php echo get_category_link($post_category_obj_arr[0]) ?>" class="btn btn_green">more related articles</a>
</div>