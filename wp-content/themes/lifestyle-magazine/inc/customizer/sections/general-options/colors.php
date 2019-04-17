<?php
/**
 * Colors Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_change_colors_panel' );

function lifestyle_magazine_change_colors_panel( $wp_customize)  {
    $wp_customize->get_section( 'colors' )->priority = 1;
    $wp_customize->get_section( 'colors' )->panel = 'lifestyle_magazine_general_panel';
}

add_action( 'customize_register', 'lifestyle_magazine_customize_color_options' );
function lifestyle_magazine_customize_color_options( $wp_customize ) {
            
    $wp_customize->add_setting( 'more_color_options', array(  
      'sanitize_callback' => 'sanitize_text_field',
      'default'     => '',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Custom_Text( $wp_customize, 'more_color_options', array(
      'label' => esc_html__( 'More color options available in Pro Version.', 'lifestyle-magazine' ),
      'section' => 'colors',
      'settings' => 'more_color_options',
      'type'=> 'customtext',
    ) ) );

}