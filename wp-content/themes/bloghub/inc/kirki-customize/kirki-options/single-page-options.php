<?php

Kirki::add_section( 'single_options', array(
	'title' => esc_html__( 'Single Page Options', 'bloghub' ),
	'panel' => 'bloghub_option_layout',
) );

new \Kirki\Field\Select(
	[
		'settings' => 'single_layout',
		'label'    => esc_html__( 'Select Single Page Layout', 'bloghub' ),
		'section'  => 'single_options',
		'default'  => 'right-sidebar',
		'choices'  => [
			'full-width'    => esc_html__( 'Full Width', 'bloghub' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bloghub' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'single_breadcrumb_enable',
		'label'    => esc_html__( 'Enable Breadcrumb', 'bloghub' ),
		'section'  => 'single_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'single_page_pro',
		'label'       => esc_html__( 'Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'single_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'single_pro1'   => get_template_directory_uri() . '/assets/image/pro/single1.jpg',
			'single_pro2'   => get_template_directory_uri() . '/assets/image/pro/single2.jpg',
		],
	]
);