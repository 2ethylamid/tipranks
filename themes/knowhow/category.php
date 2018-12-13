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

<!-- #primary -->
<div id="primary" class="clearfix <?php if (of_get_option('st_hp_sidebar') == 'fullwidth') { echo 'sidebar-off'; } elseif (of_get_option('st_hp_sidebar') == 'sidebar-l') { echo 'sidebar-left'; } else { echo 'sidebar-right'; } ?>">
<!-- .ht-container -->
<div class="ht-container">

<!-- #content -->
<section id="content" role="main">


<!-- #page-header -->
<header id="page-header">
  <h1 class="page-title"><?php _e('Category: ', 'framework') ?><span><?php echo single_cat_title(); ?></span></h1>
  <?php	// show an optional category description
		$st_category_description = category_description();
		if ( ! empty( $st_category_description ) )
		echo apply_filters( 'category_archive_meta', $st_category_description );  ?>
	<?php st_breadcrumb(); ?>
</header>
<!-- /#page-header -->

<!-- #sub-cats -->
<?php
// Sub category
$st_sub_category_id = get_query_var('cat');

$st_subcat_args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'child_of' => $st_sub_category_id,
  'pad_counts'  => 1
);
$st_sub_categories = get_categories($st_subcat_args);
$st_sub_categories = wp_list_filter($st_sub_categories,array('parent'=>$st_sub_category_id));

if ($st_sub_categories) { ?>
<ul class="sub-categories clearfix">
<?php foreach($st_sub_categories as $st_sub_category) {  ?>
<li><h4><a href="<?php echo get_category_link( $st_sub_category->term_id ) ?>"><?php echo $st_sub_category->name ?></a><?php if (of_get_option('st_hp_subcat_counts') == '1') {
			echo '<span class="cat-count">(' . $st_sub_category->count.')</span>';
		} ?></h4></li>
<?php } ?>
</ul>
<?php } ?>
<!-- #/sub-cats -->

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; ?>

<?php get_template_part( 'page', 'navigation' ); ?>

<?php else : ?>
  <?php if (!$st_sub_categories) { ?>
<?php get_template_part( 'no-results', 'index' ); ?>
  <?php } ?>
<?php endif; ?>

</section>
<!-- /#content -->

<?php if (of_get_option('st_hp_sidebar') != 'fullwidth') {   ?>
<?php get_sidebar(); ?>
<?php } ?>

</div>
<!-- .ht-container -->

</div>
<!-- /#primary -->

<?php get_footer(); ?>
