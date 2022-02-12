<div id="featured-speaker">
	<div class="voc-container clearfix">
		<div class="lined-heading">
			<span><?php the_sub_field( 'heading' ); ?></span>
		</div>
		
		<div class="fs-sub-heading"><?php the_sub_field( 'sub-heading' ); ?></div>

		<div class="featured-speaker-container clearfix">
			<div class="featured-speaker-wrapper clearfix">
				<div class="dropdown-icon-container">
					<span class="dropdown-icon" id="fs-dropdown-icon">+</span>
				</div>
				
				<div class="col-lg-3 col-md-3 fs-image-wrapper">
					<?php $image = get_sub_field( 'image' ); ?>
					<?php if ( $image ) { ?>
						<img class="fs-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php } ?>
				</div>
				<div class="col-lg-9 col-md-9 fs-text-container">
					<div class="fs-name">
						<?php the_sub_field( 'name' ); ?>
					</div>
					
					<hr class="fs-separator">
					
					<div class="fs-title">
						<?php the_sub_field( 'title' ); ?>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 fs-bio-container" id="fs-bio">
					<div class="panel-bio">
						<?php the_sub_field( 'bio' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>