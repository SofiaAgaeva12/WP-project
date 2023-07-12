<?php
/*
Kirki::add_section( 'footer_subscribe_options', array(
	'title' => esc_html__( 'Footer Subscribe', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'subscribe_pro',
		'label'       => esc_html__( 'Disable Options Only for Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'footer_subscribe_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'subscribes_pro1'   => get_template_directory_uri() . '/assets/image/pro/subscribe.jpg',
		],
	]
);

new \Kirki\Field\Text(
	[
		'settings'        => 'ft_subscribe_title',
		'label'           => esc_html__( 'Title', 'bloghub' ),
		'section'         => 'footer_subscribe_options',
		'default'         => __( 'Subscribe To <span>Blog</span>Hub', 'bloghub' ),
		'active_callback' => [
			[
				'setting'  => 'ft_subscribe_enable',
				'operator' => '==',
				'value'    => true,
			],
		],
	]
);

new \Kirki\Field\Textarea(
	[
		'settings'        => 'ft_subscribe_content',
		'label'           => esc_html__( 'Content', 'bloghub' ),
		'section'         => 'footer_subscribe_options',
		'default'         => esc_html__( 'Get the latest posts delivered right to your email.', 'bloghub' ),
		'active_callback' => [
			[
				'setting'  => 'ft_subscribe_enable',
				'operator' => '==',
				'value'    => true,
			],
		],
	]
);

new \Kirki\Field\Text(
	[
		'settings'        => 'ft_subscribe_shotcode',
		'label'           => esc_html__( 'Shotcode', 'bloghub' ),
		'section'         => 'footer_subscribe_options',
		'active_callback' => [
			[
				'setting'  => 'ft_subscribe_enable',
				'operator' => '==',
				'value'    => true,
			],
		],
	]
);*/