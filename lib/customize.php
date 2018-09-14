<?php

function _themename_customize_register( $wp_customize ) {

    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
        // 'settings' => array('blogname')
        'selector' => '.c-header__blogname',
        'container_inclusive' => false,
        'render_callback' => function() {
            bloginfo( 'name' );
        }
    ));

    /*##################  SINGLE SETTINGS ########################*/

    $wp_customize->add_section('_themename_single_blog_options', array(
        'title' => esc_html__( 'Single Blog Options', '_themename' ),
        'description' => esc_html__( 'You can change single blog options from here.', '_themename' ),
        'active_callback' => '_themename_show_single_blog_section'
    ));

    $wp_customize->add_setting('_themename_display_author_info', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_checkbox'
    ));

    $wp_customize->add_control('_themename_display_author_info', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Author Info', '_themename' ),
        'section' => '_themename_single_blog_options'
    ));

    function _themename_sanitize_checkbox( $checked ) {
        return (isset($checked) && $checked === true) ? true : false;
    }

    function _themename_show_single_blog_section() {
        global $post;
        return is_single() && $post->post_type === 'post';
    }


    /*################## GENERAL SETTINGS ########################*/

    $wp_customize->add_section('_themename_general_options', array(
        'title' => esc_html__( 'General Options', '_themename' ),
        'description' => esc_html__( 'You can change general options from here.', '_themename' )
    ));

    $wp_customize->add_setting('_themename_accent_colour', array(
        'default' => '#20ddae',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_themename_accent_colour', array(
        'label' => __( 'Accent Color', '_themename' ),
        'section' => '_themename_general_options',
    )));

    $wp_customize->add_setting( '_themename_portfolio_slug', array(
		'default'           => 'portfolio',
		'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( '_themename_portfolio_slug', array(
		'type'    => 'text',
        'label'    => esc_html__( 'Portfolio Slug', '_themename' ),
        'description' => esc_html__( 'Will appear in the archive url', '_themename' ),
		'section'  => '_themename_general_options',
    ));

    /*################## FOOTER SETTINGS ########################*/

    $wp_customize->selective_refresh->add_partial('_themename_footer_partial', array(
        'settings' => array('_themename_footer_bg', '_themename_footer_layout'),
        'selector' => '#footer',
        'container_inclusive' => false,
        'render_callback' => function() {
            get_template_part( 'template-parts/footer/widgets' );
            get_template_part( 'template-parts/footer/info' );
        }
    ));

    $wp_customize->add_section('_themename_footer_options', array(
        'title' => esc_html__( 'Footer Options', '_themename' ),
        'description' => esc_html__( 'You can change footer options from here.', '_themename' )
    ));

    $wp_customize->add_setting('_themename_site_info', array(
        'default' => '',
        'sanitize_callback' => '_themename_sanitize_site_info',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('_themename_site_info', array(
        'type' => 'text',
        'label' => esc_html__( 'Site Info', '_themename' ),
        'section' => '_themename_footer_options'
    ));

    $wp_customize->add_setting('_themename_footer_bg', array(
        'default' => 'dark',
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_footer_bg'
    ));

    $wp_customize->add_control('_themename_footer_bg', array(
        'type' => 'select',
        'label' => esc_html__( 'Footer Background', '_themename' ),
        'choices' => array(
            'light' => esc_html__( 'Light', '_themename' ),
            'dark' => esc_html__( 'Dark', '_themename' ),
        ),
        'section' => '_themename_footer_options'
    ));

    $wp_customize->add_setting('_themename_footer_layout', array(
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_themename_validate_footer_layout'
    ));

    $wp_customize->add_control('_themename_footer_layout', array(
        'type' => 'text',
        'label' => esc_html__( 'Footer Layout', '_themename' ),
        'section' => '_themename_footer_options'
    ));
    
}

add_action( 'customize_register', '_themename_customize_register' );

function _themename_validate_footer_layout( $validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add('invalid_footer_layout', esc_html__( 'Footer layout is invalid', '_themename' ));
    }
    return $validity;
}

function _themename_sanitize_footer_bg( $input ) {
    $valid = array('light', 'dark');
    if( in_array($input, $valid, true) ) {
        return $input;
    }
    return 'dark';
}

function _themename_sanitize_site_info( $input ) {
    $allowed = array('a' => array(
        'href' => array(),
        'title' => array()
    ));
    return wp_kses($input, $allowed);
}