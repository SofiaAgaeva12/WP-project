<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogHub
 */

/**
 * Hook - bloghub_action_before_footer
 * @hooked bloghub_footer_start -10
 * @hooked bloghub_footer_contents -10
 */
do_action( 'bloghub_action_before_footer' );

/**
 * Hook - bloghub_action_footer
 * Hooked - bloghub_footer_end - 10. 
 */
do_action( 'bloghub_action_footer' );


/**
 * Hook - bloghub_action_after_page
 * Hooked - bloghub_page_end. 
 */
do_action( 'bloghub_action_after_page' );
?>