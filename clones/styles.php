<?php
// This document can be pulled within any partial using the following snippet:
// get_template_part('clones/styles');

$uniqueIdentifier = $GLOBALS['uniqueID']++;
if (!$uniqueIdentifier) { $uniqueIdentifier = 0; }

while(have_settings()): the_setting();
	$responsive_display_array =  get_sub_field( 'responsive_display' );
	if (get_sub_field( 'section_target' )) {
		$pageLink = 'id="' . get_sub_field( 'section_target' ) . '"';
	} else {
		$pageLink = '';
	}

	if ( $responsive_display_array ):
		$display;
		foreach ( $responsive_display_array as $responsive_display_item ):
		 	$display .= $responsive_display_item . ' ';
		endforeach;
	else:
		$display = '';
	endif;

	if ( have_rows( 'section_padding' ) ):
		while ( have_rows( 'section_padding' ) ) : the_row();
			if (get_sub_field('top')) { $paddingTop = 'padding-top: min(max(3rem, 10vw), ' . get_sub_field( 'top' ) . 'px);'; } else { $paddingTop = ''; }
			if (get_sub_field('bottom')) { $paddingBottom = 'padding-bottom: min(max(3rem, 10vw), ' . get_sub_field( 'bottom' ) . 'px);'; } else { $paddingBottom = ''; }
			if (get_sub_field('left')) { $paddingLeft = 'padding-left: min(max(3rem, 10vw), ' . get_sub_field( 'left' ) . 'px);'; } else { $paddingLeft = ''; }
			if (get_sub_field('right')) { $paddingRight = 'padding-right: min(max(3rem, 10vw), ' . get_sub_field( 'right' ) . 'px);'; } else { $paddingRight = ''; }
		endwhile;
	endif;


	$backgroundType = get_sub_field( 'background_type' );
	$backgroundColor = get_sub_field( 'background_color' );
	$backgroundSize = get_sub_field( 'background_size' );
	$backgroundPosition = get_sub_field( 'background_position' );
	$backgroundRepeat = get_sub_field( 'background_repeat' );
	$backgroundAttachment = get_sub_field( 'background_attachment' );
	$backgroundClip = get_sub_field( 'background_clip' );
	$backgroundOrigin = get_sub_field( 'background_origin' );
	$backgroundOverlay = get_sub_field( 'overlay' );
	$backgroundImage = get_sub_field( 'background_image' );

endwhile; ?>

<?php $idClass = 'page' . get_the_id() . '-identifier' . $uniqueIdentifier; ?>

<style>

	.<?= $idClass; ?> {
		<?php if (!$backgroundType) : ?>
			background-color: <?= $backgroundColor; ?>;
		<?php else : ?>
			background-color: <?= $backgroundColor; ?>;
			<?php if ($backgroundOverlay): ?>
				background: linear-gradient(<?= $backgroundOverlay; ?>, <?= $backgroundOverlay; ?>), url('<?= $backgroundImage; ?>');
			<?php else: ?>
				background-image: url('<?= $backgroundImage; ?>');
			<?php endif; ?>
			background-size: <?= $backgroundSize; ?>;
			background-position: <?= $backgroundPosition; ?>;
			background-repeat: <?= $backgroundRepeat; ?>;
			background-attachment: <?= $backgroundAttachment; ?>;
			background-clip: <?= $backgroundClip; ?>;
			background-origin: <?= $backgroundOrigin; ?>;
		<?php endif; ?>

		<?php
			echo $paddingTop;
			echo $paddingBottom;
			echo $paddingLeft;
			echo $paddingRight;
		?>
	}
</style>

<div <?= $pageLink ?> class="clearfix <?= $idClass; ?> <?php echo $display; ?>">