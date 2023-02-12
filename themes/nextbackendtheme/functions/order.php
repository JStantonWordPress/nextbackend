<?php

add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}


add_filter( 'rest_post_query', 'se35728943_change_post_per_page', 10, 2 );

function se35728943_change_post_per_page( $args, $request ) {
    $max = max( (int) $request->get_param( 'custom_per_page' ), 99 );
    $args['posts_per_page'] = $max;
    return $args;
}