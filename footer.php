<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Learning_Accessibility
 */

?>

    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <div class="footer-row">
                <div class="row-content">
                    <?php
                        if ( is_active_sidebar( 'footer-sidebar1' ) ) {
                             dynamic_sidebar( 'footer-sidebar1' );
                        }
                    ?>
                </div>
            </div>
            <div class="footer-row">
                <div class="row-content">
                    <div class="section">
                    <?php
                        if ( is_active_sidebar( 'footer-sidebar2' ) ) {
                             dynamic_sidebar( 'footer-sidebar2' );
                        }
                    ?>
                    </div>
                    <div class="section">
                        <div class="section-in">
                        <?php
                            if ( is_active_sidebar( 'footer-sidebar3' ) ) {
                                 dynamic_sidebar( 'footer-sidebar3' );
                            }
                        ?>
                        </div>
                        <div class="section-in">
                            <?php _e('© 2024  Learning Accessibility. ') ?>
                        </div>
                    </div>
                    <div class="section">
                    <?php
                        if ( is_active_sidebar( 'footer-sidebar4' ) ) {
                             dynamic_sidebar( 'footer-sidebar4' );
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
