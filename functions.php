<?php 
	
	show_admin_bar(false);

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

		register_nav_menu( 'header_menu', 'Header Menu' );

		add_image_size( 'blog_thumbnail', 510 ); // name, width, height, crop
	}
	add_action( 'init', 'template_settings' ); // after_theme_setup

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
		wp_enqueue_style( 'general-css', get_template_directory_uri() . '/css/general.css'  );
		//wp_enqueue_style( 'ticker-css', get_template_directory_uri() . '/css/ticker.css'  );

		//wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/jquery-1.12.4.min.js', array(), '1.0.0', true  );
		//wp_enqueue_script( 'gmaps-js', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyB8OI63bD1KAI4MAo0yz7p0Fj-RiPEZYPk', array(), '1.0.0', true  );

		//wp_enqueue_script( 'socket-io-js', 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.2/socket.io.js', array('jquery'), '1.0.0', true  );
		wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0.0', true  );
		//wp_enqueue_script( 'utilites-js', get_template_directory_uri() . '/js/ccc-streamer-utilities.js', array('jquery'), '1.0.0', true  );
		//wp_enqueue_script( 'stream-js', get_template_directory_uri() . '/js/stream.js', array('jquery'), '1.0.0', true  );
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'plugins-js'), '1.0.0', true  );

		wp_localize_script('main-js', 'theme', 
			array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'url' => get_template_directory_uri()
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
	 * Creates custom post type
	 *
	*/
	/*function create_settings() {
		register_post_type('settings', array(
		  'labels' => array(
			'name'			=> __( 'Главная информация', 'theme-domain' ),
			'singular_name'   => __( 'Главная информация', 'theme-domain'  ),
			'add_new'		 => __( 'Добавить информацию', 'theme-domain'  ),
			'add_new_item'	=> __( 'Добавить информацию', 'theme-domain'  ),
			'edit'			=> __( 'Редактировать информацию', 'theme-domain'  ),
			'edit_item'	   => __( 'Редактировать информацию', 'theme-domain'  ),
			'new_item'		=> __( 'Новая информация', 'theme-domain'  ),
			'all_items'	   => __( 'Вся информация', 'theme-domain'  ),
			'view'			=> __( 'Посмотреть информацию', 'theme-domain'  ),
			'view_item'	   => __( 'Посмотреть информацию', 'theme-domain'  ),
			'search_items'	=> __( 'Искать информацию', 'theme-domain'  ),
			'not_found'	   => __( 'Информация не найдена', 'theme-domain'  ),
		),
		'public' => true, // show in admin panel?
		'menu_position' => 0,
		'supports' => array( 'title', 'thumbnail'),
		'taxonomies' => array( '' ),
		'has_archive' => true,
		'capability_type' => 'post',
		'menu_icon'   => 'dashicons-location-alt',
		'rewrite' => array('slug' => 'settings'),
		));
	}
	add_action( 'init', 'create_settings' );*/


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
			'redirect' 	=> false
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


?>
