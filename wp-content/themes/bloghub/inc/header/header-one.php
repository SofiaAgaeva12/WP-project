<div class="container">
    <div class="header-wrapper header-one <?php echo esc_attr( get_theme_mod( 'header_social_switch' ) === true ? 'active-social' : '' );  ?>">
        
        <?php if( get_theme_mod( 'header_social_switch' ) === true ) : ?>
            <div class="header-social-box">
                <div class="header-social-item">
                    <ul>
                        <?php foreach( get_theme_mod( 'header_social_icons' ) as $item ) : ?>
                            <li><a href="<?php echo esc_url( $item['link'] ); ?>" target="<?php echo esc_attr( $item['target'] ); ?>" style="background-color:<?php echo esc_attr($item['color_bg']); ?>;color:<?php echo esc_attr($item['color']); ?>"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <nav class="navbar navbar-expand-lg navbar-light main-navigation" id="site-navigation">
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
            <div class="right-section">

<!--                --><?php //if( get_theme_mod( 'header_dark_mode', true ) ) : ?>
<!--                    <div class="switch-dark-lite">-->
<!--                        <label class="switch" for="darkswitch">-->
<!--                            <input type="checkbox" id="darkswitch" class="theme-dark-lite">-->
<!--                            <span class="slider"></span>-->
<!--                            <input type="hidden" name="theme_mode" value="--><?php //echo get_theme_mod( 'theme_mode', 'light' ); ?><!--">-->
<!--                        </label>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php //if( get_theme_mod( 'header_notification', false ) ) : ?>
<!--                    <div class="notification-icon">-->
<!--                        <a href="--><?php //echo esc_url( get_theme_mod( 'header_notification_link' ) ); ?><!--" target="--><?php //echo esc_attr( get_theme_mod( 'header_notification_open_new' ) === true ? '_blank' : '_self' ); ?><!--"><i class="fas fa-bell"></i></a>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>

                <?php if( get_theme_mod( 'header_search', true ) ) : ?>
                    <div class="header-search-box search-open">
                    <a href="#"><i class="fas fa-search"></i></a>
                    </div>
                <?php endif; ?>
            
            </div>
            <div id="mobile"></div>
        </nav><!-- #site-navigation -->
        
    </div> 
</div>