<?php 
Kirki::add_section( 'page_options', array(
	'title' => esc_html__( 'Page Options', 'bloghub' ),
	'panel' => 'bloghub_option_layout',
) );

new \Kirki\Field\Select(
	[
		'settings' => 'page_layout',
		'label'    => esc_html__( 'Select Page Layout', 'bloghub' ),
		'section'  => 'page_options',
		'default'  => 'right-sidebar',
		'choices'  => [
			'full-width'    => esc_html__( 'Full Width', 'bloghub' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bloghub' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'pages_pro_title',
		'label'       => esc_html__( 'Title Tag Is Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'page_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'blog_pro1'   => get_template_directory_uri() . '/assets/image/pro/page.jpg',
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'page_breadcrumb_enable',
		'label'    => esc_html__( 'Enable Breadcrumb', 'bloghub' ),
		'section'  => 'page_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'page_comment_section',
		'label'    => esc_html__( 'Enable Comment Box', 'bloghub' ),
		'section'  => 'page_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);