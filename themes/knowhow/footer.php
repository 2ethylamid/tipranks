<!-- #footer-widgets -->
<?php if ( is_active_sidebar( 'st_footer_widgets' )) { ?>
<div id="footer-widgets" class="clearfix">
<!-- .ht-container -->
<div class="ht-container">

<div class="row stacked"><?php dynamic_sidebar( 'st_footer_widgets' ); ?></div>

</div>
</div>
<?php } ?>
<!-- /#footer-widgets -->

<!-- #sendpulse-popup -->

<div id="sendpulse-popup" class="fixed-bottom">
    <img src="<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif" id="gif-spinner">
    <button class="close-cross" id="close-cross"><i class="fas fa-times"></i></button>
	<div class="row dt-sendpulse-popup-text" id="dt-sendpulse-popup-first">
        <div class="col msg-box announcement-container">
            <strong class="mtop6-block"><img src="<?php echo get_template_directory_uri() ?>/images/telegram-icon.png" id="telegram-icon">Never miss a story from Soshace</strong>
        </div>
        <div class="col btn-box">
            <button type="button" class="btn btn-warning" id="toggle-contact-box">GET UPDATES!</button>
        </div>
	</div>
    <div class="row">
        <div class="col">
            <div id="dt-sendpulse-ajax-result" class="add-margin-top-bottom"></div>
            <button type="button" class="btn btn-success float-right" id="dt-sendpulse-ajax-result-close">Close</button>
            <form id="dt-sendpulse-subscribe-form" novalidate>
                <div class="form-row add-margin-top-bottom">
                    <div class="form-close-icon"><i class="far fa-times-circle close-cross"></i></div>
                    <div class="col required-field-block">
                        <input id="sendpulsePopUpName" type="text" class="form-control" placeholder="Your Name" name="name" required="required">
                        <div class="good-feedback" id="sendPulseNameCorrect">
                            Looks good!
                        </div>
                        <div class="bad-feedback" id="sendPulseNameIncorrect">
                            Please enter correct name
                        </div>
                    </div>
                    <div class="col required-field-block">
                        <input id="sendpulsePopUpEmail" type="email" class="form-control" placeholder="email@example.com" name="email" required="required">
                        <div class="bad-feedback" id="sendPulseEmailIncorrect">
                            Please enter correct email
                        </div>
                        <div class="good-feedback" id="sendPulseEmailCorrect">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row add-margin-top-bottom">
                    <div class="col last-col">
                        <div class="dt-form-agree-terms">
                            <input type="checkbox" class="form-check-input" id="terms_check" name="terms_and_cond" required="required">
                            <label class="form-check-label" for="exampleCheck1">I agree with <a target=_new href="<?php echo get_site_url().'/soshace-privacy-policy/' ?>">Privacy Policy</a></label>
                            <div class="bad-feedback" id="sendPulseTermsIncorrect">
                                Please confirm to subscribe!
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-warning float-right" id="dt-sendpulse-submit">Subscribe!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /#sendpulse-popup -->

<!-- #site-footer -->
<footer id="site-footer" class="clearfix" role="contentinfo">
<div class="ht-container">

  <?php if ( has_nav_menu( 'footer-nav' ) ) { /* if menu location 'footer-nav' exists then use custom menu */ ?>
  <nav id="footer-nav" role="navigation">
    <?php wp_nav_menu( array('theme_location' => 'footer-nav', 'depth' => 1, 'container' => false, 'menu_class' => 'nav-footer clearfix' )); ?>
  </nav>
  <?php } ?>

  <div class="sc">
    <?php
//      $argsSetfront = array(
//        'post_type' => 'setfront',
//        'paged' => $setfront
//      );
//      query_posts($argsSetfront);


//      if (have_posts()) :
//
//        while (have_posts()) : the_post();
        $facebook = get_field( "facebook", 1106 );
        $twitter = get_field( "twitter", 1106 );
        $linkedin = get_field( "linkedin", 1106 );
        $instagram = get_field( "instagram", 1106 );
        $github = get_field( "github", 1106 );
        $upwork = get_field( "upwork", 1106 );
        $clutch = get_field( "clutch", 1106 );
        $google_plus = get_field( "google_plus", 1106 );

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

	<small id="copyright">
		<?php if (of_get_option('st_footer_copyright')) { ?>
		<?php echo of_get_option('st_footer_copyright'); ?>
		<?php } ?>
	</small>
</div>
<!-- /.ht-container -->
</footer>
<!-- /#site-footer -->

<!-- /#site-container -->
</div>

    <?php wp_footer(); ?>
</body>
</html>