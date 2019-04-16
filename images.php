<?php 
// tested with:     WP 5.1.1
// task:            Get the image alt-text by id.
//
// arguments:       int     $img_id     (the image ID)
// returns:         string  (= complete alt attribute with leading space; attribute value = alt-text )

function get_alt_tag_from_image_id( $img_id ) {
    $alt = '';
    $alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
    if( $alt != '' ) {
        $alt = ' alt="' . $alt . '"' ;
    }
    return $alt;
}
