<div class="single-sponsor">
	<div class="voc-container clearfix">
		<div class="sponsor-heading"><?php the_sub_field( 'heading' ); ?></div>

		<?php $sponsorNumber = 100; ?>

		<div class="single-sponsor-entire-container">
			<?php $single_sponsor_logo = get_sub_field( 'single-sponsor_logo' ); ?>
			<?php if ( $single_sponsor_logo ) { ?>
				<div class="single-sponsor-image">
					<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) { ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><?php } ?>
						<img src="<?php echo $single_sponsor_logo['url']; ?>" alt="<?php echo $single_sponsor_logo['alt']; ?>" />
					<?php if ( $link ) { ?></a><?php } ?>
				</div>
			<?php } ?>
			
			<?php 
				$aboutTextShort = get_sub_field('about'); 
				$aboutTextLong = get_sub_field( 'extra_about' );
			?>
			<div class="single-sponsor-about-container">
				<span><?= $aboutTextShort; ?></span><?php if ($aboutTextLong) : ?><span class="single-sponsor-about-extra" id="sponsor-about-<?= $sponsorNumber; ?>"><?= $aboutTextLong; ?></span><?php endif; ?>
				
				<?php if ($aboutTextLong) : ?>
					<div class="single-sponsor-dropdown-icon-container">
						<span class="sponsor-dropdown-icon" data-id="<?= $sponsorNumber; ?>">+</span>
					</div>
				<?php endif; ?>
			</div>
			
			
		</div>
	</div>
</div>