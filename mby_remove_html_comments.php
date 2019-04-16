<?php
// tested with:     WP 5.1.1
// task:            Remove HTML comments.
//
// arguments:       string $content (= typically the_content( $id ))
// returns:         string (= HTML withoput comments)

function mby_remove_html_comments( $content ) {
    return preg_replace('/<!--(.|\s)*?-->/', '', $content);
}
