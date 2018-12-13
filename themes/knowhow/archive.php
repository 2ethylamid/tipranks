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
  <h1 class="page-title">
    <?php
							if ( is_category() ) {
								printf( __( 'Category: %s', 'framework' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag: %s', 'framework' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author Archives: %s', 'framework' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( '[:en]Daily Archives:  %s [:ru]Архивы по дням: %s', 'framework' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( '[:en]Monthly Archives: %s [:ru]Архивы по месяцам: %s', 'framework' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( '[:en]Yearly Archives: %s [:ru]Архивы по годам: %s', 'framework' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( '[:en]Archives [:ru]Архивы', 'framework' );

							}
						?>
  </h1>
  <?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', $category_description );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<p>' . $tag_description . '</p>' );
						}
					?>
</header>
<!-- /#page-header -->


<?php if ( have_posts() ) : ?>
<?php rewind_posts(); ?>
<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() );
					?>
<?php endwhile; ?>

<?php get_template_part( 'page', 'navigation' ); ?>

<?php else : ?>

<?php get_template_part( 'no-results', 'index' ); ?>

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
