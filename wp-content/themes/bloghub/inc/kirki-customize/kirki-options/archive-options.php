<?php

Kirki::add_section( 'archive_options', array(
	'title' => esc_html__( 'Archive Options', 'bloghub' ),
	'panel' => 'bloghub_option_layout',
) );

new \Kirki\Field\Select(
	[
		'settings' => 'archive_layout',
		'label'    => esc_html__( 'Select Archive Page Layout', 'bloghub' ),
		'section'  => 'archive_options',
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

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_archive_title',
		'label'    => esc_html__( 'Enable Breadcrumb', 'bloghub' ),
		'section'  => 'archive_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);