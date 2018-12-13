<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?= strtolower(get_bloginfo('charset', 'display')); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- #site-container -->
<div id="site-container" class="clearfix">

  <div class="social">
  	<div class="ht-container">
        <?php
//					$argsSetfront = array(
//						'post_type' => 'setfront',
//						'paged' => $setfront
//					);
//					query_posts($argsSetfront);
//
//
//					if (have_posts()) :
//
//						while (have_posts()) : the_post();
						$facebook = get_field( "facebook", 1106 );
						$twitter = get_field( "twitter", 1106 );
						$linkedin = get_field( "linkedin", 1106 );
						$instagram = get_field( "instagram", 1106 );
						$github = get_field( "github", 1106 );
						$upwork = get_field( "upwork", 1106 );
						$clutch = get_field( "clutch", 1106 );
						$google_plus = get_field( "google_plus", 1106 );
						$email = get_field( "email", 1106 );
						$skype = get_field( "skype", 1106 );
						$link = get_field( "link", 1106 );
            ?>

            <div class="sc">
            <?php
            if ($facebook != '') { ?>
              <a class="fa fa-facebook" href="<?php echo $facebook ?>" target="blank"></a>
            <?php }
            if ($twitter != '') { ?>
              <a class="fa fa-twitter" href="<?php echo $twitter ?>" target="blank"></a>
            <?php }
            if ($linkedin != '') { ?>
              <a class="fa fa-linkedin" href="<?php echo $linkedin ?>" target="blank"></a>
            <?php }
            if ($instagram != '') { ?>
              <a class="fa fa-instagram" href="<?php echo $instagram ?>" target="blank"></a>
            <?php }
            if ($github != '') { ?>
              <a class="fa fa-github" href="<?php echo $github ?>" target="blank"></a>
            <?php }
            if ($upwork != '') { ?>
              <a class="svg fa-upwork" href="<?php echo $upwork ?>" target="blank"></a>
            <?php }
            if ($clutch != '') { ?>
              <a class="svg fa-clutch" href="<?php echo $clutch ?>" target="blank"></a>
            <?php }
            if ($google_plus != '') { ?>
              <a class="fa fa-google-plus" href="<?php echo $google_plus ?>" target="blank"></a>
						<?php
              }
            ?>
            </div>
            <div class="contact">
              <?php
              if ($email != ''){
              ?>
                <span class="email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span>
              <?php }
              if ($skype != '') {
              ?>
                <span class="skype"><i class="fa fa-skype"></i><a href="skype:<?php echo $skype ?>"><?php echo $skype ?></a></span>
              <?php }
              if ($link != '') {
              ?>
                <span class="landing"><i class="fa fa-link"></i><a href="http://<?php echo $link ?>"><?php echo $link ?></a></span>
              <?php } ?>
            </div>
            <?php
//						endwhile;
//						wp_reset_query();
//					endif;
					?>
  	</div>
  </div>

<?php if ( has_nav_menu( 'primary-nav' ) ) : ?>
<!-- #primary-nav-mobile -->
<nav id="primary-nav-mobile">
<a class="menu-toggle clearfix" href="#"><i class="fa fa-reorder"></i></a>
<?php wp_nav_menu( array('theme_location' => 'primary-nav', 'container' => false, 'menu_class' => 'clearfix', 'menu_id' => 'mobile-menu', )); ?>
</nav>
<!-- /#primary-nav-mobile -->
<?php endif; ?>

<!-- #header -->
