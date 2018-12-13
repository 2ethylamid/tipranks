<?php
/*
Template Name: Archives
*/	
?>
<?php get_header(); 
global $wp_query;
$curauth = $wp_query->get_queried_object();
?>

<section class="content">
    <div class="container archive">

        <?php if (is_author()) : ?>
            <h1 class="text-c">Articles by: <?php echo $curauth->first_name." ".$curauth->last_name; ?></h1>
        <?php else: ?>
            <h1 class="text-c"><?php echo single_term_title(); ?></h1>
        <?php endif ?>
        <div class="articles oneCol">

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
