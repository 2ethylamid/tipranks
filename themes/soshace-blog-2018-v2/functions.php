<?php

load_theme_textdomain( 'soshace', get_template_directory() .'/languages' );

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
                the_post_thumbnail('blog-thumbnail');
            }
            ?>
        </div>

    <?php else : ?>

        <?php
        if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
            the_post_thumbnail( 'blog-thumbnail' );
        } else {
            the_post_thumbnail( 'blog-thumbnail', array( 'alt' => get_the_title() ) );
        }
        ?>

    <?php endif; // End is_singular()
}

function soshaceblog_paging_nav() {

    global $wp_query, $wp_rewrite;

    $big = 99999999;

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

    if (isset($_GET['s'])) {
        $format = "?paged=%#%";
        $paged = max( 1, get_query_var('paged') );
    }
    $next = __( 'Next &rarr;', 'soshace' );
    $prev = __( '&larr; Previous', 'soshace' );
    // Set up paginated links.
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $wp_query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $prev,
        'next_text' => $next,
        'type'      => 'list',
    ) );

    if ( $links ) {
        $doc = new DOMDocument();
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $links);
        $ahrefs = $doc->getElementsByTagName('a');
        foreach($ahrefs as $ahref) {
            $className_str = $ahref->getAttribute('class');
            $className_arr = explode(' ', $className_str);
            foreach ($className_arr as $className) {
                if ($className == 'prev' || $className == 'next') {
                    $parentLi = $ahref->parentNode;
                    $parentLi->setAttribute ('class', 'nobackground');
                    break;
                }
            }
        }

        $spans = $doc->getElementsByTagName('span');
        foreach ($spans as $span) {
            $className_str = $span->getAttribute('class');
            $className_arr = explode(' ', $className_str);
            foreach ($className_arr as $className) {
                if ($className == 'current') {
                    $parentLi = $span->parentNode;
                    $parentLi->setAttribute ('class', 'current');
                    break;
                }
            }
        }

        $links = $doc->saveHTML();

        ?>
        <div class="pages">
            <?php echo $links; ?>
        </div><!-- /pages --> <?php
    }
}

add_filter( 'excerpt_length', 15 );

function get_excerpt($length = 170, $more = ">>"){
    $excerpt = get_the_content();
   // $excerpt = get_the_excerpt();
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

function get_social_block ($type = 'horizontal') {
	if ($type == 'horizontal') {
		$type_class = "social__list_horiz";
	} else if ($type == 'vertical') {
		$type_class = "social__list_vert";
	} ?>
	<!-- div class="social__list social__list_vert" -->
	<div class="social__list <?php echo $type_class ?>">
	    <div class="social__list__item social__list__item_fb">
	        <a href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" target="_blank" class="facebook customer share">Share <span>via Facebook</span></a>
	    </div>
	    <div class="social__list__item social__list__item_tw">
	        <a href="https://twitter.com/share?url=<?php the_permalink() ?>&hashtags=soshace"  title="Click to share this post on Twitter" class="twitter customer share">Share <span>via Twitter</span></a>
	    </div>
	    <div class="social__list__item social__list__item_gl">
	        <a class="google_plus customer share" href="https://plus.google.com/share?url=<?php the_permalink() ?>" title="Google Plus Share" target="_blank">Share <span>via Google+</span></a>
	    </div>
	</div><!-- /social__list --> <?php
}

function get_breadcrumbs() {
    global $post;
    $separator = " / ";
    $breadcrumbs = "<a href='".get_home_url()."' title=".get_bloginfo('name').">Blog</a>";
    $breadcrumbs .= $separator;
    if (is_single()) {

        $category = get_the_category();

        if (!empty($category)) {
            // Get last category post is in
            $last_category = end($category);
            // Get parent any categories and create array
            $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
            $breadcrumbs .= $get_cat_parents . $separator;
        }

        $breadcrumbs .= "<a href='".$post->guid."' title='".$post->post_title."'>".$post->post_title."</a>";

    }

    if (is_category()) {
        $category = get_the_category();
        $breadcrumbs .= "<a href='".get_category_link($category[0])."' title='".$category[0]->name."'>".$category[0]->name."</a>";
    }

    if (is_search()) {
        $breadcrumbs .= "<i>Search: ".$_GET['s']."</i>";
    }

    echo $breadcrumbs;
}


add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-thumbnail', 378, 9999, false ); // Post thumbnail

function footer_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Contacts Area',
        'id'            => 'contacts_footer_area',
        'before_widget' => '<div class="contact-column">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
 
}
add_action( 'widgets_init', 'footer_widgets_init' );


