<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Apollo Hotel
 */
?>

<!-- footer -->
<footer>

	<?php get_template_part( 'template-parts/footer', 'columns' ); ?>
    
	<?php get_template_part( 'template-parts/footer', 'main' ); ?>

</footer>
<!-- /footer -->

<div class="backtotop">
	<a href="#" id="to_top"><?php _e( 'Scroll To Top', 'apollohotel' ); ?></a>
</div>

<?php wp_footer(); ?>

</body>
</html>