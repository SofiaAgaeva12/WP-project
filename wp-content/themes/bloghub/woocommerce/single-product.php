<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'single_shop' ); 
if( 'left-sidebar' === get_theme_mod( 'single_shop_page_layout','full-width' ) || 'right-sidebar' === get_theme_mod( 'single_shop_page_layout','full-width' ) ){
    $shopColumn = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $shopColumn = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}
?>

	<?php 
	/**
	* Hook - bloghub_action_before_single_page.
	*
	* @hooked bloghub_single_page_start
	*/
	do_action( 'bloghub_action_before_single_page' );

	do_action( 'woocommerce_before_main_content' ); ?>
	<div class="page-layout woo-layout-single">
		<div class="row">

			<?php if( 'left-sidebar' == get_theme_mod( 'single_shop_page_layout','full-width' ) && is_active_sidebar( 'bloghub-shop' ) ) : ?>
				<div id="secondary" class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area woo-widget-area">
					<?php dynamic_sidebar('bloghub-shop'); ?>
				</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr( $shopColumn ); ?>">
				<div class="all-posts-wrapper woo-single-post">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>

			<?php if( 'right-sidebar' == get_theme_mod( 'single_shop_page_layout','full-width' ) && is_active_sidebar( 'bloghub-shop' ) ) : ?>
				<div id="secondary" class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area woo-widget-area">
					<?php dynamic_sidebar('bloghub-shop'); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
	<?php do_action( 'woocommerce_after_main_content' ); ?>
<?php
/**
* Hook - bloghub_action_after_single_page.
*
* @hooked bloghub_single_page_end
*/
do_action( 'bloghub_action_after_single_page' );
get_footer( 'single_shop' );