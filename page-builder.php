<?php
// Template Name: Page Builder
get_header(); ?>

<?php $page_header = get_field( 'page_header' ); ?>
<?php $page_header_mobile = get_field( 'page_header_mobile' ); ?>
<?php $page_header_link = get_field('page_header_link'); ?>

<?php if ($page_header_link): ?>
	<a href="<?= $page_header_link; ?>">
<?php endif; ?>
	<?php if ($page_header || $page_header_mobile): ?>
		<?php if ( $page_header ) { ?>
			<div class="mobile-display-none">
				<img src="<?php echo $page_header['url']; ?>" alt="<?php echo $page_header['alt']; ?>" />
			</div>
		<?php } ?>

		<?php if ( $page_header_mobile ) { ?>
			<div class="desktop-display-none tablet-display-none">
				<img src="<?php echo $page_header_mobile['url']; ?>" alt="<?php echo $page_header_mobile['alt']; ?>" />
			</div>
		<?php } ?>
	<?php endif; ?>
<?php if ($page_header_link): ?>
	</a>
<?php endif; ?>

<?php $menu = get_field('menu'); ?>
<?php $menuClasses = get_field('menu_classes') ?>

<?php if ($menu): ?>
	<div id="secondary-menu" class="menu-wrapper <?= $menuClasses; ?>">
		<?php wp_nav_menu( array(
			'menu' => $menu,
			'container'  => 'div',
			'fallback_cb' => false,
		)); ?>
	</div>

	<!-- Golden Mobile Menu -->
	<div id="secondary_menu_wrapper_parented_mobile" class="parented-menu-orange careers-hamburger-blue mobile-parented-menu-orange-large">
		<div class="js-mobile-menu">
			<button class="hamburger" id="hamburger-2">
			  <span class="line"></span>
			  <span class="line"></span>
			  <span class="line"></span>
			</button>
		</div>
		<div class="secondary_menu">
			<?php wp_nav_menu(
				array(
					'menu' 			 => $menu,
					'container'      => 'div',
					'fallback_cb'    => false,
					'menu_class'     => 'parented-menu parented-menu-orange careers-hamburger'
				)); ?>
		</div>
	</div>
<?php endif; ?>


<?php if ( get_field( 'social_share' )): ?>
	<div class="social-share-container">
		<div>
			<?php $uri = '/stingrays/'; ?>

			<a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=https://www.sandhillschool.org<?= $uri; ?>" aria-label="facebook share icon" target="_blank">
				<i class="fab fa-facebook-square"></i>
			</a>

			<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=https://www.sandhillschool.org<?= $uri; ?>&title=" aria-label="twitter share icon" target="_blank">
				<i class="fab fa-twitter"></i>
			</a>

			<a href="https://www.linkedin.com/shareArticle?url=https://www.sandhillschool.org<?= $uri; ?>" aria-label="linkedin share icon" target="_blank">
				<i class="fab fa-linkedin"></i>
			</a>

			<a href="mailto:?subject=https://www.sandhillschool.org<?= $uri; ?>" aria-label="email share icon" target="_blank">
				<i class="fa fa-envelope"></i>
			</a>


		</div>
	</div>
<?php endif; ?>


<?php $flexibleContentPath = dirname(__FILE__) . '/templates/';
if ( have_rows( 'drag-and-drop' ) ) :
	while ( have_rows( 'drag-and-drop' ) ) :
		the_row();
		$layout = get_row_layout();
		$file = ( $flexibleContentPath . str_replace( '-', '_', $layout) . '.php' );
		if ( file_exists( $file ) ) {
			get_template_part('clones/styles');
				include( $file );
			echo '</div>';
		}
	endwhile;
endif;

get_footer();