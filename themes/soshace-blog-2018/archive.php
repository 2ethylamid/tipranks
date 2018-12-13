<?php get_header() ?>

<section class="content">
    <div class="container">

        <h1 class="text-c"><?php echo single_term_title(); ?></h1>

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
