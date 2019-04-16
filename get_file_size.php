<?php
function get_file_size_from_full_url( $full_url ) {
	// $file_url is the full url
	// Get the path from the full url:
    $full_url = parse_url( $full_url, PHP_URL_PATH);
    // remove the leading /
    $full_url = ltrim( $full_url, '/' );
    // get the file size in byte 
    // and make it human readable with size_format()
    return size_format( filesize( $full_url ), 1 );
    //
    // For info on parse_url see:
    // https://www.php.net/manual/de/function.parse-url.php
}
