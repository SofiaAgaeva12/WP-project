<?php 
new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'header_sticky_pro',
		'label'       => esc_html__( 'Sticky is Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'select_header_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'sticky'   => get_template_directory_uri() . '/assets/image/pro/sticky.jpg',
		],
	]
);