<?php

/**
 * Add color settings to customizer.
 *
 * @param WP_Customize $wp_customize WP_Customizer object.
 */
function react_revolution_customizer_add_colors( $wp_customize ) {
	$settings = react_revolution_settings();
	foreach ( $settings as $setting ) {

		$wp_customize->add_setting(
			$setting['name'],
			array(
				'default' => $setting['default'],
			)
		);


		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting['name'],
				array(
					'label'    => $setting['label'],
					'section'  => 'colors',
					'settings' => $setting['name'],
				)
			)
		);
	}


}

add_action( 'customize_register', 'react_revolution_customizer_add_colors' );

/**
 * Array of settings.
 *
 * @return array[]
 */
function react_revolution_settings() {
	return array(
		array(
			'default' => '#d11415',
			'name'    => 'primary',
			'label'   => __( 'Primary Color', 'react-revolution' ),
		),
		array(
			'default' => '#333333',
			'name'    => 'secondary',
			'label'   => __( 'Secondary Color', 'react-revolution' ),
		),
		array(
			'default' => '#000000',
			'name'    => 'tertiary',
			'label'   => __( 'Tertiary Color', 'react-revolution' ),
		),
		array(
			'default' => '#404040',
			'name'    => 'text',
			'label'   => __( 'Text Color', 'react-revolution' ),
		),
		array(
			'default' => '#cccccc',
			'name'    => 'border',
			'label'   => __( 'Border Color', 'react-revolution' ),
		),
	);
}

/**
 *
 */
function react_revolution_inline() {
	$settings         = react_revolution_settings();
	$background_color = get_theme_mod( 'background_color', 'ffffff' );
	$custom_css       = ':root {';
	$custom_css      .= sprintf( '--color-%s: #%s;', 'background', $background_color );
	foreach ( $settings as $setting ) {
		$custom_css .= sprintf( '--color-%s: %s;', $setting['name'], get_theme_mod( $setting['name'], $setting['default'] ) );
	}
	$custom_css .= '}';
	wp_add_inline_style( 'wp-react-theme-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'react_revolution_inline', 100 );
