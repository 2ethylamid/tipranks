<?php get_header(); ?>
<header id="site-header" class="clearfix" role="banner">
<div class="ht-container">

<!-- #logo -->
  <div id="logo">
    <?php if (is_front_page()) { ?><h1><?php } ?>
      <a title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>">
      <?php if (of_get_option('st_logo')) { ?>
      <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo of_get_option('st_logo'); ?>">
      <?php } else { ?>
      <?php bloginfo( 'name' ); ?>
      <?php } ?>
      </a>
     <?php if (is_front_page()) { ?></h1><?php } ?>
  </div>
  <div class="selectLang">
      <?php pll_the_languages(array('dropdown'=>1));  ?>
    <?php //qtrans_generateLanguageSelectCode('dropdown', 'language'); ?>
  </div>
<!-- /#logo -->

<?php if ( has_nav_menu( 'primary-nav' ) ) : ?>
<!-- #primary-nav -->
<nav id="primary-nav" role="navigation" class="clearfix">
  <?php wp_nav_menu( array('theme_location' => 'primary-nav', 'container' => false, 'menu_class' => 'nav sf-menu clearfix' )); ?>
</nav>
<!-- #primary-nav -->
<?php endif; ?>

</div>
</header>
<!-- /#header -->

<!-- #live-search -->
    <div id="live-search">
    <div class="ht-container">
    <div id="search-wrap">
      <form role="search" method="get" id="searchform" class="clearfix" action="<?php echo home_url( '/' ); ?>">
        <input type="text" onfocus="if (this.value == '<?php echo of_get_option('st_search_text'); ?>') {this.value = '';}" onblur="if (this.value == '')  {this.value = '<?php echo of_get_option('st_search_text'); ?>';}" value="<?php echo of_get_option('st_search_text'); ?>" name="s" id="s" autocapitalize="off" autocorrect="off" autocomplete="off" />
        <i class="live-search-loading fa fa-spinner fa-spin"></i>
        <button type="submit" id="searchsubmit">
          <i class='fa fa-search'></i><span><?php if(pll_current_language()=="ru"){?>Поиск:<?php }else{?>Search:<?php } ?></span>
        </button>
      </form>
      </div>
    </div>
    </div>
<!-- /#live-search -->

<?php
// Get sidebar position
$ht_post_sidebar = null;
$ht_post_sidebar = get_post_meta( get_the_ID(), 'st_post_sidebar', true );
if ($ht_post_sidebar == '') {
	$ht_post_sidebar = 'sidebar-right';
}
?>

<!-- #primary -->
<div id="primary" class="<?php echo $ht_post_sidebar ?> clearfix">
<!-- .ht-container -->
<div class="ht-container">

  <!-- #content -->
  <section id="content" role="main">

<!-- #page-header -->
<header id="page-header" class="clearfix">
  <h1 class="page-title"><?php the_title(); ?></h1>
  <?php st_breadcrumb(); ?>
</header>
<!-- /#page-header -->

<?php while ( have_posts() ) : the_post(); ?>

  <?php st_set_post_views(get_the_ID()); ?>


    <?php get_template_part( 'content', 'meta' ); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<!-- .entry-header -->
	<header class="entry-header">

    <?php if ( has_post_format( 'video' )) { ?>
    	<?php ht_post_format_video() ?>
    <?php } else { ?>
    	<!-- ht_post_format_standard() -->
    <?php } ?>

	</header>
	<!-- /.entry-header -->

        <div class="entry-content">

          <?php the_content(); ?>
		  <?php echo do_shortcode('[sc name="CTA1"]') ?>
            <?php echo do_shortcode('[sharify]'); ?>
          <?php wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'framework' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'framework' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) ); ?>
        </div>

        <?php if (is_single() && has_tag()) { ?>
        <div class="tags"><?php the_tags( __( '<strong>Tagged:</strong>', 'framework' ),'',''); ?></div>
		<?php } ?>

</article>

<?php if (of_get_option('st_single_authorbox')) { ?>
	<?php get_template_part('author-bio'); ?>
<?php } ?>

<?php if (of_get_option('st_single_related')) { ?>
	<?php get_template_part('single', 'related'); ?>
<?php } ?>

<?php // If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() )
	comments_template( '', true ); ?>

<?php endwhile;  // end of the loop. ?>

</section>
<!-- #content -->

<?php if ($ht_post_sidebar != 'sidebar-off') {   ?>
<?php get_sidebar(); ?>
<?php } ?>

</div>
<!-- .ht-container -->
</div>
<!-- /#primary -->

<?php get_footer(); ?>
