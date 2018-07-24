<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Apollo Hotel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>

	<script type="text/javascript">
	jQuery(window).load(function($) {
		jQuery('#loader').fadeOut('slow');
	});
    </script>

</head>

<body <?php body_class(); ?>>

	<div id="loader"><?php _e( 'Loading', 'apollohotel' ); ?></div>

    <!-- header -->
    <header>
        <div class="container">
        <?php 
        $arr = array();
        $arr['menu_class'] = 'navbar-nav ml-auto';
        astrothemes_navbar( $arr );
        ?>
        </div>
    </header>
    <!-- /header -->    
