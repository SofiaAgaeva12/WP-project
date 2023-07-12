<?php

Kirki::add_section( 'shop_options', array(
	'title' => esc_html__( 'Shop Page Options', 'bloghub' ),
	'panel' => 'bloghub_theme_shop',
) );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'shop_page_layout_pro',
		'label'       => esc_html__( 'No Sidebar for Free', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'shop_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'shop_layout_pro'   => get_template_directory_uri() . '/assets/image/pro/shop-layout.jpg',
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'shop_columns_pro',
		'label'       => esc_html__( 'Three Columns For Free', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'shop_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'shop_columnss_pro'   => get_template_directory_uri() . '/assets/image/pro/shop-column.jpg',
		],
	]
);

new \Kirki\Field\Number(
	[
		'settings' => 'shop_perpage',
		'label'    => esc_html__( 'Display Item', 'bloghub' ),
		'section'  => 'shop_options',
		'default'  => 6,
		'choices'  => [
			'min'  => 1,
			'max'  => 9,
			'step' => 1,
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'shop_filter_pro',
		'label'       => esc_html__( 'Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'shop_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'shop_filtar_p'   => get_template_directory_uri() . '/assets/image/pro/shop-filter.jpg',
		],
	]
);