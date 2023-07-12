<?php

Kirki::add_section( 'theme_color_options', array(
	'title' => esc_html__( 'Color Options', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'primary_color_enable',
		'label'    => esc_html__( 'Enable Primary Color', 'bloghub' ),
		'section'  => 'theme_color_options',
		'default'  => 'off',
		'transport'   => 'auto',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);
new \Kirki\Field\Color(
	[
		'settings'        => 'theme_primary_color',
		'label'           => __( 'Primary Color', 'bloghub' ),
		'section'         => 'theme_color_options',
		'choices'         => [
			'alpha' => true,
		],
		'default'         => '#8571FF',
		'active_callback' => [
			[
				'setting'  => 'primary_color_enable',
				'operator' => '===',
				'value'    => true,
			],
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'secondary_color_enable',
		'label'    => esc_html__( 'Enable Secondary Color', 'bloghub' ),
		'section'  => 'theme_color_options',
		'default'  => 'off',
		'transport'   => 'auto',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);
new \Kirki\Field\Color(
	[
		'settings'        => 'theme_secondary_color',
		'label'           => __( 'Secondary Color', 'bloghub' ),
		'section'         => 'theme_color_options',
		'choices'         => [
			'alpha' => true,
		],
		'default'         => '#18181B',
		'active_callback' => [
			[
				'setting'  => 'secondary_color_enable',
				'operator' => '===',
				'value'    => true,
			],
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'body_background_enable',
		'label'    => esc_html__( 'Enable Body Color', 'bloghub' ),
		'section'  => 'theme_color_options',
		'default'  => 'off',
		'transport'   => 'auto',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);
new \Kirki\Field\Background(
	[
		'settings'        => 'body_bg_color',
		'label'           => esc_html__( 'Background Color', 'bloghub' ),
		'section'         => 'theme_color_options',
		'transport'       => 'auto',
		'active_callback' => [
			[
				'setting'  => 'body_background_enable',
				'operator' => '===',
				'value'    => true,
			],
		],
		'default'         => '#ffffff',
		'output'          => [
			[
				'element' => 'body',
			],
		],
	]
);

new \Kirki\Field\Color(
	[
		'settings'        => 'sidebar_body_color',
		'label'           => __( 'Body/Text Color', 'bloghub' ),
		'section'         => 'theme_color_options',
		'choices'         => [
			'alpha' => true,
		],
		'transport'   => 'auto',
		'active_callback' => [
			[
				'setting'  => 'body_background_enable',
				'operator' => '===',
				'value'    => true,
			],
		],
		'output'          => [
			[
				'element' => 'body,p',
			],
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'sidebar_bg_enalbe',
		'label'    => esc_html__( 'Enable Sidebar Background', 'bloghub' ),
		'section'  => 'theme_color_options',
		'default'  => 'off',
		'transport'   => 'auto',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);
new \Kirki\Field\Color(
	[
		'settings'        => 'sidebar_bg_color',
		'label'           => __( 'Sidebar Background', 'bloghub' ),
		'section'         => 'theme_color_options',
		'choices'         => [
			'alpha' => true,
		],
		'default'         => '#F1EFFC',
		'transport'   => 'auto',
		'active_callback' => [
			[
				'setting'  => 'sidebar_bg_enalbe',
				'operator' => '===',
				'value'    => true,
			],
		],
		'output'          => [
			[
				'property' => 'background-color',
				'element' => '.sidebar-widget-area .widget',
			],
		],
	]
);