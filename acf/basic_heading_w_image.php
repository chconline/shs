<div id="basic-heading-with-image">
	<div class="container center">
		<h2 class="bhwi-heading"><?php the_sub_field( 'heading' ); ?></h2>
		<div class="bhwi-sub-heading"><?php the_sub_field( 'sub-heading' ); ?></div>
		<div class="bhwi-image">
			<?php $image = get_sub_field( 'image' ); ?>
			<?php if ( $image ) { ?>
				<a href="<?php the_sub_field( 'image_link' ); ?>" alt="learn to love school graphic">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</a>
			<?php } ?>
		</div>
	</div>
</div>

