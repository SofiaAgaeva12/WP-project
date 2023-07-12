<?php

Kirki::add_section( 'code_edit_options', array(
	'title' => esc_html__( 'Custom Code', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'js_code_pro',
		'label'       => esc_html__( 'Js Code For Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'code_edit_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'jscode_pro'   => get_template_directory_uri() . '/assets/image/pro/js.jpg',
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'head_code_pro',
		'label'       => esc_html__( 'WP Head Code Options For Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'code_edit_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'headcodepro'   => get_template_directory_uri() . '/assets/image/pro/head.jpg',
		],
	]
);