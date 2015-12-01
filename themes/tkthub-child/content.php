<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
	 		if (has_post_thumbnail()){
	 			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	 		}else{
	 			$url = get_stylesheet_directory_uri() ."/images/thumb.png";
	 		}
	 		//echo $url;
	 	?>
	 	<img itemprop="image" src="<?php echo $url; ?>" alt="<?php the_title();?>" class="header-img img-responsive"/>
		<h1 class="entry-title"><?php the_title(); ?></h1>

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
		<?php the_content(bootstrapBasicMoreLinkText()); ?> 
		<div class="clearfix"></div>
		<?php 
		/**
		 * This wp_link_pages option adapt to use bootstrap pagination style.
		 * The other part of this pager is in inc/template-tags.php function name bootstrapBasicLinkPagesLink() which is called by wp_link_pages_link filter.
		 */
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'bootstrap-basic') . ' <ul class="pagination">',
			'after'  => '</ul></div>',
			'separator' => ''
		));
		?> 
	</div><!-- .entry-content -->
	<?php } //endif; ?> 

	
	<footer class="entry-meta">
		<div class="tickets-table">
			<?php $artist_name = get_post_meta( get_the_ID(), '_cd_rsr_title_content', true ); ?>	
			<h3 class="ticket-title"><?php echo $artist_name; ?> Tickets</h3>							
			<div class="table-responsive">				
				<script type="text/javascript">// <![CDATA[
				function TN_SetWidgetOptions() { TN_Widget.newWindow = false; TN_Widget.trackingParams = ''; TN_Widget.custLink = false; TN_Widget.tixUrl = 'http://tickets.tickethub.co/ResultsTicket.aspx'; }
				// ]]></script>
				<script type="text/javascript" src="http://site_01504_011.ticketsoftware.net/widget2_c.aspx?kwds=<?php echo $artist_name; ?>&amp;style=0&amp;mxrslts=100">// <![CDATA[
				<span id="mce_marker" data-mce-type="bookmark"></span><span id="__caret">_</span>
				// ]]></script></div><a style="margin-top:20px;" class="qbutton  medium normal" title="<?php echo $artist_name; ?> Tickets" target="_self" href="http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=<?php echo $artist_name; ?>">MORE TICKETS >> </a>
		</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->