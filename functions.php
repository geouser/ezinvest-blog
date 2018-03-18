<?php 

	show_admin_bar(false);

	require_once('wp-updates-theme.php');
	new WPUpdatesThemeUpdater_2249( 'http://wp-updates.com/api/2/theme', 'ezinvest-blog' );
	
	

	// 1. customize ACF path
	add_filter('acf/settings/path', 'my_acf_settings_path');
	 
	function my_acf_settings_path( $path ) {
	 
	    // update path
	    $path = get_stylesheet_directory() . '/acf/';
	    
	    // return
	    return $path;
	    
	}
	 

	// 2. customize ACF dir
	add_filter('acf/settings/dir', 'my_acf_settings_dir');
	 
	function my_acf_settings_dir( $dir ) {
	 
	    // update path
	    $dir = get_stylesheet_directory_uri() . '/acf/';
	    
	    // return
	    return $dir;
	    
	}
	 

	// 3. Hide ACF field group menu item
	//add_filter('acf/settings/show_admin', '__return_false');


	// 4. Include ACF
	include_once( get_stylesheet_directory() . '/acf/acf.php' );


	
	/**
	 *
	 * Increase wp upload max size limit
	 *
	*/
	update_option('max_file_size', '256000000');
	add_filter('upload_size_limit', 'increase_upload_size');
	function increase_upload_size($bytes) {
		return get_option('max_file_size');
	}


	/**
	 *
	 * Prevent placing selected categories on top of list when editing post
	 *
	*/
	function taxonomy_checklist_checked_ontop_filter ($args) {
		$args['checked_ontop'] = false;
		return $args;
	}
	add_filter('wp_terms_checklist_args','taxonomy_checklist_checked_ontop_filter');


	/**
	 *
	 * Add theme support
	 *
	*/
	function template_settings() {

		add_theme_support( 'post-thumbnails' ); 
		add_theme_support( 'menus' );
		add_theme_support( 'widgets' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );

		register_nav_menu( 'header_menu', 'Header Menu' );

		add_image_size( 'blog_thumbnail', 510 ); // name, width, height, crop
	}
	add_action( 'after_setup_theme', 'template_settings' ); // after_theme_setup

	/*function my_image_sizes($sizes) {
		$addsizes = array(
			"name_thumbnail" => __( "Description" )
		);
		$newsizes = array_merge( $sizes, $addsizes );
		return $newsizes;
	}*/

	add_action( 'widgets_init', 'register_my_widgets' );
	function register_my_widgets(){
		register_sidebar( array(
			'name'          => sprintf(__('Footer area'), $i ),
			'id'            => "footer-sidebar",
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div class="col-6 col-md-3"><div class="footer-widget">',
			'after_widget'  => '</div></div></div>',
			'before_title'  => '<p class="fw-title">',
			'after_title'   => '</p><div class="fw-content">',
		) );
	}


	/**
	 *
	 * Initialization of scripts and stylesheets
	 *
	*/
	function custom_links() {
		$theme = wp_get_theme();

		wp_enqueue_style( 'general-css', get_template_directory_uri() . '/css/general-min.css', array(), $theme->get( 'Version' ), 'all' );

		wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), $theme->get( 'Version' ), true  );
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'plugins-js'), $theme->get( 'Version' ), true  );

		wp_localize_script('main-js', 'theme', 
			array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'url' => get_template_directory_uri(),
				'search_tip' => ez__('Start typing in the search field above'),
			)
		); 

	}
	add_action( 'wp_enqueue_scripts', 'custom_links' );


	/**
	 *
	 * Styles for tinymce editor
	 *
	*/
	add_editor_style( get_template_directory_uri() . '/css/admin-styles.css' );




	/**
	 *
	 * Adding google maps API key
	 *
	*/

	/*
	function my_acf_google_map_api( $api ){
		$api['key'] = 'AIzaSyB8OI63bD1KAI4MAo0yz7p0Fj-RiPEZYPk';
		return $api;
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
	*/



	/**
	 *
	 * Adds Theme ACF options page
	 *
	*/
	if( function_exists('acf_add_options_page') ) {
 
		$option_page = acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title' 	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' 		=> false,
			'icon_url' 		=> 'dashicons-schedule'
		));
	 
	}


	/**
	 *
	 * Modifying search to displat only posts
	 *
	*/
	function modify_search($query) {
		if ( $query->is_search() && $query->is_main_query() ) {
			$query->set('post_type', 'post');
		}	
	}
	add_action( 'pre_get_posts', 'modify_search' );
	
	

	
	/**
	 *
	 * Adds Ajax suport on site
	 *
	*/
	function my_func_get_search_results() {
		global $post;
		$result = array();
		$search = $_POST['value'];

		$args = array(
			'post_type' => 'post',
			's' => $search
		);

		$query = new WP_Query($args);

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();

				$result['posts'][] = array(
					'post_title' => get_the_title(),
					'post_link' => get_permalink(),
					'post_thumbnail' => get_the_post_thumbnail_url( get_the_ID(), 'blog_thumbnail' ),
					'post_excerpt' => get_the_excerpt()
				);
			endwhile;
			$result['status'] = 'ok';

			if ( $query->max_num_pages > 1 ) {
				$result['search_link'] = home_url('/?s=' . $search);
			};
			
		else:
			$result['status'] = 'empty';
		endif;
		wp_reset_postdata();


		/* do staff here... */ 
		wp_send_json( $result );
		// выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
		wp_die();
	}
	add_action('wp_ajax_get_search_results', 'my_func_get_search_results');
	add_action('wp_ajax_nopriv_get_search_results', 'my_func_get_search_results');

	
	/**
	 *
	 * Adds capability to translate theme
	 *
	*/
	function my_theme_setup(){
		load_theme_textdomain( 'theme-domain', get_template_directory() . '/languages' );
	}
	add_action( 'after_setup_theme', 'my_theme_setup' );



	/**
	 *
	 * Shortcode function 
	 *
	*/
	function function_name( $atts ) {
	    $atts = shortcode_atts( array(
	        // shortcode attributes
	    ), $atts, 'function_name' );

	    // shortcode logic goes here


	    ob_start();

	    	// html output goes here
	    
	    $content = ob_get_contents();
	    ob_end_clean();
	    return $content;
	}
	add_shortcode( 'shortcode_name', 'function_name' );





	/**
	 *
	 * Custom wrap functions for theme translate support
	 *
	*/
	function ez__ ( $string ) {
		return $string;
	}


	function ez__e ( $string ) {
		echo $string;
	}


?>
