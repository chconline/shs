<div class="big-button">
	<div class="voc-container">
		<?php $class = get_sub_field('class'); ?>
		<?php $link = get_sub_field( 'link' ); ?>
		<?php $main_image = get_sub_field( 'main_image' ); ?>
		<?php $hover_image = get_sub_field( 'hover_image' ); ?>


		<?php if ( $link ) : ?>
			<style>
				.big-button-container.<?= $class; ?> a {
					background-image: url(<?= $main_image['url']; ?>);
				}

				.big-button-container.<?= $class; ?> a:hover {
					background-image: url(<?= $hover_image['url']; ?>);
				}
			</style>


			<div class="big-button-container <?= $class; ?>">
				<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
					<span><?php echo $link['title']; ?></span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>