
<?php

// Useful global constants
 define( '__VERSION', '0.0.1' );

/**
 *
 * Paths
 *
 * @since  1.0
 *
 */
if ( !defined( 'BEC_THEME_DIR' ) ){
    define('BEC_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());
}

if ( ! function_exists( 'bec_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bec_setup() { 

        add_theme_support('soil-clean-up');
        add_theme_support('soil-jquery-cdn');
        add_theme_support('soil-nav-walker');
        add_theme_support('soil-nice-search');
        add_theme_support('soil-relative-urls');
        /**
         * Enable plugins to manage the document title
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
         */
        add_theme_support('title-tag');
        /**
         * Register navigation menus
         * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
         */
        register_nav_menus([
            'primary_navigation' => __('Primary Navigation', 'sage')
        ]);
        /**
         * Enable post thumbnails
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        /**
         * Enable HTML5 markup support
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
         */
        add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
        /**
         * Enable selective refresh for widgets in customizer
         * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
         */
        add_theme_support('customize-selective-refresh-widgets');

    }
endif;
add_action( 'after_setup_theme', 'bec_setup' );

/**
 *
 * Scripts: Frontend with no conditions, Add Custom Scripts to wp_head
 *
 * @since  1.0.0
 *
 */
add_action('wp_enqueue_scripts', 'bec_scripts');
function bec_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {


        /**
         *
         * Minified and concatenated scripts
         *
         *     @vendors     plugins.min,js
         *     @custom      scripts.min.js
         *
         *     Order is important
         *
         */

        wp_register_script('bec_vendor_js', get_template_directory_uri() . '/assets/js/vendors.min.js', array('jquery'), __VERSION, true); // Custom scripts
        wp_enqueue_script('bec_vendor_js'); // Enqueue it!

        wp_register_script('bec_custom_js', get_template_directory_uri() . '/assets/js/custom.min.js' , array('jquery'), __VERSION, true); // Custom scripts
        // Localize it!
        wp_localize_script( 'bec_custom_js', 'BEC_AJAX', array(
        		'ajax' => admin_url( 'admin-ajax.php' ),
        		'nonce' => wp_create_nonce( 'bec-ajax-nonce' )
        	)
        );
        wp_enqueue_script('bec_custom_js'); // Enqueue it!

        /**
         *
         * Enqueue HTML5Shiv and Respond.js IE less than 9
         *
         */
        wp_register_style( 'ie_html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
        wp_enqueue_style( 'ie_html5shiv');
        wp_style_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );

        wp_register_style( 'ie_respond', get_template_directory_uri() . '/js/respond.min.js' );
        wp_enqueue_style( 'ie_respond');
        wp_style_add_data( 'ie_respond', 'conditional', 'lt IE 9' );

    }

}


/**
 *
 * Styles: Frontend with no conditions, Add Custom styles to wp_head
 *
 * @since  1.0
 *
 */
add_action('wp_enqueue_scripts', 'bec_styles'); // Add Theme Stylesheet
function bec_styles()
{

    /**
     *
     * Minified and Concatenated styles
     *
     */
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!
    wp_register_style('bec_styles', get_template_directory_uri() . '/style.css', array(), __VERSION, 'all');
    wp_enqueue_style('bec_styles'); // Enqueue it!
    wp_register_style('fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('fontawesome'); // Enqueue it!

    /**
     *
     * Google fonts
     *     Must be included this way to avoid Firefox issues
     *
     */
    // wp_register_style('aa_gfonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,800,400', array(), '1.0', 'all');
    // wp_enqueue_style('aa_gfonts'); // Enqueue it!


}


/**
 * Helpers function
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/inc/helpers.php')) {
    require_once( dirname(__FILE__).'/inc/helpers.php' );
}

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});