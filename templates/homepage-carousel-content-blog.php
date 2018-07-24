<?php
/**
 * Template Name: Homepage: carousel, content and blog
 */

get_header();

$arr = array( 'carousel', 'page', 'blog' );

// get the section for each key if the relative file exists
foreach($arr as $item) {
	
	get_template_part( 'template-parts/homepage', $item );
	
}

get_footer();