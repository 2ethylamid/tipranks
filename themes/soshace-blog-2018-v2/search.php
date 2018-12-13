<?php

get_header();

?>

<section class="content">
    <div class="container archive">
        <div class="breadcrumbs">
            <?php /* breadcrumbs if(function_exists('get_breadcrumbs')) { get_breadcrumbs(); } */ ?>
        </div>
        <?php if ( have_posts() ) : ?>
            <?php if (isset($_GET['paged'])) { $page_num = $_GET['paged']; } ?>
                <h4 class="search_results"><?php _e('Search result for', 'soshace') ?> «<i><?php echo get_search_query() ?></i>» <?php if (isset($page_num)) echo "page $page_num" ?></h4>

                <div class="articles oneCol">
                    <?php while ( have_posts() ) : the_post() ?>

                        <?php get_template_part( 'category_content' ) ?>

                    <?php endwhile ?>
                </div><!-- /articles -->
        <?php else: ?>
            <br><br><br>
            <h3>Nothing found on your request <i><?php echo get_search_query() ?></i></h3>
            <br><br><br>
        <?php endif ?>
        <?php soshaceblog_paging_nav() ?>
    </div>
</section><!-- /content -->

<?php get_template_part( 'categories_list' ) ?>


<?php get_footer() ?>
