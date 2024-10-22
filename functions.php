/* use this code to functions.php */

// url redirect to 410 status
function serve_custom_410_page() {
    // List of URLs to return 410 status
    $urls = [
        '/example.php',
        '/example1.php',
        '/raucherentwoehnung.php',
        '/example2.php',
        '/pages/example3/'
    ];

    // Get the current request URI
    $request_uri = $_SERVER['REQUEST_URI'];

    // Check if the current request URI matches any in the list
    foreach ($urls as $url) {
        if (strpos($request_uri, $url) !== false) {
            // Set 410 header
            status_header(410);
            nocache_headers();

            // Redirect to the 410 page with ID 5583
            $error_page_id = 5583; // The ID of the error page
            $error_page_url = get_permalink($error_page_id);

            if ($error_page_url) {
                // Serve the page like a normal template
                include( locate_template( '410.php' ) );
            } else {
                // Fallback message if the error page doesn't exist
                echo 'This page is no longer available.';
            }

            exit;
        }
    }
}
add_action('template_redirect', 'serve_custom_410_page', 0);
