<?php
Kirki::add_section( 'copyright_options', array(
	'title' => esc_html__( 'Copyright Options', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

new \Kirki\Field\Text(
	[
		'settings' => 'copyright_text',
		'label'    => esc_html__( 'Copyright Text', 'bloghub' ),
		'section'  => 'copyright_options',
		'default'  => esc_html__( 'Proudly powered by WordPress |', 'bloghub' ),
	]
);

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'poweard_by_pro',
		'label'       => esc_html__( 'Powered Link For Pro Featured', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'copyright_options',
		'default'     => '',
		'transport'   => 'auto',
		'choices'     => [
			'poweard_f'   => get_template_directory_uri() . '/assets/image/pro/powered.jpg',
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings' => 'enable_footer_menu',
		'label'    => esc_html__( 'Enable Menu', 'bloghub' ),
		'section'  => 'copyright_options',
		'default'  => 'on',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'bloghub' ),
			'off' => esc_html__( 'Disable', 'bloghub' ),
		],
	]
);