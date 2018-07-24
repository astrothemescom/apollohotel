<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Apollo Hotel
 */

get_header();
?>
<div class="main-content">

    <!-- page-header -->
    <?php
	$post_id = get_option( 'page_for_posts' );
	$style_bg = false;
	if ( has_post_thumbnail( $post_id ) ) {
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'apollohotel-slideshow' );
		$style_bg = 'style="background-image:url('. $img[0].');"';
	}
	?>
    <div class="page-header" <?php echo $style_bg; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'apollohotel' ); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- page-content-section -->
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article id="post-404notfound">
                        <div class="article-inner">
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'apollohotel' ); ?></p>
                        <?php get_search_form(); ?>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section> <!-- /page-content-section -->

</div>
<?php get_footer();