<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogHub
 */

	/**
	* Hook - bloghub_action_doctype.
	*
	* @hooked bloghub_doctype -  10
	*/
	do_action( 'bloghub_action_doctype' ); 

?>
	<head>
		<?php 
			/**
			* Hook - bloghub_action_head.
			*
			* @hooked bloghub_head -  10
			*/
			do_action( 'bloghub_action_head' );
			wp_head(); 
		?>
		<!-- Add Custom code here -->
		
	</head>

	<?php 
		/**
		* Hook - bloghub_action_before.
		*
		* @hooked bloghub_page_start - 10
		*/
		do_action( 'bloghub_action_before_page' );
	?>

	<?php 
		/**
		* Hook - bloghub_action_before_header.
		*
		* @hooked bloghub_header_start - 10
		* @hooked bloghub_site_branding - 10
		*/
		do_action( 'bloghub_action_before_header' );
	?>
	
	<?php 
	/** Hook - bloghub_action_header
	*
	*@hooked bloghub_header_end - 10 
	*/
	do_action('bloghub_action_header');
	?>
	
