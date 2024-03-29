<?php
/**
 * florence functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package florence
 */

if ( ! function_exists( 'florence_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function florence_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on florence, use a find and replace
		 * to change 'florence' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'florence', get_template_directory() . '/languages' );

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

		// // This theme uses wp_nav_menu() in one location.
		// register_nav_menus( array(
		// 	'menu-1' => esc_html__( 'Primary', 'florence' ),
		// ) );
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'florence' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'florence_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'florence_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function florence_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'florence_content_width', 640 );
}
add_action( 'after_setup_theme', 'florence_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function florence_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'florence' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'florence' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'florence_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function florence_scripts() {
	wp_enqueue_style( 'florence-style', get_stylesheet_uri() );
	wp_enqueue_style( 'florence-bootstrap-style', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '20151215', false );
	wp_enqueue_style( 'florence-font-awesome-style', get_template_directory_uri() .'/assets/css/all.css', array(), '20151215', false );
	wp_enqueue_script( 'florence-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'florence-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', false );
	wp_enqueue_script( 'florence-font-awesome-script', get_template_directory_uri() . '/assets/js/fontawesome.min.js', array(), '20151215', false );
	wp_enqueue_script( 'florence-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'florence_scripts' );

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


if ( !class_exists( 'ReduxFramework' )) {
    require_once( dirname( __FILE__ ) . '/redux-framework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo )) {
    require_once( dirname( __FILE__ ) . '/redux-framework/sample/sample-config.php' );
}

/**
 * Excerpt code
 */

global $redux_demo;
Redux::init('redux_demo'); 
$florence_excerpt = $redux_demo['opt-image-select-layout'];

if( $florence_excerpt == '1'){
	function wpdocs_custom_excerpt_length( $length ) {
    	return 100;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
	function wpdocs_excerpt_more( $more ) {
	    if ( ! is_single() ) {
	        $more = sprintf( '<p class="button"><a class="read-more" href="%1$s">%2$s</a></p>',
	            get_permalink( get_the_ID() ),
	            __( 'Continue Reading', 'textdomain' )
	        );
	    }
	 
	    return $more;
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
}

else {
	function wpdocs_custom_excerpt_length( $length ) {
    	return 30;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 99 );
}



 //Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'tag_widget_limit');
 
//Limit number of tags inside widget
function tag_widget_limit($args){
 
 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 11; //Limit number of tags
 }
 
 return $args;
}


add_filter( 'widget_tag_cloud_args', 'change_tag_cloud_font_sizes');
/**
 * Change the Tag Cloud's Font Sizes.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '7.5';
    $args['largest'] = '7.5';

    return $args;
}

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}




