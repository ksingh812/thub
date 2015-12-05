<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>
				</div> <!--.container -->	
			</div><!--.site-content-->
			
			
			<footer id="site-footer" role="contentinfo">
				<div id="footer-row" class="row site-footer">
					<div class="container">
					<div class="col-md-3 footer-col footer-col1">
						<?php //dynamic_sidebar('footer-right'); ?> 
						<h4>Find Tickets</h4>
						<ul>
							<li><a href="/concerts-tickets" title="Concerts Tickets">Concert</a></li>
							<li><a href="/sports-tickets" title="Sports Tickets">Sports</a></li>
							<li><a href="/theater-tickets" title="Theater Tickets">Theater</a></li>
							<li><a href="/venues" title="Tickets by Venue">Venues</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-col footer-col2">
						<h4>Why TicketHub?</h4>
						<ul>
							<li>Safe & Secure Platform</li>
							<li>Nationally awarded</li>
							<li>125% money back guarantee</li>
							<li>Live ticket agents on call</li>
							<li>Last minute availability</li>
							<li>Cutting edge security</li>
							<li>Prices can be 15% lower than our competition, or more!</li>
						</ul>
					</div>
					<div class="col-md-3 footer-col footer-col3">
						<h4>Support</h4>
						<ul>
							<li><a href="http://tickets.tickethub.co/policies.aspx" target="_blank">Privacy Policy</a></li>
							<li>Call: (855) 417-8580</li>
							
						</ul>
					</div>
					<div class="col-md-3 footer-col footer-col4">
						<h4>Follow Us</h4>
						<div class="social-icons">
							<span class="social_icon_holder"><a href="https://www.facebook.com/tickethubco" target="_blank"><span class="icon-stack icon-large"><i class="fa fa-facebook"></i></span></a></span>
							&nbsp;<span class="social_icon_holder"><a href="https://twitter.com/tickethubco" target="_blank"><span class="icon-stack icon-large"><i class="fa fa-twitter"></i></span></a></span>
							&nbsp;<span class="social_icon_holder"><a href="http://www.linkedin.com/company/tickethub" target="_blank"><span class="icon-stack icon-large"><i class="fa fa-linkedin"></i></span></a></span>
							&nbsp;<span class="social_icon_holder"><a href="http://www.youtube.com/user/tickethubco" target="_blank"><span class="icon-stack icon-large"><i class="fa fa-youtube"></i></span></a></span>
							&nbsp;<span class="social_icon_holder"><a href="https://plus.google.com/114049133992389790959/" target="_blank"><span class="icon-stack icon-large"><i class="fa fa-google-plus"></i></span></a></span>
							
						</div>
						<?php dynamic_sidebar('footer-right'); ?>
					</div>
					</div>
				</div>
			</footer>
		</div><!--.container page-container-->
		<script language="JavaScript">
				
						document.getElementById('SearchBox').onkeypress = KeyPressedSearch;
						function NavigateSearch() 
						{
							var kwds = document.getElementById('SearchBox').value;
							if (kwds == "" || kwds == "Search by Artist, Team, Event or Venue") return;
							
							window.location= "http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=" + escape(kwds); 
						}
						function KeyPressedSearch(e)
						{
							if (e == null) e = window.event;
							if (e.keyCode == 13)
								NavigateSearch();
						}
						
						document.getElementById('SearchBox').onclick = ClearSearchBox;
						
						function ClearSearchBox(e)
						{
							if(document.getElementById('SearchBox').value == 'Search by Artist, Team, Event or Venue')
							{
								document.getElementById('SearchBox').value = '';
							}
						}
					
			</script>
		
		<!--wordpress footer-->
		<?php wp_footer(); ?> 
		<script type="text/javascript">	
		jQuery( document ).ready(function() {
			console.log("Ready");	
			jQuery(".tn_results").addClass("table-striped");
			jQuery(".tn_results_tickets_text a").html('<i class="fa fa-ticket"></i> Tickets');
			jQuery( ".tn_results_tickets_text a" ).addClass( "tkt-btn" );	
			jQuery( ".tn_results_tickets_text" ).click(function() {
				var lbl= jQuery(document).attr('title');
				ga('Ticket', 'Event', 'LINK', 'click', lbl);
			});
		});
		</script>
	</body>
</html>