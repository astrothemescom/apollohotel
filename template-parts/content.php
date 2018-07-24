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
        <div class="thumbnail-image">
            <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_post_thumbnail( 'apollohotel-thumbnail' ); ?></a>
        </div>
    <?php
    }
	the_content();

	wp_link_pages( array('before' => '<p class="page-navigation"><strong>' . __( 'Pages' , 'apollohotel' ) . ':</strong> ', 'after' => '</p>', 'next_or_number' => 'number') );
	?>
	</div>
</article>