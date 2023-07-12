<?php


if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package BlogHub
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bloghub_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'bloghub_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bloghub_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bloghub_pingback_header' );


/**
 * Allow Html
 */
if ( !function_exists( 'bloghub_allow_html' ) ) {
	function bloghub_allow_html(){
		return array(
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'title'  => array(),
				'rel'    => array(),
			),
			'strong' => array(),
			'small'  => array(),
			'span'   => array(
			    'style' => array(),
            ),
			'p'      => array(),
			'br'     => array(),
			'img'    => array(
				'src'    => array(),
				'title'  => array(),
				'alt'    => array(),
				'width'  => array(),
				'height' => array(),
				'class'  => array(),
			),
			'h1'     => array(),
			'h2'     => array(),
			'h3'     => array(),
			'h4'     => array(),
			'h5'     => array(),
			'h6'     => array(),
		);
    }
}

/**
 * Add span tag in archive list count number
 */
function bloghub_add_span_archive_count($links) {
	$links = str_replace('</a>&nbsp;(', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('get_archives_link', 'bloghub_add_span_archive_count');


/**
 * Add span tag in category list count number
 */

function bloghub_add_span_category_count($links) {
	$links = str_replace('</a> (', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('wp_list_categories', 'bloghub_add_span_category_count');


/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'bloghub_posted_on' ) ) :

	function bloghub_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'bloghub' ), // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-calendar-check"></i>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'bloghub_posted_by' ) ) :

	function bloghub_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'bloghub' ), // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<span class="byline"><i class="far fa-user"></i> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


/**
 * Prints HTML with meta information for the tags.
 */
if ( ! function_exists( 'bloghub_post_tags' ) ) :

	function bloghub_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'bloghub')); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links"><span class="tag-title">' .esc_html__('Tags:','bloghub').'</span>' .esc_html__(' %1$s', 'bloghub') . '</span>', $tags_list); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			}

		}
	}
endif;


/**
 * Prints HTML with meta information for the categories.
 */

 if ( ! function_exists( 'bloghub_post_categories' ) ) :

	function bloghub_post_categories() {
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'bloghub'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__('%1$s', 'bloghub') . '</span>', $categories_list); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			}

		}
	}
endif;

/**
 * Prints HTML with meta information for the comments.
 */
if ( ! function_exists( 'bloghub_comment_count' ) ) :

	function bloghub_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
			echo '<span class="comments-link"><i class="far fa-comments"></i>';
			comments_popup_link('', ''.esc_html__('1', 'bloghub').' <span class="comment-count-text">'.esc_html__('Comment', 'bloghub').'</span>', '% <span class="comment-count-text">'.esc_html__('Comments', 'bloghub').'</span>');
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'bloghub_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bloghub_entry_footer() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bloghub' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'bloghub_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bloghub_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-singlebnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-singlebnail -->

		<?php else : ?>

			<a class="post-singlebnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-singlebnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

/**
 * Words limit
 */
function bloghub_words_limit($text, $limit) {
	$words = explode(' ', $text, ($limit + 1));

	if (count($words) > $limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}

/**
 * Comments Pagination
 */

if ( !function_exists( 'bloghub_comments_pagination' ) ) {
    function bloghub_comments_pagination() {
        the_comments_pagination( array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ) );
    }
}


/**
 * Post Pagination
 */
if ( !function_exists('bloghub_Post_pagination') ) {
    function bloghub_Post_pagination(){
        the_posts_pagination(array(
            'screen_reader_text' => '',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ));
    }
}


/**
 * Prints post's first category
 */

 if ( ! function_exists( 'bloghub_post_first_category' ) ) :

	function bloghub_post_first_category(){
		if ( 'post' === get_post_type() ) {

		$post_category_list = get_the_terms(get_the_ID(), 'category');
		$post_first_category = $post_category_list[0];
		if ( ! empty( $post_first_category->slug )) {
			echo '<span class="cat-links"><i class="far fa-folder"></i><a href="'.get_term_link( $post_first_category->slug, 'category' ).'">' . $post_first_category->name . '</a></span>';
		}
		}
	}
endif;


/**
 * Next Preview Post Pagination
 */
function bloghub_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    if ( ! $prev_post && ! $next_post ) {
        return;
    }
    ?>
    <nav class="bloghub-post-navication-single" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'bloghub' ); ?></h2>
        <div class="nav-links">
            <?php
            if ( $prev_post ) :
                ?>
                <div class="nav-previous post-single-nav">
					<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>" class="nav-label">
						<span class="nav-subtitle"><?php esc_html_e( 'Previous Post', 'bloghub' ); ?></span>
					</a>
                    <div class="nav-holder">
						<div class="nav-title">
							<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>">
								<span class="nav-title"><?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?></span>
							</a>
						</div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if ( $next_post ) :
                ?>
				<div class="nav-next post-single-nav">
					<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>" class="nav-label">
						<span class="nav-subtitle"><?php esc_html_e( 'Next Post', 'bloghub' ); ?></span>
					</a>
                    <div class="nav-holder">
						<div class="nav-title">
							<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>">
								<span class="nav-title"><?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?></span>
							</a>
						</div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <?php
}

/**
 * BlogHub Post Share Function
 */
