<?php
/**
 * BlogHub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BlogHub
 */

if (!defined('BLOGHUB_VERSION')) {
	$bloghub_theme = wp_get_theme();
	define('BLOGHUB_VERSION', $bloghub_theme->get('Version'));
}

// Inc folder directory
define('BLOGHUB_INC_DIR', get_template_directory() . '/inc/');
if ( function_exists('bloghub_fs')) {

    $relative_path = str_replace(get_template_directory(), '', BLOGHUB_INC_DIR);
    $relative_file_path = $relative_path . basename(__FILE__);
    bloghub_fs()->set_basename(false, $relative_file_path);

} else {
	// DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    if ( ! function_exists( 'bloghub_fs' ) ) {
		// Create a helper function for easy SDK access.
		function bloghub_fs() {
			global $bloghub_fs;
	
			if ( ! isset( $bloghub_fs ) ) {
				// Include Freemius SDK.
				require_once dirname(__FILE__) . '/fs/start.php';
	
				$bloghub_fs = fs_dynamic_init( array(
					'id'                  => '12367',
					'slug'                => 'bloghub',
					'premium_slug'        => 'bloghub-pro',
					'type'                => 'theme',
					'public_key'          => 'pk_0c97c7f337b74074ab7a2553ff1e2',
					'is_premium'      => false,
					'is_premium_only' => false,
					'has_addons'      => false,
					'has_paid_plans'  => true,
					'menu'                => array(
						'slug'           => 'bloghub',
						'contact'		=> true,
						'support'		=> false,
					),
				) );
			}
	
			return $bloghub_fs;
		}
	
		// Init Freemius.
		bloghub_fs();
		// Signal that SDK was initiated.
		do_action( 'bloghub_fs_loaded' );
	}
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bloghub_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on BlogHub, use a find and replace
		* to change 'bloghub' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bloghub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'bloghub' ),
			'footer' => esc_html__( 'Footer Menu', 'bloghub' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Post formats
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bloghub_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	
	add_theme_support( "responsive-embeds" );
	// Gutenberg
	add_theme_support(
		'gutenberg',
		array( 'wide-images' => true )
	);

	// Align wide
	add_theme_support( 'align-wide' );

	// Block style
	add_theme_support( 'wp-block-styles' );

	// Editor style
	add_theme_support( 'editor-styles' );

	// Editor style css
	add_editor_style( 'assets/css/theme-editor-style.css' );
}
add_action( 'after_setup_theme', 'bloghub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bloghub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bloghub_content_width', 1170 );
}
add_action( 'after_setup_theme', 'bloghub_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bloghub_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bloghub' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'bloghub' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop Sidebar', 'bloghub' ),
				'id'            => 'bloghub-shop',
				'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'bloghub' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
			'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'bloghub' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
			'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'bloghub' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
			'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'bloghub' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'bloghub' ),
			'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'bloghub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bloghub_scripts() {
	//Enqueue Style.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/bootstrap/bootstrap-min.css', array(), BLOGHUB_VERSION, 'all' );
	if(is_rtl()){
		wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri().'/assets/bootstrap/bootstrap-rtl-min.css', array(), BLOGHUB_VERSION, 'all' );
	}
	wp_enqueue_style( 'fontawesomeall-min', get_template_directory_uri().'/assets/css/fontawesomeall-min.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'slicknav-min', get_template_directory_uri().'/assets/css/slicknav-min.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'superfish', get_template_directory_uri().'/assets/css/superfish.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'animate-min', get_template_directory_uri().'/assets/css/animate-min.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'slick', get_template_directory_uri().'/assets/slick/slick.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'bloghub-typography', get_template_directory_uri().'/assets/css/typography.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'bloghub-theme', get_template_directory_uri().'/assets/scss/theme.css', array(), BLOGHUB_VERSION, 'all' );
	wp_enqueue_style( 'bloghub-style', get_stylesheet_uri(), array(), BLOGHUB_VERSION );
	wp_style_add_data( 'bloghub-style', 'rtl', 'replace' );

	//Enqueue scripts.
	wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/assets/bootstrap/bootstrap-bundle-min.js', array('jquery'), BLOGHUB_VERSION, true );
	wp_enqueue_script( 'slicknav-min-js', get_template_directory_uri() . '/assets/js/jquery-slicknav-min.js', array(), BLOGHUB_VERSION, true );
	wp_enqueue_script( 'superfish-min', get_template_directory_uri() . '/assets/js/superfish.min.js', array(), BLOGHUB_VERSION, true );
	wp_enqueue_script( 'slick-min', get_template_directory_uri() . '/assets/slick/slick-min.js', array(), BLOGHUB_VERSION, true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), BLOGHUB_VERSION, true );
	wp_enqueue_script( 'bloghub-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), BLOGHUB_VERSION, true );
	wp_enqueue_script( 'bloghub-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), BLOGHUB_VERSION, true );
	wp_enqueue_style( 'bloghub-fonts', bloghub_fonts_url(), array(), null );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bloghub_scripts' );


if ( ! function_exists( 'bloghub_fonts_url' ) ) :

	function bloghub_fonts_url() {
		
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';
		if ( 'off' !== _x( 'on', 'Jost: on or off', 'bloghub' ) ) {
			$fonts[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		);

		if ( $fonts ) {
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;


/**
 * Implement the Custom Header feature.
 */
require BLOGHUB_INC_DIR . 'custom-header.php';


/**
 * Template Functions
 */
require BLOGHUB_INC_DIR . 'template-functions.php';

/**
 * Admin Functions
 */
require BLOGHUB_INC_DIR . 'admin/admin.php';

/**
 * Customizer additions.
 */
require BLOGHUB_INC_DIR . 'customizer.php';

/**
 * Kirki Customizer additions.
 */

require BLOGHUB_INC_DIR . 'kirki/kirki.php';
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-customizer.php';
require BLOGHUB_INC_DIR . 'kirki-customize/kirki-custom-functions.php';
require BLOGHUB_INC_DIR . 'kirki-customize/theme-color.php';
/*
 * Customizer Pro
 */
require_once get_template_directory() . '/customize-pro/class-customize.php';

/**
 * Load hooks ini.
 */
require BLOGHUB_INC_DIR . 'hook/hook-ini.php';

/*
 * Comment Template
 */
require BLOGHUB_INC_DIR  . 'comment-template.php';

/*
 * Custom Metabox Options
 */
require BLOGHUB_INC_DIR  . 'custom-metabox.php';


/*
 * Widget Options
 */
require BLOGHUB_INC_DIR  . 'widgets/widgets.php';

/*
 * TGMPA Plugin
 */
require BLOGHUB_INC_DIR  . 'tgmpa/recommended-plugins.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require BLOGHUB_INC_DIR . 'jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*
* Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
*/
function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post']) || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }

    /*
    * Nonce verification
    */
    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
        return;

    /*
    * get the original post id
    */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    /*
    * and all the original post data then
    */
    $post = get_post( $post_id );

    /*
    * if you don't want current user to be the new post author,
    * then change next couple of lines to this: $new_post_author = $post->post_author;
    */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    /*
    * if post data exists, create the post duplicate
    */
    if (isset( $post ) && $post != null) {

        /*
        * new post data array
        */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_name' => $post->post_name,
            'post_parent' => $post->post_parent,
            'post_password' => $post->post_password,
            'post_status' => 'draft',
            'post_title' => $post->post_title,
            'post_type' => $post->post_type,
            'to_ping' => $post->to_ping,
            'menu_order' => $post->menu_order
        );

        /*
        * insert the post by wp_insert_post() function
        */
        $new_post_id = wp_insert_post( $args );

        /*
        * get all current post terms ad set them to the new post draft
        */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        /*
        * duplicate all post meta just in two SQL queries
        */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if( $meta_key == '_wp_old_slug' ) continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }

        /*
        * finally, redirect to the edit post screen for the new draft
        */
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

/*
* Add the duplicate link to action list for post_row_actions
*/
function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}

add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);