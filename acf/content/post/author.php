<?php if (have_settings()):
	while(have_settings()): 
		$settingsArray = generateSettings(the_setting()); 
	endwhile; 
else:
	$settingsArray = generateBasicContent();
endif;

if (get_the_ID()) {
	$authorID = get_post_field( 'post_author', get_the_ID() );
} else {
	$authorID = get_post_field( 'post_author', $posts->ID );
}

if ( have_rows( 'author_formatting' ) ) :
	while ( have_rows( 'author_formatting' ) ) : the_row();
		// Tags link to archive page.
		$linkToArchive = '';
		$linkToArchive = get_sub_field('links_to_archive');

		$author = get_the_author_meta('display_name', $authorID);
		$prefix = get_sub_field('prefix');
		$suffix = get_sub_field('suffix');
	endwhile;
else:
	$prefix = '';
	$format = '';
	$suffix = '';
endif;

?>

<div <?php echo $settingsArray['wrapper-classes']; ?> <?php echo $settingsArray['data-attributes']; ?>>
	<p <?php echo $settingsArray['content-classes']; ?>>
		<?php if ($linkToArchive): ?>
			<?php $authorLink = get_author_posts_url($authorID); ?>
			<a href="<?php echo $authorLink; ?>" title="View <?php echo esc_attr(get_the_author($authorID)) . '\'s Author Archives'; ?>">
		<?php endif; ?>

			<?php if ($prefix): ?>
				<span class="author-prefix"><?php echo $prefix; ?></span>
			<?php endif; ?> 

			<span class="author-name"><?php echo $author; ?></span> 

			<?php if ($suffix): ?>
				<span class="author-suffix"><?php echo $suffix; ?></span>
			<?php endif; ?>

		<?php if ($linkToArchive): ?></a><?php endif; ?>
	</p>
</div>