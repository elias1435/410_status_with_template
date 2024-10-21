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

            // Load the 'error-410' page by its ID
            $error_page_id = 5583; // Replace with the actual page ID for your 'error-410' page. this is the page created on pages just add the page id. it will show the page content...
            $error_page = get_post($error_page_id);

            if ($error_page) {
                // Set up the global post data for the error page
                global $post;
                $post = $error_page;
                setup_postdata($post);

                // Include the page template to display the error page like a normal page
                include(get_template_directory() . '/page.php');

                // Reset global post data to avoid conflicts
                wp_reset_postdata();
            } else {
                // Fallback message if the error page doesn't exist
                echo 'This page is no longer available.';
            }

            exit;
        }
    }
}
add_action('template_redirect', 'serve_custom_410_page', 0);
