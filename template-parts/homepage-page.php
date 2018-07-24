<?php
global $post;
?>
<!-- home-section -->
<section class="home-section">
    <div class="container"> 
        <div id="post-<?php the_ID(); ?>" class="row">
		<?php

			echo '<div class="col-md-12">';
			
			if ( has_post_thumbnail( get_the_ID() ) ) {
				echo '<div class="featured-image">';
				the_post_thumbnail( 'apollohotel-thumbnail' );
				echo '</div>';
			}

			echo '<div class="home-section-content">';
			setup_postdata( $post );
			the_content();
			echo '</div>';	

			echo '</div>';	

			wp_reset_postdata();
			wp_reset_query();	
        
        ?>
        </div>
    </div>
    <!-- /container --> 
</section>
<!-- /home-section -->