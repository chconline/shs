<?php

// Exit if accessed directly

if( !defined( 'ABSPATH' ) ) {
	exit;
}
/**

 * Category Template
 *

Template Name:   Category Template

 *

 * @file           category.php

 * @package        Responsive

 * @author         Gerard Greenidge & Keira Dooley

 * @copyright      2003 - 2015 EDUNOW INC. & Design by Dooley

 * @license        license.txt

 * @version        Release: 1.0

 * @filesource     wp-content/themes/responsive/category.php

 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29

 * @since          available since Release 1.0

 */



get_header(); ?>
    
<?php responsive_wrapper(); // before wrapper container hook ?>

	<div id="wrapper" class="clearfix">

<?php responsive_wrapper_top(); // before wrapper content hook ?>

<?php responsive_in_wrapper(); // wrapper hook ?>

<div id="sidebar_right">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) { ?>
                            <?php } ?>
</div>

<div id="content" class="grid col-620-rightnav">

	<?php if( have_posts() ) : ?>

<h1 class="post-title bigheader"><?php single_cat_title(); ?></h1>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php responsive_entry_top(); ?>

				<div class="post-entry">
<?php if ( has_post_thumbnail()) : ?>
<div class="leftthumbnail"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
<?php the_post_thumbnail(); ?></a></div>
<?php endif; ?>

<div class="rightcopy">
<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
<div class="post-content"><?php the_content(__('Read more &#8250;', 'responsive')); ?></div>
</div>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>

				</div>

				<!-- end of .post-entry -->

				<?php responsive_entry_bottom(); ?>

			</div><!-- end of #post-<?php the_ID(); ?> -->

			<?php responsive_entry_after(); ?>

		<?php

		endwhile;
?>

<div class="post-count-container">
<?php
//global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );
?>
</div>

<?php
	else :

		get_template_part( 'loop-no-posts' );

	endif;

	?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>