if ( ! function_exists( 'bloghub_post_share' ) ) : 
	
	function bloghub_post_share(){
		global $post;
		$post_title = get_the_title();
		$post_id    = get_the_ID();
		$post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$post_url   = get_permalink( $post_id );
		$pin_image  = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
		$protocol	= is_ssl() ? 'https' : 'http';
		?>
		<div class="share-this-post">
			<ul class="social-icons m0p0ln">
				<li>
					<a href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>" class="social-facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/share?text=<?php echo esc_attr(wp_strip_all_tags( $post_title )); ?>&amp;url=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>" class="social-facebook">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>&amp;media=<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id( $post_id ) )); ?>&amp;description=<?php echo urlencode( wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ) ); ?>" class="social-pintarest">
						<i class="fab fa-pinterest"></i>
					</a>
				</li>
				<li>
					<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( $post_url  ) ); ?>&amp;title=<?php echo esc_attr(wp_strip_all_tags( $post_title )); ?>&amp;summary=<?php echo urlencode( wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ) ); ?>&amp;source=<?php echo esc_url( home_url( '/' ) ); ?>" class="social-linkedin">
						<i class="fab fa-linkedin-in"></i>
					</a>
				</li>
			</ul>
		</div>
	<?php }
endif;


/**
 * BlogHub Breadcrumb Function
 */
if ( ! function_exists( 'bloghub_breadcrumb' ) ) : 
	function bloghub_breadcrumb() {

		global $post;
		echo '<ul class="bloghub-breadcrumb">';
		$delimiter = '<span class="breadcrumb-delimiter">/</span>';
		$home = '<li><a href="' . esc_url(home_url()) . '">' . esc_html__('Home', 'bloghub') . '</a>' . $delimiter . '</li>';

		if ( !is_front_page() ) {
			echo $home;

			if ( is_home() ) {

				echo '<li>' . esc_html__('Blog', 'bloghub') . '</li>';

			} elseif ( is_category() ) {

				$category = get_category(get_query_var('cat'));
				$cat_link = get_category_link($category->cat_ID);
				echo '<li><a href="' . esc_url($cat_link) . '">' . esc_html($category->name) . '</a></li>';
			
			} elseif ( is_single() && !is_singular('product') ) {

				$category = get_the_category();
				$cat_link = get_category_link( $category[0]->cat_ID );
				
					echo '<li><a href="' . esc_url( $cat_link ) . '">' . esc_html( $category[0]->cat_name ) . '</a>' . $delimiter . '</li>';
				
				echo '<li>' . wp_kses_post( get_the_title() ) . '</li>';
			
			} elseif ( is_page() ) {

				if ( $post->post_parent ) {
					$anc = get_post_ancestors( $post->ID );
					$anc = array_reverse( $anc );
					foreach ( $anc as $ancestor ) {
						echo '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . get_the_title( $ancestor ) . '</a>' . $delimiter . '</li>';
					}
				}

				echo '<li>' . esc_html( get_the_title() ) . '</li>';
			} elseif ( is_author() ) {
				echo '<li>' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</li>';
			}elseif ( is_archive() ) {
				echo '<li> ' . esc_html( the_archive_title() ) . '</li>';
			} elseif ( is_search() ) {
				echo '<li>' . esc_html__( 'Search Results for', 'bloghub' ) . ': ' .  esc_html( get_search_query() ) . '</li>';
			} elseif ( is_tag() ) {
				echo '<li>' . esc_html__( 'Tag', 'bloghub' ) . ': ' . esc_html( single_tag_title('', false) ) . '</li>';
			} elseif ( is_404() ) {
				echo '<li>' . esc_html__( 'Error 404', 'bloghub' ) . '</li>';
			} elseif ( is_singular('product') && !is_front_page() ) {

				global $product;

				if ( $product instanceof WC_Product ) {
					$category_ids = $product->get_category_ids();

					if ( $category_ids ) {
						$cat_link = get_term_link( $category_ids[0], 'product_cat' );
						echo '<li><a href="' . esc_url( $cat_link ) . '">' . esc_html( get_term_field( 'name', $category_ids[0], 'product_cat' ) ) . '</a>' . $delimiter . '</li>';
					}
				}

				echo '<li>' . wp_kses_post( get_the_title() ) . '</li>';
			} else {
			echo '<li>' . esc_html__( 'Home', 'bloghub' ) . '</li>';
		}
		echo '</ul>';
	}
}
endif;

/**
 * Iframe embed
 */

 function bloghub_iframe_embed( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'bloghub_iframe_embed', 10, 2 );

/**
 * Purchase Demo Link
 */

 if ( ! function_exists( 'bloghub_purchase_link' ) ) {
    function bloghub_purchase_link() {
        $bloghub_purchase = 'https://www.themeuniver.com/bloghub-pro';
        $description = sprintf(
            __( 'Purchase the Pro Version for More Features. <a href="%s" target="_blank" class="Purchase-links">Purchase Now</a>', 'bloghub' ),
            esc_url( $bloghub_purchase )
        );
        return $description;
    }
}

function hide_fs_customizer_upsell_control() {
    ?>
    <style>
        #accordion-section-freemius_upsell,#fs_customizer_support {
            display: none !important;
        }
    </style>
    <?php
}
add_action( 'customize_controls_print_styles', 'hide_fs_customizer_upsell_control' );


/**
 * Delete the `Hello world!` post after successful demo import.
 */
function bloghub_delete_hello_world() {
	$post = get_page_by_path('hello-world', OBJECT, 'post');
    if ($post) {
        wp_delete_post($post->ID,true);
    }
}

add_filter( 'ocdi/import_files', 'bloghub_delete_hello_world' );