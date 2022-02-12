<div class="logo-grid">
	<div class="voc-container">
		<div class="grid-wrapper">
			<div class="lined-heading">
				<span><?php the_sub_field( 'heading' ); ?></span>
			</div>

			<?php $columns = get_sub_field( 'columns' ); ?>
			<?php if ( have_rows( 'logos' ) ) : ?>
				<div class="display-grid<?= $columns; ?> logo-grid-container">
					<?php while ( have_rows( 'logos' ) ) : the_row(); ?>
						<?php $link = get_sub_field('link'); ?>
						<?php $logo = get_sub_field( 'logo' ); ?>

						<div>
							<?php if ($link): ?>
								<a href="<?= $link; ?>">
							<?php endif; ?>
								<?php if ( $logo ) : ?>
									<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
								<?php endif; ?>
							<?php if ($link): ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>