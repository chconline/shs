<div class="text-grid">
	<div class="voc-container clearfix">
		<div class="sponsor-heading"><?php the_sub_field( 'heading' ); ?></div>

		<?php if ( have_rows( 'grid_items' ) ) : ?>
			<div class="display-grid3">
				<?php while ( have_rows( 'grid_items' ) ) : the_row(); ?>
					<div class="center">
						<p><?php the_sub_field( 'text' ); ?></p>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>