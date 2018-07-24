<?php
global $the_query;

$args = false;
if ( isset($the_query) ) {
	$args = array(
				'total' => $the_query->max_num_pages
				);
}

$paginate_links = paginate_links($args);

if ( !empty($paginate_links) ) {
?>
<div class="navigation-loop">
	<div class="row">
        <div class="col-md-12">
        <?php echo $paginate_links; ?>
        </div>
	</div>
</div>
<?php
}
