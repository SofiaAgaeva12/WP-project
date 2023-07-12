<?php

Kirki::add_section( 'post_slider_options', array(
	'title' => esc_html__( 'Post Slider Options', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

Kirki::add_field( 'theme_config', [
	'type'     => 'switch',
	'settings' => 'enable_post_slide',
	'label'    => esc_html__( 'Enable Post Slider', 'bloghub' ),
	'section'  => 'post_slider_options',
	'default'  => 'off',
	'choices'  => [
		'on'  => esc_html__( 'Enable', 'bloghub' ),
		'off' => esc_html__( 'Disable', 'bloghub' ),
	],
] );

new \Kirki\Field\Select(
	[
		'settings'        => 'post_border_by',
		'label'           => esc_html__( 'Post Order By', 'bloghub' ),
		'section'         => 'post_slider_options',
		'default'         => 'rand',
		'placeholder'     => esc_html__( 'Choose an option', 'bloghub' ),
		'choices'         => [
			'none'          => esc_html__( 'None', 'bloghub' ),
			'ID'            => esc_html__( 'ID', 'bloghub' ),
			'date'          => esc_html__( 'Date', 'bloghub' ),
			'name'          => esc_html__( 'Name', 'bloghub' ),
			'title'         => esc_html__( 'Title', 'bloghub' ),
			'comment_count' => esc_html__( 'Comment count', 'bloghub' ),
			'rand'          => esc_html__( 'Random', 'bloghub' ),
		],
		'active_callback' => [
			[
				'setting'  => 'enable_post_slide',
				'operator' => '===',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Select(
	[
		'settings'        => 'post_border',
		'label'           => esc_html__( 'Post Order', 'bloghub' ),
		'section'         => 'post_slider_options',
		'default'         => 'ASC',
		'placeholder'     => esc_html__( 'Choose an option', 'bloghub' ),
		'choices'         => [
			'ASC'  => esc_html__( 'ASC', 'bloghub' ),
			'DESE' => esc_html__( 'DESE', 'bloghub' ),
		],
		'active_callback' => [
			[
				'setting'  => 'enable_post_slide',
				'operator' => '===',
				'value'    => true,
			]
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'post_slider_pro',
		'label'       => esc_html__( 'This is Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'post_slider_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'slider_pro'   => get_template_directory_uri() . '/assets/image/pro/slider1.jpg',
			'slider2_pro'   => get_template_directory_uri() . '/assets/image/pro/slider2.jpg',
		],
		'active_callback' => [
			[
				'setting'  => 'enable_post_slide',
				'operator' => '===',
				'value'    => true,
			]
		],
	]
);