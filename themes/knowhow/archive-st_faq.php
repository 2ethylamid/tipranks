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

  <header id="page-header" class="clearfix">
  <h1 class="page-title"><?php _e('Frequently Asked Questions','framework') ?></h1>
  <?php st_breadcrumb(); ?>
  </header>

   <?php	$args = array(
					'post_type' => 'st_faq',
					'posts_per_page' => '-1',
					'orderby ' => 'menu_order title',
					'order' => 'ASC'
				);
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                <h2 id="faq-<?php echo get_the_ID(); ?>" class="entry-title">
                <a href="#faq-<?php echo get_the_ID(); ?>">
				<div class="action"><span class="plus"><i class="fa fa-plus"></i></span><span class="minus"><i class="fa fa-minus"></i></span></div>
				<?php the_title(); ?></a></h2>

                <div class="entry-content">
                <?php the_content(); ?>
                </div>

                </article>

      <?php endwhile; endif; ?>

  </section>
  <!-- #content -->

<?php if (of_get_option('st_faq_sidebar') != 'fullwidth') {   ?>
<?php get_sidebar('faq'); ?>
<?php } ?>

</div>
<!-- .ht-container -->
</div>
<!-- #primary -->

<?php get_footer(); ?>
