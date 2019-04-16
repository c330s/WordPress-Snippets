<?php 
// tested with:     WP 5.1.1
// task:            Make an anchor tag from a url, use the shortened url 
//                  (= remove protocol) as link text.
//
// arguments:       string    $url_full,
//                  bool      $new_tab = false    (= add target="_blank" to link)
// returns:         string (link HTML)
//                  On error return HTML-Comment with error message.

function mby_make_anchor_from_url( $url_full, $new_tab = false ) {
    if( mby_validate_url( $url_full ) ) {
        // remove protocol
        $url_short = preg_replace('/^(https?\:\/\/)(.*?)(\/?)$/', '\2', $url_full );
        $target = '';
        if( $new_tab ) $target = ' target="_blank"';
        $url_html =  '<a href="' . $url_full . '"' . $target . '>' . $url_short . '</a>';
        return $url_html;
    } else {
        return '<!-- invalid url -->';
    }
}

// tested with:     WP 5.1.1
// task:            Check an url is syntactically valid
// issue:           Doesn’t allow numbers and dashes in TLDs
//
// arguments:       string    $url
// returns:         true, if url is valid

function mby_validate_url( $url ) {
    $regex  = "(https?\:\/\/)?"; // SCHEME 
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,64})"; // Host or IP 
    $regex .= "(\:[0-9]{2,5})?"; // Port 
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 

    if(preg_match("/^$regex$/i", $url)) // `i` flag for case-insensitive
    { 
        return true; 
    } 
}

// References: 
// validate_url: https://stackoverflow.com/a/9623072
