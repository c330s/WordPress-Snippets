<?php


// Image / post thumbnail src
// --------------------------

// Image src
// 
// tested with:     WP 5.2.1
// task:            Get the source url for an image id.
// 
// arguments:       int         $img_id
//                  string      $thumbsize          size of the image (add_image_size)
//                                                  If thumb size is not stated, use 
//                                                  full size
//                  bool        $return_attribute   TRUE: Returns the quoted src 
//                                                  text with the attribute: 
//                                                  src="http://url.tld"
//                                                  FALSE: Returns only the url. 
// returns:         string                          Returned string starts with a space.

function mby_get_img_src( 
    $img_id, 
    $thumbsize = '', 
    $return_attribute = true ) {

    if( $thumbsize == '' ) $thumbsize = 'full';

    $the_image = wp_get_attachment_image_src( $img_id, $thumbsize );
    // wp_get_attachment_image_src returns an array with: 
    //      [0] => url,
    //      [1] => width
    //      [2] => height
    //      [4] => is_intermediate
    $src = $the_image[0];
    if( ( $src != '' ) && ( $return_attribute ) ) {
        $src = ' src="' . $src . '"' ;
    }
    return $src;
}

// Post thumbnail src
//
// Same as function mby_get_img_src, uses post-id.

function mby_get_post_thumbnail_src( 
    $post_id, 
    $thumbsize = '', 
    $return_attribute = true ) {
    $img_id = get_post_thumbnail_id( $post_id );
    $alt = mby_get_img_src( $img_id, $thumbsize, $return_attribute );
    return $alt;
}



// Image / post thumbnail alt
// --------------------------

// Image alt-attribute
// 
// tested with:     WP 5.2.1
// task:            Get the ›alt‹ value for an image id.
// 
// arguments:       int         $img_id
//                  bool        $return_attribute   TRUE: Returns the quoted alt 
//                                                  text with the attribute: 
//                                                  alt="the alt text"
//                                                  FALSE: Returns only the text. 
//                  bool        $return_empty       TRUE: If $return_attribute is  
//                                                  true, and alt is empty, 
//                                                  an empty alt attribute is 
//                                                  returned: alt=""
//                                                  FALSE: Noting is returned, 
//                                                  if alt is empty
//
// returns:         string                          Returned string starts with a space.

function mby_get_img_alt( 
    $img_id, 
    $return_attribute = true,
    $return_empty = false ) {
    $alt = '';
    $alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
    if( ( $alt != '' ) && ( $return_attribute ) ) {
        $alt = ' alt="' . $alt . '"' ;
    }
    else if( ( $alt == '' ) && ( $return_empty ) ) {
        $alt = ' alt=""' ;
    }
    return $alt;
}

// Post thumbnail alt attribute
//
// Same as function mby_get_img_alt, uses post-id.

function mby_get_post_thumbnail_alt( 
    $post_id, 
    $return_attribute = true,
    $return_empty = false ) {
    $img_id = get_post_thumbnail_id( $post_id );
    $alt = mby_get_img_alt( $img_id, $return_attribute, $return_empty );
    return $alt;
}



// Image / post thumbnail title
// ----------------------------

// Image title
//
// tested with:     WP 5.2.1
// task:            Get the ›title‹ value for an image id.
// 
// arguments:       int         $img_id
//                  bool        $return_attribute   TRUE: Returns the quoted title 
//                                                  text with the attribute: 
//                                                  title="the title text"
//                                                  FALSE: Returns only the text. 
//
// returns:         string                          Returned string starts with a space.

function mby_get_image_title(
    $img_id, 
    $return_attribute = true ) {
    $title = '';
    $title = get_the_title( $img_id );
    if( ( $title != '' ) && ( $return_attribute ) ) {
        $title = ' title="' . $title . '"';
    }
    return $title;
}

// Post thumbnail title
//
// Same as function mby_get_img_alt, uses post-id.

function mby_get_post_thumbnail_title(
    $post_id, 
    $return_attribute = true ) {
    $img_id = get_post_thumbnail_id( $post_id );
    $title = mby_get_image_title( $img_id, $return_attribute );
    return $title;
}



// Image / post thumbnail size
// ---------------------------

// Image size
// 
// tested with:     WP 5.2.1
// task:            Get the image sizes for an image id (in px).
// 
// arguments:       int         $img_id
//                  string      $thumbsize          size of the image (add_image_size)
//                                                  If thumb size is not stated, 
//                                                  use full size.
// 
// returns:         array                           image sizes [width], [height]

