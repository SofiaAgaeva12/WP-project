<?php

Kirki::add_config( 'theme_config', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

Kirki::add_panel( 'header_options', array(
	'title'    => esc_html__( 'Header Options', 'bloghub' ),
	'priority'    => 10,
) );

/**
 * Start Select Header
 */
Kirki::add_section( 'select_header_options', array(
	'title'    => esc_html__( 'Header Select', 'bloghub' ),
	'panel'    => 'header_options',
	'priority'    => 10,
) );

/**
 * Header Menu Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/header/kirki-menu-options.php';


/**
 * Header Notification Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/header/kirki-notification.php';

/**
 * Header Search Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/header/kirki-search.php';


/**
 * Header Sticky Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/header/sticky-options.php';

/**
 * Header Dark Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/header/drak-options.php';


/**
 * Header Social Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/header/header-social.php';

/**
 * Theme Options
 */

Kirki::add_panel( 'bloghub_theme_options', array(
	'title'    => esc_html__( 'Theme Options', 'bloghub' ),
	'priority' => 11
) );

/**
 * General Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/post-slider.php';

/**
 * General Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/theme-general.php';

/**
 * General Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/typography-options.php';


/**
 * Theme Color Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/theme-color-options.php';

/**
 * Subscribe Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/footer-subscribe.php';

/**
 * Footer Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/footer-options.php';

/**
 * Copyright Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/copyright-options.php';

/**
 * Code Editor Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/code-editor-options.php';

/**
 * Options And Layout
 */

Kirki::add_panel( 'bloghub_option_layout', array(
	'title'    => esc_html__( 'Page And Layout', 'bloghub' ),
	'priority' => 12
) );

/**
 * Blog Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/blog-options.php';

/**
 * Single Page Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/single-page-options.php';

/**
 * Page Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/pages-options.php';

/**
 * Archive Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/archive-options.php';

/**
 * Search Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/search-options.php';

/**
 * 404 Page Options
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/error-page.php';


Kirki::add_panel( 'bloghub_theme_shop', array(
	'title'    => esc_html__( 'Shop Options', 'bloghub' ),
	'priority' => 13
) );

/**
 * Shop Page
 */
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/shop/shop-page.php';
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-options/shop/single-shop.php';