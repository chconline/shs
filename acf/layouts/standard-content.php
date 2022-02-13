<?php
$layoutArray = generateBasicLayout();

if (have_rows('blocks')) { $itemNumber = 1;
	echo '<div ' . $layoutArray['wrapper-classes'] . '>';

	while (have_rows('blocks')) { the_row();
		echo '<div ' .  $layoutArray['content-classes'] . '>';
			echo '<div class="item">';

				if (have_rows('content')) { while (have_rows('content')) { the_row();
					$contentType = get_row_layout();

					if ($contentType == 'wrapper') {
						get_template_part('acf/content/' . $contentType);
					} elseif ($contentType == 'wrapper-end') {
						echo '</div></div>';
					} else {
						echo '<div class="' . $contentType . ' content-item-' . $itemNumber . '">';
							get_template_part('acf/content/' . $contentType);
						echo '</div>'; // close content type wrapper
					}

					$itemNumber ++;
				}} // endif endwhile (have_rows('content'))

			echo '</div>'; // close layout item container
		echo '</div>'; // close layout item wrapper
	} // endwhile (have_rows('block'))

	echo '</div>';
} // endif (have_rows('block'))