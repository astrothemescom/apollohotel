<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header();
?>
<div class="main-content">

    <!-- page-header -->
    <?php
	$style_bg = false;
	if ( has_post_thumbnail() ) {
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'apollohotel-slideshow' );
		$style_bg = 'style="background-image:url('. $img[0].');"';
	}
	?>
    <div class="page-header" <?php echo $style_bg; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- page-content-section -->
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
    
                    get_template_part( 'template-parts/content', 'page' );
    
                endwhile; // End of the loop.
                ?>
                </div>
				<?php get_sidebar(); ?>
            </div>
        </div>
    </section> <!-- /page-content-section -->

</div>

<?php get_footer();