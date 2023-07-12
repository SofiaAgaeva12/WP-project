<?php
if(is_archive()){
	$post_layout = get_theme_mod( 'archive_layout', 'right-sidebar');
}else if(is_search()){
	$post_layout = get_theme_mod( 'search_layout', 'right-sidebar');
}else{
	$post_layout = get_theme_mod( 'blog_layout', 'right-sidebar');
}

if( $post_layout == 'grid-ls' || $post_layout == 'grid-rs' || $post_layout == 'grid'){
	$word_count = 20;
}else{
	$word_count = 50;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-wrapper">
        <?php
			if( true === get_theme_mod( 'enable_image', true ) ) {
				if(get_post_format() === 'gallery'){
					get_template_part( 'template-parts/post/post-format-gallery');
				}else if(get_post_format() === 'video'){
					get_template_part( 'template-parts/post/post-format-video');
				}else if( get_post_format() === 'audio'){
					get_template_part( 'template-parts/post/post-format-audio');
				}else{
					get_template_part( 'template-parts/post/post-format-others');
				}
			}
        ?>

		<div class="post-content-wrapper">

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="post-meta">
					<ul>
						<?php if( true === get_theme_mod( 'enable_author', true ) ) : ?>
							<li><?php bloghub_posted_by(); ?></li>
						<?php endif; ?>

						<?php if( true === get_theme_mod( 'enable_date', true ) ) : ?>
							<li><?php bloghub_posted_on(); ?></li>
						<?php endif; ?>

						<?php if( $post_layout == 'full-width' || $post_layout == 'left-sidebar' || $post_layout == 'right-sidebar') : ?>
                            
							<?php if( get_comments_number() != 0 &&  true === get_theme_mod( 'enable_comment', true ) ) : ?>
								<li class="comment-number"><?php bloghub_comment_count(); ?></li>
							<?php endif; ?>

							<?php if( true === get_theme_mod( 'enable_cats', true ) ) : ?>
								<li><?php bloghub_post_first_category(); ?></li> 
							<?php endif; ?>

                        <?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if( true === get_theme_mod( 'enable_title', true ) ) : ?>
				<?php the_title( '<h3 class="post-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			<?php endif; ?>

			<?php if( true === get_theme_mod( 'enable_dec', true ) ) : ?>
			<div class="post-excerpt">
				<p><?php echo bloghub_words_limit( get_the_excerpt(), $word_count ); ?><?php if ( ! empty( get_the_content() ) ) {
						echo ' [...]'; 
					} ?></p>
			</div>
			<?php endif; ?>

            <div class="post-footer">
				
				<?php if( true === get_theme_mod( 'enable_tags', true ) ) : ?>
                	<?php bloghub_post_tags(); ?>
				<?php endif; ?>

				<?php if( true === get_theme_mod( 'enable_btn', true ) ) : ?>
                <div class="post-read-more">
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_theme_mod( 'btn_text', 'Continue reading' ) ); ?><i class="fas fa-angle-double-right"></i></a>
                </div>
				<?php endif; ?>

            </div>
		</div>
	</div>
</article>