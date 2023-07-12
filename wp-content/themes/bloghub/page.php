<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogHub
 */

get_header();
$page_layouts = get_theme_mod( 'page_layout', 'right-sidebar');

if ( $page_layouts == 'left-sidebar' && is_active_sidebar( 'sidebar-page' ) || $page_layouts == 'right-sidebar' && is_active_sidebar( 'sidebar-page' ) ) {
	$page_column = 'col-12 col-lg-8';
} else {
	$page_column= 'col-12 col-lg-12';
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

		<?php if ( $page_layouts == 'left-sidebar' && is_active_sidebar( 'sidebar-page' ) ) : ?>
			<div class="col-12 col-lg-4">
				<?php get_sidebar('page'); ?>
			</div>
		<?php endif ?>

		<div class="<?php echo esc_attr( $page_column ); ?>">
			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					if( true === get_theme_mod( 'page_comment_section', true ) ){
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					}
					
				endwhile; // End of the loop.
			?>
		</div>

		<?php if ( $page_layouts == 'right-sidebar' && is_active_sidebar( 'sidebar-page' ) ) : ?>
			<div class="col-12 col-lg-4">
				<?php get_sidebar('page'); ?>
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
