<?php
/**
 * steves_co functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package steves_co
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'steves_co_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function steves_co_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on steves_co, use a find and replace
		 * to change 'steves_co' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'steves_co', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'steves_co' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'steves_co_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'steves_co_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function steves_co_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'steves_co_content_width', 640 );
}
add_action( 'after_setup_theme', 'steves_co_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function steves_co_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'steves_co' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'steves_co' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'steves_co_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function steves_co_scripts() {
	wp_enqueue_style( 'steves_co-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'steves_co-style', 'rtl', 'replace' );

	wp_enqueue_script( 'steves_co-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'steves_co_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Allow SVG image upload
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}

add_filter('upload_mimes', 'add_file_types_to_uploads');

// Steves&Co Clients
function sco_clients(){
	$labels = array(
		'name' 					=> _x('Clients', 'post type general name'),
		'singular_name' 		=> _x('Clients', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Clients'),
		'add_new_item' 			=> __('Add New Client'),
		'edit_item' 			=> __('Edit Client'),
		'new_item' 				=> __('New Client'),
		'all_items' 			=> __('All Clients'),
		'view_item' 			=> __('View Client'),
		'search_items' 			=> __('Search Clients'),
		'not_found' 			=> __('No Clients found'),
		'not_found_in_trash' 	=> __('No Clients found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Clients',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Steves&Co\'s clients and their logos.',
		'menu_icon' 			=> 'dashicons-businessperson',
		'public' 				=> false,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 10,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('clients', $args);
}

add_action('init', 'sco_clients');

// Steves&Co Vacancies
function sco_vacancies() {
	$labels = array(
		'name' 					=> _x('Vacancies', 'post type general name'),
		'singular_name' 		=> _x('Vacancies', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Vacancies'),
		'add_new_item' 			=> __('Add New Vacancy'),
		'edit_item' 			=> __('Edit Vacancy'),
		'new_item' 				=> __('New Vacancy'),
		'all_items' 			=> __('All Vacancies'),
		'view_item' 			=> __('View Vacancy'),
		'search_items' 			=> __('Search Vacancies'),
		'not_found' 			=> __('No Vacancies found'),
		'not_found_in_trash' 	=> __('No Vacancies found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Vacancies',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Steves&Co\'s current vacancies.',
		'menu_icon' 			=> 'dashicons-hammer',
		'public' 				=> true,
		'menu_position' 		=> 11,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('vacancies', $args);
}

add_action('init', 'sco_vacancies');

// Steves&Co Testimonials
function sco_testimonials() {
	$labels = array(
		'name' 					=> _x('Testimonials', 'post type general name'),
		'singular_name' 		=> _x('Testimonials', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Testimonials'),
		'add_new_item' 			=> __('Add New Testimonial'),
		'edit_item' 			=> __('Edit Testimonial'),
		'new_item' 				=> __('New Testimonial'),
		'all_items' 			=> __('All Testimonials'),
		'view_item' 			=> __('View Testimonial'),
		'search_items' 			=> __('Search Testimonials'),
		'not_found' 			=> __('No Testimonials found'),
		'not_found_in_trash' 	=> __('No Testimonials found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Testimonials',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Steves&Co\'s client testimonials.',
		'menu_icon' 			=> 'dashicons-edit',
		'public' 				=> false,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 12,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('testimonials', $args);
}

add_action('init', 'sco_testimonials');

// Steves&Co Projects
function sco_projects() {
	$labels = array(
		'name' 					=> _x('Projects', 'post type general name'),
		'singluar_name' 		=> _x('Projects', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Projects'),
		'add_new_item' 			=> __('Add New Project'),
		'edit_item' 			=> __('Edit Project'),
		'new_item'				=> __('New Project'),
		'all_items' 			=> __('All Projects'),
		'view_item' 			=> __('View Project'),
		'search_items' 			=> __('Search Projects'),
		'not_found' 			=> __('No Projects found'),
		'not_found_in_trash' 	=> __('No Projects found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Projects'
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Steves&Co\'s projects and case studies.',
		'menu_icon' 			=> 'dashicons-groups',
		'public' 				=> true,
		'menu_position' 		=> 13,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false,
		'taxonomies' 			=> array( 'industrycat', 'servicecat' )
	);
	
	register_post_type('projects', $args);
}

add_action('init', 'sco_projects');

// Steves&Co Project Industries
function sco_projects_industries() {
	$labels = array(
		'name' 					=> _x( 'Project Industries', 'taxonomy general name' ),
		'singular_name' 		=> _x( 'Project Industry', 'taxonomy singular name' ),
		'search_items' 			=> __( 'Search Project Industries' ),
		'all_items' 			=> __( 'All Project Industries' ),
		'parent_item' 			=> __( 'Parent Project Industry' ),
		'parent_item_colon' 	=> __( 'Parent Project Industry:' ),
		'edit_item' 			=> __( 'Edit Project Industry' ), 
		'update_item' 			=> __( 'Update Project Industry' ),
		'add_new_item' 			=> __( 'Add New Project Industry' ),
		'new_item_name' 		=> __( 'New Project Industry Name' ),
		'menu_name' 			=> __( 'Project Industries' ),
	);    

	register_taxonomy('industrycat', array('projects'), array(
		'hierarchical' 			=> true,
		'labels' 				=> $labels,
		'show_ui' 				=> true,
		'show_admin_column' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array( 'slug' => 'industrycat' ),
	)); 
}

add_action( 'init', 'sco_projects_industries', 0 );

// Steves&Co Project Services
function sco_projects_services() {
	$labels = array(
		'name' 					=> _x( 'Project Services', 'taxonomy general name' ),
		'singular_name' 		=> _x( 'Project Service', 'taxonomy singular name' ),
		'search_items' 			=> __( 'Search Project Services' ),
		'all_items' 			=> __( 'All Project Services' ),
		'parent_item' 			=> __( 'Parent Project Service' ),
		'parent_item_colon' 	=> __( 'Parent Project Service:' ),
		'edit_item' 			=> __( 'Edit Project Service' ), 
		'update_item' 			=> __( 'Update Project Service' ),
		'add_new_item' 			=> __( 'Add New Project Service' ),
		'new_item_name' 		=> __( 'New Project Service Name' ),
		'menu_name' 			=> __( 'Project Services' ),
	);    

	register_taxonomy('servicecat', array('projects'), array(
		'hierarchical' 			=> true,
		'labels' 				=> $labels,
		'show_ui' 				=> true,
		'show_admin_column' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array( 'slug' => 'servicecat' ),
	)); 
}

add_action( 'init', 'sco_projects_services', 0 );

add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_scripts(){
	// Enqueue the script for the AJAX
	wp_enqueue_script('ajax', get_template_directory_uri() . '/js/scripts.js', array('jquery'), NULL, true);

	// Requiring the WP Ajax function, called also as URL in script.js
	wp_localize_script('ajax', 'wpAjax', 
		array('ajaxUrl' => admin_url('admin-ajax.php'))
	);
}

// Making sure that logged in and logged out users see the same filtering with these add_actions
add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

// THE AJAX CALLBACK
function filter_ajax(){
	// Reading the industries and services selected by the checkbox and returning the IDs
	$project_industries = $_POST['project-industries'];
	$project_services = $_POST['project-services'];

	// Get the projects posts
	$args = array(
		'post_type' 		=> 'projects',
		'posts_per_page' 	=> -1,
		'order' 			=> 'ASC'
	);

	// If industries is selected and services are empty, execute and add tax_query with args for taxonomy setting
	if(!empty($project_industries) && empty($project_services)){
		$args['tax_query'] = array(
			array(
				'taxonomy'	=> 'industrycat',
				'field'		=> 'term_id',
				'terms'		=> $project_industries
			)
		);
	}

	// If services is selected and industries are empty, execute and add tax_query with args for taxonomy setting
	if(!empty($project_services) && empty($project_industries)){
		$args['tax_query'] = array(
			array(
				'taxonomy'	=> 'servicecat',
				'field'		=> 'term_id',
				'terms'		=> $project_services
			)
		);
	}

	// If both industries and services are selected, execute and add tax_query with args for taxonomy setting with an OR relation
	if(!empty($project_industries) && !empty($project_services)){
		$args['tax_query'] = array(
			'relation'		=> 'OR',
			array(
				'taxonomy'	=> 'industrycat',
				'field'		=> 'term_id',
				'terms'		=> $project_industries,
			),
			array(
				'taxonomy'	=> 'servicecat',
				'field'		=> 'term_id',
				'terms'		=> $project_services,
			),
		);
	}

	$query = new WP_Query($args);

	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();?>
			
			<div class="single-project" data-aos="fade-up" data-aos-duration="1000">
				<a class="single-project-link" href="<?= get_permalink(); ?>">
					<div class="single-project-image-holder">
						<?php
							$asset = get_field("thumbnail_section");
							if($asset[0]['type'] == 'video'){
							?>
								<video class="thumbnail video" autoplay="autoplay" loop="loop" muted="muted" playsinline="">
									<source  src="<?= $asset[0]['url']; ?>" type="video/mp4">
								</video>
							<?php
							}	
							else{
								?><img class="thumbnail image" src="<?= $asset[0]['url'];; ?>" alt="<?= $asset[0]['alt']; ?>"><?php
							}
						?>
					</div>

					<div class="single-project-details">
						<div class="inner-details-container">
							<h3 class="single-project-title"><?= get_the_title(); ?></h3>

							<?php
								$categoriesArr = array();
								$industriesCategory = get_the_terms(get_the_ID(), 'industrycat');
								if($industriesCategory !== false){
									foreach($industriesCategory as $industryCategory){
										$categoriesArr[] = $industryCategory->name; 
									}
								}
								
								$servicesCategory = get_the_terms(get_the_ID(), 'servicecat');
								if($servicesCategory !== false){
									foreach($servicesCategory as $serviceCategory){
										$categoriesArr[] = $serviceCategory->name; 
									}
								}
								$categories = implode(', ', $categoriesArr);
							?>
							<div class="single-project-button arrow-button">
								<i class="arrow-right"></i>
								<span class="single-project-button-text button-text">&nbsp;</span>
							</div>

							<span class="single-project-categories"><?= $categories; ?></span>
						</div>
					</div>

					<div class="single-project-plus-button">
						<span class="plus-text">+</span>
					</div>
				</a>
			</div>

		<?php }
	}
	
	// Reset posts for new AJAX instances
	wp_reset_postdata(); 

	// Kill function
	die();
}