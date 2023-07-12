<?php
Kirki::add_field( 'theme_config', [
	'type'        => 'radio_image',
	'settings'    => 'select_header',
	'label'       => esc_html__( 'Select Header', 'bloghub' ),
	'description' => esc_html__( 'Select Your Header', 'bloghub' ),
	'section'     => 'select_header_options',
	'default'     => 'two',
	'choices'     => [
		'one' => get_template_directory_uri() . '/assets/image/header.png',
		'two' => get_template_directory_uri() . '/assets/image/header-2.png',
	],
] );
new \Kirki\Field\Background(
	[
		'settings'    => 'header_box_bg2',
		'label'       => esc_html__( 'Header Top Section', 'bloghub' ),
		'description' => esc_html__( 'Add Background For header Top Section', 'bloghub' ),
		'section'     => 'select_header_options',
		'transport'   => 'auto',
		'active_callback' => [
			[
				'setting'  => 'select_header',
				'operator' => '===',
				'value'    => 'two',
			],
		],
		'default'     => [
			'background-image'      => get_template_directory_uri() . '/assets/image/header-bg.jpg',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'output'      => [
			[
				'element' => '.header-wrapper.Header-two .header-top-box',
			],
		],
	]
);
Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_box_bg',
	'label'           => __( 'Header Bckground Color', 'bloghub' ),
	'description'     => esc_html__( 'Add Background Color for Header', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#8571FF',
	'output'          => array(
		array(
			'element'  => array('.header-wrapper','.header-wrapper.Header-two .main-navigation'),
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'Dimension',
	'settings'        => 'header_radius',
	'label'           => esc_html__( 'Header Radius', 'bloghub' ),
	'section'         => 'select_header_options',
	'default'         => '50px',
	'transport'       => 'auto',
	'choices'         => [
		'accept_unitless' => true,
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper',
			'property' => 'border-radius',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'Radio_Buttonset',
	'settings'        => 'header_menu_tabs',
	'label'           => esc_html__( 'Menu Color Options', 'bloghub' ),
	'section'         => 'select_header_options',
	'default'         => 'menu_normal',
	'transport'       => 'auto',
	'choices'         => [
		'menu_normal' => esc_html__( 'Menu Normal', 'bloghub' ),
		'menu_hover'  => esc_html__( 'Menu Hover', 'bloghub' ),
	],
] );

/** Menu normal Color Options */

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_normal_fnemu_color',
	'label'           => __( 'Menu Color', 'bloghub' ),
	'description'     => esc_html__( 'This Color for First menu. not Sub Menu', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'header_menu_tabs',
			'operator' => '===',
			'value'    => 'menu_normal',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .main-navigation .navbar-collapse.nav-menu ul li a',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_normal_submenu_color',
	'label'           => __( 'Sub Menu Normal Color', 'bloghub' ),
	'description'     => esc_html__( 'This Color for Sub menu.', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'header_menu_tabs',
			'operator' => '===',
			'value'    => 'menu_normal',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .main-navigation .navbar-collapse.nav-menu ul ul li a',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_normal_submenu_bcolor',
	'label'           => __( 'Sub Menu Background Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#8571FF',
	'active_callback' => [
		[
			'setting'  => 'header_menu_tabs',
			'operator' => '===',
			'value'    => 'menu_normal',
		],
	],
	'output'          => array(
		array(
			'element'  => '.sf-menu ul li',
			'property' => 'background-color',
		),
	),
] );

/** Menu Hover Color Options */

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_normal_fnemu_hcolor',
	'label'           => __( 'Menu Color', 'bloghub' ),
	'description'     => esc_html__( 'This Color for First menu. not Sub Menu', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'header_menu_tabs',
			'operator' => '===',
			'value'    => 'menu_hover',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .main-navigation .navbar-collapse.nav-menu ul li a:hover',
			'property' => 'color',
		),
	),
] );


Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_normal_submenu_hcolor',
	'label'           => __( 'Sub Menu Hover Color', 'bloghub' ),
	'description'     => esc_html__( 'This Color for Sub menu.', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'header_menu_tabs',
			'operator' => '===',
			'value'    => 'menu_hover',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .main-navigation .navbar-collapse.nav-menu ul ul li a:hover',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_hover_submenu_hbcolor',
	'label'           => __( 'Sub Menu Background Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_menu_tabs',
			'operator' => '===',
			'value'    => 'menu_hover',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .main-navigation .navbar-collapse.nav-menu ul ul li:hover',
			'property' => 'background-color',
		),
	),
] );