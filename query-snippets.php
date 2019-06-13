// Query parent pages only
// -----------------------
//
// - Custom page type
//   – hierarchical 
// - Find all pages on the top level

$parent_only_query = new WP_Query(array(
    'post_type' => 'my-custom-post-type',
    'post_parent' => 0 
));

while ($parent_only_query->have_posts()){
    $parent_only_query->the_post();
    // etc...
}

wp_reset_query();

// Source:
// https://stackoverflow.com/questions/5414669/wordpress-wp-query-query-parent-pages-only
