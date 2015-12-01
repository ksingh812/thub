<?php
/**
 * Template for dispalying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<div class="col-md-12 content-area" id="main-column">
	<main id="main" class="site-main" role="main">
		<?php 
		while (have_posts()) {
			the_post();

			get_template_part('content', get_post_format());

			echo "\n\n";
			
			bootstrapBasicPagination();

			echo "\n\n";
		} //endwhile;
		?> 
	</main>
</div> 
<?php get_footer(); ?> 