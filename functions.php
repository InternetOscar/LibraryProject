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

	
// ////////////////////////////////// Menu Function to Include /////////////////////// //

/* function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'my-custom-menu' => __( 'My Custom Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' ); */

// ///////////////////////////////// A widget function //////////////////



//Widgets for main products page

//---Gallery of plants
function p_gallery_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Gallery products Plants' ),
		'id'            => 'p-gallery-products-widgets',
		'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
    ) );
}
add_action( 'widgets_init', 'p_gallery_widgets_init' );

//---Gallery of pots
function p_gallery_pots_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Gallery products Pots' ),
		'id'            => 'p-gallery-products-pots-widgets',
		'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
    ) );
}
add_action( 'widgets_init', 'p_gallery_pots_widgets_init' );


//---Gallery of Garden tools
function p_gallery_tools_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Gallery products Garden Tools' ),
		'id'            => 'p-gallery-products-tools-widgets',
		'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
    ) );
}
add_action( 'widgets_init', 'p_gallery_tools_widgets_init' );

//---Gallery of fertiliser and gifts

function p_gallery_fertilisers_gifts_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Gallery products Fertilisers and Gifts' ),
		'id'            => 'p-gallery-products-fertilisers-gifts-widgets',
		'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
    ) );
}
add_action( 'widgets_init', 'p_gallery_fertilisers_gifts_widgets_init' );

//Widgets for main ABOUT page
function p_about_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'About section page' ),
		'id'            => 'p-description-about-widgets',
		'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
    ) );
}
add_action( 'widgets_init', 'p_about_widgets_init' );

//Widgets for main CONTACT page
function p_contact_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Contact page' ),
		'id'            => 'p-description-contact-widgets',
		'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
    ) );
}
add_action( 'widgets_init', 'p_contact_widgets_init' );

//add_action( 'init', 'custom_bootstrap_slider' );
// ///////////////////// Register a Custom post type for/////////////////// //

/* 
function custom_bootstrap_slider() {
	$labels = array(
		'name'               => _x( 'Slider', 'post type general name'),
		'singular_name'      => _x( 'Slide', 'post type singular name'),
		'menu_name'          => _x( 'Bootstrap Slider', 'admin menu'),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'Slide'),
		'add_new_item'       => __( 'Name'),
		'new_item'           => __( 'New Slide'),
		'edit_item'          => __( 'Edit Slide'),
		'view_item'          => __( 'View Slide'),
		'all_items'          => __( 'All Slide'),
		'featured_image'     => __( 'Featured Image', 'text_domain' ),
		'search_items'       => __( 'Search Slide'),
		'parent_item_colon'  => __( 'Parent Slide:'),
		'not_found'          => __( 'No Slide found.'),
		'not_found_in_trash' => __( 'No Slide found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'menu_icon'	     => 'dashicons-star-half',
    	        'description'        => __( 'Description.'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array('title','editor','thumbnail')
	);

	register_post_type( 'slider', $args );
} */