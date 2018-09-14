<?php 
/*
Template Name: Blank
*/
get_header(); ?>

<main role="main">
    <?php while(have_posts()) { the_post(); ?>
        <article <?php post_class(); ?>>
            <?php the_content(); ?>
            <?php
            // $c = get_the_content();
            // echo 'Initial <br />';
            // echo $c;
            // echo '<br><br>';

            // $c = wpautop($c);
            // echo 'wpautop <br>';
            // echo esc_html($c);
            // echo '<br><br>';

            // $c = shortcode_unautop($c);
            // echo 'shortcode_unautop <br>';
            // echo esc_html($c);
            // echo '<br /><br />';

            // $c = do_shortcode($c);
            // echo 'do_shortcode <br>';
            // echo esc_html($c);
            // echo '<br /><br />';

            // $c = force_balance_tags($c);
            // echo 'force_balance_tags <br>';
            // echo esc_html($c);
            // echo '<br /><br />';

            // $c = preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', ($c));
            // echo 'preg_replace <br>';
            // echo esc_html($c);
            ?>
        </article>
    <?php } ?>
</main>
        
<?php get_footer(); ?>