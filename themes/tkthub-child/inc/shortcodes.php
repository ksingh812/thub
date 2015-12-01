<?php
	// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
	add_shortcode( 'list-posts', 'tkthub_post_shortcode' );
	function tkthub_post_shortcode( $atts ) {
	    ob_start();
	 
	    // define attributes and their defaults
	    extract( shortcode_atts( array (
	        'type' => 'post',
	        'order' => 'date',
	        'orderby' => 'title',
	        'posts' => -1,
	        'tag' => 'featured',
	        'fabric' => '',
	        'category' => '',
	    ), $atts ) );
	 
	    // define query parameters based on attributes
	    $options = array(
	        'post_type' => $type,
	        'order' => $order,
	        'orderby' => $orderby,
	        'posts_per_page' => $posts,
	        'tag' => $tag,
	        'fabric' => $fabric,
	        'category_name' => $category,
	    );
	    $query = new WP_Query( $options );
	    // run the loop based on the query
	    if ( $query->have_posts() ) { ?>
	             <ul class="eventlist">
	               <?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<li>
							 <div itemscope itemtype="http://schema.org/Event">
								 <a itemprop="url" href="<?php the_permalink();?>" title="<?php the_title(); ?> Tickets">
								 	<?php
								 		if (has_post_thumbnail()){
								 			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								 		}else{
								 			$url = get_stylesheet_directory_uri() ."/images/thumb.png";
								 		}
								 		//echo $url;
								 	?> 
								 	
								 	<img itemprop="image" src="<?php echo $url; ?>" alt="<?php the_title();?>" class="thumb" width="25px" height="25px" /><span itemprop="name"><?php the_title(); ?></span><span itemprop="offers" style="float:right;"><i class="fa fa-ticket"></i></span></a>
							 </div>
							 </li>
		<?php endwhile; ?>
	            </ul>
	    <?php
	        $myvariable = ob_get_clean();
	        return $myvariable;
	    }
		wp_reset_query();
	}
	//RECENT POSTS
	add_shortcode( 'tkt-recent-posts', 'tkthub_recent_posts_shortcode' );
	function tkthub_recent_posts_shortcode($atts) {
	    ob_start();
		// define attributes and their defaults
	    extract( shortcode_atts( array (
	        'class' => ''
	    ), $atts ) );
		//echo '<div class="row '.$class.'">'.do_shortcode($content).'</div>';
		$options = array(
	        'post_type' => post,
	        'order' => DSC,
	        'orderby' => Date,
	        'posts_per_page' => 4,
	    );
	    $query = new WP_Query( $options );
	    // run the loop based on the query
	    if ( $query->have_posts() ) { ?>
	             <div class="row recent-post-row">
	               <?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-3 col-sm-6 col-xs-12 recent-post-col">
							 <div class="latest_post">
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?> Tickets" class="latest_post_wrapper">
									<?php
								 		if (has_post_thumbnail()){
								 			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								 		}else{
								 			$url = get_stylesheet_directory_uri() ."/images/thumb.png";
								 		}
								 		//echo $url;
								 	?> 
								<img src="<?php echo $url; ?>" class="img-responsive" alt="<?php the_title();?>" style="height:180px;"></a>
								<div class="latest_post_text">
									<div class="latest_post_inner">
										<h6 class="latest_post_title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>
									</div>
									<p><?php echo excerpt(20); ?></p>
								</div>
							</div>
						</div>
		<?php endwhile; ?>
	            </div>
	    <?php
	        $myvariable = ob_get_clean();
	        return $myvariable;
	    }
		wp_reset_query();
	}
	
	//ROW
	add_shortcode( 'tkt-row', 'tkthub_row_shortcode' );
	function tkthub_row_shortcode( $atts, $content ) {
	    ob_start();
		// define attributes and their defaults
	    extract( shortcode_atts( array (
	        'class' => ''
	    ), $atts ) );
		echo '<div class="row '.$class.'">'.do_shortcode($content).'</div>';
		
		$myvariable = ob_get_clean();
	    return $myvariable;
	}
	//TWO COLUMN
	add_shortcode( 'tkt-2col', 'tkthub_2col_shortcode' );
	function tkthub_2col_shortcode( $atts, $content ) {
	    ob_start();
		extract( shortcode_atts( array (
	        'class' => ''
	    ), $atts ) );
		echo '<div class="col-md-6 col-xs-12 '.$class.'">'.do_shortcode($content).'</div>';
		
		$myvariable = ob_get_clean();
	    return $myvariable;
	}
	//THREE COLUMN
	add_shortcode( 'tkt-3col', 'tkthub_3col_shortcode' );
	function tkthub_3col_shortcode( $atts, $content ) {
	    ob_start();
		extract( shortcode_atts( array (
	        'class' => ''
	    ), $atts ) );
		echo '<div class="col-md-4 col-xs-12 '.$class.'">'.do_shortcode($content).'</div>';
		
		$myvariable = ob_get_clean();
	    return $myvariable;
	}
	//FOUR COLUMN
	add_shortcode( 'tkt-4col', 'tkthub_4col_shortcode' );
	function tkthub_4col_shortcode( $atts, $content ) {
	    ob_start();
		extract( shortcode_atts( array (
	        'class' => ''
	    ), $atts ) );
		echo '<div class="col-md-3 col-sm-6 col-xs-12 '.$class.'">'.do_shortcode($content).'</div>';
		
		$myvariable = ob_get_clean();
	    return $myvariable;
	}
	
	/* Portfolio shortcode */
    function list_portfolio_new($atts, $content = null) {
		ob_start();
        global $wp_query;

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            "order_by"              => "menu_order", 
            "order"                 => "ASC", 
            "number"                => "-1",  
            "category"              => "", 
        );
        
        extract(shortcode_atts($args, $atts));
            $args = array(
                'post_type' => 'portfolio_page',
                'portfolio_category' => $category,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number,
                'paged' => $paged
            );
        
		$temp = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query($args);
		//$wp_query -> query();
		$i = 1; ?>
		<div class="row">
		<?php if ( $wp_query->have_posts() ) :
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="col-md-3 col-xs-6 portfolio-item">
				<div class="portfolio-wrap">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<div class="col-md-3 portfolio-thumb">
						<?php
					 		if (has_post_thumbnail()){
					 			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					 		}else{
					 			$url = get_stylesheet_directory_uri() ."/images/thumb.png";
					 		}
					 		//echo $url;
					 	?>
					 	<img itemprop="image" src="<?php echo $url; ?>" alt="<?php the_title();?>" class="thumb" width="50px" height="50px"/>
					 </div>
					 <div class="col-md-7 portfolio-title"	
					 	<h4 class="entry-title"><?php the_title(); ?></h4>
					</div>
					<div class="col-md-2 portfolio-tkt">
					 	<span class="fa fa-ticket"></span>
					</div>
					</a>
				</div>
			</div>
			
		<?php 
			if($i % 4 == 0) {echo '</div><div class="row">';}
			$i++;
			endwhile; // end of the loop. 
			endif;
		?>
		</div>
		<!-- CUSTOM Pagination -->
		<?php wpbeginner_numeric_posts_nav(); 
        $myvariable = ob_get_clean();
    	return $myvariable;        
        wp_reset_query();
    }
	add_shortcode('list-portfolio', 'list_portfolio_new');
?>