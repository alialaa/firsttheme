<?php
    $prev = get_previous_post();
    $next = get_next_post();
?>

<?php if($prev || $next) { ?>
    <nav class="c-post-navigation" role="navigation">
        <h2 class="u-screen-reader-text"><?php esc_attr_e( 'Post Navigation', '_themename' ); ?></h2>
        <div class="c-post-navigation__links">
            <?php if($prev) { ?>
                <div class="c-post-navigation__post c-post-navigation__post--prev">
                    <a class="c-post-navigation__link" href="<?php the_permalink( $prev->ID ) ?>">
                        <?php if(has_post_thumbnail( $prev->ID )) { ?>
                            <div class="c-post-navigation__thumbnail">
                                <?php echo get_the_post_thumbnail( $prev->ID, 'thumbnail' ); ?>
                            </div>
                        <?php } ?>
                        <div class="c-post-navigation__content">
                            <span class="c-post-navigation__subtitle">
                                <?php esc_html_e( 'Previous Post', '_themename' ); ?>
                            </span>
                            <span class="c-post-navigation__title">
                                <?php echo esc_html( get_the_title( $prev->ID ) ); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <?php if($next) { ?>
                <div class="c-post-navigation__post c-post-navigation__post--next">
                    <a class="c-post-navigation__link" href="<?php the_permalink( $next->ID ) ?>">
                        <?php if(has_post_thumbnail( $next->ID )) { ?>
                            <div class="c-post-navigation__thumbnail">
                                <?php echo get_the_post_thumbnail( $next->ID, 'thumbnail' ); ?>
                            </div>
                        <?php } ?>
                        <div class="c-post-navigation__content">
                            <span class="c-post-navigation__subtitle">
                                <?php esc_html_e( 'Next Post', '_themename' ); ?>
                            </span>
                            <span class="c-post-navigation__title">
                                <?php echo esc_html( get_the_title( $next->ID ) ); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </nav>
<?php } ?>