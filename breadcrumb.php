<?php
/**
 * The template for displaying title and breadcrumb
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Learning_Accessibility
 */

// Settings
$separator = ' > ';
$home = 'Home'; // Text for the 'Home' link
$before = '<span class="current">'; // Tag before current crumb
$after = '</span>'; // Tag after current crumb

// Get the query & post information
global $post;
$homeLink = get_bloginfo('url');

$post_type = get_post_type_object(get_query_var('post_type'));

// Get course ID and course details if available
$course_id = wp_get_post_parent_id($post->ID); // Replace 'course_id' with your custom field name
// $course_id = $post->post_parent; // Replace 'course_id' with your custom field name


if ($course_id) {
    $course_name = get_the_title($course_id);
    $course_link = get_permalink($course_id);
}
?>

<div class="site-breadcrumb">
    <div class="breadcrumb-container">
        <div class="breadcrumbs">
            <?php
                echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $separator . ' ';
                if ($course_id) {
                    // Add course link and name in breadcrumb if course is available
                    echo '<a href="' . esc_url($course_link) . '">' . esc_html($course_name) . '</a> ' . $separator . ' ';
                }
                echo esc_html($post_type->labels->name) . ' ' . $separator . ' ' . $before . get_the_title() . $after;
            ?>
        </div>
        <div class="title"><?php echo get_the_title(); ?></div>
    </div>
</div>
