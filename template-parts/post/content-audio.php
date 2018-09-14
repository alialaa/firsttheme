
<?php
$content = apply_filters('the_content', get_the_content());
$audios = get_media_embedded_in_content($content, array('audio', 'iframe'));
?>

<article <?php post_class('c-post u-margin-bottom-20'); ?>>
    
    <div class="c-post__inner">

        <?php if(get_the_post_thumbnail() !== '' && (empty($audios) || is_single())) { ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail( '_themename-blog-image' ); ?>
            </div>
        <?php } ?>
        <?php if( !is_single() && !empty($audios)) { ?>
            <div class="c-post__audio">
                <?php echo $audios[0]; ?>
            </div>
        <?php } ?>
        
        <?php get_template_part('template-parts/post/header'); ?>
        
        <?php if(is_single( )) { ?>
            <div class="c-post__content">
                <?php the_content(); 
                wp_link_pages();
                ?>
            </div>
        <?php } else { ?>
            <div class="c-post__excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php } ?>

        <?php if(is_single( )) { ?>
            <?php get_template_part('template-parts/post/footer'); ?>
        <?php } ?>
        <?php if(!is_single()) { _themename_readmore_link(); } ?>
    </div>
</article>