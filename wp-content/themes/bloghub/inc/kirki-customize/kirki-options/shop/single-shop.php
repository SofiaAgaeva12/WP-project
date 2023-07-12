<?php

Kirki::add_section( 'single_shop_options', array(
	'title' => esc_html__( 'Single Shop Page', 'bloghub' ),
	'panel' => 'bloghub_theme_shop',
) );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'single_shop_page_layout_pro',
		'label'       => esc_html__( 'No Sidebar for Free', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'single_shop_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'shop_layout_pro'   => get_template_directory_uri() . '/assets/image/pro/single-shop.jpg',
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'single_shop_page_columns_pro',
		'label'       => esc_html__( 'Four Columns for Free', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'single_shop_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'shop_layout_pro'   => get_template_directory_uri() . '/assets/image/pro/related-shop.jpg',
		],
	]
);

new \Kirki\Field\Number(
	[
		'settings' => 'related_shop_perpage',
		'label'    => esc_html__( 'Display Item', 'bloghub' ),
		'section'  => 'single_shop_options',
		'default'  => 4,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
);
