<div class="f-sponsors clearfix">
	<div class="featured-sponsor-container">
		<div class="lined-heading lined-heading-white">
			<span><?php the_sub_field( 'heading' ); ?></span>
		</div>
		
		<?php $fsCount = count(get_sub_field('sponsors')); ?>

		<?php if ( have_rows( 'sponsors' ) ) : ?>
			<?php if ($fsCount <= 4): ?>
				<div class="fs-wrapper display-grid2">
					<?php while ( have_rows( 'sponsors' ) ) : the_row(); ?>
						<?php $fs_sponsor_image = get_sub_field( 'fs-sponsor_image' ); ?>
						<?php if ( $fs_sponsor_image ) { ?>
							<div class="fs-single-wrapper">
								<?php $link = get_sub_field( 'link' ); ?>
								<?php if ( $link ) { ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><?php } ?>
									<div class="fs-single" style="background-image: url(<?php echo $fs_sponsor_image['url']; ?>);" role="img" aria-label="<?php echo $fs_sponsor_image['alt']; ?>"></div>
								<?php if ( $link ) { ?></a><?php } ?>
							</div>
						<?php } ?>
					<?php endwhile; ?>
				</div>
			<?php elseif ($fsCount > 4): ?>
				<div class="featured-sponsors-slider">
					<?php while ( have_rows( 'sponsors' ) ) : the_row(); ?>
						<?php $fs_sponsor_image = get_sub_field( 'fs-sponsor_image' ); ?>
						<?php if ( $fs_sponsor_image ) { ?>
							<div class="fs-single-wrapper">
								<?php $link = get_sub_field( 'link' ); ?>
								<?php if ( $link ) { ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><?php } ?>
									<div class="fs-single" style="background-image: url(<?php echo $fs_sponsor_image['url']; ?>);" role="img" aria-label="<?php echo $fs_sponsor_image['alt']; ?>"></div>
								<?php if ( $link ) { ?></a><?php } ?>
							</div>
						<?php } ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php $link = get_sub_field( 'link' ); ?>
		<?php if ( $link ) { ?>
			<div class="featured-sponsor-link">
				<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
			</div>
		<?php } ?>
		
	</div>
</div>