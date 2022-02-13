<?php if (have_settings()):
	while(have_settings()): 
		$settingsArray = generateSettings(the_setting()); 
	endwhile; 
else:
	$settingsArray = generateBasicContent();
endif; 

if (isset($posts->ID)) {
	$postID = $posts->ID;
} else {
	$postID = get_the_ID();
}

$textType = get_sub_field('type'); 
if (!$textType) {
	$textType = 'h1';
}
$titleLinks = get_sub_field('title_links'); ?>

<div <?php echo $settingsArray['wrapper-classes']; ?> <?php echo $settingsArray['data-attributes']; ?>>
	<?php if ($titleLinks): ?>
		<?php $postLink = get_permalink($postID); ?>
		<a href="<?php echo $postLink; ?>" title="View the post titled '<?php echo get_the_title($postID); ?>'.">
	<?php endif; ?>

		<<?php echo $textType; ?> <?php echo $settingsArray['content-classes']; ?>>
			<span><?php echo get_the_title($postID); ?></span>
		</<?php echo $textType; ?>>

	<?php if ($titleLinks): ?></a><?php endif; ?>
</div>