<?php

Kirki::add_section( 'footer_options', array(
	'title' => esc_html__( 'Footer Options', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

Kirki::add_field( 'theme_config', [
	'type'        => 'radio_image',
	'settings'    => 'select_footer',
	'label'       => esc_html__( 'Select Footer', 'bloghub' ),
	'description' => esc_html__( 'Select Your Footer', 'bloghub' ),
	'section'     => 'footer_options',
	'default'     => 'one',
	'priority'    => 10,
	'choices'     => [
		'one' => get_template_directory_uri() . '/assets/image/footer-one.jpg',
	],
] );


new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'subscribe_pros',
		'label'       => esc_html__( 'This Featured For Pro. but Default is Show 4 Column', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'footer_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'subscribes_pro'   => get_template_directory_uri() . '/assets/image/pro/widgets.jpg',
		],
	]
);

Kirki::add_field( 'theme_config', array(
	'type'     => 'cnote',
	'section'  => 'footer_options',
	'label'    => __( 'Footer Background Settings', 'bloghub' ),
	'settings' => 'fnote2',
	'priority' => 13,
) );

new \Kirki\Field\Color(
	[
		'settings'  => 'footer_after_bg',
		'label'     => __( 'Background Color', 'bloghub' ),
		'section'   => 'footer_options',
		'priority'  => 14,
		'transport' => 'auto',
		'choices'   => [
			'alpha' => true,
		],
		'default'   => '#F1EFFC',
		'output'    => [
			[
				'element'  => '.footer-wrapper:after',
				'property' => 'background-color',
			],
		],
	]
);
new \Kirki\Field\Background(
	[
		'settings'  => 'footer_bg',
		'label'     => esc_html__( 'Footer Background Options', 'bloghub' ),
		'section'   => 'footer_options',
		'default'   => [
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'priority'  => 15,
		'transport' => 'auto',
		'output'    => [
			[
				'element' => '.footer-wrapper',
			],
		],
	]
);

Kirki::add_field( 'theme_config', array(
	'type'     => 'cnote',
	'section'  => 'footer_options',
	'label'    => __( 'Color Options', 'bloghub' ),
	'settings' => 'fnote2',
	'priority' => 16,
) );

new \Kirki\Field\Color(
	[
		'settings'  => 'footer_title_color',
		'label'     => __( 'Title Color', 'bloghub' ),
		'section'   => 'footer_options',
		'priority'  => 17,
		'transport' => 'auto',
		'default'   => '#18181B',
		'output'    => [
			[
				'element'  => '.footer-wrapper .footer-widget-area .widget-title, .footer-wrapper .footer-widget-area .widget_block h2,.footer-widget-area .widget.widget_rss cite',
				'property' => 'color',
			],
		],
	]
);

new \Kirki\Field\Color(
	[
		'settings'  => 'footer_content_color',
		'label'     => __( 'Content Color', 'bloghub' ),
		'section'   => 'footer_options',
		'priority'  => 17,
		'transport' => 'auto',
		'default'   => '#767C84',
		'output'    => [
			[
				'element'  => '.footer-widget, .footer-widget p,.footer-widget-area .widget ul li',
				'property' => 'color',
			],
		],
	]
);

new \Kirki\Field\Color(
	[
		'settings'  => 'footer_link_color',
		'label'     => __( 'Link Color', 'bloghub' ),
		'section'   => 'footer_options',
		'priority'  => 17,
		'transport' => 'auto',
		'default'   => '#18181B',
		'output'    => [
			[
				'element'  => '.footer-widget a, .footer-widget ul li a,.footer-widget-area .widget.widget_rss ul li a, .footer-widget-area .widget.widget_rss .rss-date',
				'property' => 'color',
			],
			[
				'element'  => '.footer-widget-area .widget.widget_archive li a:before, .footer-widget-area .wp-block-archives-list li a:before, .footer-widget-area .widget.widget_categories li a:before, .footer-widget-area .wp-block-categories-list li a:before, .footer-widget-area .widget.widget_pages li a:before, .footer-widget-area .widget.widget_meta li a:before, .footer-widget-area .widget.widget_nav_menu li a:before, .footer-widget-area .widget_recent_comments li:before, .footer-widget-area .widget_recent_entries li a:before, .footer-widget-area .wp-block-latest-posts__list li a:before, .footer-widget-area .wp-block-pages-list__item__link:before',
				'property' => 'background-color',
			],
		],
	]
);
new \Kirki\Field\Color(
	[
		'settings'  => 'footer_link_hcolor',
		'label'     => __( 'Link Hover Color', 'bloghub' ),
		'section'   => 'footer_options',
		'priority'  => 17,
		'transport' => 'auto',
		'default'   => '#8571FF',
		'output'    => [
			[
				'element'  => '.footer-widget a:hover, .footer-widget ul li a:hover,.footer-widget-area .widget.widget_rss ul li a:hover',
				'property' => 'color',
			],
			[
				'element'  => '.footer-widget-area .widget.widget_archive li a:hover:before, .footer-widget-area .widget.widget_categories li a:hover:before, .footer-widget-area .widget.widget_pages li a:hover:before, .footer-widget-area .widget.widget_meta li a:hover:before, .footer-widget-area .widget.widget_nav_menu li a:hover:before, .footer-widget-area .widget_recent_entries li a:hover:before, .footer-widget-area .wp-block-latest-posts__list li a:hover:before, .footer-widget-area .wp-block-categories-list li a:hover:before, .footer-widget-area .wp-block-archives-list li a:hover:before, .footer-widget-area .wp-block-pages-list__item__link:hover:before',
				'property' => 'background-color',
			],
		],
	]
);