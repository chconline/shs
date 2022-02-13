<?php

// Prevents this page from being viewed by non-logged in users.
if (!is_user_logged_in()) { wp_redirect(home_url()); exit(); }

get_header();

// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'content-block',
    'posts_per_page' => -1,
    // This can be uncommented if we ever wanted to limit the results on the page.
    // 'paged' => $paged,
);

$blockTypeArgs = array(
    'orderby'       => 'term_id', 
    'order'         => 'ASC',
    'hide_empty'    => true, 
);

$blockTypes = get_terms([
    'post_type' => 'content-block',
    'taxonomy' => 'block-type',
    'hide_empty' => true,
]);

$blockTypes = get_terms('block-type', $blockTypeArgs);

$query = new WP_Query($args); ?>

<div class="banner grid-container">
    <h1>Content Block Archives</h1>
    <p>On this page are all the Content Blocks available for use throughout the site. You can hover over each individual block for additional information and some quick-access links to manage each block, or you can use the navigation bar below to sort through the different types.</p>
</div>

<?php if ( $query->have_posts() ) : ?>
    <!-- Block Types Menu -->
    <?php if ($blockTypes) {
        echo '<ul class="block-types sub-menu">';
            echo '<li class="selector selected all">All</li>';
            foreach ($blockTypes as $blockType) {
                echo '<li class="selector" data-type="' . $blockType->name . '">' . $blockType->name . '</li>';
            }
        echo '</ul>';
    } ?>

    <!-- Render Blocks -->
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php setup_postdata($post);

        if (!get_field('hide_on_archive')) : ?>
            <?php 
                $blockTypes = wp_get_object_terms( $post->ID, 'block-type', array( 'fields' => 'names' ) );
                $blockTypes = implode(' | ', $blockTypes);

                if (!$blockTypes) { $blockTypes = 'No Type'; }
            ?>

            <div class="block-type" data-type="<?php echo $blockTypes; ?>">
                <div class="internals_content-block-tag">
                    <div class="title"><?php echo $post->post_title; ?></div>
                    <div class="shortcode">[content-block id="<?php echo $post->ID; ?>"]</div>
                    <div class="actions">
                        <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit">Edit Block</a> | 
                        <a href="/content-block/<?php echo $post->post_name ; ?>">View Block</a>
                    </div>
                </div>

                <?php echo get_content_block($post->ID); ?>
            </div>

        <?php endif; ?>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php endif;

get_footer();