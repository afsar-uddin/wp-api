<?php

function register_custom_logo_route() {
    register_rest_route('api/v2', '/logo', array(
        'methods' => 'GET',
        'callback' => 'custom_logo_data',
    ));
}

add_action('rest_api_init', 'register_custom_logo_route');

function custom_logo_data() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

    $logo_data = array(
        'url' => $custom_logo_url,
    );

    return rest_ensure_response($logo_data);
}