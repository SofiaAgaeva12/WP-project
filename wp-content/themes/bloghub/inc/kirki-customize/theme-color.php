<?php

function bloghub_custom_style() {

	if ( true === get_theme_mod( 'primary_color_enable', false ) && !empty( get_theme_mod( 'theme_primary_color' ) ) ) {
		?>
            <style>
            input[type=submit],
            button[type=submit],
            .theme-button,.wp-block-calendar caption,
            .calendar_wrap caption,.wp-block-button .wp-block-button__link:hover,.wp-block-button.is-style-outline .wp-block-button__link:hover,.slick-slider .slick-arrow:hover,.to-top,.header-wrapper,.header-search-popup .header-search-overlay,.header-search-popup .header-search-overlay .closes-button,span.tags-links a,.post-thumbnail-wrapper .video-button,.post-slider-box .post-image-with-content .bloghub-table .bloghub-table-cell .post-slide-content .category ul li a,nav.navigation.pagination ul li a:hover,
            .pagination-area ul li a:hover,nav.navigation.comments-pagination ul li a:hover,nav.navigation.pagination ul li span.page-numbers.current,nav.navigation.pagination ul li span.current,nav.navigation.pagination ul li a.current,nav.navigation.pagination ul li span,.pagination-area ul li span.page-numbers.current,.pagination-area ul li span.current,.pagination-area ul li a.current,.pagination-area ul li span,nav.navigation.comments-pagination ul li span.page-numbers.current,nav.navigation.comments-pagination ul li span.current,nav.navigation.comments-pagination ul li a.current,nav.navigation.comments-pagination ul li span,.page-links span.current,.page-links span:hover,.page-links a:hover,.comments-area a .page-numbers:hover,.footer-wrapper .footer-top-section .footer-top-inner .input-email input[type=submit],.footer-wrapper .copyright-area,.widget.widget_tag_cloud a,.wp-block-tag-cloud a,.footer-widget-area .widget.widget_archive li a:hover:before,.footer-widget-area .widget.widget_categories li a:hover:before,.footer-widget-area .widget.widget_pages li a:hover:before,.footer-widget-area .widget.widget_meta li a:hover:before,.footer-widget-area .widget.widget_nav_menu li a:hover:before,.footer-widget-area .widget_recent_entries li a:hover:before,.footer-widget-area .wp-block-latest-posts__list li a:hover:before,
            .footer-widget-area .wp-block-categories-list li a:hover:before,.footer-widget-area .wp-block-archives-list li a:hover:before, .footer-widget-area .wp-block-pages-list__item__link:hover:before,.widget button[type="submit"].wp-block-search__button,.post-details-wrapper article .entry-content .wp-block-button__link:hover, .post-details-wrapper article .entry-content .wp-block-file .wp-block-file__button:hover,.woocommerce-info,
            .woocommerce-noreviews,p.no-comments,.woo-single-item-warpper .product-item .product-img .product-overlay .product-content a,.woocommerce ul.products li.product .onsale,.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,.woocommerce a.remove:hover,#add_payment_method #payment div.payment_box,
.woocommerce-cart #payment div.payment_box,
.woocommerce-checkout #payment div.payment_box,p.woocommerce-notice.woocommerce-notice--success.woocommerce-thankyou-order-received,.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,a.mini-cart-button label,p.woocommerce-mini-cart__buttons.buttons a,.bloghub-mini-cart-items li.woocommerce-mini-cart-item.mini_cart_item a.remove.remove_from_cart_button {
                background-color: <?php echo esc_attr( get_theme_mod( 'theme_primary_color' ) ); ?>;
            }

            .title-48 span,.page-title-wrapper .page-title-inner ul li a,.wp-block-calendar #today, .calendar_wrap #today,.wp-block-calendar a:hover,.calendar_wrap a:hover,.slick-slider .slick-arrow,.right-section .switch-dark-lite .switch .slider::before,.right-section .switch-dark-lite .switch .slider::after,.right-section .notification-icon a,.right-section .header-search-box,.single-post-item .sticky .single-post-wrapper::after,.single-post-item article .post-content-wrapper .post-title a:hover,.single-post-item article .post-content-wrapper .post-footer .post-read-more a:hover,.single-post-item article .post-content-wrapper .post-footer .post-read-more a i,.post-meta ul li i,.post-meta ul li a:hover,.post-thumbnail-wrapper .video-button:hover,.author-info-wrapper .author-info-box .author-info h2 a:hover,.post-slider-box .post-image-with-content .bloghub-table .bloghub-table-cell .post-slide-content .post-title a:hover,.post-slider-box .post-image-with-content .bloghub-table .bloghub-table-cell .post-slide-content .post-meta ul li a:hover,.bloghub-post-navication-single .nav-links .post-single-nav .nav-title a:hover,.screen-reader-text:focus,.sidebar-widget-area .widget .wp-block-categories li a:hover,
            .sidebar-widget-area .widget .wp-block-archives li a:hover,.sidebar-widget-area .widget.widget_categories a:hover,.sidebar-widget-area .widget.widget_archive li:hover a, .sidebar-widget-area .widget.widget_pages li a:hover, .sidebar-widget-area .widget.widget_meta li a:hover, .sidebar-widget-area .widget.widget_nav_menu li a:hover, .sidebar-widget-area .widget.widget_nav_menu li.current-menu-item a,
            .sidebar-widget-area .widget.widget_categories a:hover+.post-count-number, .sidebar-widget-area .widget.widget_archive li:hover .post-count-number, .sidebar-widget-area .widget .wp-block-categories li a:hover+.post-count-number,.sidebar-widget-area .widget .wp-block-archives li a:hover+.post-count-number,.sidebar-widget-area .widget.widget_recent_entries li a:hover,.sidebar-widget-area .wp-block-latest-posts li a:hover,.sidebar-widget-area .widget.widget_recent_comments li a:hover, .sidebar-widget-area .wp-block-latest-comments__comment a:hover,.widget_block.widget_recent_comments li .wp-block-latest-comments__comment-meta time,.widget.widget_rss ul li a,.site-footer a:hover,
            .footer-widget-area .widget.widget_rss ul li a,.footer-widget-area .widget.widget_rss .rss-date,.post-details-wrapper article .entry-content a:hover,.comment-content a:hover, .comment-body a:hover,ul.bloghub-recent-post-widget li .bloghub-recent-post-title-and-date h6 a:hover,.woocommerce .star-rating span::before,.woocommerce .star-rating::before,.woo-single-item-warpper .product-item .product-info .product-holder .woocommerce-loop-product__title:hover,
.woocommerce p.stars a,.woocommerce ul.products li.product .price,.woocommerce ul.product_list_widget li ins,.woocommerce div.product p.price del,
.woocommerce div.product span.price del,.woocommerce div.product p.price ins,
.woocommerce div.product span.price ins,.woocommerce-message::before,.woocommerce a.remove,#bloghub-shop-view-mode li:hover,.woocommerce div.product p.price,
.woocommerce div.product span.price,.bloghub-product-list-view .woocommerce ul.products li.product .price,.woocommerce-MyAccount-content p a,form.woocommerce-product-search button,li.bloghub-mini-cart-items li.woocommerce-mini-cart-item.mini_cart_item a,.bloghub-hmini a span{
                    color: <?php echo esc_attr( get_theme_mod( 'theme_primary_color' ) ); ?>;
                }

            .wp-block-button.is-style-outline .wp-block-button__link:hover,.slick-slider .slick-arrow,.preloader-area .preloader-inner .theme-loader::after,.post-slider-box .slick-arrow,.page-links span,.page-links a,blockquote.wp-block-quote,blockquote,.wp-block-quote.is-large,.wp-block-quote.is-style-large,
            .wp-block-quote.is-large:not(.is-style-plain),.wp-block-quote.is-style-large:not(.is-style-plain),#add_payment_method #payment div.payment_box::before,
.woocommerce-cart #payment div.payment_box::before,
.woocommerce-checkout #payment div.payment_box::before,.woocommerce ul.order_details li {
                border-color:<?php echo esc_attr( get_theme_mod( 'theme_primary_color' ) ); ?>;
            }
            </style>
        <?php 
    }

    if ( true === get_theme_mod( 'secondary_color_enable', false ) && !empty( get_theme_mod( 'theme_secondary_color' ) ) ) {
		?>
            <style>
                input[type=submit]:hover,button[type=submit]:hover,.theme-button:hover,.preloader-area,.right-section .notification-icon a:hover,.right-section .header-search-popup .header-search-popup-content form button[type=submit],.header-search-popup .header-search-overlay .closes-button:hover,span.tags-links a:hover,.footer-wrapper .footer-top-section .footer-top-inner .input-email input[type=submit]:hover,.woo-single-item-warpper .product-item .product-img .product-overlay .product-content a:hover,.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,.woocommerce #respond input#submit:disabled[disabled]:hover,.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,.woocommerce a.button:disabled[disabled]:hover,.woocommerce button.button.disabled:hover,.woocommerce button.button:disabled:hover,
.woocommerce button.button:disabled[disabled]:hover,.woocommerce input.button.disabled:hover,.woocommerce input.button:disabled:hover,
.woocommerce input.button:disabled[disabled]:hover,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,ul.bloghub-hmini span.count{
                    background-color: <?php echo esc_attr( get_theme_mod( 'theme_secondary_color' ) ); ?>;
                }

                h1,h2,h3,h4,h5,h6,strong,dt,th,.comment-meta .fn,.comment-reply-link,.no-comments,:focus,.page-title-wrapper .page-title-inner ul li,.wp-block-calendar th,.calendar_wrap th,.wp-block-calendar td,
                .calendar_wrap td,.wp-block-button.is-style-outline .wp-block-button__link,.header-wrapper .main-navigation .navbar-collapse.nav-menu ul li a:hover,.single-post-item article .post-content-wrapper .post-title a,.single-post-item article .post-content-wrapper .post-footer span.tag-title,.author-info-wrapper .author-info-box .author-info h2 a,nav.navigation.pagination ul li a,nav.navigation.pagination ul li span,nav.navigation.pagination ul li span.page-numbers.current,.pagination-area ul li a,
                .pagination-area ul li span,.pagination-area ul li span.page-numbers.current,nav.navigation.comments-pagination ul li a,nav.navigation.comments-pagination ul li span,nav.navigation.comments-pagination ul li span.page-numbers.current,.page-links span,.page-links a,.footer-wrapper .footer-widget-area .widget-title,.footer-wrapper .footer-widget-area .widget_block h2,.footer-wrapper .copyright-area .copyright-inner .site-info a,.footer-wrapper .copyright-area .copyright-inner .copyright-menu ul li a:hover,a,ul.bloghub-recent-post-widget li .bloghub-recent-post-title-and-date h6 a,.woo-single-item-warpper .product-item .product-info .product-holder .woocommerce-loop-product__title,.woo-single-item-warpper .product-item .product-info .product-holder .woocommerce-loop-product__title,div.woocommerce-info a.showcoupon:hover,#bloghub-shop-view-mode li,.woocommerce-ordering select.orderby,.woocommerce-MyAccount-content p a:hover,.woocommerce-MyAccount-content .woocommerce-message.woocommerce-message--info.woocommerce-Message.woocommerce-Message--info.woocommerce-info,li.bloghub-mini-cart-items li.woocommerce-mini-cart-item.mini_cart_item a:hover,.sidebar-widget-area .widget.widget_block h2,.sidebar-widget-area .widget-title, .widget label.wp-block-search__label
                {
                    color: <?php echo esc_attr( get_theme_mod( 'theme_secondary_color' ) ); ?>;
                }
            
                .wp-block-button.is-style-outline .wp-block-button__link,p.woocommerce-notice.woocommerce-notice--success.woocommerce-thankyou-order-received {
                    border-color:<?php echo esc_attr( get_theme_mod( 'theme_secondary_color' ) ); ?>;
                }
            </style>
        <?php 
    }
}
add_action( 'wp_head', 'bloghub_custom_style', 10, 0 );