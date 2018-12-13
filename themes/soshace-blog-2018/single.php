<?php
/**
 * The Template for displaying all single posts
 * 
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soshace Blog 2018
 * @subpackage Soshace _Blog_2018
 */

global $post;

$author_name_str = get_the_author_meta('first_name', $post->post_author)." ".get_the_author_meta('last_name', $post->post_author);
$post_category_obj_arr = get_the_category();
$this_post = $post;

get_header();
//get_template_part('posts_carousel');
$post = $this_post;
?>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 clearfix">
                    <div class="user__info">
                        <a href="<?php echo get_author_posts_url($post->post_author) ?>" class="user__info__image">
                            <img src="<?php echo get_avatar_url($post->post_author) ?>" alt="<?php echo $author_name_str ?>">
                        </a>
                        <span class="user__info__date"><?php echo get_the_date('j m Y') ?></span>
                        <p><a href="<?php echo get_author_posts_url($post->post_author) ?>" class="user__info__name"><?php echo $author_name_str ?></a> </p>
                        <a href="<?php echo get_category_link($post_category_obj_arr[0]) ?>" class="btn btn_gray"><?php echo $post_category_obj_arr[0]->name ?></a>
                    </div><!-- /user -->

                    <?php get_template_part('social') ?>

                </div>
                <div class="col-md-9">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="title"><?php the_title() ?></h1>

                    <?php the_content() ?>

                    <?php endwhile ?>
                    <div class="social__list social__list_horiz">
                        <div class="social__list__item social__list__item_fb">
                            <a href="#">Share <span>via Facebook</span></a>
                        </div>
                        <div class="social__list__item social__list__item_tw">
                            <a href="#">Share <span>via Twitter</span></a>
                        </div>
                        <div class="social__list__item social__list__item_gl">
                            <a href="#">Share <span>via Google+</span></a>
                        </div>
                    </div><!-- /social__list -->

                   <?php get_template_part('related') ?>

                    <div class="comment">
                        <img src="img/comments.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- /content -->
<?php get_footer(); ?>