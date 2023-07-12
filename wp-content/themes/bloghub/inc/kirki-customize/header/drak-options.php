<?php 
/**
 * Dark Mode Options Header One
 */
new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'header_dark_pro',
		'label'       => esc_html__( 'Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'select_header_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'dark_pro'   => get_template_directory_uri() . '/assets/image/pro/dark.jpg',
		],
	]
);