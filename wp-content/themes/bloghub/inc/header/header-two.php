<div class="header-wrapper Header-two">
    <div class="header-top-box">
        <div class="header-top-inner">
            <div class="container">
                <div class="row">

                    <?php if( get_theme_mod( 'header_social_switch', true ) === true  && !empty(get_theme_mod( 'header_social_icons' ))) : ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="header-social-box">
                                <div class="header-social-item">
                                    <ul>
                                        <?php foreach( get_theme_mod( 'header_social_icons' ) as $item ) : ?>
                                            <li><a href="<?php echo esc_url( $item['link'] ); ?>" target="<?php echo esc_attr( $item['target'] ); ?>" style="background-color:<?php echo esc_attr($item['color_bg']); ?>;color:<?php echo esc_attr($item['color']); ?>"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="logo-area">
                            <div class="site-branding">
                                <?php
                                if( has_custom_logo() ){
                                    the_custom_logo();
                                } else {
                                    ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php 
                                    $bloghub_description = get_bloginfo( 'description', 'display' );
                                    if ( $bloghub_description || is_customize_preview() ) :
                                        ?>
                                            <p class="site-description"><?php echo $bloghub_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                                        <?php
                                    endif; 
                                }?>
                            </div><!-- .site-branding -->
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="right-section">

<!--                            --><?php //if( true === get_theme_mod( 'header_dark_mode', true ) ) : ?>
<!--                                <div class="switch-dark-lite">-->
<!--                                    <label class="switch" for="darkswitch">-->
<!--                                        <input type="checkbox" id="darkswitch" class="theme-dark-lite">-->
<!--                                        <span class="slider"></span>-->
<!--                                        <input type="hidden" name="theme_mode" value="--><?php //echo get_theme_mod( 'theme_mode', 'light' ); ?><!--">-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            --><?php //endif; ?>
<!---->
<!--                            --><?php //if( true === get_theme_mod( 'header_notification', true ) ) : ?>
<!--                                <div class="notification-icon">-->
<!--                                    <a href="--><?php //echo esc_url( get_theme_mod( 'header_notification_link' ) ); ?><!--" target="--><?php //echo esc_attr( get_theme_mod( 'header_notification_open_new' ) === true ? '_blank' : '_self' ); ?><!--"><i class="fas fa-bell"></i></a>-->
<!--                                </div>-->
<!--                            --><?php //endif; ?>

                            <?php if( true === get_theme_mod( 'header_search', true ) ) : ?>
                                <div class="header-search-box search-open">
                                <a href="#"><i class="fas fa-search"></i></a>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light main-navigation" id="site-navigation">
        
        <div class="container">
            <div class="navbar-collapse nav-menu">
                <?php
                    wp_nav_menu(
                    array(
                        'container' 		  => false,
                        'theme_location' 	=> 'primary',
                        'menu_id'        	=> 'primary-menu',
                        'menu_class'      => 'sf-menu ms-auto me-auto',
                        'fallback_cb'     => 'bloghub_primary_navigation_fallback',
                    )
                    );
                ?>
            </div>
            
            <div id="mobile"></div>
        </div>
    </nav><!-- #site-navigation -->
    
</div> 