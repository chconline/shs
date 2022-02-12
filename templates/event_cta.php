<div class="event-cta">
	<div class="voc-container">
		<div class="center">
			<?php $header_image = get_sub_field( 'header_image' ); ?>
			<?php if ( $header_image ) : ?>
				<img src="<?php echo esc_url( $header_image['url'] ); ?>" alt="<?php echo esc_attr( $header_image['alt'] ); ?>" />
			<?php endif; ?>
		</div>

		<h2><?php the_sub_field( 'event_details' ); ?></h2>
		<p class="cta"><?php the_sub_field('sub-heading'); ?></p>
		<p class="sub-heading"><?php the_sub_field( 'text' ); ?></p>

		<?php if (get_sub_field('ctas')) {
			$ctaCount = count(get_sub_field('ctas'));
		} ?>

		<?php if ( have_rows( 'ctas' ) ) : ?>
			<div class="display-grid<?= $ctaCount; ?>">
				<?php while ( have_rows( 'ctas' ) ) : the_row(); ?>
					<div class="cta-container">
						<div class="center">
							<?php $icon = get_sub_field( 'icon' ); ?>
							<?php if ( $icon ) : ?>
								<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
							<?php endif; ?>
						</div>

						<h6><?php the_sub_field( 'heading' ); ?></h6>
						<p><?php the_sub_field( 'sub-heading' ); ?></p>
						<div class="button-wrapper">
							<?php $button = get_sub_field( 'button' ); ?>
							<?php if ( $button ) : ?>
								<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo $button['title']; ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

		<p class="bottom-text"><?php the_sub_field( 'bottom_text' ); ?></p>
	</div>
</div>