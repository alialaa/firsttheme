<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', '_themename_register_required_plugins' );

function _themename_register_required_plugins() {
    $plugins = array(
        array(
            'name' => '_themename metaboxes',
            'slug' => '_themename-metaboxes',
            'source' => get_template_directory_uri() . '/lib/plugins/_themename-metaboxes.zip',
            'required' => true,
            'version' => '1.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => '_themename shortcodes',
            'slug' => '_themename-shortcodes',
            'source' => get_template_directory_uri() . '/lib/plugins/_themename-shortcodes.zip',
            'required' => true,
            'version' => '1.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name' => '_themename post types',
            'slug' => '_themename-post-types',
            'source' => get_template_directory_uri() . '/lib/plugins/_themename-post-types.zip',
            'required' => true,
            'version' => '1.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
        )
    );

    $config = array(
        
    );

    tgmpa( $plugins, $config);
}