function footer_links_widgets_init() {

    register_sidebar( array(
        'name'          => 'Links Area',
        'id'            => 'links_footer_area',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'footer_links_widgets_init' );


function footer_copyright_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Copyright Footer Area',
        'id'            => 'copyright_footer_area',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
 
}
add_action( 'widgets_init', 'footer_copyright_widgets_init' );

// Register and load the widget
function soshace_contacts_load_widget() {
    register_widget( 'Soshace_contacts_widget' );
}
add_action( 'widgets_init', 'soshace_contacts_load_widget' );

// Creating the Soshace_contacts_widget
class Soshace_contacts_widget extends WP_Widget {

    public $social;

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'soshace_contacts_widget',

            // Widget name will appear in UI
            'Soshace Contacts',

            // Widget description
            array( 'description' => 'Enter Soshace contacts here' )
        );
        $this->social = array('facebook', 'linkedin', 'twitter', 'github', 'google+', 'instagram', 'youtube');
    }

// Creating widget front-end

    public function widget( $args, $instance ) { ?>

        <div class="contacts">
            <div class="f_title"><?php echo $instance['title'] ?></div>
            <div class="contacts__address">
                <p><?php echo $instance['address'] ?></p>
            </div>
            <div class="contacts__emails">
                <p><a href="mailto:<?php echo $instance['email1'] ?>"><?php echo $instance['email1'] ?></a></p>
                <p><a href="mailto:<?php echo $instance['email2'] ?>"><?php echo $instance['email2'] ?></a></p>
            </div>
            <div class="contacts__social_links">
                <div class="socials">
                    <?php foreach ($this->social as $soc) : ?>
                        <?php if (isset($instance[$soc]) && !empty($instance[$soc])) : ?>
                            <a target="_blank" href="<?php echo $instance[$soc] ?>" rel="nofollow">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/img/<?php echo $soc ?>_circle.svg">
                            </a>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <?php
    }

// Widget Backend
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = _e( 'New title' );
        }

        if ( isset( $instance[ 'address' ] ) ) {
            $address = $instance[ 'address' ];
        }
        else {
            $address = _e( 'New address' );
        }

        if ( isset( $instance[ 'email1' ] ) ) {
            $email[0] = $instance[ 'email1' ];
        }
        else {
            $email[0] = _e( 'email@example.com' );
        }
        if ( isset( $instance[ 'email2' ] ) ) {
            $email[1] = $instance[ 'email2' ];
        }
        else {
            $email[1] = _e( 'email@example.com' );
        }

        foreach($this->social as $soc) {
            if (  isset( $instance[ $soc ] )) {
                ${$soc} = $instance[ $soc ];
            } else {
                ${$soc} = '';
            }
        }

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'email1' ); ?>"><?php _e( 'Email #1:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email1' ); ?>" name="<?php echo $this->get_field_name( 'email1' ); ?>" type="text" value="<?php echo esc_attr( $email[0] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'email2' ); ?>"><?php _e( 'Email #2:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email2' ); ?>" name="<?php echo $this->get_field_name( 'email2' ); ?>" type="text" value="<?php echo esc_attr( $email[1] ); ?>" />
        </p>

        <?php

        foreach ($this->social as $soc) { ?>

            <p>
                <label for="<?php echo $this->get_field_id( $soc ); ?>"><?php _e( $soc . ' link:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( $soc ); ?>" name="<?php echo $this->get_field_name( $soc ); ?>" type="text" value="<?php echo esc_attr(${$soc}) ?>" />
            </p>

        <?php
        }
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? $new_instance['address'] : '';
        $instance['email1'] = ( ! empty( $new_instance['email1'] ) ) ? strip_tags( $new_instance['email1'] ) : '';
        $instance['email2'] = ( ! empty( $new_instance['email2'] ) ) ? strip_tags( $new_instance['email2'] ) : '';

        foreach ($this->social as $soc) {
            $instance[$soc] = ( ! empty( $new_instance[$soc] ) ) ? strip_tags( $new_instance[$soc] ) : '';
        }

        return $instance;
    }
} // Class Soshace_contacts_widget ends here


// Register and load the widget
function soshace_links_load_widget() {
    register_widget( 'Soshace_links_widget' );
}
add_action( 'widgets_init', 'soshace_links_load_widget' );

// Creating the Soshace_links_widget
class Soshace_links_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'soshace_links_widget',

            // Widget name will appear in UI
            'Soshace Links',

            // Widget description
            array( 'description' => 'Enter Soshace links here' )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) { ?>

        <div class="column">
            <div class="f_title"><?php echo $instance['title'] ?></div>
            <?php echo $instance['content']; ?>
        </div>

        <?php
    }

// Widget Backend
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = _e( 'New title' );
        }

        if ( isset( $instance[ 'content' ] ) ) {
            $content = $instance[ 'content' ];
        }
        else {
            $content = 'enter HTML code here';
        }

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" type="text"> <?php echo $content ?> </textarea>
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['content'] = ( ! empty( $new_instance['content'] ) ) ? $new_instance['content'] : '';
        return $instance;
    }
} // Class Soshace_links_widget ends here

// Register and load the widget
function soshace_copyright_load_widget() {
    register_widget( 'Soshace_copyright_widget' );
}
add_action( 'widgets_init', 'soshace_copyright_load_widget' );

