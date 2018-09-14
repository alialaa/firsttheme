import $ from 'jquery';
import strip_tags from './helpers/strip-tags';



wp.customize( 'blogname', (value) => {
    value.bind( (to) => {
        $('.c-header__blogname').html(to);
    } )
})

wp.customize( '_themename_display_author_info', (value) => {
    value.bind( (to) => {
        if(to) {
            $('.c-post-author').show();
        } else {
            $('.c-post-author').hide();
        }
    } )
})

wp.customize( '_themename_accent_colour', (value) => {
    value.bind( (to) => {
        let inline_css = ``;
        let inline_css_obj = _themename['inline-css'];
        for(let selector in inline_css_obj) {
            inline_css += `${selector} {`;
                for(let prop in inline_css_obj[selector]) {
                    let val = inline_css_obj[selector][prop];
                    inline_css += `${prop}: ${wp.customize(val).get()}`;
                }
            inline_css += `}`;
        }
        $('#_themename-stylesheet-inline-css').html(inline_css);
    } )
})

wp.customize( '_themename_site_info', (value) => {
    value.bind( (to) => {
        $('.c-site-info__text').html(strip_tags(to, '<a>'));
    } )
})