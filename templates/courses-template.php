<?php
/**
 * Template Name: Courses Template
 *
 * Custom Home Page Template for showing Home Page
 */
?>

<?php get_header(); 

$args = array(
    'posts_per_page' => 6, // Number of latest posts to show
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'pmpro_course'
);


if( !empty( $args ) )
    $courses = new WP_Query( $args );

?>

<div class="custom-content">
    <div class="upper-content">
        <?php the_content(); ?>
    </div>
    <div class="lower-content">
        <?php
            if ( $courses->have_posts() ) {
                $i = 0;
                echo '<div class="courses-list">';
                while ($courses->have_posts()) {

                    $courses->the_post();
                    $related_post_id = get_the_ID();

                    $course_hours = 0;
                    if( !empty( get_post_meta($related_post_id, 'course_hours', true) ) ) {
                        $course_hours = get_post_meta($related_post_id, 'course_hours', true);
                    }
                    
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

                    // Start a new row every three posts
                    if ($i % 3 === 0) {
                        if ($i > 0) {
                            echo '</div>'; // Close the previous row if it's not the first
                        }
                        echo '<div class="row explore-img-container">'; // Open a new row
                    }
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
                    $i++; // Increment the counter
                }

                // Close the last row if there are any posts
                if ($i > 0) {
                    echo '</div>';
                }

                echo '</div>';
                wp_reset_postdata(); // Reset post data
            } else {
                ?>
                <div class="no-posts"><?php 'No courses found.'; ?></div>
                <?php
            }
        ?>
    </div>
</div>

<?php get_footer(); ?>