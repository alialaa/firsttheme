<form role="search" method="get" class="c-search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <label class="c-search-form__label">
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', '_themename' ) ?></span>
        <input type="search" class="c-search-form__field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', '_themename' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" />
    </label>
    <button class="c-search-form__button" type="submit"><span class="u-screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', '_themename' ); ?></span><i class="fas fa-search" aria-hidden="true"></i></button>
</form>