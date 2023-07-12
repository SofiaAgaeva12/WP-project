<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogHub
 */

if ( ! is_active_sidebar( 'sidebar-page' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar-widget-area">
	<?php dynamic_sidebar( 'sidebar-page' ); ?>
</aside><!-- #secondary -->