<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Learning_Accessibility
 */

get_header();
?>
    <div class="site-breadcrumb">
        <div class="breadcrumb-container">
            <div class="title"><?php echo get_the_title(); ?></div>
        </div>
    </div>

    <main id="primary" class="site-main page-template">

        <?php
        while ( have_posts() ) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
<?php
get_footer();
