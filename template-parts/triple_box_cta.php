<div id="triple-box-cta">
	<?php if ( have_rows( 'triple_box_cta-boxes' ) ) : ?>
		<div class="display-grid3">
			<?php while ( have_rows( 'triple_box_cta-boxes' ) ) : the_row(); ?>
				<div class="triple-box-container">
					<div class="triple-box">
						<div class="triple-box-graphic-container">
							<?php if (get_sub_field('graphic_type')): ?>
								<div class="youtube-player" data-id="<?php the_sub_field( 'video_id' ); ?>"></div>
							<?php else: ?>
								<?php $image = get_sub_field( 'image' ); ?>
								<div class="triple-box-graphic-image" style="background-image: url(<?php echo $image['url']; ?>)"></div>
							<?php endif; ?>
						</div>
						<div class="triple-box-text-container">
							<div class="triple-box-heading"><?php the_sub_field( 'heading' ); ?></div>
							<div class="triple-box-sub-heading"><?php the_sub_field( 'sub-heading' ); ?></div>
							<?php $button = get_sub_field( 'button' ); ?>
							<?php if ( $button ) { ?>
								<a class="<?php the_sub_field( 'button_style' ); ?>" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>