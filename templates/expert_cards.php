<div class="expert-cards">
	<div class="voc-container">
		<?php $cardCount = count(get_sub_field('cards')); ?>
		<?php if ( have_rows( 'cards' ) ) : ?>
			<div class="display-grid<?= $cardCount; ?>">
				<?php while ( have_rows( 'cards' ) ) : the_row(); ?>
					<div>
						<?php $link = get_sub_field('link'); ?>

						<?php if ($link): ?>
							<a href="<?= $link; ?>" target="_blank">
						<?php endif; ?>
								<div class="expert-card">
									<h6><?php the_sub_field( 'heading' ); ?></h6>

									<?php $image = get_sub_field( 'image' ); ?>
									<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />

									<p><?php the_sub_field( 'name' ); ?></p>
								</div>
						<?php if ($link): ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>