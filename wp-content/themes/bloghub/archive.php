<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogHub
 */

get_header();
?>
	<?php
		/**
		* Hook - bloghub_action_before_archive_page.
		*
		* @hooked bloghub_archive_page_start
		*/
		do_action( 'bloghub_action_before_archive_page' );

		/**
		* Hook - bloghub_action_grid_list.
		*
		* @hooked bloghub_grid_list_loop
		*/
		do_action( 'bloghub_action_grid_list' );

		/**
		* Hook - bloghub_action_after_archive_page.
		*
		* @hooked bloghub_archive_page_end
		*/
		do_action( 'bloghub_action_after_archive_page' );
	?>
<?php
get_footer();