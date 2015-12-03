<?php
include_once 'inc/shortcodes.php';
include_once 'inc/meta-box.php';

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.min.css',
        array( $parent_style )
    );
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.min.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/*Custom Excerpt Length 
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );*/


/* Create Portfolio post type */

if (!function_exists('create_post_type')) {
function create_post_type() {
	global $qode_options_river;
	$slug = 'portfolio';
	if(isset($qode_options_river['portfolio_single_slug'])) {
		if($qode_options_river['portfolio_single_slug'] != ""){
			$slug = $qode_options_river['portfolio_single_slug'];
		}
	}
	register_post_type( 'portfolio_page',
		array(
			'labels' => array(
				'name' => __( 'Portfolio','qode' ),
				'singular_name' => __( 'Portfolio Item','qode' ),
				'add_item' => __('New Portfolio Item','qode'),
                'add_new_item' => __('Add New Portfolio Item','qode'),
                'edit_item' => __('Edit Portfolio Item','qode')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => $slug),
			'menu_position' => 4,
			'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'tags'),
			'taxonomies' => array('post_tag')
		)
	);
	register_post_type('testimonials',
		array(
			'labels' => array(
				'name' 				=> __('Testimonials','qode' ),
				'singular_name' 	=> __('Testimonial','qode' ),
				'add_item'			=> __('New Testimonial','qode'),
				'add_new_item' 		=> __('Add New Testimonial','qode'),
				'edit_item' 		=> __('Edit Testimonial','qode')
			),
			'public'		=>	false,
			'show_in_menu'	=>	true, 
			'rewrite' 		=> 	array('slug' => 'testimonials'),
			'menu_position' => 	4,
			'show_ui'		=>	true,
			'has_archive'	=>	false, 
			'hierarchical'	=>	false,
            'supports'		=>	array('title', 'tags')
		)
	);

}
}
add_action( 'init', 'create_post_type' );

/* Create Portfolio Categories */

add_action( 'after_setup_theme', 'create_portfolio_taxonomies', 0 );
if (!function_exists('create_portfolio_taxonomies')) {
function create_portfolio_taxonomies() 
{
   $labels = array(
    'name' => __( 'Portfolio Categories', 'taxonomy general name' ),
    'singular_name' => __( 'Portfolio Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio Categories','qode' ),
    'all_items' => __( 'All Portfolio Categories','qode' ),
    'parent_item' => __( 'Parent Portfolio Category','qode' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:','qode' ),
    'edit_item' => __( 'Edit Portfolio Category','qode' ), 
    'update_item' => __( 'Update Portfolio Category','qode' ),
    'add_new_item' => __( 'Add New Portfolio Category','qode' ),
    'new_item_name' => __( 'New Portfolio Category Name','qode' ),
    'menu_name' => __( 'Portfolio Categories','qode' ),
  );     

  register_taxonomy('portfolio_category',array('portfolio_page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio-category' ),
  ));

}
}

/* Create Testimonials Category */

add_action( 'after_setup_theme', 'create_testimonials_taxonomies', 0 );
if (!function_exists('create_testimonials_taxonomies')) {
function create_testimonials_taxonomies() 
{
   $labels = array(
    'name' => __( 'Testimonials Categories', 'taxonomy general name' ),
    'singular_name' => __( 'Testimonial Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Testimonials Categories','qode' ),
    'all_items' => __( 'All Testimonials Categories','qode' ),
    'parent_item' => __( 'Parent Testimonial Category','qode' ),
    'parent_item_colon' => __( 'Parent Testimonial Category:','qode' ),
    'edit_item' => __( 'Edit Testimonials Category','qode' ), 
    'update_item' => __( 'Update Testimonials Category','qode' ),
    'add_new_item' => __( 'Add New Testimonials Category','qode' ),
    'new_item_name' => __( 'New Testimonials Category Name','qode' ),
    'menu_name' => __( 'Testimonials Categories','qode' ),
  );     

  register_taxonomy('testimonials_category',array('testimonials'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'show_admin_column' => true,
    'rewrite' => array( 'slug' => 'testimonials-category' ),
  ));

}
}

/* Multiple Excerpt Length */
function excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).'...';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}

/* NAV CUSTOM */
function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
?>