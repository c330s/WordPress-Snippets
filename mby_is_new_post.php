<?php 
// tested with:   WP 5.1.1
// task:          Check if this screen is a new post (= never saved)

function mby_is_new_post() {
    $this_screen = get_current_screen();
    if( $this_screen->action == 'add' ) return true;
}

// check if this screen is a new post (= never saved)
$is_new = ( mby_is_new_post() ? true : false );

// Reference: 
// https://codex.wordpress.org/Function_Reference/get_current_screen
