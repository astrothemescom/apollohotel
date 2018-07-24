<!-- news-section -->
<section class="news-section">
    <div class="container"> 

        <div class="row">
        <?php
		$n = 3;
		$args = array(
						'post_type' 		=> 'post',
						'post_status'		=> 'publish',
						'posts_per_page' 	=> $n,
						'order'				=> 'DESC',
						'orderby'			=> 'date',
						);
        $the_query = new WP_Query( $args );
		
		$i = 0;
        while ($the_query -> have_posts()) : $the_query -> the_post();
		?>
        <div class="col-md-4">
            <div class="news-item">
                <div class="featured-image">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_post_thumbnail( 'apollohotel-thumbnail' ); ?></a>
                </div>
                <div class="news-item-content">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-meta">
                        <div class="post-meta-item post-meta-date"><time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_time( get_option('date_format') ); ?></time></div><div class="post-meta-item post-meta-category"><?php the_category( ', ' ); ?></div>
                    </div>
                    <?php the_excerpt(); ?>
            	</div>
            </div>
        </div>
		<?php
			$i++;
			if ($i == $n) { break; } //exit after n posts, sitky posts included
        endwhile;
		
		wp_reset_query();
		wp_reset_postdata();
        ?>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btn btn-lg btn-primary" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
                <?php _e( 'Read all from', 'apollohotel' ); ?> 
				<?php
				$page_for_posts_title = get_option( 'page_for_posts' );
				if ( $page_for_posts_title ) { // page_for_posts title
					echo get_the_title( $page_for_posts_title );	
				}else{ // site title
					bloginfo( 'name' );
				}
				?>
                </a>
            </div>
        </div>

    </div>
    <!-- /container --> 
</section>
<!-- /news-section -->