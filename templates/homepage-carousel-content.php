<?php
/**
 * Template Name: Homepage: carousel and content
 */

get_header();

$arr = array( 'carousel', 'page' );

// get the section for each key if the relative file exists
foreach($arr as $item) {
	
	get_template_part( 'template-parts/homepage', $item );
	
}

get_footer();