function mby_get_img_size( 
    $img_id, 
    $thumbsize = '' ) {
    if( $thumbsize == '' ) $thumbsize = 'full';

    $the_image = wp_get_attachment_image_src( $img_id, $thumbsize );
    // wp_get_attachment_image_src returns an array with: 
    //      [0] => url,
    //      [1] => width
    //      [2] => height
    //      [4] => is_intermediate
    $img_sizes = array(
        'width'  => $the_image[1],
        'height' => $the_image[2]
    );
    return $img_sizes;
}

// Post thumbnail size
//
// Same as function mby_get_img_alt, uses post-id.

function mby_get_post_thumbnail_size( 
    $post_id, 
    $thumbsize = '' ) {
    $img_id = get_post_thumbnail_id( $post_id );
    $img_sizes = mby_get_img_size( $img_id, $thumbsize );
    return $img_sizes;
}



// Image / post thumbnail caption
// ------------------------------

// Image caption
// 
// tested with:     WP 5.2.1
// task:            Get the caption for an image id.
// 
// arguments:       int         $img_id
// 
// returns:         string

function mby_get_img_caption( 
    $img_id ) {
    $img_meta = get_post( $img_id );
    $caption = $img_meta->post_excerpt; 
    return $caption;
}

// Post thumbnail caption
//
// Same as function mby_get_img_caption, uses post-id.

function mby_get_post_thumbnail_caption( 
    $post_id ) {
    $img_id = get_post_thumbnail_id( $post_id );
    $caption = mby_get_img_caption( $img_id ); 
    return $caption;
}



// Image / post thumbnail description
// ----------------------------------

// Image description
//
// tested with:     WP 5.2.1
// task:            Get the description for an image id.
// 
// arguments:       int         $img_id
// 
// returns:         string
function mby_get_img_description( 
    $img_id ) {
    $img_meta = get_post( $img_id );
    $description = $img_meta->post_content; 
    return $description;
}

// Post thumbnail description
//
// Same as function mby_get_img_description, uses post-id.
// 
function mby_get_post_thumbnail_description( 
    $post_id ) {
    $img_id = get_post_thumbnail_id( $post_id );
    $description = mby_get_img_description( $img_id ); 
    return $description;
}



// Build complete image / post thumbnail tag
// -----------------------------------------

// Image tag
//
// tested with:     WP 5.2.1
// task:            Build a complet image tag for a given image id.
//                  - class, width and height are only used if value is not empty.
//                  - title by default is not used
// 
// arguments:       int         $img_id
//                  string      $thumbsize          size of the image (add_image_size)
//                                                  If thumb size is not stated, 
//                                                  use full size
//                  string      $class              css-class to add to the image
//                  bool        $omit_title         TRUE: Don’t output the image title
//                  int         $width              width in px for the width-attribute
//                  int         $height             height in px for the height-attribute
// 
// returns:         string

function mby_make_img_tag(
    $img_id,
    $thumbsize = '', 
    $class = NULL,
    $omit_title = true,
    $width = NULL, 
    $height = NULL ) {
    if( $thumbsize == '' ) $thumbsize = 'full';

    $src    = mby_get_img_src( $img_id, $thumbsize );
    $alt    = mby_get_img_alt( $img_id );
    $title  = '';
    if( $omit_title  == '' ) $omit_title = true;
    if( ( ! $omit_title ) || ( $omit_title == '' ) ) {
        $title  = mby_get_image_title( $img_id );
    }

    // Build image tag:
    $img  = '<img';
    if( $class  != NULL ) $img .= ' class="' .  $class . '"';
    if( $width  != NULL ) $img .= ' width="' .  $width . '"';
    if( $height != NULL ) $img .= ' height="' . $height . '"';
    $img .= $src ;
    $img .= $alt;
    $img .= $title;
    $img .= '>';

    return $img;
}

// Post thumbnail tag
//
// Same as function mby_make_img_tag, uses post-id.
// 
function mby_make_post_thumbnail_tag(
    $post_id,
    $thumbsize = '', 
    $class = NULL,
    $omit_title = true,
    $width = NULL, 
    $height = NULL ) {

    // get post thumbnail id from post id
    $img_id = get_post_thumbnail_id( $post_id );
    // run function mby_make_img_tag
    $img = mby_make_img_tag( $img_id, $thumbsize, $class, $omit_title, $width, $height );
    return $img;
}
