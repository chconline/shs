<?php

if ( have_rows( 'layouts' ) ) :
	while ( have_rows( 'layouts' ) ) :
		the_row();

		$layout = get_row_layout();

		if ($layout === 'layout-wrapper-start') { // opens the layout wrapper
			echo '<div class="layout-wrapper">';
				get_template_part('/acf/clones/layout-container');
		} elseif ($layout === 'layout-wrapper-end') { // closes the layout wrapper
				echo '</div>';
			echo '</div>';
		} elseif ($layout === 'shortcode') {
			get_template_part('/acf/layouts/' . $layout);
		} elseif ($layout === 'content-block') {
			$contentBlockID = get_sub_field('content_block');
			echo get_content_block($contentBlockID);
		} else {
			echo '<div class="' . $layout . '">';
				get_template_part('/acf/clones/layout-container');
					get_template_part('/acf/layouts/' . $layout);
				echo '</div></div>';
			echo '</div>';
		}
	endwhile;
endif;