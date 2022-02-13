<?php

// Add all the ACF options to this array to make it easier to manage.
$storyOptions = [];
$storyOptions['story'] = get_sub_field('story');

if ($storyOptions['story']) :
    $storyOptions['content'] = get_sub_field('story_content');

    // Defines how many items are contained within the second layout item
    $contentCount = 0;
    for ($i = 0; $i < count($storyOptions['content']); $i++) {
        if ($storyOptions['content'][$i] !== 'featured-image' && $storyOptions['content'][$i] !== 'icon'):
            $contentCount++;
        endif;
    } $contentCount = 'elements-' . $contentCount;

    $storyLayout = [];
    $storyLayout['classes'] = 'story-grid grid-display';

    $storyContent = [];

    $storyQuery = new WP_Query(array(
        'post_type' => 'success_stories',
        'p' => $storyOptions['story'],
    ));

    foreach ($storyQuery->posts as $story) {
        if ($story):
            setup_postdata($story);
    
            // We don't need the title, but I'm keeping it in because this is going to be used as a template in the future to standardize custom post type content queries that include ACF.
            // $storyContent['title'] = get_the_title();
            $storyContent['excerpt'] = get_the_excerpt($story);
    
            $storyContent['content'] = get_field('content', $story);
            $storyContent['author'] = get_field('author', $story);
    
            if (get_field('icon', $story) && in_array('icon', $storyOptions['content'])) {
                $storyContent['icon'] = '<img class="icon" src="' . get_field('icon', $story)['url'] . '"';
                $storyContent['icon'] .= ' alt="' . get_field('icon', $story)['alt'] . '"';
                $storyContent['icon'] .= ' title="' . get_field('icon', $story)['title'] . '">';
    
                $storyLayout['classes'] .= ' includes-icon';
            }
        endif;
    }

    if (!in_array('featured-image', $storyOptions['content']) && !in_array('icon', $storyOptions['content'])) {
        $storyLayout['quote-position'] = get_sub_field('quote_icon_position');
        $storyLayout['classes'] .= ' ' . $storyLayout['quote-position'];
    }

    if (in_array('featured-image', $storyOptions['content'])) {
        $storyOptions['image_position'] = get_sub_field('image_position');

        // Building out the Featured Image background
        $thumbnailID = get_post_thumbnail_id($storyOptions['story']);

        $storyLayout['featured-image'] = ' style="background-image: url(' . get_the_post_thumbnail_url($storyOptions['story'], 'full') . ');" ';
        $storyLayout['featured-image'] .= 'role="image" ';

        if (get_post_meta($thumbnailID, '_wp_attachment_image_alt', true)) {
            $storyLayout['featured-image'] .= 'title="' . get_post_meta($thumbnailID, '_wp_attachment_image_alt', true) . '"';
        }
        
        // Set the grid to two columns if the Featured Image is added and is set to either left or right.
        if ($storyOptions['image_position'] !== 'top') {
            $storyLayout['classes'] .= ' columns-2 tablet-columns-2 mobile-columns-1';
            $storyLayout['classes'] .= ' featured-image';

            $storyLayout['classes'] .= ' image-' . $storyOptions['image_position'];

            // This will swap the order of the image and content if the image is set to the right.
            if ($storyOptions['image_position'] === 'right') {
                $storyLayout['classes'] .= ' column-swap mobile-column-normalize';
            }
        } else {
            $storyLayout['classes'] .= ' columns-1';
            $storyLayout['classes'] .= ' image-' . $storyOptions['image_position'];
        }
    } else {
        $storyLayout['classes'] .= ' columns-1';
    } ?>


    <div class="<?php echo $storyLayout['classes']; ?>">
        <div class="block" <?php if (isset($storyLayout['featured-image'])) {echo $storyLayout['featured-image']; } ?>>
            <?php if (isset($storyContent['icon'])): echo $storyContent['icon']; endif; ?>
        </div>
        <div class="block <?php echo $contentCount; ?>">
            <?php 
            
            foreach ($storyOptions['content'] as $content):
                if ($content !== 'featured-image' && $content !== 'icon') { ?>
                    <p class="<?php echo $content; ?>">
                        <span><?php echo $storyContent[$content]; ?></span>
                    </p>
                <?php }
            endforeach;
            
            ?>
        </div>
    </div>
<?php endif; ?>