<?php
/**
 * The template for displaying 410 pages (not found)
 * 410.php Template for WordPress
 * Set the 410 status header.
 */

status_header(410);
nocache_headers();

session_start();
ob_start();

$not_found_page = get_post(11139); // Replace with the ID of your 'error-410' page. if you want to fetch any worpdress page content use ths line otherwise remove this line.

get_header(); // Include the header.
?>

<div class="error-410-page">
    <h1>Page No Longer Available</h1>
    <p>We're sorry, but the page you're looking for is no longer available. It may have been removed or moved to a new location.</p>
    
    <p>You can return to the <a href="<?php echo home_url(); ?>">home page</a> or try using the search below:</p>
    
    <?php get_search_form(); // Include the search form. ?>
</div>

<?php get_footer(); // Include the footer. ?>
