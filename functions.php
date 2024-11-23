<?php
/**
 * Learning Accessibility functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Learning_Accessibility
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function learningAccessibilitySetup() {
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Learning Accessibility, use a find and replace
        * to change 'learning-accessibility' to the name of your theme in all the template files.
        */
    load_theme_textdomain( 'learning-accessibility', get_template_directory() . '/languages' );

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
            'menu-1' => esc_html__( 'Primary', 'learning-accessibility' ),
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
            'learning_accessibility_custom_background_args',
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
add_action( 'after_setup_theme', 'learningAccessibilitySetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function learningAccessibilityContentWidth() {
    $GLOBALS['content_width'] = apply_filters( 'learningAccessibilityContentWidth', 640 );
}
add_action( 'after_setup_theme', 'learningAccessibilityContentWidth', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function learningAccessibilityWidgetsInit() {
    $widget_description = __( 'Widgets in this area will be shown on the main side of the site.', 'learning-accessibility' );
    
    $widget_before_title = '<h2 class="widget-title">';
    $widget_after_title = '</h2>';
    $widget_before = '<div class="widget %2$s" id="%1$s">';
    $widget_after = '</div>';

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 1', 'learning-accessibility' ),
        'id'            => 'footer-sidebar1',
        'description'   => $widget_description,
        'before_widget' => $widget_before,
        'after_widget'  => $widget_after,
        'before_title'  => $widget_before_title,
        'after_title'   => $widget_after_title,
    ));

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 2', 'learning-accessibility' ),
        'id'            => 'footer-sidebar2',
        'description'   => $widget_description,
        'before_widget' => $widget_before,
        'after_widget'  => $widget_after,
        'before_title'  => $widget_before_title,
        'after_title'   => $widget_after_title,
    ));

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 3', 'learning-accessibility' ),
        'id'            => 'footer-sidebar3',
        'description'   => $widget_description,
        'before_widget' => $widget_before,
        'after_widget'  => $widget_after,
        'before_title'  => $widget_before_title,
        'after_title'   => $widget_after_title,
    ));

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 4', 'learning-accessibility' ),
        'id'            => 'footer-sidebar4',
        'description'   => $widget_description,
        'before_widget' => $widget_before,
        'after_widget'  => $widget_after,
        'before_title'  => $widget_before_title,
        'after_title'   => $widget_after_title,
    ));
}
add_action( 'widgets_init', 'learningAccessibilityWidgetsInit' );

/**
 * Enqueue scripts and styles.
 */
function learningAccessibilityScripts() {
    wp_enqueue_style( 'learning-accessibility-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'learning-accessibility-style', 'rtl', 'replace' );

    wp_enqueue_script( 'learning-accessibility-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'learningAccessibilityScripts' );

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

/* Shortcode to show courses on Home page -------Start*/
function pmproCoursesWithImages( $atts ) {
    // Set default attributes and merge with user-defined attributes
    $atts = shortcode_atts(array(
        'number' => 3, // Default number of posts to show
    ), $atts);

    // Query for courses (change 'pmpro_course' to your actual post type if necessary)
    $args = array(
        'post_type' => 'pmpro_course', // Change this if your course post type is different
        'post_status' => 'publish',
        'posts_per_page' => intval($atts['number']),
        'orderby'        => 'date', // Order by date
        'order'          => 'DESC'   // Show latest posts first
    );

    // Instantiate the WP_Query object
    $courses = new WP_Query($args);
    
    // Start the output variable
    $output = '<div class="row pmpro-course-list explore-img-container">';
    
    // Add number of courses retrieved
    //$output .= '<div>Number of courses retrieved: ' . $courses->found_posts . '</div>';

    // Check if there are posts
    if ($courses->have_posts()) {
        while ($courses->have_posts()) {
            $courses->the_post();
            // Correctly get the ID of the current post
            //$output .= 'ID=' . get_the_ID() . '<br>'; // This should now return the correct ID
            $featured_image = get_the_post_thumbnail(get_the_ID(), 'medium'); // Change 'medium' to desired size
            $permalink = get_permalink();

            $output .= '<div class="col-sm"><a style="text-decoration: none;" href='.esc_url($permalink).'>';
            $output .= '<div class="course-image">' . $featured_image . '</div>';
            $output .= '<div class="course-title wp-block-heading"><h3>' . get_the_title() . '</h3></div>';
            $output .= '</a></div>';
        }
    } else {
        $output .= '<div>No courses found.</div>';
    }

    $output .= '</div>';
    wp_reset_postdata(); // Reset post data after custom query

    return $output;
}
add_shortcode('pmpro_courses', 'pmproCoursesWithImages');
/* Shortcode to show courses on Home page -------End*/

/* Add meta box for Hours in Courses -------Start*/
function pmproCoursesHoursMetaBoxes() {
    add_meta_box( 'pmpro_courses_hours', esc_html__( 'Enter Hours', 'pmpro-courses'), 'pmproCoursesCoursHours', 'pmpro_course', 'normal' );    
}
add_action('admin_menu', 'pmproCoursesHoursMetaBoxes', 20);

function pmproCoursesCoursHours() {
    global $wpdb, $post;

    // boot out people without permissions
    if ( ! current_user_can( 'edit_posts' ) ) {
        return false;
    }

    // Retrieve current value
    $hours = get_post_meta( $post->ID, 'course_hours', true);

    // Display the input field
    echo '<label for="course_hours">Hours:</label>';
    echo '<input type="text" id="course_hours" name="course_hours" value="' . esc_attr($hours) . '" />';
}
function saveCourseHoursMetaBox($post_id) {

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Sanitize and save the data
    if (isset($_POST['course_hours'])) {
        update_post_meta($post_id, 'course_hours', sanitize_text_field($_POST['course_hours']));
    }
}
add_action('save_post', 'saveCourseHoursMetaBox', 10, 1);
/* Add meta box for Hours in Courses -------End*/


add_filter( 'pmpro_level_cost_text', 'pmproLevelCostText', 99,4 );
function pmproLevelCostText( $r, $level, $tags, $short ) {

    // taxes part
    $tax_state = get_option( 'pmpro_tax_state' );
    $tax_rate = get_option( 'pmpro_tax_rate' );

    $return = '<div class="main-data">
        <div class="price-data">
            <div class="price">'.sprintf( __( '<strong>%1$s <br>per %2$s</strong><br>', 'paid-memberships-pro' ), pmpro_formatPrice( $level->initial_payment ), pmpro_translate_billing_period( $level->cycle_period ) ).'</div>
        </div>
        <div class="para">'.sprintf( __( 'Customers in %1$s will be charged %2$s%% tax.', 'paid-memberships-pro' ), $tax_state, round( $tax_rate * 100, 2 ) ).'</div>
    </div>'; 

    return $return;
}

function removeBackgroundOption() {
    remove_theme_support( 'custom-background' );
    remove_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', 'removeBackgroundOption' );


add_action('wp_logout','autoRedirectAfterLogout');
function autoRedirectAfterLogout(){
  wp_safe_redirect( home_url() );
  exit();
}
