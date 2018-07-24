<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
        <!-- page-title -->
        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-inner">
                            <h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
                            <div class="divider"></div>
                        </div>
                    </div>
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
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'excerpt' );

                    endwhile;
            
                    get_template_part( 'template-parts/navigation', 'loop' );
            
                else :
            
                    get_template_part( 'template-parts/post/content', 'none' );
            
                endif;
                ?>
        
                </div>

	        	<?php get_sidebar(); ?>
            
            </div>
        </div>
    </section> <!-- /page-content-section -->

</div>
<?php get_footer();