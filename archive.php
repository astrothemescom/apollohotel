<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Apollo Hotel
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
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
                    <?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<div class="post-meta">', '</div>' );
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


    <!-- page-content-section -->
    <section class="page-content loop-post">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php
                if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					
						get_template_part( 'template-parts/content', 'excerpt' );
		
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
