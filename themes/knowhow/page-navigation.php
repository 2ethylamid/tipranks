<?php if ( $wp_query->max_num_pages > 1) { ?>
<!-- .page-navigation -->
    <div class="page-navigation clearfix">

<div class="nav-previous">
        <?php previous_posts_link(__('&larr; Newer Entries', 'framework')) ?>
      </div>

<?php st_pagination(); ?>

      <div class="nav-next">

          <?php if(pll_current_language()=="ru"){ $link_text = "Ранние записи"; }else{ $link_text="Older Entries"; } ?>
        <?php next_posts_link($link_text); ?>
      </div>

      <!-- /.page-navigation -->

      </div>
<?php } ?>
