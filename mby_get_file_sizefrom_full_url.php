<?php
// tested with:     WP 5.1.1
// task:            Get the file size of the file sppecified by a absolute url.
// 
// arguments:       string      $full_url       (= absolute file url), 
//                  int         $digits = 1     (= number of digits to return)
// returns:         string (size in human readable form)

function mby_get_file_size_from_full_url( $full_url, $digits = 1 ) {
    // Get the relative path from the full url:
    $full_url = parse_url( $full_url, PHP_URL_PATH);
    // remove the leading "/"
    $full_url = ltrim( $full_url, '/' );
    // filesize():      get the file size in byte 
    // size_format():   make it human readable 
    // $digits:         round to n digits
    return size_format( filesize( $full_url ), $digits );
}

// References: 
// parse_url        https://www.php.net/manual/de/function.parse-url.php
