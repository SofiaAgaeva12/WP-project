<?php 

    /**
     * BlogHub Site Branding Hook 
     */
    if( ! function_exists( 'bloghub_site_branding' ) ) :
        /**
         * Site Branding
         *
         * @since 1.0.0 
         */
        function bloghub_site_branding(){
            get_template_part( 'inc/header/header-'.''. get_theme_mod('select_header', 'two') .'' );
        } 
    endif;
    add_action( 'bloghub_action_before_header', 'bloghub_site_branding', 10 );

    /**
     * BlogHub Footer Contents Hook 
     */
    if ( ! function_exists( 'bloghub_footer_contents' ) ) :

        /**
         *  Footer Content
         *
         * @since 1.0.0
         */
        function bloghub_footer_contents() {
            get_template_part( 'inc/footer/footer-'.''. get_theme_mod('select_footer', 'one') .'' );
        }
    endif;
    add_action( 'bloghub_action_before_footer', 'bloghub_footer_contents', 10 );




    /**
     * BlogHub Footer Top Hook 
     */
    if ( ! function_exists( 'bloghub_footer_top' ) ) :

        /**
         *  Footer Content
         *
         * @since 1.0.0
         */
        function bloghub_footer_top() {
           ?>
            <?php if( true === get_theme_mod( 'ft_subscribe_enable', true ) ) : ?>
<!--            <div class="container">-->
<!--                <div class="footer-top-section">-->
<!--                    <div class="footer-top-inner">-->
<!--                        <div class="footer-top-content">-->
<!--                            --><?php //if( !empty( get_theme_mod( 'ft_subscribe_title' ) ) ) : ?>
<!--                                <h2 class="title-48"> --><?php //echo wp_kses( get_theme_mod( 'ft_subscribe_title' ), bloghub_allow_html() ); ?><!-- </h2>-->
<!--                            --><?php //else : ?>
<!--                                <h2 class="title-48">--><?php //echo __('Subscribe To <span>Blog</span>Hub','bloghub'); ?><!--</h2>-->
<!--                            --><?php //endif; ?>
<!--                            <p>--><?php //echo esc_html( get_theme_mod( 'ft_subscribe_content','Get the latest posts delivered right to your email.' ) ); ?><!--</p>-->
<!--                        </div>-->
<!--                        <div class="footer-top-input">-->
<!--                            <div class="input-email">-->
<!--                                --><?php //if( !empty( get_theme_mod( 'ft_subscribe_shotcode' ) ) ) : ?>
<!--                                    --><?php //echo do_shortcode(get_theme_mod( 'ft_subscribe_shotcode' ) ); ?>
<!--                                --><?php //else : ?>
<!--                                    <input type="text" placeholder="Enter Your Email">-->
<!--                                    <input type="submit" class="wpcf7-submit subcribe-btn">-->
<!--                                --><?php //endif; ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>	-->
<!--            </div>-->
        <?php endif; ?>
           <?php
        }
    endif;
    add_action( 'bloghub_action_footer_content', 'bloghub_footer_top', 10 );


    /**
     * BlogHub Footer Widgets Hook 
     */
    if ( ! function_exists( 'bloghub_footer_widgets' ) ) :

        /**
         *  Footer Content
         *
         * @since 1.0.0
         */
        function bloghub_footer_widgets() {
           ?>
                <div class="container">
                    <?php 
                        $footer_col = '3_3_3_3';
                        if( !empty( get_theme_mod( 'ft_widget_layout', '3_3_3_3' ) ) ){
                            $footer_col = get_theme_mod( 'ft_widget_layout', '3_3_3_3' );
                        }
                        if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) {
                            echo '<div class="footer-widget-area">';
                        }	
                        
                        if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) {
                            ?>
                            <?php 
                                if($footer_col == '3_3_3_3'){
                            ?>
                                <div class="row footer-widget-row">
                                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-1' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>

                                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-2' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>	

                                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-3' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>

                                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-4' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>
                                    
                                </div>
                            <?php }else{ ?>
                                <div class="row footer-widget-row">
                                    <?php
                                        $footer_col = explode('_', $footer_col);
                                        if( is_array($footer_col) && count($footer_col)>0 ){
                                            $i = 1;
                                            foreach($footer_col as $col){
                                            // ROW width class
                                            $row_class = 'col-xs-12 col-sm-12 col-md-6 col-lg-'.$col;
                                            if ( is_active_sidebar( 'footer-'.$i.'' ) ) : ?>
                                                <div class="<?php echo esc_attr($row_class); ?> footer">
                                                    <?php dynamic_sidebar( 'footer-'.$i.'' ); ?>
                                                </div><!-- .widget-area -->
                                            <?php endif;
                                            $i++;
                                            }
                                        }
                                    ?>
                                </div>
                            <?php } ?>
                        <?php
                        }
                        if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) {
                            echo '</div>';
                        }
                    ?>
                </div>
           <?php 
        }
    endif;
    add_action( 'bloghub_action_footer_content', 'bloghub_footer_widgets', 10 );


    /**
     * BlogHub Footer Copyright Hook 
     */
    if ( ! function_exists( 'bloghub_footer_copyright' ) ) :

        /**
         *  Footer Content
         *
         * @since 1.0.0
         */
        function bloghub_footer_copyright() {
            if ( has_nav_menu( 'footer' ) && true === get_theme_mod( 'enable_footer_menu', true ) ){
                $bloghub_center = 'copyright-inner';
            }else{
                $bloghub_center = 'copyright-inner justify-content-center';
            }
           ?>
            <div class="copyright-area">
                <div class="container">
                    <div class="<?php echo esc_attr( $bloghub_center ); ?>">
                        <div class="copyright-info">
                            <div class="site-info">
                                <?php
                                    $bloghub_powered_by = get_theme_mod( 'powered_by', 
                                        sprintf( esc_html__( ' Theme: blogHub by %s', 'bloghub' ), '<a target="_blank" rel="dofollow" href="'. esc_url( 'https://themeuniver.com/' ) .'">Themeuniver</a>' )
                                    );
                                ?>
                                <?php echo esc_html( get_theme_mod( 'copyright_text', 'Proudly powered by WordPress |') );?> <?php echo wp_kses_post( $bloghub_powered_by );?>
                            </div><!-- .site-info -->
                        </div>

                        <?php if ( has_nav_menu( 'footer' ) && true === get_theme_mod( 'enable_footer_menu', true ) ) : ?>
                            <div class="copyright-menu">
                                <?php
                                    wp_nav_menu(
                                        array(
                                            'container' 		  => false,
                                            'theme_location' 	=> 'footer',
                                            'menu_id'        	=> 'footer-menu',
                                            'fallback_cb'     => false,
                                        )
                                    );
                                ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
           <?php 
        }
    endif;
    add_action( 'bloghub_action_footer_content', 'bloghub_footer_copyright', 10 );

    /**
     * BlogHub breadcrumb Hook 
     */
    if ( ! function_exists( 'bloghub_breadcrumb_hook' ) ) :

        /**
         * breadcrumb
         *
         * @since 1.0.0
         */
        function bloghub_breadcrumb_hook() {  ?>
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="page-title-inner">
                        <?php bloghub_breadcrumb(); ?>
                    </div>
                </div>
            </div>
        <?php  }
    endif;
    add_action( 'bloghub_action_breadcrumb', 'bloghub_breadcrumb_hook' );
    

    /**
     * BlogHub Post Slider Hook 
     */
    if ( ! function_exists( 'bloghub_post_slider_hook' ) ) :

        /**
         * Post Slider
         *
         * @since 1.0.0
         */
        function bloghub_post_slider_hook() {  ?>
            <div class="post-slider-wrapper">
			<?php 
                if( true === get_theme_mod( 'enable_cat', false ) && !empty( get_theme_mod( 'post_by_cat' ) )){
                    $p = new \WP_Query( array( 
                        'posts_per_page' => get_theme_mod( 'post_show_number', 7 ),
                        'post_type' => 'post',
                        'orderby'        => get_theme_mod( 'post_border_by' ),
                        'order'          => get_theme_mod( 'post_border' ),
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'terms'    => get_theme_mod( 'post_by_cat' ),
                                'field' => 'term_id',
                            )
                        )
                    ));
                }else{
                    $p = new \WP_Query( array( 
                        'posts_per_page' => 5,
                        'post_type' => 'post',
                        'orderby'        => get_theme_mod( 'post_border_by' ),
                        'order'          => get_theme_mod( 'post_border' ),
                    ));
                }
            ?>
			<div class="container">
				<div class="post-slider-box">
					<?php while ( $p->have_posts() ): $p->the_post(); ?>
					<div class="post-slide-item">
						<div class="post-image-with-content" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>)">
							<div class="bloghub-table">
								<div class="bloghub-table-cell">
									<div class="post-slide-content">
                                        
                                        <?php if( get_theme_mod( 'post_show_cat', true ) ) : ?>
										<div class="category" data-animation="fadeInUp" data-delay=".4s">
											<ul>
												<li><?php bloghub_post_first_category(); ?></li>
											</ul>
										</div>
                                        <?php endif; ?>

                                        <?php if( get_theme_mod( 'post_show_title', true ) ) : ?>
										<<?php echo esc_attr( get_theme_mod( 'post_title_tag', 'h2' ) ); ?> class="post-title" data-animation="fadeInUp" data-delay=".4s">
											<a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
										</<?php echo esc_attr( get_theme_mod( 'post_title_tag', 'h2' ) ); ?>>
                                        <?php endif; ?>
                                        
                                        <?php if( get_theme_mod( 'post_show_meta', true ) ) : ?>
										<div class="post-meta" data-animation="fadeInUp" data-delay=".4s">
											<ul>
												<li><?php bloghub_posted_by(); ?></li>
												<li><?php bloghub_posted_on(); ?></li>
												<?php if ( get_comments_number() != 0 ) : ?>
													<li class="comment-number"><?php bloghub_comment_count(); ?></li>
												<?php endif; ?>
											</ul>
										</div>
                                        <?php endif; ?>

									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_query();?>
				</div>
			</div>
		</div>
        <?php  }
    endif;
    add_action( 'bloghub_action_PostSlider', 'bloghub_post_slider_hook' );


    /**
     * BlogHub Author Section Hook 
     */
    if ( ! function_exists( 'bloghub_author_section_hook' ) ) :

        /**
         * breadcrumb
         *
         * @since 1.0.0
         */
        function bloghub_author_section_hook() {  ?>
            <div class="author-info-wrapper">
                <div class="author-info-box">
                    <div class="author-image">
                        <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
                    </div>
                    <div class="author-info">
                        <h2><?php the_author_posts_link(); ?></h2>
                        <p><?php the_author_meta('description'); ?></p>
                    </div>
                </div>
            </div>
        <?php  }
    endif;
    add_action( 'bloghub_action_author_section', 'bloghub_author_section_hook' );


    // demo import 

    function bloghub_ocdi_import_files() {
        $url = 'https://demo.themeuniver.com/demo-data/bloghub/';
        $demo = 'https://demo.themeuniver.com/bloghub';
        return array(
                array(
                    'import_file_name'  => esc_html__('Demo page','bloghub' ),
                    'import_file_url' =>  $url . 'demo.xml',
                    'import_widget_file_url'  => $url . 'widgets.wie',
                    'import_customizer_file_url'  => $url . 'customizer.dat',
                    'preview_url'   => $demo,
            ),
        );
    }
    add_filter( 'ocdi/import_files', 'bloghub_ocdi_import_files' );

  function ocdi_after_import_setup() {
      // Assign menus to their locations.
      $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
      $top_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
      set_theme_mod( 'nav_menu_locations', array(
              'primary' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
              'footer' => $top_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
          )
      );
    }
  add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );