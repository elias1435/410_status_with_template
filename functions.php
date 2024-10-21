/* use this code to functions.php */

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

            // Load the content of the custom 410 page
            $page = get_page_by_path('fehler-410');
            if ($page) {
                // Set up the page data to simulate viewing the 'fehler-410' page
                global $wp_query;
                $wp_query->post = $page;
                $wp_query->posts = [$page];
                $wp_query->queried_object = $page;
                $wp_query->queried_object_id = $page->ID;
                $wp_query->is_404 = false;
                $wp_query->is_page = true;

                // Load the template for displaying the page
                include(get_page_template());
            } else {
                // Fallback message if the page is not found
                echo 'This page is no longer available.';
            }
            exit;
        }
    }
}
add_action('template_redirect', 'serve_custom_410_page');
