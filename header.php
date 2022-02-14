<?php
/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Responsive Child
 * @author         Gerard Greenidge
 * @copyright      2015 EDUNOW
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive-child/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="facebook-domain-verification" content="d9s25osb919gbw92tfa77fyu5r9rfc" />
		<title><?php wp_title( '&#124;', true, 'right' ); ?></title>

		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,400,700,600,800' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
		
		<?php wp_head(); ?>
		
		<link rel="SHORTCUT ICON" href="https://sandhillschool.org/favicon.ico" />
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-18813551-2', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
	
	<body <?php body_class(); ?>>
		<?php responsive_container();?>
		<div id="container" class="hfeed">

		<?php responsive_header();?>
			<div class="skip-container cf">
				<div id="colophon-widget" class="col-940">
					<div class="colophon-widget widget-wrapper widget_text">
						<a class="skip-link screen-reader-text focusable" href="#main"><?php _e( '&darr; Skip to Main Content', 'responsive' ); ?></a>

						<a href="/visit/">
							<p class="announcement-line1">Join us for a Virtual Parent Tour!</p>
							<p class="announcement-line2">Personalized learning, Summer & More</p>
						</a>
					</div>
				</div>

				<div class="viewport-container">
					<a class="skip-link screen-reader-text focusable" href="#content"><?php _e( '&darr; Skip to Main Content', 'responsive' ); ?></a>

					<form method="get" id="searchform" action="https://www.sandhillschool.org/">
						<a href="/parents/parent-login/" id="parent-login-button">Parent Login</a> 
						<a href="https://www.facebook.com/sandhillschoolatchc">
							<img src="/wp-content/uploads/2020/06/icon-facebook-navy.svg" class="nav-social-icon" id="social-icon-facebook" />
						</a>
						<a href="https://twitter.com/CHC_paloalto">
							<img src="/wp-content/uploads/2020/06/icon-twitter-navy.svg" class="nav-social-icon" id="social-icon-twitter" />
						</a>
						<a href="https://www.youtube.com/user/chconlinepaloalto"
						   ><img src="/wp-content/uploads/2020/06/icon-youtube-navy.svg" class="nav-social-icon" id="social-icon-youtube"/>
						</a>

						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" class="field" name="s" id="s" placeholder="Search Sand Hill " />
						<button class="submit" name="submit" id="searchsubmit" value="" />
					</form>
				</div>
			</div>
			<div id="header">
				<div class="viewport-container">
					<?php responsive_header_top();?>
					<?php responsive_in_header();?>

					<?php wp_nav_menu( array(
						'container'       => 'div',
						'container_class' => 'main-nav',
						'fallback_cb'     => 'responsive_fallback_menu',
						'theme_location'  => 'header-menu'
					) ); ?>

					<div class="logo-container">
						<div id="logo">
							<a href="<?php echo home_url( '/' ); ?>">
								<img src="/wp-content/uploads/2020/06/sand-hill-school-tagline-logo_learning-differences_silicon-valley.svg" alt="<?php bloginfo( 'name' ); ?>"/>
							</a>
						</div>

						<a href="/parents/parent-login/" id="parent-login-button" class="mobile-parent-login-button">Parent Login</a> 

						<div id="logo_mobile">
							<a href="<?php echo home_url( '/' ); ?>">
								<img src="/wp-content/uploads/2020/06/sand-hill-school-tagline-logo_learning-differences_silicon-valley-MOBILE.svg" alt="<?php bloginfo( 'name' ); ?>"/>
							</a>
						</div>
						<?php get_sidebar( 'top' ); ?>
					</div>

					<?php responsive_header_bottom();?>
				</div>
			</div>

			<?php responsive_header_end();?>

			<?php get_sidebar( 'subnav' ); ?>

			<?php responsive_wrapper();?>

			<div id="wrapper" class="clearfix">
				<?php if (!is_front_page()): ?>
					<div class="viewport-container">
					<?php responsive_wrapper_top();?>
				<?php endif; ?>

				<?php responsive_in_wrapper();?>