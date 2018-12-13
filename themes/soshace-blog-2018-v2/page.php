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
        <div class="container single">
            <div class="row">
                <div class="col-md-9">

                    <?php while ( have_posts() ) : the_post(); ?>


                        <div class="titleWrap" data-content="<?php the_title() ?>">
                            <span class="titleDecor" data-content="<?php the_title() ?>"></span>
                            <h1 class="title"><?php the_title() ?></h1>
                        </div>


                        <?php the_content() ?>

                        <?php endwhile ?>

                </div>

                <div class="col-md-3 clearfix">

                    <?php echo get_social_block('vertical'); ?>

                </div>
            </div>

        </div>
    </section><!-- /content -->
<?php get_footer(); ?>