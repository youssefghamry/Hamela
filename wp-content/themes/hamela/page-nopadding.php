<?php /* Template Name: No-Padding */
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package hamela
 */

get_header();
?>
    <main id="main" class="main-content no-padding" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                get_template_part( 'content', 'page' );
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
        <?php endwhile; // end of the loop. ?>
    </main><!-- #main -->

<?php get_footer(); ?>