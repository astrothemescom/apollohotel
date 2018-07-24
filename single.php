<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Apollo Hotel
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
                    <div class="post-meta">
                        <div class="post-meta-item post-meta-date"><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time( get_option('date_format') ); ?></time></div><div class="post-meta-item bypostauthor"><?php _e( 'By', 'apollohotel' ); ?> <?php the_author(); ?></div><div class="post-meta-item post-meta-category"><?php the_category( ', ' ); ?></div>
                    </div>
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
                
                    get_template_part( 'template-parts/content', 'single' );
    
                endwhile; // End of the loop.
                ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section> <!-- /page-content-section -->

</div>

<?php get_footer();