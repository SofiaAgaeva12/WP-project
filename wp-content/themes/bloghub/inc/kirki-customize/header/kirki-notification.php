<?php
/**
 * Notification Options Header One
 */

 new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'header_notification_pro',
		'label'       => esc_html__( 'Notification Disable Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'select_header_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'dark_pro'   => get_template_directory_uri() . '/assets/image/pro/notification.jpg',
		],
	]
);

Kirki::add_field( 'theme_config', [
	'type'            => 'url',
	'settings'        => 'header_notification_link',
	'label'           => __( 'Notification Add Link', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#',
	'active_callback' => [
		[
			'setting'  => 'header_notification',
			'operator' => '===',
			'value'    => true,
		],
	],
] );
Kirki::add_field( 'theme_config', [
	'type'            => 'switch',
	'settings'        => 'header_notification_open_new',
	'label'           => esc_html__( 'Open New Window?', 'bloghub' ),
	'section'         => 'select_header_options',
	'default'         => 'off',
	'transport'       => 'auto',
	'choices'         => [
		'on'  => esc_html__( 'Yes', 'bloghub' ),
		'off' => esc_html__( 'No', 'bloghub' ),
	],
	'active_callback' => [
		[
			'setting'  => 'header_notification',
			'operator' => '===',
			'value'    => true,
		],
	],
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_notification_icon_color',
	'label'           => __( 'Notification Icon Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#8571ff',
	'active_callback' => [
		[
			'setting'  => 'header_notification',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .notification-icon a',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_notification_icon_hcolor',
	'label'           => __( 'Notification Icon Hover Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'header_notification',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .notification-icon a:hover',
			'property' => 'color',
		),
	),
] );

Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_notification_icon_bg',
	'label'           => __( 'Notification BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#ffffff',
	'active_callback' => [
		[
			'setting'  => 'header_notification',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .notification-icon a',
			'property' => 'background-color',
		),
	),
] );
Kirki::add_field( 'theme_config', [
	'type'            => 'color',
	'settings'        => 'header_notification_icon_hbg',
	'label'           => __( 'Notification Hover BG Color', 'bloghub' ),
	'section'         => 'select_header_options',
	'transport'       => 'auto',
	'default'         => '#18181b',
	'active_callback' => [
		[
			'setting'  => 'header_notification',
			'operator' => '===',
			'value'    => true,
		],
	],
	'output'          => array(
		array(
			'element'  => '.right-section .notification-icon a:hover',
			'property' => 'background-color',
		),
	),
] );