<?php get_header() ?>

<section class="content">
    <div class="container">

		<h4>Search result for «<i><?php echo get_search_query() ?></i>»</h4>

        <div class="articles">

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post() ?>

                    <?php get_template_part( 'category_content' ) ?>

                <?php endwhile ?>

        </div><!-- /articles -->

        <?php soshaceblog_paging_nav() ?>

        <?php endif ?>
    </div>
</section><!-- /content -->

<?php get_template_part( 'categories_list' ) ?>


<?php get_footer() ?>
