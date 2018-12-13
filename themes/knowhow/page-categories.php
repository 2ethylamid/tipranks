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

  <header id="page-header">
    <h2 class="page-title">
      <?php _e('[:en]Article Categories [:ru]Категории Статей','framework') ?>
    </h2>
  </header>
  <div id="homepage-categories" class="clearfix">
<?php
// Get homepage options
$st_hp_category_exclude = 0;
$st_hp_category_exclude = of_get_option('st_hp_cat_exclude');
$st_hp_subcategory_exclude = 0;
$st_hp_subcategory_exclude = of_get_option('st_hp_subcat_exclude');
// Set category counter
$st_cat_counter = 0;
// Base Category Query
$st_hp_cat_args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hierarchical' => true,
  'hide_empty' => 0,
  'exclude' => $st_hp_category_exclude,
  'pad_counts'  => 1
);
$st_categories = get_categories($st_hp_cat_args);
$st_categories = wp_list_filter($st_categories,array('parent'=>0));
$currentLangCat = qtrans_getLanguage();
// If there are catgegories
if ($st_categories) {
foreach($st_categories as $st_category) {
$st_cat_counter++;
$countCatLang = 0;
global $wpdb;
$valN = $wpdb->get_results("SELECT wp_posts.post_title FROM wp_posts INNER JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id = $st_category->term_id AND wp_posts.post_type = 'post' AND wp_posts.post_status = 'publish' AND wp_posts.ID = wp_term_relationships.object_id");
$selLineCLCountN = count($valN);
for ($iCLV=0; $iCLV < $selLineCLCountN; $iCLV++) {
	$strTitlePost = $valN[$iCLV]->post_title;
	if (strripos($strTitlePost, '[:'.$currentLangCat.']') === false) {} else {
		$countCatLang++;
	}
}
if ($countCatLang == 0 ) {
	$st_cat_counter--;
} else{
// if ((!is_int($st_cat_counter / 2)) && $st_cat_counter != 1) {
// echo '</div><div class="row">';} elseif ($st_cat_counter == 1)
// { echo '<div class="row">';}
if ($st_cat_counter == 1) { echo '<div class="row">';} else{
	if (!is_int($st_cat_counter / 2)) {
	echo '</div><div class="row">';
	}
}
    echo '<div class="column col-half '. $st_cat_counter.'">';
    echo '<h3> <a href="' . get_category_link( $st_category->term_id ) . '" title="' . sprintf( __( '[:en]View all posts in %s [:ru]Просмотреть все записи в %s', 'framework' ), $st_category->name ) . '" ' . '>' . $st_category->name.'</a>';
		if (of_get_option('st_hp_cat_counts') == '1') {
			// echo '<span class="cat-count">(' . $st_category->count.')</span>';
			echo '<span class="cat-count">(' . $countCatLang .')</span>';
			}
			echo '</h3>';
// Sub category
$st_sub_category = get_category($st_category);
$st_subcat_args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'exclude' => $st_hp_subcategory_exclude,
  'child_of' => $st_sub_category->cat_ID,
  'pad_counts'  => 1
);
$st_sub_categories = get_categories($st_subcat_args);
$st_sub_categories = wp_list_filter($st_sub_categories,array('parent'=>$st_sub_category->cat_ID));
// If there are sub categories show them
if ($st_sub_categories && (of_get_option('st_hp_subcat') == 1)) {
	foreach($st_sub_categories as $st_sub_category) { ?>
    	<ul class="sub-categories">
    		<li>
    			<h4><?php echo '<a href="' . get_category_link( $st_sub_category->term_id ) . '" title="' . sprintf( __( 'View all posts in %s', 'framework' ), $st_sub_category->name ) . '" ' . '>' . $st_sub_category->name.'</a>';
		if (of_get_option('st_hp_subcat_counts') == '1') {
			echo '<span class="cat-count">(' . $st_sub_category->count.')</span>';
		} ?></h4>
        	</li>
        </ul>
	<?php }
}
//List Posts
$st_cat_post_num = of_get_option('st_hp_cat_postnum');
$st_posts_order = of_get_option('st_hp_cat_posts_order');
global $post;
// If show posts is 0 do nothing
if ($st_cat_post_num != 0) {
// Listed by popular?
if ($st_posts_order == 'meta_value_num') {
    $st_cat_post_args = array(
    'numberposts' => $st_cat_post_num,
	  'orderby' => $st_posts_order,
	  'meta_key' => '_st_post_views_count',
      'category__in' => $st_category->term_id
    );
} else {
	$st_cat_post_args = array(
      'numberposts' => $st_cat_post_num,
	  	'orderby' => $st_posts_order,
      'category__in' => $st_category->term_id
    );
}
    $st_cat_posts = get_posts($st_cat_post_args);
	echo '<ul class="category-posts">';
	foreach($st_cat_posts as $post) : setup_postdata($post);
	?>
    <?php
	// Set post format class
	if ( has_post_format( 'video' )) {
	$st_postformat_class = 'video';
	} else {
	$st_postformat_class = 'standard';
	}
  ?>
    <li class="format-<?php echo $st_postformat_class; ?>">
			<a href="<?php the_permalink(); ?>" class="listStyleText">
      <?php
				the_title();
			?>
      </a></li>

    <?php
	endforeach;
echo '</ul>';
}
echo '</div>';
}
}
}
?>
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
