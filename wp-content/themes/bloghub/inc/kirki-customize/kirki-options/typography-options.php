<?php
Kirki::add_section( 'typography_options', array(
	'title' => esc_html__( 'Typography Options', 'bloghub' ),
	'panel' => 'bloghub_theme_options',
) );

new \Kirki\Field\Radio_Image(
	[
		'settings'    => 'typo_pro',
		'label'       => esc_html__( 'Unlimited Font For Pro Version', 'bloghub' ),
		'description' => bloghub_purchase_link(),
		'section'     => 'typography_options',
		'transport'   => 'auto',
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'body_typography',
		'label'     => esc_html__( 'Body Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => 'regular',
			'font-style'      => 'normal',
			'color'           => '#767C84',
			'font-size'       => '16px',
			'line-height'     => '27px',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'body',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'h1_typography',
		'label'     => esc_html__( 'H1 Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => '',
			'font-style'      => 'normal',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'h1',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'h2_typography',
		'label'     => esc_html__( 'H2 Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => '',
			'font-style'      => 'normal',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'h2',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'h3_typography',
		'label'     => esc_html__( 'H3 Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => '',
			'font-style'      => 'normal',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'h3',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'h4_typography',
		'label'     => esc_html__( 'H4 Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => '',
			'font-style'      => 'normal',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'h4',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'h5_typography',
		'label'     => esc_html__( 'H5 Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => '',
			'font-style'      => 'normal',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'h5',
			],
		],
	]
);

new \Kirki\Field\Typography(
	[
		'settings'  => 'h6_typography',
		'label'     => esc_html__( 'H6 Typography', 'bloghub' ),
		'section'   => 'typography_options',
		'transport' => 'auto',
		'default'   => [
			'font-family'     => 'Jost',
			'variant'         => '',
			'font-style'      => 'normal',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
		],
		'choices' => [
			'fonts' => [
				'google' => [ 'Jost', 'Roboto', 'Open Sans', 'Lato', 'Noto Sans' ],
			],
		],
		'output'    => [
			[
				'element' => 'h6',
			],
		],
	]
);