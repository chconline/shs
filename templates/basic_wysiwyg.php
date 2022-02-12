<div class="basic-wysiwyg" id="<?php the_sub_field( 'unique_selector' ); ?>">
	<div class="voc-container">
		<div class="wysiwyg-wrapper">
			<?php if (get_sub_field('heading')): ?>
				<div class="lined-heading">
					<span><?php the_sub_field( 'heading' ); ?></span>
				</div>
			<?php endif; ?>
			
			<?php the_sub_field( 'wysiwyg' ); ?>
		</div>	
	</div>
</div>