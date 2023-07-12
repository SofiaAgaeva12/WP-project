<?php

Kirki::add_section( 'error_options', array(
	'title' => esc_html__( 'Error Page', 'bloghub' ),
	'panel' => 'bloghub_option_layout',
) );

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'error_breadcrumb',
		'label'    => esc_html__( 'Enable Breadcrumb', 'bloghub' ),
		'section'  => 'error_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'error_title',
		'label'    => esc_html__( 'Title', 'bloghub' ),
		'section'  => 'error_options',
		'default'  => esc_html__( 'Oops! That page can&rsquo;t be found', 'bloghub' ),
	]
);

new \Kirki\Field\Textarea(
	[
		'settings' => 'error_content',
		'label'    => esc_html__( 'Content', 'bloghub' ),
		'section'  => 'error_options',
		'default'  => esc_html__( 'We are really sorry but the page you requested is missing.', 'bloghub' ),
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'error_pro_box',
		'label'       => esc_html__( 'Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'error_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'error_pros'   => get_template_directory_uri() . '/assets/image/pro/error.jpg',
		],
	]
);