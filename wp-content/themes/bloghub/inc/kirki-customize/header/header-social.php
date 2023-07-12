<?php
/**
 * Header social Start
 */
Kirki::add_section( 'header_social_options', array(
	'title'    => esc_html__( 'Header Social', 'bloghub' ),
	'panel'    => 'header_options',
) );

Kirki::add_field( 'theme_config', [
	'type'        => 'switch',
	'settings'    => 'header_social_switch',
	'label'       => esc_html__( 'Enable Socials', 'bloghub' ),
	'description' => esc_html__( 'Enable Social Section for Header', 'bloghub' ),
	'section'     => 'header_social_options',
	'default'     => 'on',
	'choices'     => [
		'on'  => esc_html__( 'Enable', 'bloghub' ),
		'off' => esc_html__( 'Disable', 'bloghub' ),
	],
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'Repeater',
	'settings'        => 'header_social_icons',
	'label'           => esc_html__( 'Socials Icon', 'bloghub' ),
	'section'         => 'header_social_options',
	'row_label'       => [
		'type'  => 'field',
		'field' => 'name',
	],
	'button_label'    => esc_html__( '"Add Social Icon', 'bloghub' ),
	'choices' => [
		'limit' => 3
	],
	'default'         => [
		[
			'name'     => esc_html__( 'Facebook', 'bloghub' ),
			'icon'     => 'fab fa-facebook-f',
			'link'     => '#',
			'target'   => '_self',
			'color'    => '#ffffff',
			'color_bg' => '#175BEB',
		],
		[
			'name'     => esc_html__( 'Twitter', 'bloghub' ),
			'icon'     => 'fab fa-twitter',
			'link'     => '#',
			'target'   => '_self',
			'color'    => '#ffffff',
			'color_bg' => '#1DA1F2',
		],
		[
			'name'     => esc_html__( 'Linkedin', 'bloghub' ),
			'icon'     => 'fab fa-linkedin-in',
			'link'     => '#',
			'target'   => '_self',
			'color'    => '#ffffff',
			'color_bg' => '#0072B1',
		]
	],
	'fields'          => [
		'name'     => [
			'type'        => 'text',
			'label'       => esc_html__( 'Social Name', 'bloghub' ),
			'description' => esc_html__( 'Add Social Media Name', 'bloghub' ),
			'default'     => esc_html__( 'Facebook', 'bloghub' ),
		],

		'icon'     => [
			'type'        => 'select',
			'label'       => esc_html__( 'Social Icon', 'bloghub' ),
			'description' => esc_html__( 'Add Social Icon Here', 'bloghub' ),
			'default'     => 'fab fa-facebook-f',
			'choices'     => [
				'fab fa-facebook-f'     => esc_attr__( 'Facebook', 'bloghub' ),
				'fab fa-twitter'        => esc_attr__( 'Twitter', 'bloghub' ),
				'fab fa-linkedin-in'    => esc_attr__( 'Linkedin', 'bloghub' ),
				'fab fa-instagram'      => esc_attr__( 'Instagram', 'bloghub' ),
				'fab fa-pinterest'      => esc_attr__( 'Pinterest', 'bloghub' ),
				'fab fa-dribbble'       => esc_attr__( 'Dribbble', 'bloghub' ),
				'fab fa-behance'        => esc_attr__( 'Behance', 'bloghub' ),
				'fab fa-tiktok'         => esc_attr__( 'Tiktok', 'bloghub' ),
				'fab fa-snapchat-ghost' => esc_attr__( 'Snapchat', 'bloghub' ),
				'fab fa-youtube'        => esc_attr__( 'Youtube', 'bloghub' ),
				'fab fa-weixin'         => esc_attr__( 'Weixin', 'bloghub' ),
				'fab fa-telegram'       => esc_attr__( 'Telegram', 'bloghub' ),
				'fab fa-reddit'         => esc_attr__( 'Reddit', 'bloghub' ),
				'fab fa-quora'          => esc_attr__( 'Quora', 'bloghub' ),
				'fab fa-discord'        => esc_attr__( 'Discord', 'bloghub' ),
				'fab fa-whatsapp'       => esc_attr__( 'Whatsapp', 'bloghub' ),
			],
		],
		'link'     => [
			'type'        => 'text',
			'label'       => esc_html__( 'Link URL', 'bloghub' ),
			'description' => esc_html__( 'Add Social Link Here', 'bloghub' ),
			'default'     => '#',
		],
		'target'   => [
			'type'        => 'select',
			'label'       => esc_html__( 'Link Target', 'bloghub' ),
			'description' => esc_html__( 'Select Target Option', 'bloghub' ),
			'default'     => '_self',
			'choices'     => [
				'_blank' => esc_html__( 'New Window', 'bloghub' ),
				'_self'  => esc_html__( 'Same Frame', 'bloghub' ),
			],
		],
		'color'    => [
			'type'        => 'color',
			'label'       => esc_html__( 'Icon Color', 'bloghub' ),
			'description' => esc_html__( 'Add Social Icon Color', 'bloghub' ),
			'alpha'       => true,
			'transport'   => 'auto',
		],
		'color_bg' => [
			'type'        => 'color',
			'label'       => esc_html__( 'Icon Background', 'bloghub' ),
			'description' => esc_html__( 'Add Social Icon Background Color', 'bloghub' ),
			'alpha'       => true,
			'transport'   => 'auto',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'header_social_switch',
			'operator' => '===',
			'value'    => true,
		],
	],
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'Radio_Buttonset',
	'settings'        => 'header_social_alignment',
	'label'           => esc_html__( 'Alignment', 'bloghub' ),
	'description'     => esc_html__( 'Social Media Section Alignment', 'bloghub' ),
	'section'         => 'header_social_options',
	'default'         => 'center',
	'transport'       => 'auto',
	'choices'         => [
		'flex-start' => esc_html__( 'Left', 'bloghub' ),
		'center'     => esc_html__( 'Center', 'bloghub' ),
		'flex-end'   => esc_html__( 'Right', 'bloghub' ),
	],
	'active_callback' => [
		[
			'setting'  => 'header_social_switch',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'select_header',
			'operator' => '===',
			'value'    => 'one',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper.header-one .header-social-item',
			'property' => 'justify-content',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'Radio_Buttonset',
	'settings'        => 'header_social_alignment2',
	'label'           => esc_html__( 'Alignment', 'bloghub' ),
	'description'     => esc_html__( 'Social Media Section Alignment', 'bloghub' ),
	'section'         => 'header_social_options',
	'default'         => 'flex-start',
	'transport'       => 'auto',
	'choices'         => [
		'flex-start' => esc_html__( 'Left', 'bloghub' ),
		'center'     => esc_html__( 'Center', 'bloghub' ),
		'flex-end'   => esc_html__( 'Right', 'bloghub' ),
	],
	'active_callback' => [
		[
			'setting'  => 'header_social_switch',
			'operator' => '===',
			'value'    => true,
		],
		[
			'setting'  => 'select_header',
			'operator' => '===',
			'value'    => 'two',
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper.header-two .header-social-item',
			'property' => 'justify-content',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_social_box_bg',
	'label'           => __( 'Box Background', 'bloghub' ),
	'description'     => esc_html__( 'Add Social Box Background Color', 'bloghub' ),
	'section'         => 'header_social_options',
	'default'         => '#ffffff',
	'transport'       => 'auto',
	'active_callback' => [
		[
			'setting'  => 'header_social_switch',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .header-social-item ul',
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'Dimension',
	'settings'        => 'header_social_box_radius',
	'label'           => esc_html__( 'Border Radius', 'bloghub' ),
	'description'     => esc_html__( 'Add Social Box Border Radius', 'bloghub' ),
	'section'         => 'header_social_options',
	'default'         => '100px',
	'transport'       => 'auto',
	'choices'         => [
		'accept_unitless' => true,
	],
	'active_callback' => [
		[
			'setting'  => 'header_social_switch',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.header-wrapper .header-social-item ul',
			'property' => 'border-radius',
		),
	),
] );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'header_social_pro',
		'label'       => esc_html__( '3 Icon Support for Free Version', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'header_social_options',
		'default'     => '',
		'transport'   => 'auto',
		'active_callback' => [
			[
				'setting'  => 'header_social_switch',
				'operator' => '===',
				'value'    => true,
			],
		],
	]
);