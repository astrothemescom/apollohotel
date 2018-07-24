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

	astrothemes_list_child_pages();
	?>
	</div>
</article>