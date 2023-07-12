<?php

Kirki::add_section( 'Blog_options', array(
	'title' => esc_html__( 'Blog Options', 'bloghub' ),
	'panel' => 'bloghub_option_layout',
) );

new \Kirki\Field\Select(
	[
		'settings' => 'blog_layout',
		'label'    => esc_html__( 'Select Blog Page Layout', 'bloghub' ),
		'section'  => 'Blog_options',
		'default'  => 'right-sidebar',
		'choices'  => [
			'full-width'    => esc_html__( 'Full Width', 'bloghub' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bloghub' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bloghub' ),
			'grid'          => esc_html__( 'Grid Full', 'bloghub' ),
			'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'bloghub' ),
			'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'blog_page_pro',
		'label'       => esc_html__( 'Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'Blog_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'blog_pro1'   => get_template_directory_uri() . '/assets/image/pro/blog1.jpg',
			'blog_pro2'   => get_template_directory_uri() . '/assets/image/pro/blog2.jpg',
		],
	]
);