// Creating the Soshace_links_widget
class Soshace_copyright_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'soshace_lower_footer_widget',

            // Widget name will appear in UI
            'Soshace Copyright Widget',

            // Widget description
            array( 'description' => 'Enter Soshace copyrights here' )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) { ?>

        <div class="copyright__left">
            <?php if (isset($instance['copyright']) && !empty($instance['copyright'])) : ?>
                <div class="copyright__year"><?php echo $instance['copyright'] ?></div>
            <?php endif; ?>
        </div>
        <div class="copyright__right">
            <div class="copyright__find-us">Find us on:</div>
            <div class="copyright__find-us">
                <?php if (isset($instance['upwork']) && !empty($instance['upwork'])) : ?>
                    <?php echo $instance['upwork'] ?>
                <?php endif; ?>
            </div>
            <div class="copyright__find-us">
                <?php if (isset($instance['upwork']) && !empty($instance['upwork'])) : ?>
                    <?php echo $instance['clutch'] ?>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }

// Widget Backend
    public function form( $instance ) {

        if ( isset( $instance[ 'copyright' ] ) && !empty($instance[ 'copyright' ]) ) {
            $copyright = $instance[ 'copyright' ];
        }
        else {
            $copyright = 'copyright goes here';
        }

        if ( isset( $instance[ 'upwork' ] ) && !empty($instance[ 'upwork' ]) ) {
            $upwork = $instance[ 'upwork' ];
        }
        else {
            $upwork = 'Upwork HTML code here';
        }

        if ( isset( $instance[ 'clutch' ] ) && !empty($instance[ 'clutch' ]) ) {
            $clutch = $instance[ 'clutch' ];
        }
        else {
            $clutch = 'Clutch HTML code here';
        }


// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'copyright' ); ?>"><?php _e( 'Copyright:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'copyright' ); ?>" name="<?php echo $this->get_field_name( 'copyright' ); ?>" type="text" value="<?php echo esc_attr( $copyright ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'upwork' ); ?>"><?php _e( 'Upwork:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'upwork' ); ?>" name="<?php echo $this->get_field_name( 'upwork' ); ?>" type="text" value="<?php echo $upwork ?>" > <?php echo esc_attr($upwork) ?> </textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'clutch' ); ?>"><?php _e( 'Clutch:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'clutch' ); ?>" name="<?php echo $this->get_field_name( 'clutch' ); ?>" type="text" value="<?php echo $clutch ?>" ><?php echo esc_attr($clutch) ?></textarea>
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['copyright'] = ( ! empty( $new_instance['copyright'] ) ) ? $new_instance['copyright'] : '';
        $instance['upwork'] = ( ! empty( $new_instance['upwork'] ) ) ? $new_instance['upwork'] : '';
        $instance['clutch'] = ( ! empty( $new_instance['clutch'] ) ) ? $new_instance['clutch'] : '';
        return $instance;
    }
} // Class Soshace_links_widget ends here

function get_GA_and_YM() { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41768565-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-41768565-2');
	</script>
	<!-- END OF Global site tag (gtag.js) - Google Analytics -->
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	(function (d, w, c) {
	(w[c] = w[c] || []).push(function() {
	try {
	w.yaCounter38958185 = new Ya.Metrika({
	id:38958185,
	clickmap:true,
	trackLinks:true,
	accurateTrackBounce:true
	});
	} catch(e) { }
	});

	    var n = d.getElementsByTagName("script")[0],
	        s = d.createElement("script"),
	        f = function () { n.parentNode.insertBefore(s, n); };
	    s.type = "text/javascript";
	    s.async = true;
	    s.src = "https://mc.yandex.ru/metrika/watch.js";

	    if (w.opera == "[object Opera]") {
	        d.addEventListener("DOMContentLoaded", f, false);
	    } else { f(); }
	})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/38958185" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
<?php 
} 

function get_custom_user_photo($user_id) {
    $ambient_user_url = get_template_directory_uri() . '/img/ambient_user.png';
    
	if (function_exists('get_cupp_meta')) {
    
	    $img_url = get_cupp_meta($user_id, 'thumbnail');
    
	    if (empty($img_url)) {
    
	        $img_url = $ambient_user_url;
    
	    }
    
	}
    
	return $img_url;
}

function get_disqus_block($pll_current_language) {

    if ($pll_current_language == 'en') {
        $src = 'https://blog-soshace.disqus.com/embed.js';
    }

    if ($pll_current_language == 'ru') {
        $src = 'https://blog-soshace-com-ru.disqus.com/embed.js';
    }

    ?>
    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

        var disqus_config = function () {
            this.page.url = "<?php echo get_permalink() ?>"; // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "<?php echo get_the_ID() ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            this.language = "<?php echo $pll_current_language ?>";
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '<?php echo $src ?>';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();

    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


<?php
}

