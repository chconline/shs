<div class="sponsor-group">
	<div class="voc-container clearfix">
		<div class="sponsor-heading"><?php the_sub_field( 'heading' ); ?></div>

		<?php 
			$sponsorColumnCount = get_sub_field( 'column_count' ); 
			if ($sponsorColumnCount == 2) {
				$grid = 'col-md-6';
				$sponsorNumber = 0;
			} else {
				$grid = 'col-md-4';
				$sponsorNumber = 50;
			}
		?>
		
		<?php if ( have_rows( 'sponsors' ) ) : ?>
			<div id="masonry-sponsor-container<?= $sponsorColumnCount; ?>">
				<?php while ( have_rows( 'sponsors' ) ) : the_row(); ?>
					<div class="<?= $grid; ?> sg-single-wrapper">
						<div class="sg-single-container">
							<?php $link = get_sub_field( 'link' ); ?>
							<?php $sponsor_group_logo = get_sub_field( 'sponsor-group_logo' ); ?>
							
							<?php if ( $sponsor_group_logo ) { ?>
								<?php if ( $link ) { ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><?php } ?>
									<div class="sponsor-group-image">
										<div style="background-image: url(<?php echo $sponsor_group_logo['url']; ?>);" role="img" aria-label="<?php echo $sponsor_group_logo['alt']; ?>"></div>
									</div>
								<?php if ( $link ) { ?></a><?php } ?>
							<?php } ?>
							
							<?php 
								$aboutText = get_sub_field('about'); 
								$aboutTextShort = substr($aboutText, 0, 500);
								$aboutTextLong = substr($aboutText, 500);
							?>
							
							
							<div class="sponsor-group-about">
								<span><?= $aboutTextShort; ?></span><?php if ($aboutTextLong) : ?><span class="aboutDots" id="aboutDot<?= $sponsorNumber; ?>">...</span><span class="sponsor-group-about sponsor-about-wrapper" id="sponsor-about-<?= $sponsorNumber; ?>"><?= $aboutTextLong; ?></span>
								<?php endif; ?>
							</div>
							
							<?php if ($aboutTextLong) : ?>
								<div class="sponsor-dropdown-icon-container">
									<span class="sponsor-dropdown-icon" data-id="<?= $sponsorNumber; ?>">+</span>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php $sponsorNumber++; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>