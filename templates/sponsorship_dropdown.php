<div class="sponsorship-dropdown">
	<div class="voc-container">
		<?php if ( have_rows( 'dropdown' ) ) : ?>
			<?php $sponsorshipID = 1; ?>
			<?php while ( have_rows( 'dropdown' ) ) : the_row(); ?>
				<div class="dropdown-container">

					<h3><?php the_sub_field( 'heading' ); ?></h3>

					<hr>

					<h4><?php the_sub_field( 'sub-heading' ); ?></h4>

					<div class="information-container"  id="information-<?= $sponsorshipID; ?>">
						<?php the_sub_field( 'text' ); ?>
					</div>

					<div class="dropdown-icon-container">
						<span class="sponsorship-dropdown-icon" data-id="<?= $sponsorshipID; ?>">+</span>
					</div>
				</div>

				<?php $sponsorshipID++; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>