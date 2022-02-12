<div id="testimonial">
	<div class="container">
		<div class="testimonial-container">
			<div class="testimonial-image">
				<img src="/wp-content/uploads/2020/06/QG80SE3o.png">
			</div>
			<div class="testimonial-box">
				<div>
					<?php $post_object = get_sub_field( 'testimonial' ); ?>
					<?php if ( $post_object ): ?>
						<?php $post = $post_object; ?>
						<?php setup_postdata( $post ); ?> 
							<div class="navy testimonial-text"><?php the_field( 'testimonial' ); ?></div>
							<div class="right-align testimonial-name navy">— <?php the_field( 'name' ); ?></div>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>