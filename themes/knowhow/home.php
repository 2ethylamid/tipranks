<?php get_header(); ?>

<!-- #header -->
<header id="site-header" class="clearfix site-headerHome" role="banner" >
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
// Get HP sidebar position
$st_hp_sidebar = of_get_option('st_hp_sidebar');
if ($st_hp_sidebar == 'fullwidth') {
	$st_hp_sidebar = 'sidebar-off';
} elseif ($st_hp_sidebar == 'sidebar-l') {
	$st_hp_sidebar = 'sidebar-left';
} elseif ($st_hp_sidebar == 'sidebar-r') {
	$st_hp_sidebar = 'sidebar-right';
} else {
	$st_hp_sidebar = 'sidebar-right';
}
?>

<!-- #primary -->
<div id="primary" class="<?php echo $st_hp_sidebar; ?> clearfix">
<!-- .ht-container -->
<div class="ht-container">

<!-- #content -->
<section id="content" role="main">
  <div id="homepage-categories" class="clearfix">
<?php

if ( have_posts() ) :

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; ?>

<?php get_template_part( 'page', 'navigation' ); ?>

<?php else : ?>
  <?php if (!$st_sub_categories) { ?>
<?php get_template_part( 'no-results', 'index' ); ?>
  <?php } ?>
<?php endif; wp_reset_query();?>
</div>
</div>
</section>
<!-- #content -->

<?php get_sidebar(); ?>

</div>
<!-- /.ht-container -->
</div>
<!-- #primary -->

<?php get_footer(); ?>
