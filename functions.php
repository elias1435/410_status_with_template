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

            // Load the 'error-410' page template
            include(get_template_directory() . '/410.php');

            exit; // Prevent any further output
        }
    }
}
add_action('template_redirect', 'serve_custom_410_page', 0);
