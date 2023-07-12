<?php 
if(is_archive()){
	$page_layout = get_theme_mod( 'archive_layout', 'right-sidebar');
}else if(is_search()){
	$page_layout = get_theme_mod( 'search_layout', 'right-sidebar');
}else{
	$page_layout = get_theme_mod( 'blog_layout', 'right-sidebar');
}

if( $page_layout == 'left-sidebar' && is_active_sidebar('sidebar-1') || $page_layout == 'grid-ls' && is_active_sidebar('sidebar-1') || $page_layout == 'right-sidebar' && is_active_sidebar('sidebar-1') || $page_layout == 'grid-rs' && is_active_sidebar('sidebar-1')){
	$page_column_class = 'col-12 col-lg-8';
}else{
	$page_column_class = 'col-12 col-lg-12';
}

?>

<div class="row">

    <?php if( $page_layout == 'left-sidebar' && is_active_sidebar('sidebar-1') || $page_layout == 'grid-ls' && is_active_sidebar('sidebar-1')) : ?>
        <div class="col-12 col-lg-4">
			<?php get_sidebar();?>
        </div>
	<?php endif ?>

    <div class="<?php echo esc_attr($page_column_class);?>">
        <div class="row all-posts-wrapper">
            <?php
                if ( have_posts() ) :
                    if ( is_home() && ! is_front_page() ) :
                        ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
                    endif;
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/post/post-item-wrapper' );
                    endwhile;
                    if( true === get_theme_mod( 'enable_pagination', true ) ) :
                        bloghub_Post_pagination();
                    endif;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
            ?>
        </div>
    </div>

    <?php if( $page_layout == 'right-sidebar' && is_active_sidebar('sidebar-1') || $page_layout == 'grid-rs' && is_active_sidebar('sidebar-1')) : ?>
        <div class="col-12 col-lg-4">
			<?php get_sidebar();?>
        </div>
	<?php endif ?>

</div>