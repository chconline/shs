<?php if (have_settings()):
	while(have_settings()): 
		$settingsArray = generateSettings(the_setting()); 
	endwhile; 
else:
	$settingsArray = generateBasicContent();
endif; 

if (isset($posts->ID)) {
	$excerpt = $posts->post_excerpt;
} else {
	$excerpt = get_the_excerpt();
}

?>

<div <?php echo $settingsArray['wrapper-classes']; ?> <?php echo $settingsArray['data-attributes']; ?>>
	<p <?php echo $settingsArray['content-classes']; ?>>
		<?php echo $excerpt; ?>
	</p>
</div>