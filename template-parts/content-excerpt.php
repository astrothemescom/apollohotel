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
    	<h2><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="post-meta">
            <div class="post-meta-item post-meta-date"><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time( get_option('date_format') ); ?></time></div><div class="post-meta-item post-meta-category"><?php the_category( ', ' ); ?></div>
        </div>
	<?php
    if ( has_post_thumbnail() ) {
    ?>
        <div class="thumbnail-image">
            <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_post_thumbnail( 'apollohotel-thumbnail' ); ?></a>
        </div>
    <?php
    }
	the_excerpt();

	the_tags( '<p class="post-meta post-tags"><strong>' . __( 'Tags', 'apollohotel' ).':</strong> ', ', ', '</p>' );
    ?>
	</div>
</article>