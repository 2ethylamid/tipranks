<?php

function soshaceblog_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
        ?>

        <div class="post-thumbnail">
            <?php
            if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
                the_post_thumbnail( 'twentyfourteen-full-width' );
            } else {
                the_post_thumbnail();
            }
            ?>
        </div>

    <?php else : ?>

        <?php
        if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
            the_post_thumbnail( 'twentyfourteen-full-width' );
        } else {
            the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
        }
        ?>

    <?php endif; // End is_singular()
}

function soshaceblog_paging_nav() {

    global $wp_query, $wp_rewrite;

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages < 2 ) {
        return;
    }

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $wp_query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
        'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
        'type'      => 'list',
    ) );

    if ( $links ) :

        ?>
        <div class="pages">
            <?php echo $links; ?>
        </div --><!-- /pages -->
    <?php
    endif;

}

add_filter( 'excerpt_length', 15 );

function get_excerpt($length, $more){
    //$excerpt = get_the_content();get_the_excerpt();
    $excerpt = get_the_excerpt();
    //$excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $length);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
    //$excerpt = $excerpt.'... <a href="'.$permalink.'">'.$more.'</a>';
    $excerpt = $excerpt.'...';
    return $excerpt;
}

add_action( 'pre_get_posts', 'number_of_posts_category' );
function number_of_posts_category( $query ) {
    $query->set( 'posts_per_page', '12' );
    return $query;
}