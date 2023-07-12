<?php

/** kirki custom heading function */

function bloghub_register_kirki_custom_heading_control( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_Notice_Control extends WP_Customize_Control {
		public $type = 'cnote';
		public function render_content() { ?>
            <label>
                <span class="customize-control-title">
                    <h4 style="font-size: 16px; margin:0; color: #8571ff"><?php echo esc_html( $this->label ); ?></h4>
					<hr class="solid">
                    <?php if ( !empty( $this->description ) ): ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif;
			?>
            </label>
            <?php
}
	}
}
add_action( 'customize_register', 'bloghub_register_kirki_custom_heading_control' );

/**
 * Register our custom control with Kirki
 */
function bloghub_kirki_custom_heading( $controls ) {
	$controls['cnote'] = 'Kirki_Controls_Notice_Control';
	return $controls;
}
add_action( 'kirki/control_types', 'bloghub_kirki_custom_heading' );

/**
 * Custom CSS Fucntion
 */
function bloghub_custom_css() {
	$bloghub_css_code = get_theme_mod( 'css_code_settings' );
	echo '<style type="text/css">' . esc_attr( $bloghub_css_code ) . '</style>';
}
add_action( 'wp_head', 'bloghub_custom_css' );

/**
 * Custom JS Fucntion
 */
if ( function_exists( 'bloghub_fs' ) ) {
    if ( $bloghub_fs->is_paying() ) {

		function bloghub_custom_js() {
			$enable_js = get_theme_mod( 'enable_js_code', false );
			if ( true === $enable_js ) {
				$bloghub_js_code = get_theme_mod( 'js_code_settings' );
				echo '
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						' . str_replace( '&gt;', '>', wp_kses_post( $bloghub_js_code ) ) . '
					});
				</script>
				';
			}
		}
		add_action( get_theme_mod( 'js_code_position', 'wp_footer' ), 'bloghub_custom_js' );
	
	}
}