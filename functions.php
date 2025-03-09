/* use this code to functions.php */

// url redirect to 410 status
function serve_custom_410_page() {
    $urls = [
        '/newsletter/newsletter',
        '/coaches-schweinfurt/',
        '/coaches-berlin'
    ];

$request_uri = $_SERVER['REQUEST_URI'];

if (post_password_required()) {
    return;
}

foreach ($urls as $url) {
    if (strpos($request_uri, $url) !== false) {
        // Setze den 410-Status
        status_header(410);
        nocache_headers();

        // Setze eine WordPress-Variable, die den 410-Zustand speichert
        set_query_var('is_410_page', true);

        // Lade den Header
        get_header();

        // Manually add the 410-forever class to the body tag
            echo '<body class="' . join(' ', get_body_class('gone-forever')) . '">';

            // Zeige die 410-Nachricht mit Bild
            echo '<div class="content-410" style="text-align:center; padding: 50px;">';
			
			echo '<div class="span9 theme-default">';
            echo '<div id="site-header">';
			echo '<img src="https://www.example.com/410-error-AI-took-over.jpg" width="" height="" alt="410 Error - AI Took Over">';
			echo '</div>';
            echo '<div class="shadow">';
            echo '<div class="bigshadow"></div>';
            echo '</div>';
            echo '</div>';
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<div class="span10">';
            echo '<h1>AI vs. Hypnosis: Can Tech Beat the Mind?</h1>';
            echo '<p>Artificial Intelligence has taken over, and this page has disappeared into the void forever. But don’t worry, you can still get your mind back on track! <a href="https://www.coaching-place.com/">Head over to our homepage</a> and let hypnosis take you to places even AI can’t access.</p>';
            echo '</div>';
			echo '</div>';
			echo '</div>';
			
			echo '</div>';

            // Lade den Footer
            get_footer();

            exit;
        }
    }
}
add_action('template_redirect', 'serve_custom_410_page', 0);

