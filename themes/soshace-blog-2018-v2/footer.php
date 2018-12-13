        <footer class="footer">
            <div class="container">
                <div class="footer__wrapper">
                    <div class="contact-sitemap">
                        <div class="contact-column">
                            <?php if ( dynamic_sidebar('contacts_footer_area') ) : else : endif; ?>
                        </div>
                        <div class="sitemap-column">
                            <div class="sitemap">
                                <?php if ( dynamic_sidebar('links_footer_area') ) : else : endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <?php if ( dynamic_sidebar('copyright_footer_area') ) : else : endif; ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- Get In Touch Button feedback -->
    <div id="feedback_container">
        <section class="feedback" id="feedback">
            <div class="close-cross" id="feedback-close-cross"></div>
            <div class="container">
                <h3 class="title_block text-c">Feedback Form</h3>
                <!-- h3 class="title_block text-c">Post a job</h3 -->
                <!-- p class="text-c" id="CTA_announcement">Submit your request, and we will offer the best professional for your needs.</p -->
                <p class="text-c" id="CTA_announcement">Submit your request, and we will negotiate your project details: offer solutions, calculate the cost and specify the deadline.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
                        <img src="<?php echo get_template_directory_uri() ?>/img/ajax-loader.gif" id="gif-spinner" class="gif-spinner">
                        <div class="ajax-result"></div>
                        <div class="text-c mt60 ajax-result-button-div">
                            <button class="btn m0" id="ajax-result-close">Close</button>
                        </div>
                        <form id="dt-feedback-form" novalidate>
                            <div class="form_frame">
                                <div class="required_form_field">
                                    <input type="text" class="input_form" name="name" placeholder="Name" id="feedbackName">
                                    <div class="tooltip bad-feedback" id="feedbackNameIncorrect">
                                        Please enter correct name
                                    </div>
                                    <div class="tooltip good-feedback" id="feedbackNameCorrect">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="required_form_field">
                                    <input type="text" class="input_form" name="email" value="" placeholder="E-mail" id="feedbackEmail">
                                    <div class="tooltip bad-feedback" id="feedbackEmailIncorrect">
                                        Please enter correct email
                                    </div>
                                    <div class="tooltip good-feedback" id="feedbackEmailCorrect">
                                        Looks good!
                                    </div>
                                </div>
                                <textarea class="area_form" placeholder="Message" id="feedbackComment" name="comment"></textarea>
                                <div class="row">
                                    <input type="checkbox" name="terms_and_cond" id="feedback_terms_check" required="required">
                                    <label id="feedback_terms_label" class="form-check-label" for="feedback_terms_check" style="margin-left: 10px;">I agree with <a target="_new" href="/soshace-privacy-policy/">Privacy Policy</a></label>
                                    <div class="tooltip bad-feedback" id="feedbackTermsIncorrect">
                                        Please confirm that you agree
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="checkbox" class="form-check-input fix" id="choose_list" name="choose_list" value="company">
                                    <label class="book_id-label" for="choose_list" style="margin-left: 10px;">Subscribe me to the newsletter.</label>
                                </div>
                                <input type="hidden" name="feedback_form" value="true">
                                <label class="file_upload">
                                    <span class="button">Upload</span>
                                    <mark>max 10Mb</mark>
                                    <input type="file" name="file">
                                </label>
                            </div>
                            <div class="text-c mt60">
                                <button class="btn m0" id="feedback_submit" type="submit" form="dt-feedback-form">Discuss a Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /end of Get In Touch Button - feedback -->




        <!-- #sendpulse-popup -->

    <div id="sendpulse-popup" class="fixed-bottom">
        <img src="https://blog.soshace.com/wp-content/themes/knowhow/images/ajax-loader.gif" id="gif-spinner">
        <div class="row dt-sendpulse-popup-text" id="dt-sendpulse-popup-first">
            <button class="close-cross" id="close-cross"></button>
            <div class="col msg-box announcement-container">
                <strong class="mtop6-block"><img src="https://blog.soshace.com/wp-content/themes/knowhow/images/telegram-icon.png" id="telegram-icon">Never miss a story from Soshace</strong>
            </div>
            <div class="col btn-box">
                <button type="button" class="btn btn-warning" id="toggle-contact-box">GET UPDATES!</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="dt-sendpulse-ajax-result" class="add-margin-top-bottom"></div>
                <button type="button" class="btn btn-success float-right" id="dt-sendpulse-ajax-result-close">Close</button>
                <form id="dt-sendpulse-subscribe-form" novalidate="">
                    <div class="form-row add-margin-top-bottom">
                        <div class="form-close-icon close-cross"></div>
                        <div class="col required-field-block">
                            <input id="popupName" class="form-control" placeholder="Your Name" name="name" required="required" type="text">
                            <div class="good-feedback" id="popupNameCorrect">
                                Looks good!
                            </div>
                            <div class="bad-feedback" id="popupNameIncorrect">
                                Please enter correct name
                            </div>
                        </div>
                        <div class="col required-field-block">
                            <input id="popupEmail" class="form-control" placeholder="email@example.com" name="email" required="required" type="email">
                            <div class="bad-feedback" id="popupEmailIncorrect">
                                Please enter correct email
                            </div>
                            <div class="good-feedback" id="popupEmailCorrect">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row add-margin-top-bottom">
                        <div class="col last-col">
                            <div class="dt-form-agree-terms">
                                <input class="form-check-input" id="popup_terms_check" name="terms_and_cond" required="required" type="checkbox">
                                <label class="form-check-label" for="popup_terms_check">I agree with <a target="_new" href="https://blog.soshace.com/soshace-privacy-policy/">Privacy Policy</a></label>
                                <div class="bad-feedback" id="popupTermsIncorrect">
                                    Please confirm to subscribe!
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-warning float-right" id="dt-sendpulse-submit">Subscribe!</button>
                        </div>
                    </div>
                    <input type="hidden" name="bottom_popup_subscribe" value="true">
                </form>
            </div>
        </div>
    </div>

<!-- /#sendpulse-popup -->
	<?php //if (WP_ENV == 'production') : ?>
		<?php get_GA_and_YM() ?>
	<?php //endif ?>
	
<?php wp_footer(); ?>

<script id="dsq-count-scr" src="//blog-soshace.disqus.com/count.js" async></script>
</body>
</html>
