<!-- #sidebar -->
<aside id="sidebar" role="complementary">
 <?php /*
 <div id="categories-2" class="widget widget_categories clearfix">
 <h4 class="widget-title"><a href="/cat"><span><?php _e('[:en]Categories [:ru]Категории','framework') ?></span></a></h4>
<?php
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
if ($st_cat_counter == 1) { echo '<ul>';}
    echo '<li> <a href="' . get_category_link( $st_category->term_id ) . '" title="' . sprintf( __( '[:en]View all posts in %s [:ru]Просмотреть все записи в %s', 'framework' ), $st_category->name ) . '" ' . '>' . $st_category->name.'</a>';
			// echo '<span class="cat-count">(' . $countCatLang .')</span>';
			echo '</li>';

}
}
}
?>
</ul></div>
 */ ?>
<?php if ( is_active_sidebar( 'st_primary' ) ) { ?>
  <?php dynamic_sidebar( 'st_primary' )  ?>
<?php } ?>
</aside>
