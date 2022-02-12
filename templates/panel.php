<div id="panel">
	<div class="voc-container clearfix">
		<?php if (get_sub_field('heading')): ?>
			<div class="lined-heading">
				<span><?php the_sub_field( 'heading' ); ?></span>
			</div>
		<?php endif; ?>

		<?php if (get_sub_field('sub-heading')): ?>
			<div class="fs-sub-heading"><?php the_sub_field( 'sub-heading' ); ?></div>
		<?php endif; ?>

		<?php $panelID = 1; ?>

		<?php if ( have_rows( 'left_column' ) ) : ?>
			<div class="col-lg-6 col-md-6 clearfix panel-container" id="left-panel-container">
				<?php while ( have_rows( 'left_column' ) ) : the_row(); ?>
					<div class="panel-wrapper clearfix">
						<?php $leftImage = get_sub_field( 'left_panel_image' ); ?>
						<?php if ( $leftImage ) { ?>
							<div class="panel-image">
								<img src="<?php echo $leftImage['url']; ?>" alt="<?php echo $leftImage['alt']; ?>" />
							</div>
						<?php } ?>

						<div class="panel-name">
							<?php the_sub_field( 'name' ); ?>
						</div>

						<hr class="panel-separator">

						<div class="panel-title">
							<?php the_sub_field( 'title' ); ?>
						</div>

						<div class="panel-bio-wrapper" id="panel-bio-<?= $panelID; ?>">
							<?php the_sub_field( 'bio' ); ?>
						</div>

						<div class="panel-dropdown-icon-container">
							<span class="panel-dropdown-icon" data-id="<?= $panelID; ?>">+</span>
						</div>

					</div>
					<?php $panelID++; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>


		<?php if ( have_rows( 'right_column' ) ) : ?>
			<div class="col-lg-6 col-md-6 clearfix panel-container" id="right-panel-container">
				<?php while ( have_rows( 'right_column' ) ) : the_row(); ?>
					<div class="panel-wrapper clearfix">
						<?php $image = get_sub_field( 'panel_image' ); ?>
						<?php if ( $image ) { ?>
							<div class="panel-image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
						<?php } ?>

						<div class="panel-name">
							<?php the_sub_field( 'name' ); ?>
						</div>

						<hr class="panel-separator">

						<div class="panel-title">
							<?php the_sub_field( 'title' ); ?>
						</div>

						<div class="panel-bio-wrapper" id="panel-bio-<?= $panelID; ?>">
							<?php the_sub_field( 'bio' ); ?>
						</div>

						<div class="panel-dropdown-icon-container">
							<span class="panel-dropdown-icon" data-id="<?= $panelID; ?>">+</span>
						</div>

					</div>
					<?php $panelID++; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>