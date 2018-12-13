<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

<?php
	ht_post_format_standard();
	$on_off = get_field( "on_off" );
?>

<h2 class="entry-title">
<a rel="bookmark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h2>

<div class="entry-content">
	<?php
	//if ($on_off[0] == 'On') {
		the_excerpt();
//	} else{
//		echo content(55);
//
//	}
	?>
</div>

<div class="content-footer">
	<span class="view-count"><i class="fa fa-eye"></i><?php if(function_exists('the_views')) { the_views(); } ?></span>
	<a href="<?php the_permalink(); ?>" class="readmore" title="<?php echo esc_attr( sprintf( the_title_attribute( 'echo=0' ) ) ); ?>" rel="nofollow"><?php if(pll_current_language()=="ru"){?>Далее<?php }else{?>Read More<?php } ?><span> &rarr;</span></a>
</div>


</article>
