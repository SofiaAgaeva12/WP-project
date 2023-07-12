<?php 
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package BlogHub
 */

	if ( ! function_exists( 'bloghub_doctype' ) ) :
		/**
		 * Doctype Declaration.
		 *
		 * @since 1.0.0
		 */
		function bloghub_doctype() {
			?>
				<!DOCTYPE html>
				<html <?php language_attributes(); ?> >
			<?php
		}
	endif;
	add_action( 'bloghub_action_doctype', 'bloghub_doctype', 10 );

	/**
	 * BlogHub Head Hook
	 */
	if ( ! function_exists( 'bloghub_head' ) ) :
		/**
		* Header Codes.
		*
		* @since 1.0.0
		*/
		function bloghub_head() {
			?>
				<meta charset="<?php bloginfo( 'charset' ); ?>">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="profile" href="http://gmpg.org/xfn/11">
				<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
				<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
			<?php endif;
		}
	endif;
	add_action( 'bloghub_action_head', 'bloghub_head', 10 );

	/**
	 * BlogHub Page Start Hook
	 */
	if ( ! function_exists( 'bloghub_page_start' ) ) :
		/**
		 * Add Skip to content.
		 *
		 * @since 1.0.0
		 */
		function bloghub_page_start() {
			?>
				<body <?php body_class(); ?>>
				<?php wp_body_open(); ?>
					<div id="page" class="site">
					<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bloghub' ); ?></a>
					<?php if( true === get_theme_mod( 'preloader_options', true ) ) : ?>
					<div class="preloader-area">
						<div class="preloader-inner">
							<div class="theme-loader"></div>
						</div>
					</div>
				<?php endif; ?>
			<?php
		}
	endif;
	add_action( 'bloghub_action_before_page', 'bloghub_page_start', 10 );


	/**
	 * BlogHub Stat Header Hook
	 */
	if ( ! function_exists( 'bloghub_header_start' ) ) :
		/**
		 * Header Start.
		 *
		 * @since 1.0.0
		 */
		function bloghub_header_start() {
			if( true == get_theme_mod( 'sticky_header_enable', false ) ){
				$bloghub = 'sticky-header';
			}else{
				$bloghub = 'sticky-header-no';
			}
			?>
				<header id="masthead" class="site-header">
					<div class="header-inner" id="<?php echo esc_attr( $bloghub ); ?>">
						
			<?php 
		}

	endif;
	add_action( 'bloghub_action_before_header', 'bloghub_header_start' );

	/**
	 * BlogHub Header End Hook
	 */
	if ( ! function_exists( 'bloghub_header_end' ) ) :
		/**
		 * Header End.
		 *
		 * @since 1.0.0
		 */
		function bloghub_header_end() {
			?>
						
					</div>
				</header><!-- #masthead -->
				<div class="header-search-popup">
					<div class="header-search-popup-content">
						<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'bloghub' ) ?></span>
							<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search ', 'bloghub' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'bloghub' ) ?>" />
							<button type="submit" aria-label="Submit search" class="search-submit"><span class="fas fa-search"></span></button>
						</form>
					</div>
					<div class="header-search-overlay search-open">
						<div class="closes-button">
							<a href="#"><i class="fas fa-times"></i></a>
						</div>
					</div>
				</div>
			<?php
		}
	endif;
	add_action( 'bloghub_action_header', 'bloghub_header_end', 15 );

	/**
	 * BlogHub Footer Start Hook
	 */
	if ( ! function_exists( 'bloghub_footer_start' ) ) :
		/**
		 * Footer Start.
		 *
		 * @since 1.0.0
		 */
		function bloghub_footer_start() { ?>
			<footer id="colophon" class="site-footer footer-style-<?php echo esc_attr(get_theme_mod('select_footer', 'one')); ?>">
				<div class="footer-wrapper">
		<?php }
	endif;
	add_action( 'bloghub_action_before_footer', 'bloghub_footer_start', 10 );
	
	/**
	 * BlogHub Footer End Hook
	 */
	if ( ! function_exists( 'bloghub_footer_end' ) ) :
		/**
		 * Footer End.
		 *
		 * @since 1.0.0
		 */
		function bloghub_footer_end() {?>
				</div>
			</footer><!-- #colophon -->
		<?php }
	endif;
	add_action( 'bloghub_action_footer', 'bloghub_footer_end', 10 );


	/**
	 * BlogHub Page End Hook
	 */
	if ( ! function_exists( 'bloghub_page_end' ) ) :
		/**
		 * End Page Content.
		 *
		 * @since 1.0.0
		 */
		function bloghub_page_end() {
			?>	
					<?php if( true === get_theme_mod( 'bottom_to_top', true )) : ?>
						<div class="to-top" id="back-top">
							<i class="fas fa-angle-double-up"></i>
						</div>
					<?php endif; ?>
					</div><!-- #page -->
				<?php wp_footer(); ?>
				</body>
			</html>
			<?php 
		}
	endif;
	add_action( 'bloghub_action_after_page', 'bloghub_page_end', 10 );



	/**
	 * BlogHub Single Page Hook
	 */
	if ( ! function_exists( 'bloghub_single_page_start' ) ) :
		/**
		 * Start Single Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_single_page_start() {
			?>	
				<main id="primary" class="<?php echo esc_attr( is_page() ? 'site-main content-area page-content-area' : 'site-main' ); ?>">
					<?php 
					if( true === get_theme_mod( 'single_breadcrumb_enable', true ) ){
						/**
						* Hook - bloghub_action_breadcrumb.
						*
						* @hooked bloghub_breadcrumb
						*/
						do_action( 'bloghub_action_breadcrumb' );
					}elseif(true === get_theme_mod( 'page_breadcrumb_enable', true )){
						/**
						* Hook - bloghub_action_breadcrumb.
						*
						* @hooked bloghub_breadcrumb
						*/
						do_action( 'bloghub_action_breadcrumb' );
					}
						
						
					?>
					<div class="post-details-wrapper">
						<div class="container">
							<div class="row">
			<?php 
		}
	endif;
	add_action( 'bloghub_action_before_single_page', 'bloghub_single_page_start' );

	/**
	 * BlogHub Single Page End Hook
	 */
	if ( ! function_exists( 'bloghub_single_page_end' ) ) :
		/**
		 * End Single Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_single_page_end() {
			?>	
						</div>
					</div>
				</div>
			</main><!-- #main -->
			<?php 
		}
	endif;
	add_action( 'bloghub_action_after_single_page', 'bloghub_single_page_end' );


	/**
	 * BlogHub Search Page Hook
	 */
	if ( ! function_exists( 'bloghub_search_page_start' ) ) :
		/**
		 * Start Search Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_search_page_start() {
			?>	
				<main id="primary" class="site-main layout-<?php echo esc_attr(get_theme_mod( 'search_layout' )); ?>">
					<?php 
						if( true === get_theme_mod( 'enable_search_title', true ) ) :
						/**
						* Hook - bloghub_action_breadcrumb.
						*
						* @hooked bloghub_breadcrumb
						*/
						do_action( 'bloghub_action_breadcrumb' );
						endif;
					?>
					<div class="page-wrapper page-search">
						<div class="container">
			<?php 
		}
	endif;
	add_action( 'bloghub_action_before_search_page', 'bloghub_search_page_start' );

	/**
	 * BlogHub Search Page End Hook
	 */
	if ( ! function_exists( 'bloghub_search_page_end' ) ) :
		/**
		 * End Search Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_search_page_end() {
			?>	
					</div>
				</div>
			</main><!-- #main -->
			<?php 
		}
	endif;
	add_action( 'bloghub_action_after_search_page', 'bloghub_search_page_end' );
	
	
	
	
	/**
	 * BlogHub Archive Page Hook
	 */
	if ( ! function_exists( 'bloghub_archive_page_start' ) ) :
		/**
		 * Start Archive Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_archive_page_start() {
			?>	
			<main id="primary" class="site-main layout-<?php echo esc_attr(get_theme_mod( 'archive_layout' )); ?>">
				<?php 
					if( true === get_theme_mod( 'enable_archive_title', true ) ) :
					/**
					* Hook - bloghub_action_breadcrumb.
					*
					* @hooked bloghub_breadcrumb
					*/
					do_action( 'bloghub_action_breadcrumb' );
					endif;
				?>
				<div class="page-wrapper page-archive">
					<div class="container">
			<?php 
		}
	endif;
	add_action( 'bloghub_action_before_archive_page', 'bloghub_archive_page_start' );

	/**
	 * BlogHub Archive Page End Hook
	 */
	if ( ! function_exists( 'bloghub_archive_page_end' ) ) :
		/**
		 * End Archive Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_archive_page_end() {
			?>	
					</div>
				</div>
			</main><!-- #main -->
			<?php 
		}
	endif;
	add_action( 'bloghub_action_after_archive_page', 'bloghub_archive_page_end' );


	/**
	 * BlogHub Index Page Start Hook
	 */
	if ( ! function_exists( 'bloghub_index_page_start' ) ) :
		/**
		 * Start Index Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_index_page_start() {
			?>	
				<main id="primary" class="site-main layout-<?php echo esc_attr(get_theme_mod( 'blog_layout' )); ?>">
					<?php 
						if( true === get_theme_mod( 'enable_post_slide', false ) ) {
							/** Hook - bloghub_action_PostSlider
							*
							*@hooked bloghub_post_slider_hook 
							*/
							do_action('bloghub_action_PostSlider');
						}
					?>
					<div class="page-wrapper page-index">
						<div class="container">
			<?php 
		}
	endif;
	add_action( 'bloghub_action_before_index_page', 'bloghub_index_page_start' );


	/**
	 * BlogHub Index Page End Hook
	 */
	if ( ! function_exists( 'bloghub_index_page_end' ) ) :
		/**
		 * End Index Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_index_page_end() {
			?>	
						</div>
					</div>
				</main><!-- #main -->
			<?php 
		}
	endif;
	add_action( 'bloghub_action_after_index_page', 'bloghub_index_page_end' );


	/**
	 * BlogHub Grid List Hook
	 */
	if ( ! function_exists( 'bloghub_grid_list_start' ) ) :
		/**
		 * End Index Page.
		 *
		 * @since 1.0.0
		 */
		function bloghub_grid_list_loop() {

			if( 'grid' === get_theme_mod( 'blog_layout', 'right-sidebar' ) ){
				get_template_part( 'template-parts/post/post-grid');
			}else{
				get_template_part( 'template-parts/post/post-sidebar');
			} 
		}
	endif;
	add_action( 'bloghub_action_grid_list', 'bloghub_grid_list_loop' );

	/** 
	 *  Fallback for primary navigation.
	 */
	if( ! function_exists( 'bloghub_primary_navigation_fallback' ) ) :

		/**
		 * Fallback for primary navigation.
		 *
		 * @since 1.0.0
		 */
		function bloghub_primary_navigation_fallback() {
			echo '<ul class="sf-menu ms-auto me-auto" id="primary-menu">';
				echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' .esc_html__( 'Главная', 'bloghub' ). '</a></li>';
				wp_list_pages( array(
				'title_li' => '',
				'depth'    => 1,
				'number'   => 5,
				) );
			echo '</ul>';
		}
	endif;