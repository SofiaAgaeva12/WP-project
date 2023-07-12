<?php
/**
 * Notification Options Header One
 */

 new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'header_search_pro',
		'label'       => esc_html__( 'Search Disable is Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'select_header_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'search_pro'   => get_template_directory_uri() . '/assets/image/pro/search.jpg',
		],
	]
);

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_search_icon_color',
	'label'           => __( 'Search Icon Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .header-search-box',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_search_icon_hcolor',
	'label'           => __( 'Search Hover Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .header-search-box a:hover',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_search_icon_bg',
	'label'           => __( 'Search BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .header-search-box a',
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_search_icon_hbg',
	'label'           => __( 'Search Hover BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .header-search-box a:hover',
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'search_popup_bg',
	'label'           => __( 'Popup BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-search-popup .header-search-overlay',
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'search_input_color',
	'label'           => __( 'PopUp Input Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-search-popup .header-search-popup-content form input[type=search]',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'search_input_bg',
	'label'           => __( 'PopUp Input BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-search-popup .header-search-popup-content form input[type=search]',
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'search_input_btn_c',
	'label'           => __( 'PopUp Button icon Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-search-popup .header-search-popup-content form button[type=submit]',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'search_input_btn_bg',
	'label'           => __( 'PopUp Button BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_search',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-search-popup .header-search-popup-content form button[type=submit]',
			'property' => 'background-color',
		),
	),
] );