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
    <?php qtrans_generateLanguageSelectCode('dropdown', 'language'); ?>
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
          <i class='fa fa-search'></i><span><?php _e("[:en]Search: [:ru]Поиск:", "framework") ?></span>
        </button>
      </form>
      </div>
    </div>
    </div>
<!-- /#live-search -->

<?php
$st_faq_sidebar = of_get_option('st_faq_sidebar');
$st_sidebar_class = 'sidebar-right';
if ( !is_active_sidebar( 'ht_faq' ) ) :

  if ($st_faq_sidebar == 'fullwidth') :
    $st_sidebar_class = 'sidebar-off';
  elseif ($st_faq_sidebar == 'sidebar-l') :
    $st_sidebar_class = 'sidebar-left';
  elseif ($st_faq_sidebar == 'sidebar-r') :
    $st_sidebar_class = 'sidebar-right';
  endif;

endif;
?>

<!-- #primary -->
<div id="primary" class="clearfix <?php echo $st_sidebar_class ?>">
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
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<header class="entry-header">

          <?php if ( 'has_post_thumbnail' ) { ?>
          <div class="entry-thumb">
            <?php the_post_thumbnail( 'post' ); ?>
            </div>
          <?php } ?>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
          <?php numbered_in_page_links( array( 'before' => '<div class="page-links"><strong>' . __( 'Pages:', 'framework' ) .'</strong>', 'after' => '</div>' ) ); ?>
        </div>

</article>

    <?php endwhile; // end of the loop. ?>

</section>
<!-- #content -->

<?php if (of_get_option('st_faq_sidebar') != 'fullwidth') {   ?>
	<?php get_sidebar( 'faq' ); ?>
<?php } ?>


</div>
<!-- .container -->
</div>
<!-- /#primary -->

<?php get_footer(); ?>
