<?php
// tested with: WP 5.1.1

function remove_html_comments( $content ) {
    return preg_replace('/<!--(.|\s)*?-->/', '', $content);
}
