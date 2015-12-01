<?php get_header(); ?>  
<div class="col-md-12 content-area" id="main-column">
	<main id="main" class="site-main" role="main">
		<?php 
		while (have_posts()) {
			the_post();
			echo '<div class="col-md-4 portfolio-thumbnail">';
			if ( has_post_thumbnail() ) {
				the_post_thumbnail("medium");
			}
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
			}
			echo '</div>';
			echo '<div class="col-md-8 portfolio-summary">';
			echo '<h1>'.get_the_title().'</h1>';
			//the_title();
			the_content();
			echo '</div>';

		} //endwhile;
		?> 
	</main>
</div>
<div class="col-md-12 tickets-table">
	<h3 class="ticket-title"><?php the_title(); ?> Tickets</h3>&nbsp;&nbsp;
									
	<div class="table-responsive">				
		<script type="text/javascript">// <![CDATA[
		function TN_SetWidgetOptions() { TN_Widget.newWindow = false; TN_Widget.trackingParams = ''; TN_Widget.custLink = false; TN_Widget.tixUrl = 'http://tickets.tickethub.co/ResultsTicket.aspx'; }
		// ]]></script>
		<script type="text/javascript" src="http://site_01504_011.ticketsoftware.net/widget2_c.aspx?kwds=<?php the_title(); ?>&amp;style=0&amp;mxrslts=100">// <![CDATA[
		<span id="mce_marker" data-mce-type="bookmark"></span><span id="__caret">_</span>
		// ]]></script></div><a style="margin-top:20px;" class="qbutton  medium normal" title="<?php the_title(); ?> Tickets" target="_self" href="http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=<?php the_title(); ?>">MORE TICKETS >> </a>
	</div>
	
</div>
<?php get_footer(); ?> 