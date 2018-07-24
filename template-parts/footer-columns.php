<?php
$sidebars = array();

if ( is_active_sidebar( 'footer-col-1' ) ) {
	$sidebars[] = 'footer-col-1';
}
if ( is_active_sidebar( 'footer-col-2' ) ) {
	$sidebars[] = 'footer-col-2';
}
if ( is_active_sidebar( 'footer-col-3' ) ) {
	$sidebars[] = 'footer-col-3';
}
if ( is_active_sidebar( 'footer-col-4' ) ) {
	$sidebars[] = 'footer-col-4';
}
$n = count($sidebars);

if ($n > 0) {
	
	switch($n) {
		case 4 : $class = 'col-sm-6 col-md-3'; break;
		case 3 : $class = 'col-xs-12 col-sm-12 col-md-4'; break;
		case 2 : $class = 'col-xs-12 col-md-6'; break;
		default : $class = 'col-md-12';
	}
?>
<!-- footer-columns -->
<section class="footer-columns">	
	<div class="container">
        <div class="row">
		<?php	
        foreach($sidebars as $sidebar) {
        ?>
            <div class="<?php echo $class; ?>">
                <div class="footer-column">
                <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
		<?php
        }
        ?>
		</div>
    </div>
</section>
<!-- /footer-columns -->
<?php
}
