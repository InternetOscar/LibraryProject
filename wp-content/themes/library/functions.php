<?php

// ////////////////////////////////// Enqueue my stylesheet ///////////////////////////// //

function add_theme_style() {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css',false,'1.1','all');

}
add_action( 'wp_enqueue_scripts', 'add_theme_style' );



// ////////////////////////////////// Enqueue  boostrap ////////////////////////////////// //
function pp_scripts() {
  // Registering Bootstrap style
  wp_enqueue_style( 'bootstrap_min', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );

  wp_enqueue_script('jquery');
  //Registering Bootstrap Script
  wp_enqueue_script( 'bootstrap_min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
  }
  add_action( 'wp_enqueue_scripts', 'pp_scripts' );


// ////////////////////////////////// Custom Function to Include Favicon/////////////////////// //

function add_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/favicon.svg" />';
}

add_action('wp_head', 'add_favicon');

// ///////


function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'My First Meta Box', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb()
{
    global $post;
    $values = get_post_custom( $post->ID );
    $button = isset( $values['buttonurl'] ) ? $values['buttonurl'] : '';?>
    <p>
        <label for="my_meta_box_text">Add the link for the course button here:</label>
        <input type='text' name='buttonurl' placeholder='add a URL here' value='<?php echo $button[0];?>'>
    </p>  <?php
}
add_action( 'add_meta_boxes', 'cd_meta_box_add' );

function cd_meta_box_save( $post_id )
{
    // Make sure your data is set before trying to save it
    if( isset( $_POST['buttonurl'] ) )
        update_post_meta( $post_id, 'buttonurl', esc_url( $_POST['buttonurl']) );
}
add_action( 'save_post', 'cd_meta_box_save' );

function qmn_register_my_templates() {
	global $mlwQuizMasterNext;
	$mlwQuizMasterNext->pluginHelper->register_quiz_template( 'My Template', 'my-quiz-template.css' );
}
add_action( 'init', 'qmn_register_my_templates' );
