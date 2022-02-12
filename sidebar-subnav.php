<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Subnav Widget Template
 *
 *
 * @file           sidebar-subnav.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive-child/sidebar-subnav.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php
if( !is_active_sidebar( 'subnav-widget' )
) {
	return;
}
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="subnav-widget">
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'subnav-widget' ) ) : ?>

			<?php dynamic_sidebar( 'subnav-widget' ); ?>

		<?php endif; //end of subnav-widget ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #subnav-widget -->
<?php responsive_widgets_after(); // after widgets container hook ?>