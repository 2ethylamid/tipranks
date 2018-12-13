<section class="categories">
    <div class="container">
        <h3 class="text-c">Categories</h3>
        <div class="categories__list">
        <?php
            $cats = get_categories( array('hide_empty' => true) );
            foreach($cats as $cat) : ?>
                <div class="categories__list__item"><a href="<?php echo get_category_link( $cat->cat_ID ) ?>"><span><?php echo $cat->name ?> (<?php echo $cat->count ?>)</span></a></div>
            <?php endforeach ?>
       </div>
    </div>
</section><!-- /categories -->