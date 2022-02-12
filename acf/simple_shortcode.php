<?php $shortcode = get_sub_field( 'shortcode' ); ?>

<?php if (get_sub_field('container_width')): ?>
	<?php echo do_shortcode($shortcode); ?>
<?php else: ?>
	<?php echo do_shortcode($shortcode); ?>
<?php endif; ?>