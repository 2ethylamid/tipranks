<?php

global $post;
$author_name_str = get_the_author_meta('first_name', $post->post_author)." ".get_the_author_meta('last_name', $post->post_author);


?>

<div class="articles__item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="articles__item__image">
        <a href="<?php the_permalink() ?>"><?php soshaceblog_post_thumbnail() ?></a>
    </div>
    <div class="articles__item__info">
        <div class="user">
            <a href="<?php echo get_author_posts_url($post->post_author)  ?>">
                <img src="<?php echo get_avatar_url($post->post_author) ?>" alt="<?php echo $author_name_str ?>" width="35px">
                <span><?php echo $author_name_str ?></span>
            </a>
        </div>
        <div class="date"><?php echo get_the_date('j.m.Y') ?></div>
    </div>
    <div class="articles__item__desc">
        <h4><a href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a></h4>
        <p><?php echo get_excerpt(150, ">>>") ?></p>
    </div>
    <div class="articles__item__tag">
        <?php $post_category_obj_arr = get_the_category(); ?>
        <a href="<?php echo get_category_link($post_category_obj_arr[0]) ?>" class="btn btn_gray"><?php echo $post_category_obj_arr[0]->name ?></a>
    </div>
</div>