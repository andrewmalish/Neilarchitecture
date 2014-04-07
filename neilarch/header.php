<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if IE ]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>



<link type="text/css"  rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.css" />
<link type="text/css"  rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.iosslider.js" type="text/javascript"></script>
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.src.js" type="text/javascript"></script>
<!--<script src="<?php echo get_template_directory_uri(); ?>/js/cload.js" type="text/javascript"></script>-->
  <script src="<?php echo get_template_directory_uri(); ?>/preloader/pace.js"></script>
  <link href="<?php echo get_template_directory_uri(); ?>/preloader/themes/pace-theme-barber-shop.css" rel="stylesheet" />

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class='logo'>
			<a class='logo_link' href='<?php bloginfo('url');?>'><h3 class='logo_img'><img id='logo-big' src="<?=get_bloginfo('template_url')?>/images/neil-architecture-big.png" /></h3></a><!--<object data="<?php //bloginfo('template_url'); ?>/images/neil-architecture.svg" type="image/svg+xml"></object>-->
		</div>
		
		
		
		<nav id="site-navigation" class="main-navigation <?php if(!is_front_page()) echo 'default';?>" role="navigation">
			<?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'menu' ) ); ?>
			<div class='contact-overflow'>
			</div>
			<div class='contact-window'>
				L1, 290 Bridge Road<BR />
				Richmond Victoria 3121 <BR />
				<a target='_blank' href='http://goo.gl/maps/uLjud'>Google map</a><BR />
				T 03 9427 9833<BR />
				<a href='mailto:&#111;&#102;&#102;&#105;&#099;&#101;&#064;&#110;&#101;&#105;&#108;&#097;&#114;&#099;&#104;&#105;&#116;&#101;&#099;&#116;&#117;&#114;&#101;&#046;&#099;&#111;&#109;&#046;&#097;&#117;'>&#111;&#102;&#102;&#105;&#099;&#101;&#064;&#110;&#101;&#105;&#108;&#097;&#114;&#099;&#104;&#105;&#116;&#101;&#099;&#116;&#117;&#114;&#101;&#046;&#099;&#111;&#109;&#046;&#097;&#117;</a>
			</div>
		</nav><!-- #site-navigation -->
		<script>
		
			jQuery(document).ready(function(){
				jQuery('.main-navigation .plus > a:first-child').toggle(
				
				function(){
					jQuery(this).text('/');
					jQuery(this).css('color','#78ab46');
					jQuery(this).next('ul.sub-menu').animate({height: "toggle"/*, opacity : "toggle"*/}, 200);
				},
				function(){
					jQuery(this).text('+');
					jQuery(this).css('color','#696969');
					jQuery(this).next('ul.sub-menu').animate({height: "toggle"/*,  opacity : "toggle"*/}, 200);
				}
				);
				
				jQuery('.show-contact').click(function(){
					jQuery('.contact-overflow').show();
					jQuery('.contact-window').show();
					jQuery(this).addClass(" current-menu-item ");
				});
				
				jQuery('.contact-overflow').click(function(){
					jQuery('.contact-overflow').hide();
					jQuery('.contact-window').hide();
					jQuery('.show-contact').removeClass(" current-menu-item ");
				});
				
				getMargin();
				jQuery(window).resize(function(){
					getMargin();
				});
				/*jQuery(".single-content-box").overscroll({
					scrollLeft: 200,
					scrollTop: 100
				});*/
				/*jQuery(".single-content-box").dragOn();*/
				jQuery(window).load(function(){
					height1 = jQuery(window).height();   // returns height of browser viewport
					height2 = jQuery('body').height();
					if (height1 > height2){
						jQuery('body').css('position','relative');
						jQuery('body').css('height',height1+'px');
						jQuery('#footer').css('position','absolute');
						jQuery('#footer').css('bottom','0');
						jQuery('#footer').css('left','0');
					}
				});
			});
			function getMargin(){
	
				width = jQuery(window).width();
				margin = (4 / width)*100;
				//*console.log(width);
				jQuery('.project-box').css({width:"0", marginBottom: '0', marginLeft: '0',marginRight:'0' });
				if (width > 1920){
					//console.log(' >1920');
					boxWidth = ((width - 32) / 6)*100/width;
					jQuery('.project-box').css({width: boxWidth+"%", marginBottom: '4px', marginLeft: margin+'%', });
					jQuery('.project-box').each(function(){
						if (jQuery(this).index % 6 == 0){
							jQuery(this).css('marginRight', margin+'%');
						}
					});
				}
				else if (width > 1224){
				//	console.log(' >1224');
					boxWidth = ((width - 24) / 5)*100/width;
					jQuery('.project-box').css({width: boxWidth+"%", marginBottom: '4px', marginLeft: margin+'%', });
					jQuery('.project-box').each(function(){
						if (jQuery(this).index % 5 == 0){
							jQuery(this).css('marginRight', margin+'%');
						}
					});
				}
				else if (width > 850){
				//	console.log(' >850');
					boxWidth = ((width - 16) / 3)*100/width;
					jQuery('.project-box').css({width: boxWidth+"%", marginBottom: '4px', marginLeft: margin+'%', });
					jQuery('.project-box').each(function(){
						if (jQuery(this).index % 3 == 0){
							jQuery(this).css('marginRight', margin+'%');
						}
					});
				}
				
				else if (width > 750){
				//	console.log(' >764');
					boxWidth = ((width-12) / 2)*100/width;
					jQuery('.project-box').css({width: boxWidth+"%", marginBottom: '4px', marginLeft: margin+'%', });
					jQuery('.project-box').each(function(){
						if (jQuery(this).index % 2 == 0){
							jQuery(this).css('marginRight', margin+'%');
						}
					});
				//	console.log(' margin: '+margin);
				}
			
				else {
				//	console.log(' last');
					boxWidth = (width - 8)*100/width;
					jQuery('.project-box').css({width: boxWidth+"%", marginBottom: '4px', marginLeft: margin+'%',marginRight: margin+'%' });
					
				}
			}
			

		</script>
	</header><!-- #masthead -->
	
	<div id="main" class="wrapper">