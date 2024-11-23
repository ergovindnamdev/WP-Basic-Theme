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

$course_id = get_the_ID();

/*----find Related courses/Latest courses */
$categories = get_the_category( $course_id );
if( !empty( $categories ) ) {
    $category_ids = array();
    foreach ( $categories as $category ) {
        $category_ids[] = $category->term_id;
    }
    $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($course_id),
        'posts_per_page' => 3, // Number of related posts to show
        'orderby' => 'rand', // Randomize the related posts
    );
} else {
    $args = array(
        'post__not_in' => array($course_id),
        'posts_per_page' => 3, // Number of latest posts to show
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'pmpro_course'
    );
}

if( !empty( $args ) ) {
    $related_courses = new WP_Query( $args );
}
?>

    <main id="primary" class="site-main">

        <div class="course-container">
            <div class="main-content">
                <?php echo get_the_content(); ?>
            </div>
            <div class="lessons">
                <div class="lesson-lists">
                    <?php echo pmpro_courses_get_lessons_html( $course_id ); ?>
                </div>
            </div>
            <div class="related-courses">
                <?php 
                    if ( $related_courses->have_posts() ) {
                        echo '<h3>Related Courses</h3>';
                        echo '<div class="courses-list">';
                        while ($related_courses->have_posts()) {
                            $related_courses->the_post();
                            $related_post_id = get_the_ID();
                            $course_hours = get_post_meta($related_post_id, 'course_hours', true);
                            if( $course_hours > 1 )
                                $text_hour = ' Hours';
                            else
                                $text_hour = ' Hour';

                            $lesson_count = pmpro_courses_get_lesson_count( $related_post_id );
                            if( $lesson_count > 1 )
                                $text_lesson = ' Lessons';
                            else
                                $text_lesson = ' Lesson';

                            $uploads = wp_upload_dir();
                            $image_url = $uploads['baseurl'] . '/2024/10/carbon_time.png';
                            $image_url1 = $uploads['baseurl'] . '/2024/10/streamline_class-lesson.png';

                            ?>

                            <div class="col-sm">
                                <a href="<?php echo esc_url( get_permalink() ) ;?>" data-post-id="<?php echo $related_post_id;?>">
                                    <div class="featured-img">
                                        <?php echo get_the_post_thumbnail( $related_post_id, 'medium'); // Change 'medium' to desired size ?>
                                    </div>
                                    <div class="extra-meta">
                                        <div class="meta-row top">
                                            <div class="title"><?php the_title() ?></div>
                                        </div>
                                        <div class="meta-row bottom">
                                            <div class="left class-lesson">
                                                <div class="lesson-img"><img class ="streamline" src="<?php echo $image_url1; ?>" alt="streamline" /></div>
                                                <div class="course-lessons"><?php echo  $lesson_count . $text_lesson; ?></div>
                                            </div>
                                            <div class="right">
                                                <div class="hours-img"><img class="carbon" src="<?php echo $image_url;?>" alt="carbon" /></div>
                                                <div class="course-hours"><?php echo $course_hours . $text_hour;?></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        echo '</div>';
                        wp_reset_postdata(); // Reset post data
                    }
                ?>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();
