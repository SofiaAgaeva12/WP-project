<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogHub
 */

get_header();
?>
	<?php

		/**
		* Hook - bloghub_action_before_index_page.
		*
		* @hooked bloghub_index_page_start
		*/
		do_action( 'bloghub_action_before_index_page' );

		/**
		* Hook - bloghub_action_grid_list.
		*
		* @hooked bloghub_grid_list_loop
		*/
		do_action( 'bloghub_action_grid_list' );
		
		/**
		* Hook - bloghub_action_after_index_page.
		*
		* @hooked bloghub_index_page_end
		*/
		do_action( 'bloghub_action_after_index_page' );
	?>
<?php
get_footer();
