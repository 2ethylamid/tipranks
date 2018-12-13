<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie8" lang="ru" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9 ]> <html class="ie9" lang="ru" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ru" prefix="og: http://ogp.me/ns#"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->
    <title></title>
	
	<?php wp_head(); ?>

    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/external.js" type="text/javascript"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/internal.js" type="text/javascript"></script>

    <!--[if lte IE 8]>
        <script src="js/html5shiv/html5shiv.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body>
    <div class="wrap">
        <header class="header">
            <div class="container-fluid">
       
                <div class="logo">
                    <a href="<?php echo get_site_url() ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png" alt=""></a>
                </div>
        
                <div class="pull-left">
                    <div class="btn_menu">
                        <span class="btn_menu_frame"></span>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="https://soshace.com/developers">developers</a></li>
                            <li><a href="https://soshace.com/portfolio">Portfolio</a></li>
                            <li><a href="http://blog.soshace.com/en/">Blog</a></li>
                        </ul>
                    </div>
                </div>
        
                <div class="pull-right">
                    <span class="btn_search"></span>            
                    <a href="#" class="btn btn_small m0 tablet-lg_no">get in touch</a>
                </div>
        
                <form action="<?php echo get_site_url() ?>" method="get" class="search_form" id="search_form">
                    <input type="text" class="input_search" name="s" value="" placeholder="What are you looking for?">
                    <button class="btn_search" type="submit" form="search_form"></button>
                </form>
        
            </div>
        </header>