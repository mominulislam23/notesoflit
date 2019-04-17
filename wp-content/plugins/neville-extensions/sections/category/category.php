<?php
/*********************************************************
 * Adding some new options to the category sections using
 * filters and actions
 *********************************************************/

/**
 * Filters and actions
 */
add_filter( 'neville___section_category_defaults', 'nevillex_s_category___ad_default', 10, 2 );
add_filter( 'neville___section_category_options',  'nevillex_s_category___ad_option',  10, 4 );
add_filter( 'neville___section_category_update',   'nevillex_s_category___ad_update',  10, 2 );
add_filter( 'neville___section_category_fields',   'nevillex_s_category___ad_fields',  10, 3 );
add_action( 'neville__sec_tmpl_cat_side_widgets',  'nevillex_s_category__ad_display',  30    );

/**
 * AD in sidebar
 */
if( ! function_exists( 'nevillex_s_category___ad_default' ) ) {
	/**
	 * Adds a default value for the `code` field
	 *
	 * @since  1.0.0
	 * @param  array  $defaults Default section values
	 * @param  object $widget   Current widget object
	 * @return array            A new key and value
	 */
	function nevillex_s_category___ad_default( $defaults, $widget ) {
		$defaults[ 'code' ] = '';
		return $defaults;
	}
}

if( ! function_exists( 'nevillex_s_category___ad_option' ) ) {
	/**
	 * Adds a new validated option
	 *
	 * @since  1.0.0
	 * @param  array  $options  Current validated widget options
	 * @param  object $widget   Current widget object
	 * @param  array  $instance Widget instance
	 * @param  array  $defaults Widget defaults
	 * @return array            A new key and value
	 */
	function nevillex_s_category___ad_option( $options, $widget, $instance, $defaults ) {
		$options[ 'code' ] = ! empty( $instance[ 'code' ] ) ? $instance[ 'code' ] : $defaults[ 'code' ];
		return $options;
	}
}

if( ! function_exists( 'nevillex_s_category___ad_update' ) ) {
	/**
	 * Update widget instance
	 *
	 * @since  1.0.0
	 * @param  array $instance     Old instance
	 * @param  array $new_instance New instance
	 * @return array               Updated instance
	 */
	function nevillex_s_category___ad_update( $instance, $new_instance ) {
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance[ 'code' ] = $new_instance[ 'code' ];
		} else {
			$instance[ 'code' ] = wp_kses_post( $new_instance[ 'code' ] );
		}

		return $instance;
	}
}

if( ! function_exists( 'nevillex_s_category___ad_fields' ) ) {
	/**
	 * [nevillex_s_category___ad_fields description]
	 * @param  array $fields   Current form fields
	 * @param  array $instance Widget instance
	 * @param  array $defaults Widget defaults
	 * @return array           Fields array with new items
	 */
	function nevillex_s_category___ad_fields( $fields, $instance, $defaults ) {
		$fields[ 'code' ] = [
			'type'     => 'textarea',
			'label'    => __( 'Sidebar ad code:', 'neville-extensions' ),
			'desc'     => __( 'Maximum width: 320px', 'neville-extensions' ),
			'instance' => ! $instance[ 'code' ] ? $defaults[ 'code' ] : $instance[ 'code' ],
		];

		return $fields;
	}
}

if( ! function_exists( 'nevillex_s_category__ad_display' ) ) {
	/**
	 * Display Ad code if any
	 *
	 * @param  array $o Widget options
	 * @return void
	 */
	function nevillex_s_category__ad_display( $o ) {
		if( ! $o[ 'code' ] ) return;
		?>
			<section class="widget neville-w-das">
				<div class="widget-content"><?php echo $o[ 'code' ]; ?></div>
			</section>
		<?php
	}
}
