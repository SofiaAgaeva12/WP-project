<?php 
function bloghub_add_options_page() {
	add_menu_page(
		__( 'Bloghub Options', 'bloghub' ),
		__( 'Bloghub Options', 'bloghub' ),
		'manage_options',
		'bloghub',
		'bloghub_render_options_page',
		'dashicons-admin-generic',
		9
	);
}

add_action( 'admin_menu', 'bloghub_add_options_page' );

function bloghub_render_options_page() {}