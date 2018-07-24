<?php
/* 
 * Insppired by https://bootstrapcreative.com/create-full-width-bootstrap-4-responsive-carousel/
 */

global $post;

$items = astrothemes_get_the_first_post_gallery( $post->ID );

if ( !empty($items) ) {
?>

<!-- carousel-section -->
<section class="carousel-section">

	<div class="fill">

    <div id="carouselhome" class="carousel slide" data-ride="carouselhome" data-interval="5000">
    
      <ol class="carousel-indicators">
      <?php for ($x = 0; $x < count($items); $x++) { ?>
        <li data-target="#carouselhome" data-slide-to="<?php echo $x; ?>"<?php if ( $x == 0 ) { ' class="active"'; } ?>></li>
      <?php } ?>
      </ol>
      
      <div class="carousel-inner" role="listbox">
      
        <?php
		$n = 0;
		foreach($items as $item) {
			$n++;
		?>
        <div id="carouselhome-slide-<?php echo $n; ?>" class="carousel-item<?php if ( $n == 1 ) { echo ' active'; } ?>">
              
              <picture>
                <source srcset="<?php echo $item['img_lg']; ?>" media="(min-width: 1400px)"> <!-- apollohotel-slideshow-lg -->
                <source srcset="<?php echo $item['img_md']; ?>" media="(min-width: 769px)"> <!-- apollohotel-slideshow-md -->
                <source srcset="<?php echo $item['img_sm']; ?>" media="(min-width: 577px)"> <!-- apollohotel-slideshow-sm -->
                <img src="<?php echo $item['img']; ?>" srcset="<?php echo $image_sm[0]; ?>" alt="<?php if ( !empty($item['title']) ) { echo esc_attr( $item['title'] ); } ?>" class="d-block img-fluid">
              	 <!-- apollohotel-slideshow -->
              </picture>

              <?php
			  if ( !empty($item['title']) || !empty($item['caption']) ) {
			  ?>
              <div class="carousel-caption">
                <?php if ( !empty($item['title']) ) { ?>
                  <h2 data-animation="animated fadeInDown"><?php echo $item['title']; ?></h2>
                <?php } ?>
                <?php if ( !empty($item['caption']) ) { ?>
                  <p data-animation="animated fadeInDown"><?php echo $item['caption']; ?></p>
                <?php } ?>
              </div>
              <?php
			  }
			  ?>
        </div>
        <!-- /.carousel-item -->
        <?php
		}
		?>
        
      </div>
      <!-- /.carousel-inner --> 
      
      <?php if (count($items) > 1) { ?>
      <a class="carousel-control-prev" href="#carouselhome" role="button" data-slide="prev">
      	<span class="carousel-control-prev-icon fa fa-angle-left" aria-hidden="true"></span> 
        <span class="sr-only"><?php _e( 'Previous', 'apollohotel' ); ?></span>
      </a>
      <a class="carousel-control-next" href="#carouselhome" role="button" data-slide="next"> 
        <span class="carousel-control-next-icon fa fa-angle-right" aria-hidden="true"></span> 
        <span class="sr-only"><?php _e( 'Next', 'apollohotel' ); ?></span> 
      </a>
      <?php } ?>
      
    </div>
    <!-- /.carousel -->

	</div>
    
</section>
<!-- /carousel-section -->

<?php
}
