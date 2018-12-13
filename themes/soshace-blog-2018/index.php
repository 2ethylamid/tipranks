<?php
/**
 * The main template file
 *
 * 
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soshace Blog 2018
 * @subpackage Soshace _Blog_2018
 */

get_header(); ?>

        <section class="main">
            <div class="container">
                <div class="main__desc">
                    <h2>Soshace Blog</h2>
                    <p>Check out our daily articles, interactive tutorials and awesome tips.</p>
                </div>
            </div>
        </section><!-- /main -->
        
        <section class="content">
            <div class="container">

                <?php

                $args = array (
                    'posts_per_page'    =>  12,
                    'order'             => 'DESC',
                    'orderby'           => 'ID',
                    'post_status'       => 'publish',
                    'post_type'         => 'post',
                );

                $query = new WP_Query($args);

                ?>
               
                <div class="articles">

                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post() ?>

                            <?php get_template_part( 'category_content' ) ?>

                        <?php endwhile ?>

                    <?php endif ?>

                </div><!-- /articles -->
                
                <div class="pages">
                   <?php soshaceblog_paging_nav() ?>
                </div><!-- /pages -->
                
            </div>
        </section><!-- /content -->

<?php get_template_part( 'categories_list' ) ?>


<?php get_footer(); ?>