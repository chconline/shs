<?php 

while(have_settings()): 
    $queryLayoutArray = generateLayout(the_setting()); 
    $gridType = get_sub_field('layout_type');
endwhile;

$queryContent = get_sub_field('post_query_content');

$topLevelLinked = get_sub_field('top_level_linked');
$featuredImageBackground = get_sub_field('featured_image_background');

if (get_sub_field('featured_image_size')) :
    $imageSize = get_sub_field('featured_image_size'); 
endif;

$queryType = get_sub_field('query_type');
$queryPagination = false; $pagination = '';
$postArguments = [];

if ($queryType !== 'choose') {
    $queryAmount = get_sub_field('post_query_amount');

    if (get_sub_field('include_pagination')) {
        $queryPagination = true;

        if (is_archive()) {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $pagination = 'paged';
        } else {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            $pagination = 'page';
        }
        
        $postArguments['paged'] = $paged;
    }

    if ($queryAmount === 0) { $queryAmount = -1; }
    $postArguments['posts_per_page'] = $queryAmount; 
} else {
    $selectedPosts = get_sub_field('select_posts');

    $postArguments['orderby'] = 'post__in';
    $postArguments['post__in'] = $selectedPosts;
}

if ($queryType === 'post-type') { 
    $postType = get_sub_field('post_type');
    $postArguments['post_type'] = $postType;
} else { $postArguments['post_type'] = 'any'; }

if ($queryType === 'category') {
    $postArguments['category__in'] = get_sub_field('post_query_category');
    $postArguments['orderby'] = 'category__in';
} elseif ($queryType === 'tags') {
    $postArguments['tag__in'] = get_sub_field('post_query_tag');
    $postArguments['orderby'] = 'tag__in';
}  

$postQuery = new WP_Query($postArguments);

?>


<div <?php echo $queryLayoutArray['wrapper-id']; ?> <?php echo $queryLayoutArray['wrapper-classes']; ?>>
    <?php $itemNumber = 1;

    if ($gridType === 'masonry'):
        for ($i = 1; $i <= $queryLayoutArray['container-count']; $i++): ?>
            <div class="block col-<?php echo $i; ?>"></div>
        <?php endfor;
    endif; ?>

    <?php foreach ($postQuery->posts as $posts) :

        $imageBackground = ''; $imageBackgroundClass = '';
                    
        if ($featuredImageBackground && get_the_post_thumbnail_url($posts->ID, $imageSize) && !in_array('image', $queryContent)):
            $imageBackground = 'style="background-image:url(' . get_the_post_thumbnail_url($posts->ID, $imageSize) . ');"';
            $imageBackgroundClass = ' post-image-background post-image-' . $imageSize;
        endif; ?>

        <div <?php echo $queryLayoutArray['content-classes']; ?>>
            <div class="item-<?php echo $itemNumber; ?><?php echo $imageBackgroundClass; ?>" <?php echo $imageBackground; ?>>

                <?php if ($topLevelLinked): ?>
                    <a class="linked-item" href="<?php echo get_permalink($posts->ID); ?>" alt="<?php echo $posts->post_title; ?>">
                <?php endif; ?>

                    <?php foreach($queryContent as $contentType):
                        if ($contentType === 'wrapper') {
                            get_template_part('acf/content/' . $contentType);
                        } elseif ($contentType === 'wrapper-end') {
                            echo '</div></div>';
                        } else {   
                            echo '<div class="post-' . $contentType . '">';
                                get_template_part('acf/content/post/' . $contentType);
                            echo '</div>';
                        }
                    endforeach; ?>

                <?php if ($topLevelLinked): ?>
                    </a>
                <?php endif; ?>

            </div>
        </div><?php $itemNumber++;  ?>

    <?php endforeach; ?>
</div>


<?php if ($queryPagination): ?>
    <div class="pagination center mb4">
        <?php
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $postQuery->max_num_pages,
                'current'      => max( 1, get_query_var( $pagination ) ),
                'format'       => '?page=%#%',
                'end_size'     => 1,
                'mid_size'     => 1,
                'prev_text'    => '<span class="previous-button">←</span>',
                'next_text'    => '<span class="next-button">→</span>',
            ) );
        ?>
    </div>
<?php endif; ?>



