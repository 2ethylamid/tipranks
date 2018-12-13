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
          <i class='fa fa-search'></i><span><?php _e("[:en]Search: [:ru]Поиск:", "framework") ?></span>
        </button>
      </form>
      </div>
    </div>
    </div>
<!-- /#live-search -->

<!-- #primary-->
<div id="primary" class="<?php if (of_get_option('st_hp_sidebar') == 'fullwidth') { echo 'sidebar-off'; } elseif (of_get_option('st_hp_sidebar') == 'sidebar-l') { echo 'sidebar-left'; } else { echo 'sidebar-right'; } ?> clearfix">
<!-- .ht-container -->
<div class="ht-container">

	<!-- #content-->
	<section id="content" role="main">

<!-- #page-header -->
<header id="page-header" class="clearfix">
	<h1 class="page-title"><?php _e( 'Articles Tagged: ', 'framework' ); ?><?php single_tag_title(); ?></h1>
	<?php if ( tag_description() ) : // Show an optional tag description ?>
	<div class="archive-meta"><?php echo tag_description(); ?></div>
	<?php endif; ?>
</header>
<!-- /#page-header -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile;  ?>

<?php get_template_part( 'page', 'navigation' ); ?>

<?php else: ?>

<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>



</section>
<!-- /#content-->

<?php if (of_get_option('st_hp_sidebar') != 'fullwidth') {   ?>
<?php get_sidebar(); ?>
<?php } ?>

</div>
<!-- .ht-container -->
</div>
<!-- /#primary -->

<?php get_footer(); ?>
