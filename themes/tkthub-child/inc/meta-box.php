<?php
#ADD-META-BOXES
function cd_add_tkthub_meta(){
    add_meta_box( 'tkthub-meta', __( 'Event Detail' ), 'cd_tkthub_meta_cb', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'cd_add_tkthub_meta' );
#RENDER META-BOX
function cd_tkthub_meta_cb( $post ){
		
	$rsr_title = get_post_meta( $post->ID, '_cd_rsr_title_content', true );
	// Nonce to verify intention later
    wp_nonce_field( 'save_tkthub_meta', 'tkthub_nonce' );	?>	
	<p>
        <label for="rsr-title-content">Artist Name:</label>
        <input type="text" class="widefat" id="rsr-title-content" name="_cd_rsr_title_content" value="<?php echo $rsr_title; ?>">
    </p>
    <?php
}

#SAVE-META-BOX-VALUES
    function cd_tkthub_meta_save( $id ){
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( !isset( $_POST['tkthub_nonce'] ) || !wp_verify_nonce( $_POST['tkthub_nonce'], 'save_tkthub_meta' ) ) return;     
        if( !current_user_can( 'edit_post' ) ) return;
        // now we can actually save the data
        $allowed = array( 
            'a' => array( // on allow a tags
                    'href' => array() // and those anchors can only have href attribute
                    ),
            'ul' => array(),
            'li' => array(),
            'img' => array(),
            'b' => array(),
        );     
        if( isset( $_POST['_cd_rsr_title_content'] ) )
            update_post_meta( $id, '_cd_rsr_title_content', wp_kses( $_POST['_cd_rsr_title_content'], $allowed) );
    }	
    add_action( 'save_post', 'cd_tkthub_meta_save' );

remove_action('wp_head', 'wp_generator');
/**
* Creates sharethis shortcode
*/
if (function_exists('st_makeEntries')) :
add_shortcode('sharethis', 'st_makeEntries');
endif;
?>