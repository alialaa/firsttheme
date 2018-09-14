<?php if(have_posts()) { ?>
    <?php while(have_posts()) { ?>
        <?php the_post(); ?>

        <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>
        <?php 
        if(get_theme_mod( '_themename_display_author_info', true )) {
            get_template_part( 'template-parts/single/author' ); 
        }
        ?>
        <?php get_template_part( 'template-parts/single/navigation' ); ?>
        
        <?php 
        if( comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>

    <?php } ?>
<?php } else { ?>
    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
<?php } ?>