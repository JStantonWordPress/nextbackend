<?php


add_action( 'init', 'create_posttype' );
function create_posttype() {


    register_post_type( 'FAQ',
        array(
            'labels' => array(
                'name' => __( 'FAQs' ),
                'singular_name' => __( 'FAQ' ),
                'add_new' => 'Add New FAQ',
                'add_new_item' => 'Add New FAQ',
                'edit_item'  => 'Edit FAQ',
                'view_item' => 'View FAQ'
            ),
            'publicly_queryable' => false,
            'public' => true,
            'show_in_rest' => false,
            'has_archive' => true,
            'rewrite' => array('with_front' => false, 'slug' => 'faq'),
            'supports' => array( 'title', 'author', 'revisions','editor' ),
        )
    );

    register_post_type( 'Tesimonial',
        array(
            'labels' => array(
                'name' => __( 'Tesimonials' ),
                'singular_name' => __( 'Tesimonial' ),
                'add_new' => 'Add New Tesimonial',
                'add_new_item' => 'Add New Tesimonial',
                'edit_item'  => 'Edit Tesimonial',
                'view_item' => 'View Tesimonial'
            ),
            'publicly_queryable' => false,
            'public' => true,
            'show_in_rest' => false,
            'has_archive' => true,
            'rewrite' => array('with_front' => false, 'slug' => 'faq'),
            'supports' => array( 'title', 'author', 'revisions','editor' ),
        )
    );


 }

 // Register Custom Taxonomy
function team_category() {

  $labels = array(
    'name'                       => 'Team Categories',
    'singular_name'              => 'Team Category',
    'menu_name'                  => 'Team Category',
    'all_items'                  => 'All Team Categories',
    'parent_item'                => 'Parent Team Category',
    'parent_item_colon'          => 'Parent Team Category:',
    'new_item_name'              => 'New Team Category',
    'add_new_item'               => 'Add Team Category',
    'edit_item'                  => 'Edit Team Category',
    'update_item'                => 'Update Team Category',
    'view_item'                  => 'View Team Category',
    'separate_items_with_commas' => 'Separate items with commas',
    'add_or_remove_items'        => 'Add or remove Team Categories',
    'choose_from_most_used'      => 'Choose from the most used',
    'popular_items'              => 'Popular Team Categories',
    'search_items'               => 'Search Team Categories',
    'not_found'                  => 'Not Found',
    'no_terms'                   => 'No Team Categories',
    'items_list'                 => 'Team Categories list',
    'items_list_navigation'      => 'Team Categories list navigation',
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => false,
  );
  register_taxonomy( 'team_category', array( 'team' ), $args );

}
add_action( 'init', 'team_category', 0 );






?>
