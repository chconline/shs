<?php $post_object = get_sub_field( 'staff_member' );
if ( $post_object ) {
	$post = $post_object;
	setup_postdata( $post );
	
	$staffName = get_the_title();

	$arr = explode(' ',trim($staffName));
	$staffFirstName =  $arr[0];
	
	$staffDescription = get_field('short_description');
	
	$staffLink = get_field('link');
	
	$staffImage = get_the_post_thumbnail_url();

	wp_reset_postdata();
} ?>

<div id="staff-highlight">
	<div class="container">
		<div class="staff-highlight-container">
			<div class="grid-container desktop-media tablet-media">
				<div class="grid-66 tablet-grid-50 mobile-grid-100 mobile-push-100 mobile-push sh-text-container">
					<?php if (get_sub_field('heading_type')): ?>
						<div class="sh-text-heading">Staff Highlight: <?= $staffName; ?></div>
					<?php else: ?>
						<div class="sh-text-heading"><?php the_sub_field( 'custom_heading' ); ?></div>
					<?php endif; ?>
					
					<div class="sh-text-description"><?= $staffDescription; ?></div>
					
					<a class="staffHighlight-text-link" href="<?= $staffLink; ?>" target="_blank">Learn More About <?= $staffFirstName; ?></a>
				</div>
				
				<div class="grid-33 tablet-grid-50 mobile-grid-100 mobile-pull-100 sh-image" style="background-image: url(<?= $staffImage; ?>)"></div>
			</div>
		</div>
	</div>
</div>