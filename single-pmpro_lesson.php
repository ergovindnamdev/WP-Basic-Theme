<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Learning_Accessibility
 */

get_header();

include 'breadcrumb.php'; 

$lession_id = get_the_ID();
$course_id = wp_get_post_parent_id( $post->ID );
?>

    <main id="primary" class="site-main">
        <div class="section left">
            <?php
                echo get_the_content();
            ?>
        </div>
        <div class="section right">
            <div class="lesson-lists">
                <?php echo pmpro_courses_get_lessons_html( $course_id ); ?>
            </div>
        </div>

    </main><!-- #main -->

<?php 
get_footer();
