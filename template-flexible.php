<?php // Template Name: Flexible
get_header(); ?>

<div class="page-content">
	<?php // This should be set to the name of your flexible content field.
	$pageBuilderComponents = get_field('flexible');

	// Checks for modules in order to avoid displaying an error if the page is empty.
	if ($pageBuilderComponents) {

		// Counts the number of layouts/modules on the page.
		$componentCount = count($pageBuilderComponents);

		// Sets the count to zero to start at the first index of the outputted array from the $pageBuilderComponents variable.
		$count = 0;

		// Sets the $templatePart variable to null.
		$templatePart;

		// Iterates through the flexible content field. The have_rows() function should have the name inside of the flexible content field.
		while (have_rows('flexible')) {

			// Grabs the ACF components from the specific layout.
			the_row();

			// Checks to make sure that the count is still less than or equal to the number of 	layouts/modules.
			if ($count <= $componentCount) {

				// Gets the partial based on the name of the specific layout. So if you have a layout named 'header', it will grab the header.php template.
				$templatePart = 'acf/' . $pageBuilderComponents[$count]['acf_fc_layout'];
				get_template_part($templatePart);
			}

			// Increases index number.
			$count++;
		}
	} ?>
</div>

<?php get_footer(); ?>