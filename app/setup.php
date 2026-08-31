<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register custom Gutenberg blocks.
 */

add_action('init', function () {
    register_block_type(
        get_theme_file_path('resources/scripts/blocks/hero'),
        [
            'render_callback' => function ($attributes) {
                return view('blocks.hero', [
                    'eyebrow' => $attributes['eyebrow'] ?? '',
                    'heading' => $attributes['heading'] ?? '',
                    'description' => $attributes['description'] ?? '',
                    'ctaText' => $attributes['ctaText'] ?? '',
                    'ctaUrl' => $attributes['ctaUrl'] ?? '',
                    'imageId' => $attributes['imageId'] ?? null,
                ])->render();
            },
        ]
    );

    register_block_type(
        get_theme_file_path('resources/scripts/blocks/stats'),
        [
            'render_callback' => function ($attributes) {
                return view('blocks.stats', [
                    'stats' => $attributes['stats'] ?? [],
                ])->render();
            },
        ]
    );
});

register_block_type(
    get_theme_file_path('resources/scripts/blocks/philosophy'),
    [
        'render_callback' => function ($attributes) {
            return view('blocks.philosophy', [
                'eyebrow' => $attributes['eyebrow'] ?? '',
                'statement' => $attributes['statement'] ?? '',
            ])->render();
        },
    ]
);

register_block_type(
    get_theme_file_path('resources/scripts/blocks/selected-work'),
    [
        'render_callback' => function ($attributes) {
            $storyIds = array_values(array_filter([
                $attributes['story1'] ?? 0,
                $attributes['story2'] ?? 0,
                $attributes['story3'] ?? 0,
            ]));

            $posts = [];

            if ($storyIds) {
                $posts = get_posts([
                    'post_type' => 'story',
                    'post__in' => $storyIds,
                    'orderby' => 'post__in',
                    'posts_per_page' => 3,
                ]);
            }

            $stories = array_map(function ($story) {
                $terms = get_the_terms($story->ID, 'shoot_type');

                return [
                    'title' => get_the_title($story),
                    'url' => get_permalink($story),
                    'imageId' => get_post_thumbnail_id($story),
                    'type' => !empty($terms) && !is_wp_error($terms)
                        ? $terms[0]->name
                        : '',
                ];
            }, $posts);

            return view('blocks.selected-work', [
                'eyebrow' => $attributes['eyebrow'] ?? '',
                'heading' => $attributes['heading'] ?? '',
                'stories' => $stories,
            ])->render();
        },
    ]
);

register_block_type(
    get_theme_file_path('resources/scripts/blocks/about'),
    [
        'render_callback' => function ($attributes) {
            return view('blocks.about', [
                'eyebrow' => $attributes['eyebrow'] ?? '',
                'heading' => $attributes['heading'] ?? '',
                'description' => $attributes['description'] ?? '',
                'location' => $attributes['location'] ?? '',
                'ctaText' => $attributes['ctaText'] ?? '',
                'ctaUrl' => $attributes['ctaUrl'] ?? '',
                'quote' => $attributes['quote'] ?? '',
                'imageId' => $attributes['imageId'] ?? null,
            ])->render();
        },
    ]
);

register_block_type(
    get_theme_file_path('resources/scripts/blocks/testimonials'),
    [
        'render_callback' => function ($attributes) {
            return view('blocks.testimonials', [
                'eyebrow' => $attributes['eyebrow'] ?? '',
                'heading' => $attributes['heading'] ?? '',
                'rating' => $attributes['rating'] ?? '',
                'ratingText' => $attributes['ratingText'] ?? '',
                'reviewsUrl' => $attributes['reviewsUrl'] ?? '',
                'testimonials' => $attributes['testimonials'] ?? [],
            ])->render();
        },
    ]
);

register_block_type(
    get_theme_file_path('resources/scripts/blocks/journal'),
    [
        'render_callback' => function ($attributes) {
            $posts = get_posts([
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);

            $posts = array_map(function ($post) {
                $categories = get_the_category($post->ID);

                return [
                    'title' => get_the_title($post),
                    'url' => get_permalink($post),
                    'excerpt' => get_the_excerpt($post),
                    'imageId' => get_post_thumbnail_id($post),
                    'category' => !empty($categories)
                        ? $categories[0]->name
                        : '',
                ];
            }, $posts);

            return view('blocks.journal', [
                'eyebrow' => $attributes['eyebrow'] ?? '',
                'heading' => $attributes['heading'] ?? '',
                'posts' => $posts,
            ])->render();
        },
    ]
);

register_block_type(
    get_theme_file_path('resources/scripts/blocks/final-cta'),
    [
        'render_callback' => function ($attributes) {
            return view('blocks.final-cta', [
                'eyebrow' => $attributes['eyebrow'] ?? '',
                'heading' => $attributes['heading'] ?? '',
                'description' => $attributes['description'] ?? '',
                'ctaText' => $attributes['ctaText'] ?? '',
                'ctaUrl' => $attributes['ctaUrl'] ?? '',
            ])->render();
        },
    ]
);
/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');


    add_theme_support('custom-logo', [
        'height' => 120,
        'width' => 360,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);


/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
