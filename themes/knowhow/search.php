<?php
/**
* The template for displaying Search Results pages.
*
*/
?>

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

<?php if(!empty($_GET['ajax']) ? $_GET['ajax'] : null) { // Is Live Search ?>

<?php
// Get FAQ slug from options
$st_faq_slug = 'faq';
$st_faq_slug = of_get_option('st_faq_slug');
?>

<?php if (have_posts()) { ?>

<ul id="search-result">
  <?php while (have_posts()) : the_post(); ?>

  <?php
	// Set search result class
	if ( has_post_format( 'video' )) {
	$st_search_class = 'video';
	} elseif ( 'st_faq' == get_post_type() ) {
	$st_search_class = 'faq';
	} else {
	$st_search_class = 'standard';
	}
  ?>
  <li class="<?php echo $st_search_class ?>">
  <?php if ( 'st_faq' == get_post_type() ) { ?>
  <a href="<?php echo home_url(); ?>/<?php echo $st_faq_slug ?>/#faq-<?php the_ID(); ?>"><?php the_title(); ?></a>
  <?php } else { ?>
  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  <?php } ?>
  </li>
  <?php endwhile; ?>

</ul>

<?php } else { ?>

<ul id="search-result">
  <li class="nothing-here"><?php echo pll__( "Sorry, no posts were found." ); ?></li>
</ul>

<?php } ?>

<?php } else { // Is Normal Search ?>

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
<div id="primary" class="<?php echo $st_hp_sidebar; ?> clearfix">
<!-- .ht-container -->
<div class="ht-container">

<!-- #content -->
<section id="content" role="main">

<!-- #page-header -->
<header id="page-header" class="clearfix">
    <? /* [:en]Search Results for: %s [:ru]Результаты поиска для:
    [:en]Here's what we've found for you [:ru]Вот что мы нашли для вас
 */ ?>
<h1 class="page-title"><?php printf( pll__( 'Search Results for: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>

<p><?php echo pll__("what_we_found");  ?></p>



    <?php
    $tags_result_obj_arr = array();
    $search_string_array = explode(' ', $s);
    if (is_array($search_string_array)) {
        $search_string_array[] = $s;
        foreach ($search_string_array as $search_word) {
            $args = array('name__like' => $search_word, 'get' => 'all');
            $tags_obj_array = get_tags( $args );
            if (!empty($tags_obj_array)) {
                foreach($tags_obj_array as $tag_obj) {
                    if ($tag_obj->count > 0) {
                        $tags_result_obj_arr[$tag_obj->term_id] = $tag_obj;
                    }
                }
            }

        }
        if (!empty($tags_result_obj_arr)) {
            echo "We found tags: ";
            foreach ($tags_result_obj_arr as $tags_result_obj) {
                echo "<a href='".get_tag_link($tags_result_obj->term_id)."'>$tags_result_obj->name ($tags_result_obj->count)</a>";
                $i++;
                if ($i < count($tags_result_obj_arr)) {
                    echo ",&nbsp;&nbsp;";
                }
            }
        }
    }

    ?>


</header>
<!-- /#page-header -->


    <?php if ( have_posts() ) { ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

<?php get_template_part( 'page', 'navigation' ); ?>

			<?php } else { ?>

				<?php get_template_part( 'content-none' ); ?>

			<?php } ?>

</section>
<!-- #content -->

<?php if (of_get_option('st_hp_sidebar') != 'fullwidth') {   ?>
<?php get_sidebar(); ?>
<?php } ?>

</div>
<!-- /.ht-container -->
</div>
<!-- #primary -->

<?php get_footer(); ?>

<?php } ?>
