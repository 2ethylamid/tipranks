<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie8" lang="ru" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9 ]> <html class="ie9" lang="ru" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ru" prefix="og: http://ogp.me/ns#"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>
    <?php wp_head(); ?>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <title><?php wp_title(); ?> &bull; <?php bloginfo('name'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700&amp;subset=cyrillic" rel="stylesheet">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/css/external.css?ver=0.1.5.3" rel="stylesheet">
	<link href="<?php echo get_bloginfo('template_directory'); ?>/css/internal.css?ver=0.1.6.4" rel="stylesheet">
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css?ver=0.1.6.1" rel="stylesheet">
	
	

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
    
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/external.js" type="text/javascript"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/internal.js?ver=0.1.5.7" type="text/javascript"></script>

    <!--[if lte IE 8]>
        <script src="js/html5shiv/html5shiv.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body>
    <div class="wrap">
        <header class="header">
			<?php //get_main_site_burger_menu() ?>
            <div class="container-fluid">
                <div class="logo">
                    <a href="<?php echo get_site_url() ?>">
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/img/logo_new.svg" alt="<?php echo get_bloginfo() ?>">
                        <span class="logo_blog">Blog</span>
                    </a>
                </div>
                <div class="pull-left">
                    <div class="btn_menu">
                        <div class="header__menu-button-item"></div>
                        <div class="header__menu-button-item"></div>
                        <div class="header__menu-button-item"></div>
                    </div>
                    <div class="burger_menu">
                        <div class="menu__container">
                            <a class="_logo _menu__logo" href="http://soshace.com/"></a>
                            <nav class="menu__links">
                                <a class="_menu__item" href="https://soshace.com/for-developers">For Developers</a>
                                <a class="_menu__item" href="https://soshace.com/for-clients">For Clients</a>
                                <a class="_menu__item" href="https://soshace.com/developers">Developers</a>
                                <a class="_menu__item" href="https://soshace.com/jobs">Jobs</a>
                                <a class="_menu__item" href="https://soshace.com/portfolio">Portfolio</a>
                                <a class="_menu__item" href="https://soshace.com/reviews">Reviews</a>
                                <a class="_menu__item" href="https://soshace.com/technologies">Technologies</a>
                                <a class="_menu__item" href="https://soshace.com/aboutus">About Us</a>
                                <a class="_menu__item" href="https://blog.soshace.com/en/">Blog</a>
                                <a class="_menu__item" href="https://soshace.com/contacts">Contacts</a>
                            </nav>
                            <div class="menu__socials-container">
                                <a class="socials__ite menu__socials_item--fb" href="https://www.facebook.com/soshace" onclick="javascript:window.open('https://www.facebook.com/soshace'); return false;"></a>
                                <a class="socials__ite menu__socials_item--linkedin" href="https://www.linkedin.com/company/soshace" onclick="javascript:window.open('https://www.linkedin.com/company/soshace'); return false;"></a>
                                <a class="socials__ite menu__socials_item--twitter" href="https://twitter.com/hisoshace" onclick="javascript:window.open('https://twitter.com/hisoshace'); return false;"></a>
                            </div>
                        </div>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="https://soshace.com/jobs">JOBS</a></li>
						    <li><a href="https://soshace.com/developers">DEVELOPERS</a></li>
                            <li><a href="http://blog.soshace.com/en/" class="menu_active">BLOG</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pull-right">
                    <span class="btn_search"></span>
                    <a href="#" class="btn btn_small m0 tablet-lg_no" id="get_in_touch">get in touch</a>
                </div>
        
                <form action="<?php echo get_site_url() ?>" method="get" class="search_form" id="search_form">
                    <input type="text" class="input_search" name="s" value="" placeholder="What are you looking for?">
                    <button class="btn_search" type="submit" form="search_form"></button>
                </form>
        
            </div>
        </header>
