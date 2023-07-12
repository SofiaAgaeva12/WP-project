<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BlogHub
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php 
			if( true === get_theme_mod( 'error_breadcrumb', true ) ) {
				/**
				* Hook - bloghub_action_breadcrumb.
				*
				* @hooked bloghub_breadcrumb
				*/
				do_action( 'bloghub_action_breadcrumb' );
			}
		?>
		<div class="container">
			<section class="error-404 not-found text-center">
				<?php if( true === get_theme_mod( 'error_image_show', false ) ) : ?>
					<div class="error-image">
						<img src="<?php echo esc_url( get_theme_mod( 'error_image', '' ) ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'error_title') ); ?>">
					</div>
				<?php else : ?>
				<h2 class="error-title"><?php esc_html_e( '404', 'bloghub' ); ?></h2>
				<?php endif; ?>

				<div class="page-content">
					<h2><?php echo esc_html( get_theme_mod( 'error_title') ); ?></h2>
					<p><?php echo esc_html( get_theme_mod( 'error_content' ) ); ?></p>
					<?php if( true === get_theme_mod( 'error_btn_show', true ) ) : ?>
						<div class="button">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-button"><?php echo esc_html( get_theme_mod( 'error_btn_text','Go Home' ) ); ?><i class="fas fa-angle-double-right"></i></a>
						</div> 
					<?php endif; ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</main><!-- #main -->
<?php
get_footer();
