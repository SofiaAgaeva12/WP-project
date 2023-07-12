<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BlogHub
 */

get_header();

$post_layout = get_theme_mod( 'single_layout', 'right-sidebar');

if ( $post_layout == 'left-sidebar' && is_active_sidebar( 'sidebar-1' ) || $post_layout == 'right-sidebar' && is_active_sidebar( 'sidebar-1' ) ) {
	$post_column = 'col-12 col-lg-8';
} else {
	$post_column= 'col-12 col-lg-12';
}
?>
	<?php 
		/**
		* Hook - bloghub_action_before_single_page.
		*
		* @hooked bloghub_single_page_start
		*/
		do_action( 'bloghub_action_before_single_page' );
	?>
	<?php if ( $post_layout == 'left-sidebar' && is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="col-12 col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	<?php endif ?>

	<div class="<?php echo esc_attr( $post_column ); ?>">
		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );
				
				if( true === get_theme_mod( 'single_author_section', true ) ) {
					/**
					* Hook - bloghub_action_author_section.
					*
					* @hooked bloghub_author_section_hook
					*/
					do_action( 'bloghub_action_author_section' );
				}

				if( true === get_theme_mod( 'single_pagination', true ) ){
					bloghub_post_navigation();
				}

				if( true === get_theme_mod( 'single_comment_section', true ) ){
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				}

			endwhile; // End of the loop.
		?>
	</div>

	<?php if ( $post_layout == 'right-sidebar' && is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="col-12 col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	<?php endif ?>

	<?php 
	/**
	* Hook - bloghub_action_after_single_page.
	*
	* @hooked bloghub_single_page_end
	*/
	do_action( 'bloghub_action_after_single_page' );
	?>
<?php get_footer();