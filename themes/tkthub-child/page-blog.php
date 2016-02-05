<?php 
/**
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
		<?php if (have_posts()) { ?> 
		
		<?php 
		/* Start the Loop */
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query -> query('post_type=post&showposts=10'.'&paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<div class="row post-row">
					<div class="col-md-6 col-xs-12 post-thumb">
						<?php
					 		if (has_post_thumbnail()){
					 			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					 		}else{
					 			$url = get_stylesheet_directory_uri() ."/images/thumb.png";
					 		}
					 		//echo $url;
					 	?>
					 	<a href="<?php the_permalink(); ?>" rel="bookmark"><img itemprop="image" src="<?php echo $url; ?>" alt="<?php the_title();?>" class="header-img img-responsive"/></a>
					 	<?php
					 		if (!empty(get_post(get_post_thumbnail_id())->post_excerpt)):
					 		echo '<span class="small">Image source: '.get_post(get_post_thumbnail_id())->post_excerpt.'</span>';
							endif;
					 	 ?>
					</div>
					<div class="col-md-6 col-xs-12 post-entry">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						
								<?php if ('post' == get_post_type()) { ?> 
								<div class="entry-meta">
									<?php bootstrapBasicPostOn(); ?> 
								</div><!-- .entry-meta -->
								<?php } //endif; ?> 
							</header><!-- .entry-header -->
						
							
							<?php if (is_search()) { // Only display Excerpts for Search ?> 
							<div class="entry-summary">
								<?php the_excerpt(); ?> 
								<div class="clearfix"></div>
							</div><!-- .entry-summary -->
							<?php } else { ?> 
							<div class="entry-content">
								<p><?php echo excerpt(100); ?></p>
								<br/><br/>
								<a href="<?php the_permalink(); ?>" class="btn btn-tkt" rel="bookmark">Read more</a>
							</div><!-- .entry-content -->
							<?php } //endif; ?> 
						
							
							<footer class="entry-meta">
								
							</footer><!-- .entry-meta -->
						</article><!-- #post-## -->
					</div>
				</div>
			<?php endwhile; // end of the loop. ?>
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