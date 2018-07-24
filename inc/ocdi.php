<?php
/**
 * One Click Demo Import
 * Import Files
 * https://wordpress.org/plugins/one-click-demo-import/#faq
 */
function ocdi_import_files() {
	$theme_data = wp_get_theme();

    return array(
        array(
            'import_file_name'           => $theme_data->name,
            'import_file_url'            => 'https://demo.astrothemes.com/apollohotel/wp-content/themes/apollohotel/ocdi/demo-content.xml',
            'import_preview_image_url'   => 'https://demo.astrothemes.com/apollohotel/wp-content/themes/apollohotel/ocdi/screenshot.jpg',
            'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'apollohotel' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

/**
 * One Click Demo Import
 * Menu and Pages setup
 * https://wordpress.org/plugins/one-click-demo-import/#faq
 */
function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );