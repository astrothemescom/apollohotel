<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                    <?php if ( have_posts() ) : ?>
                        <h1><?php printf( __( 'Search Results for: %s', 'apollohotel' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1><?php _e( 'Nothing Found', 'apollohotel' ); ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- page-content-section -->
    <section class="page-content loop-post">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php
                if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					
						get_template_part( 'template-parts/content', 'search' );
		
					endwhile; // End of the loop.

                    get_template_part( 'template-parts/navigation', 'loop' );

				else :
		
					get_template_part( 'template-parts/content', 'none' );
		
				endif;
                ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section> <!-- /page-content-section -->

</div>

<?php get_footer();
