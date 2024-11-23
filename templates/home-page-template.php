<?php
/**
 * Template Name: Home Page Template
 *
 * Custom Home Page Template for showing Home Page
 */
?>

<?php get_header(); ?>

<div class="custom-content">
    <div>
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>