<?php

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => true,
            'position' => 3,
            'post_id' => 'theme-general-settings',
            'show_in_graphql' => true
        ));



        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Contact'),
            'menu_title'  => __('Contact'),
            'parent_slug' => $parent['menu_slug'],
            'show_in_graphql' => true
        ));

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Footer'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
            'show_in_graphql' => true
        ));

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Social'),
            'menu_title'  => __('Social'),
            'parent_slug' => $parent['menu_slug'],
            'show_in_graphql' => true
        ));



        $child = acf_add_options_sub_page(array(
            'page_title'  => __('404'),
            'menu_title'  => __('404'),
            'parent_slug' => $parent['menu_slug'],
            'show_in_graphql' => true
        ));

    }
}




function new_block_theme_setup()
{
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'new_block_theme_setup');

function fru_block_categories($categories)
{
    $category_slugs = wp_list_pluck($categories, 'slug');
    return in_array('fruition', $category_slugs, true) ? $categories : array_merge(
        $categories,
        array(
            array(
                'slug'  => 'fru',
                'title' => __('Fruition Blocks', 'fru'),
                'icon'  => null,
            ),
        )
    );
}
add_filter('block_categories_all', 'fru_block_categories', 1, 1);


add_action(
    'acf/init',
    function () {
        // check function exists
        if (function_exists('acf_register_block')) {
            $blockFolders = array(
                "Approach",
                "Author",
                "Awards",
                "ArchiveServices",
                "ArchiveCaseStudies",
                "ArchiveBlog",
                "Benefits",
                "CareerCards",
                "Career",
                "Clients",
                "ColumnSplit",
                "Contact",
                "DesignSystem",
                "Divider",
                "Expertise",
                "Faq",
                "FooterContact",
                "Gallery",
                "Hero",
                "HeroCase",
                "HeroInternal",
                "ImageFull",
                "ImageLeft",
                "Numbers",
                "OpenRoles",
                "RecentBlogPosts",
                "IndustryWork",
                "RecentWork",
                "RelatedWork",
                "Results",
                "ServiceExamples",
                "ServiceIcons",
                "Services",
                "Story",
                "Team",
                "Tech",
                "Testimonials",
                "TextBlock",
                "WhyUs",
                "WhyJoin",
                "Words",
                "Arrow"
            );

            foreach($blockFolders as $name) {

                $args = array(
                    'name' => $name,
                    'title' => __($name),
                    'category' => 'fru',
                    'icon' => 'align-center',
                    'mode' => 'edit',
                    'align' => 'wide',
                    'supports' => array('align' => array('wide', 'full', 'center')),
                    'keywords' => array($name),
                    'example' => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                '__is_preview' => true
                            )
                        )
                    )
                );
                acf_register_block_type($args);
            }
        }
    }
);




add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acfjson';

    // return
    return $path;

}


add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/acfjson';


    // return
    return $paths;

}


