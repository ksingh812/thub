<?php 
/**
 * Template Name: Theater Template
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header(); 

/**
 * determine main column size from actived sidebar
 */
//$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<div class="col-md-12 content-area" id="main-column">
	<main id="main" class="site-main" role="main">
		<?php the_content(); ?>
		<?php if (have_posts()) { ?> 
		
		<?php 
		/* Start the Loop */
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query -> query('post_type=portfolio_page&showposts=40&portfolio_category=theater'.'&paged='.$paged);
			$i = 1; ?>
			<div class="row">
			<?php if ( $wp_query->have_posts() ) :
				while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<div class="col-md-3 portfolio-item">
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
			<?php wpbeginner_numeric_posts_nav(); ?>

		<?php $wp_query = null; $wp_query = $temp; ?>
		<?php //bootstrapBasicPagination(); ?> 

		<?php } else { ?> 

		<?php get_template_part('no-results', 'archive'); ?> 

		<?php } //endif; ?> 
	</main>
</div>
<?php get_footer(); ?> 