<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogHub
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if( true === get_theme_mod( 'single_image', true ) ){
			if ( get_post_format() === 'gallery' ) {
				get_template_part( 'template-parts/post/post-format-gallery' );
			} else if ( get_post_format() === 'video' ) {
				get_template_part( 'template-parts/post/post-format-video' );
			} else if ( get_post_format() === 'audio' ) {
				get_template_part( 'template-parts/post/post-format-audio' );
			} else {
				get_template_part( 'template-parts/post/post-format-others' );
			}
		}
	?>
	<div class="post-content-wrapper">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta">
				<ul>
					<?php if( true === get_theme_mod( 'single_author', true ) ) : ?>
						<li><?php bloghub_posted_by(); ?></li>
					<?php endif; ?>

					<?php if( true === get_theme_mod( 'single_date', true ) ) : ?>
					<li><?php bloghub_posted_on(); ?></li>
					<?php endif; ?>
					

					<?php if ( get_comments_number() != 0 && true === get_theme_mod( 'single_comment', true ) ) : ?>
						<li class="comment-number"><?php bloghub_comment_count(); ?></li>
					<?php endif; ?>

					<?php if( true === get_theme_mod( 'single_cats', true ) ) : ?>
					<li><?php bloghub_post_categories(); ?></li>
					<?php endif; ?>

				</ul>
			</div>
		<?php endif; ?>

		<?php if( true === get_theme_mod( 'single_title', true )  ) : ?>
			<header class="entry-header">
				<?php the_title( '<h3 class="entry-title single post-title">', '</h3>' ); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bloghub' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloghub' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<div class="post-footer">
				<?php 
					if( true === get_theme_mod( 'single_tags', true ) ){
						bloghub_post_tags(); 
					}
					if( true === get_theme_mod( 'single_share', true ) ){
						bloghub_post_share();
					}
				?>
			</div>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
