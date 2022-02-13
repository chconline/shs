<?php 

$settingsArray = generateBasicContent(); 

if (isset($posts->ID)) {
	$postID = $posts->ID;
} else {
	$postID = get_the_ID();
}

$imageSize = get_sub_field('featured_image_size');
$imageURL = get_the_post_thumbnail_url($postID, $imageSize);

$imageLinks = get_sub_field('image_links');

?>

<?php if ($imageURL): ?>
	<div <?php echo $settingsArray['wrapper-classes']; ?> <?php echo $settingsArray['data-attributes']; ?>>
		<?php if ($imageLinks): ?>
			<?php $postLink = get_permalink($postID); ?>
			<a href="<?php echo $postLink; ?>" title="View the post titled '<?php get_the_title($postID); ?>'.">
		<?php endif; ?>

				<img src="<?php echo $imageURL; ?>" alt="<?php get_the_title($postID); ?>">

		<?php if ($imageLinks): ?></a><?php endif; ?>
	</div>
<?php endif; ?>