<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Apollo Hotel
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="article-inner">
	<?php
    if ( has_post_thumbnail() ) {
    ?>
        <div class="featured-image">
            <a href="<?php the_post_thumbnail_url( 'large' ); ?>" rel="lightbox"><?php the_post_thumbnail( 'apollohotel-thumbnail' ); ?></a>
        </div>
    <?php
    }
	the_content();

	the_tags( '<p class="post-meta post-tags"><strong>' . __( 'Tags', 'apollohotel' ).':</strong> ', ', ', '</p>' );
    ?>
	</div>
    <?php get_template_part( 'template-parts/navigation', 'single' ); ?>
    <?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
    ?>
</article>