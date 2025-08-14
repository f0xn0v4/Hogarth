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

add_action('template_redirect', function () {
    // Check if the current page is the "blog" category archive
    if (is_category('blog')) {
        // Query for a page with the title "Blog"
        $query = new WP_Query([
            'post_type'      => 'page',
            'title'          => 'Blog',
            'posts_per_page' => 1
        ]);

        if ($query->have_posts()) {
            $query->the_post();
            $url = get_permalink();
            wp_reset_postdata();

            // Redirect to the found page
            wp_redirect($url, 301);
            exit;
        }
    }
});

add_action('template_redirect', function () {
    // Check if the current page is the "event" category archive
    if (is_category('event')) {
        // Query for a page with the title "Events"
        $query = new WP_Query([
            'post_type'      => 'page',
            'title'          => 'Events',
            'posts_per_page' => 1
        ]);

        if ($query->have_posts()) {
            $query->the_post();
            $url = get_permalink();
            wp_reset_postdata();

            // Redirect to the found page
            wp_redirect($url, 301);
            exit;
        }
    }
});

add_action('template_redirect', function () {
    // Check if the current page is the "artwork" category archive
    if (is_category('artwork')) {
        // Query for a page with the title "Gallery"
        $query = new WP_Query([
            'post_type'      => 'page',
            'title'          => 'Gallery',
            'posts_per_page' => 1
        ]);

        if ($query->have_posts()) {
            $query->the_post();
            $url = get_permalink();
            wp_reset_postdata();

            // Redirect to the found page
            wp_redirect($url, 301);
            exit;
        }
    }
});

add_filter('wp_insert_post_data', 'prevent_future_type');
remove_action('future_post', '_future_post_hook');

