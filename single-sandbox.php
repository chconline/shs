<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Posts Template
 *
 *
 * @file           single-sandbox.php
 * @package        Responsive
 * @author         Gerard Greenidge
 * @copyright      2015 EDUNOW
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single-sandbox.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="grid col-620">

	<?php get_template_part( 'loop-header', get_post_type() ); ?>

	<?php if ( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<div class="post-entry">
<h2 class="entry-title post-title"><?php the_title(); ?></h2>
<p class="byline-date">By <?php the_author(); ?>, <?php the_time('F j, Y') ?></p>
<div class="addthis_sharing_toolbox"><div class="addthis_share_label">Share this</div>
<!-- Go to www.addthis.com/dashboard to generate a new set of sharing buttons -->
<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=<?php echo get_permalink(); ?>&pubid=ra-56cf59ad572ac38f&ct=1&pco=tbxnj-1.0" target="_blank"><img src="http://www.sandhillschool.org/assets/calendar/calendar_sharebutton_twitter.png" border="0" alt="Twitter" class="details-social-button" /></a>
<a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=<?php echo get_permalink(); ?>&pubid=ra-56cf59ad572ac38f&ct=1&pco=tbxnj-1.0" target="_blank"><img src="http://www.sandhillschool.org/assets/calendar/calendar_sharebutton_facebook.png" border="0" alt="Facebook" class="details-social-button"/></a>
<a href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php echo get_permalink(); ?>&pubid=ra-56cf59ad572ac38f&ct=1&pco=tbxnj-1.0" target="_blank"><img src="http://www.sandhillschool.org/assets/calendar/calendar_sharebutton_email.png" border="0" alt="Email" class="details-social-button"/></a>
<a href="https://www.addthis.com/bookmark.php?source=tbx32nj-1.0&v=300&url=<?php echo get_permalink(); ?>&pubid=ra-56cf59ad572ac38f&ct=1&pco=tbxnj-1.0" target="_blank"><img src="http://www.sandhillschool.org/assets/calendar/calendar_sharebutton_more.png" border="0" alt="Addthis" class="details-social-button"/></a>
</div>
<?php if ( has_post_thumbnail()) : ?>
<div class="sandbox-thumbnail">
                    <?php the_post_thumbnail(); ?>
<?php
$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
  if(!empty($get_description)){//If description is not empty show the p
  echo '<p class="wp-caption-text">' . get_post(get_post_thumbnail_id())->post_excerpt . '</p>';
  }
?>
</div>
                    <?php endif; ?>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<div class="navigation">
					<div class="previous"><?php previous_post_link( '%link', '&laquo; PREV ' ); ?></div>
					<div class="next"><?php next_post_link( '%link', 'NEXT &raquo;' ); ?></div>
				</div><!-- end of .navigation -->

<?php previous_posts_link( '« Newer Entries' ); ?>
				<div class="post-edit"><?php edit_post_link( __( 'Edit', 'responsive' ) ); ?></div>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

	else :

		get_template_part( 'loop-no-posts', get_post_type() );

	endif;
	?>

</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
