<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Apollo Hotel
 */
?>
<section class="footer-main">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
			<p class="copyright"><?php _e( '&copy; Copyright', 'apollohotel' ); ?> <?php echo date_i18n( __( 'Y', 'apollohotel' ) ); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'apollohotel' ); ?>.</p>
			<p class="credits"><?php _e( 'WordPress Theme by', 'apollohotel' ); ?> <a href="https://www.astrothemes.com" class="credits-link" target="_blank">AstroThemes</a></p>
          </div>
        </div>          
    </div>
</section>
