<?php
get_header();

setup_postdata($post); ?>
	<div class="internals_content-block-tag">
		<div class="title"><?php echo $post->post_title; ?></div>
		<div class="shortcode">[content-block id="<?php echo $post->ID; ?>"]</div>
	</div>
	<?php echo get_content_block($post->ID);
wp_reset_query();

get_footer();