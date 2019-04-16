<?php

function remove_html_comments( $content ) {
    return preg_replace('/<!--(.|\s)*?-->/', '', $content);
}
