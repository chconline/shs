<?php if (have_settings()):
	while(have_settings()): 
		// For the Wrapper Settings
		$layoutArray = generateLayout(the_setting());

		// For Animation Options
		$settingsArray = generateSettings(the_setting());
	endwhile; 
endif; 

// var_dump($layoutArray);

if ($layoutArray['wrapper-classes']):
	$wrapperClass = substr($layoutArray['wrapper-classes'], 0, -1) . ' wrapper"'; 
else:
	$wrapperClass = 'class="wrapper"';
endif; ?>

<div <?php echo $layoutArray['wrapper-id']; ?> <?php echo $wrapperClass; ?> <?php echo $settingsArray['data-attributes']; ?>>