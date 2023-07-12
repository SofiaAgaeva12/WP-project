<?php

Kirki::add_section( 'general_options', array(
	'title' => esc_html__( 'General Options', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'theme_mode',
		'label'       => esc_html__( 'Theme Mode', 'bloghub' ),
		'section'     => 'general_options',
		'default'     => 'light',
		'priority'        => 2,
		'choices'     => [
			'light'   => esc_html__( 'Light Mode', 'bloghub' ),
			'dark' => esc_html__( 'Dark Mode', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'preload_pro',
		'label'       => esc_html__( 'Preloader Desible for Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'general_options',
		'default'     => '',
		'priority'        => 2,
		'transport'   => 'auto',
		'choices'     => [
			'preloadpro'   => get_template_directory_uri() . '/assets/image/pro/preload.jpg',
		],
	]
);

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'preloader_color1',
	'label'           => __( 'Preload Color One', 'bloghub' ),
	'section'         => 'general_options',
	'transport'       => 'auto',
	'priority'        => 2,
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'preloader_options',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.preloader-area .preloader-inner .theme-loader',
			'property' => 'border-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'preloader_color2',
	'label'           => __( 'Preload Color Two', 'bloghub' ),
	'section'         => 'general_options',
	'transport'       => 'auto',
	'priority'        => 2,
	'default'         => '#8571FF',
	'active_callback' => [
		[
			'setting'  => 'preloader_options',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.preloader-area .preloader-inner .theme-loader::after',
			'property' => 'border-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'preloader_bg',
	'label'           => __( 'Preloader Background Color', 'bloghub' ),
	'section'         => 'general_options',
	'transport'       => 'auto',
	'priority'        => 2,
	'default'         => '#18181B',
	'active_callback' => [
		[
			'setting'  => 'preloader_options',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.preloader-area',
			'property' => 'background-color',
		),
	),
] );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'top_to_pro',
		'label'       => esc_html__( 'Top To Disable for Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'general_options',
		'default'     => '',
		'transport'   => 'auto',
		'priority'        => 2,
		'choices'     => [
			'topto'   => get_template_directory_uri() . '/assets/image/pro/top-to.jpg',
		],
	]
);


Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'bottom_top_color',
	'label'           => __( 'Color', 'bloghub' ),
	'section'         => 'general_options',
	'transport'       => 'auto',
	'priority'        => 4,
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'bottom_to_top',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.to-top',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'bottom_top_bg',
	'label'           => __( 'Background Color', 'bloghub' ),
	'section'         => 'general_options',
	'transport'       => 'auto',
	'priority'        => 4,
	'default'         => '#8571FF',
	'active_callback' => [
		[
			'setting'  => 'bottom_to_top',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.to-top',
			'property' => 'background-color',
		),
	),
] );