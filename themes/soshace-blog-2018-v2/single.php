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

    <?php //get_template_part('posts_slider') ?>
    <section class="content">
        <div class="container single">
            <div class="row">
                <div class="breadcrumbs">
                    <?php /* breadcrumbs */ if(function_exists('get_breadcrumbs')) { get_breadcrumbs(); }?>
                </div>

                <div class="col-md-9">
                    <?php while ( have_posts() ) : the_post(); ?>


                        <div class="titleWrap" data-content="<?php the_title() ?>">
                            <span class="titleDecor" data-content="<?php the_title() ?>"></span>
                            <h1 class="title"><?php the_title() ?></h1>
                        </div>

                        <div class="mobile_only">
                            <div class="user__info">
                                <a href="<?php echo get_author_posts_url($post->post_author) ?>" class="user__info__image">
                                    <img src="<?php echo get_custom_user_photo($post->post_author) ?>" alt="<?php echo $author_name_str ?>">
                                </a>
                                <span class="user__info__date"><?php echo get_the_date('j m Y') ?></span>
                                <p><a href="<?php echo get_author_posts_url($post->post_author) ?>" class="user__info__name"><?php echo $author_name_str ?></a> </p>
                                <a href="<?php echo get_category_link($post_category_obj_arr[0]) ?>" class="btn btn_gray"><?php echo $post_category_obj_arr[0]->name ?></a>
                            </div><!-- /user -->

                            <?php echo get_social_block('horizontal'); ?>
                        </div>


                        <?php the_content() ?>

                        <?php echo do_shortcode('[sc name="CTA1"]') ?>

                    <?php endwhile ?>

                    <?php echo get_social_block('horizontal') ?>


                </div>

                <div class="col-md-3 clearfix desktop_only">
                    <div class="user__info">
                        <a href="<?php echo get_author_posts_url($post->post_author) ?>" class="user__info__image">
                            <img src="<?php echo get_custom_user_photo($post->post_author) ?>" alt="<?php echo $author_name_str ?>">
                        </a>
                        <span class="user__info__date"><?php echo get_the_date('j m Y') ?></span>
                        <p><a href="<?php echo get_author_posts_url($post->post_author) ?>" class="user__info__name"><?php echo $author_name_str ?></a> </p>
                        <a href="<?php echo get_category_link($post_category_obj_arr[0]) ?>" class="btn btn_gray"><?php echo $post_category_obj_arr[0]->name ?></a>
                    </div><!-- /user -->

                    <?php echo get_social_block('vertical'); ?>
                </div>
            </div>
            <?php get_template_part('related') ?>
            <div class="comment">


                <?php $pll_current_language = pll_current_language(); ?>

                <?php get_disqus_block($pll_current_language); ?>

                <?php // If comments are open or we have at least one comment, load up the comment template
                    /* if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true ); */
                ?>
            </div>
    </section><!-- /content -->
<?php get_template_part( 'categories_list' ) ?>
<?php get_footer(); ?>