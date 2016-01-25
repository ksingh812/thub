<?php
/**
 * Template for displaying pages
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
		if (have_posts()) {
			//the_post();

			get_template_part('content', 'page');

			echo "\n\n";
		} //endwhile;
		?> 
	</main>
</div>
<?php get_footer(); ?> 