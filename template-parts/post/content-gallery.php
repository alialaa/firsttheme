<?php
$blocks =  gutenberg_parse_blocks(get_the_content());
$gallery = false;
foreach ($blocks as $block) {
    if($block['blockName'] === 'core/gallery') {
        $gallery = $block;
        break;
    }
}
?>

<article <?php post_class('c-post u-margin-bottom-20'); ?>>
    
    <div class="c-post__inner">

        <?php if(get_the_post_thumbnail() !== '' && (!$gallery || is_single())) { ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail( '_themename-blog-image' ); ?>
            </div>
        <?php } ?>
        <?php if( !is_single() && $gallery) { ?>
            <div class="c-post__gallery-gutenberg">
                <?php  
                    echo $gallery['innerHTML'];
                ?>
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