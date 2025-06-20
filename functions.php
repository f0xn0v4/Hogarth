<?php

function hogarth_enqueue_styles()
{
    wp_enqueue_style(
        'hogarth_theme_style',
        get_template_directory_uri() . '/assets/css/hogarth.css',
        array()
    );
}
function prevent_future_type( $post_data ) {
    if ( $post_data['post_status'] == 'future' && $post_data['post_type'] == 'post'){
        $post_data['post_status'] = 'publish';
    }
    return $post_data;
}

add_action('wp_enqueue_scripts', 'hogarth_enqueue_styles');


add_filter('wp_insert_post_data', 'prevent_future_type');
remove_action('future_post', '_future_post_hook');

