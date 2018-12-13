        <section class="feedback">
            <div class="container">
                <h3 class="title_block text-c">Feedback Form</h3>
                <p class="text-c">Submit your request, and we will negotiate your project details: offer solutions, calculate the cost and specify the deadline.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
                        <form action="#">
                            <div class="form_frame">
                                <input type="text" class="input_form" placeholder="Name">
                                <input type="text" class="input_form" value="" placeholder="E-mail">
                                <textarea class="area_form" placeholder="Message"></textarea>
                                <label class="file_upload">
                                    <span class="button">Выбрать</span>
                                    <mark>max 10Mb</mark>
                                    <input type="file">
                                </label>
                            </div>
                            <div class="text-c mt60">
                                <button class="btn m0">Discuss a Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /feedback -->
        
        <section class="contacts">
            <div class="container">
                <h3 class="title_block text-c">Contacts</h3>
                <div class="row">
                    <div class="col-md-5 col-sm-6 col-md-offset-1">
                        <p class="mb30">Russia, Saint Petersburg, Bolshaya Monetnaya Street, 16, office 530, Business Center “Bolshaya Monetnaya, 16”</p>
                        <p>+ 7 (900) 600-78-20 — Saint Petersburg</p>
                        <p><a href="mailto:hello@soshace.com">hello@soshace.com</a></p>
                        <p>skype: <a href="skype:branikita">branikita</a></p>
                    </div>
                    <div class="col-md-5 col-sm-6 col-md-offset-1">
                        <div class="social">
                            <div class="social__item"><a href="https://www.facebook.com/soshace"><img src="<?php echo get_template_directory_uri() ?>/img/soc_facebook.png" alt=""></a></div>
                            <div class="social__item"><a href="https://www.linkedin.com/company/soshace"><img src="<?php echo get_template_directory_uri() ?>/img/soc_link.png" alt=""></a></div>
                            <div class="social__item"><a href="https://github.com/soshace"><img src="<?php echo get_template_directory_uri() ?>/img/soc_github.png" alt=""></a></div>
                            <div class="social__item"><a href="https://twitter.com/hisoshace"><img src="<?php echo get_template_directory_uri() ?>/img/soc_twitter.png" alt=""></a></div>
                            <div class="social__item"><a href="https://plus.google.com/100228434511699964309"><img src="<?php echo get_template_directory_uri() ?>/img/soc_google+.png" alt=""></a></div>
                            <div class="social__item"><a href="https://www.instagram.com/soshaceteam/"><img src="<?php echo get_template_directory_uri() ?>/img/soc_insta.png" alt=""></a></div>
                            <div class="social__item"><a href="https://www.youtube.com/channel/UCfsRJLF3BrA-xCFlYCGR7EA"><img src="<?php echo get_template_directory_uri() ?>/img/soc_youtube.png" alt=""></a></div>
                        </div>
                        <div class="nav">
                            <ul>
                                <li><a href="https://www.upwork.com/agencies/~0195981d091a50e50f">UpWork account</a></li>
                                <li><a href="#">Medium account</a></li>
                                <li><a href="http://blog.soshace.com/">blog.soshace.com</a></li>
                            </ul>
                        </div>
                        <div class="">
                            <a href="#" class="link_present">Presentation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /contacts -->
        
		<footer class="footer">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-11 col-md-offset-1">
		                <div class="menu">
		                    <ul>
		                        <li><a href="https://soshace.com/services">Service</a></li>
		                        <li><a href="https://soshace.com/technologies">Tehnologies</a></li>
		                        <li><a href="https://soshace.com/portfolio">Portfolio</a></li>
		                        <li><a href="https://soshace.com/aboutus">About us</a></li>
		                        <li><a href="#">History</a></li>
		                        <li><a href="#">Vacancies</a></li>
		                    </ul>
		                </div>
		                <div class="pull-right">
		                    <a href="#" class="btn btn_small m0">Discuss a Project</a>
		                </div>
		            </div>
		        </div>
		    </div>
		</footer>
    </div>

    <!-- #sendpulse-popup -->
    <div id="sendpulse-popup" class="fixed-bottom">
        <img src="<?php echo get_template_directory_uri() ?>/img/ajax-loader.gif" id="gif-spinner">
        <button id="close-cross"><i class="fas fa-times"></i></button>
        <div class="row dt-sendpulse-popup-text" id="dt-sendpulse-popup-first">
            <div class="col msg-box announcement-container">
                <strong class="mtop6-block"><img src="<?php echo get_template_directory_uri() ?>/img/telegram-icon.png" id="telegram-icon">Never miss a story from Soshace</strong>
            </div>
            <div class="col btn-box">
                <button type="button" class="btn btn-warning" id="toggle-contact-box">GET UPDATES!</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="dt-sendpulse-ajax-result" class="add-margin-top-bottom"></div>
                <button type="button" class="btn btn-success float-right" id="dt-sendpulse-ajax-result-close">Close</button>
                <form id="dt-sendpulse-subscribe-form" class="was-validated" novalidate>
                    <div class="form-row add-margin-top-bottom">
                        <div class="col required-field-block">
                            <input id="sendpulsePopUpName" type="text" class="form-control" placeholder="Your Name" name="name" required="required">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col required-field-block">
                            <input id="sendpulsePopUpEmail" type="email" class="form-control" placeholder="email@example.com" name="email" required="required">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row add-margin-top-bottom">
                        <div class="col">
                            <div class="dt-form-agree-terms">
                                <input type="checkbox" class="form-check-input" id="terms_check" name="terms_and_cond" required="required">
                                <label class="form-check-label" for="exampleCheck1">I agree with <a target=_new href="<?php echo get_site_url().'/soshace-privacy-policy/' ?>">Privacy Policy</a></label>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
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
<?php wp_footer(); ?>
</body>
</html>