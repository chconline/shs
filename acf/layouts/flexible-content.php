<?php
while(have_settings()): 
    $layoutArray = generateLayout(the_setting()); 
    $gridType = get_sub_field('layout_type');
endwhile;

if (have_rows('blocks')) { $itemNumber = 1;
	echo '<div ' . $layoutArray['wrapper-id'] . ' ' . $layoutArray['wrapper-classes'] . '>';

	if ($gridType === 'masonry') {
		for ($i = 1; $i <= $layoutArray['container-count']; $i++) {
			echo '<div class="block col-' . $i . '"></div>';
		} // endfor
	} // endif ($gridType === 'masonry')

	while (have_rows('blocks')) { the_row();
		echo '<div ' .  $layoutArray['content-classes'] . '>';
			echo '<div class="item-' . $itemNumber . '">';

				if (have_rows('content')) { while (have_rows('content')) { the_row();
					$contentType = get_row_layout();

					if ($contentType == 'wrapper') {
						get_template_part('acf/content/' . $contentType);
					} elseif ($contentType == 'sub-menu') {
						$style = get_string_between(strip_tags(get_sub_field('style')), '[', ']');
						echo '<div class="' . $contentType . ' style-' . $style . '">';
							get_template_part('acf/content/' . $contentType);
						echo '</div>'; // close content type wrapper
					} elseif ($contentType == 'wrapper-end') {
						echo '</div>';
					} elseif (strpos($contentType, 'post-') !== false && $contentType !== 'post-query') {
						$postContent = str_replace('post-', '', $contentType);
						echo '<div class="' . $contentType . '">';
							get_template_part('acf/content/post/' . $postContent);
						echo '</div>'; // close content type wrapper
					} else {
						echo '<div class="' . $contentType . '">';
							get_template_part('acf/content/' . $contentType);
						echo '</div>'; // close content type wrapper
					}
				}} // endif endwhile (have_rows('content'))

			echo '</div>'; // close layout item container
		echo '</div>'; // close layout item wrapper

		$itemNumber ++;
	} // endwhile (have_rows('block'))

	echo '</div>';
} // endif (have_rows('block'))