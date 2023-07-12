<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BlogHub
 */

get_header();
?>
	<?php
		/**
		* Hook - bloghub_action_before_search_page.
		*
		* @hooked bloghub_search_page_start
		*/
		do_action( 'bloghub_action_before_search_page' );

		/**
		* Hook - bloghub_action_grid_list.
		*
		* @hooked bloghub_grid_list_loop
		*/
		do_action( 'bloghub_action_grid_list' );

		/**
		* Hook - bloghub_action_after_search_page.
		*
		* @hooked bloghub_search_page_end
		*/
		do_action( 'bloghub_action_after_search_page' );
	?>

<?php get_footer();
