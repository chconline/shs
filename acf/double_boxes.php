<div id="double-boxes">
	<div class="container">
		<?php if ( have_rows( 'boxes' ) ) : ?>
			<div class="display-grid2">
				<?php while ( have_rows( 'boxes' ) ) : the_row(); ?>
					<div class="double-box-container">
						<?php if ( have_rows( 'box' ) ): ?>
							<div class="double-box-single-box">
								<?php while ( have_rows( 'box' ) ) : the_row(); ?>



									<?php if ( get_row_layout() == 'image' ) : ?>
										<div class="double-boxes-image-container">
											<?php $image = get_sub_field( 'image' ); ?>
											<?php if ( $image ) { ?>
												<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											<?php } ?>
										</div>



									<?php elseif ( get_row_layout() == 'simple_heading' ) : ?>
										<div class="db-sh-container" style="padding-top: <?php the_sub_field( 'top_padding' ); ?>px; padding-bottom: <?php the_sub_field( 'bottom_padding' ); ?>px;">
											<div class="db-sh-heading"><?php the_sub_field( 'heading' ); ?></div>
											<div class="db-sh-sub-heading"><?php the_sub_field( 'sub-heading' ); ?></div>
										</div>




									<?php elseif ( get_row_layout() == 'double_buttons' ) : ?>
										<div class="db-db-container" style="padding-top: <?php the_sub_field( 'top_padding' ); ?>px; padding-bottom: <?php the_sub_field( 'bottom_padding' ); ?>px;">
											<div class="display-grid1">
												<?php $button_one = get_sub_field( 'button_one' ); ?>
												<?php if ( $button_one ) { ?>
													<a class="db-db-button btn btn-two" href="<?php echo $button_one['url']; ?>" target="<?php echo $button_one['target']; ?>"><?php echo $button_one['title']; ?></a>
												<?php } ?>
											</div>
										</div>


									<?php elseif ( get_row_layout() == 'shortcode' ) : ?>
										<div class="db-s-container" style="padding-top: <?php the_sub_field( 'top_padding' ); ?>px; padding-bottom: <?php the_sub_field( 'bottom_padding' ); ?>px;">
											<div class="db-s-heading"><?php the_sub_field( 'heading' ); ?></div>
											<?php $shortcode = get_sub_field( 'shortcode' ); ?>
											<?php if ($shortcode) {
												echo do_shortcode($shortcode);
											} ?>

											<?php $link = get_sub_field( 'link' ); ?>
											<?php if ( $link ) { ?>
												<a class="db-s-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
											<?php } ?>
										</div>



									<?php elseif ( get_row_layout() == 'links' ) : ?>
										<?php $image = get_sub_field( 'image' ); ?>
										<div class="db-l-container" style="padding-top: <?php the_sub_field( 'top_padding' ); ?>px; padding-bottom: <?php the_sub_field( 'bottom_padding' ); ?>px; background-image: url(<?php echo $image['url']; ?>);">
											<div class="db-l-hr-container"><hr></div>
											<?php if ( have_rows( 'links' ) ) : ?>
												<?php while ( have_rows( 'links' ) ) : the_row(); ?>
													<div class="db-l-link">
														<?php $icon = get_sub_field( 'icon' ); ?>
														<?php if ( $icon ) { ?>
															<span class="db-l-icon"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" /></span>
														<?php } ?>
														<?php $link = get_sub_field( 'link' ); ?>
														<?php if ( $link ) { ?>
															<a class="db-l-link-single" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
														<?php } ?>
													</div>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>



									<?php endif; ?>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
