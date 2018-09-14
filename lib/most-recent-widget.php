<?php

function _themename_sanitize_sort_by( $input ) {
    $valid = array('date', 'rand', 'comment_count');
    if( in_array($input, $valid, true) ) {
        return $input;
    }
    return 'date';
}

class _themename_Most_Recent_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            '_themename_mst_recent_widget',
            esc_html__('Recent Posts', '_themename'),
            array(
                'description' => esc_html__('some description', '_themename'),
                'customize_selective_refresh' => true
            )
        );
    }

    public function form( $instance ) {
        if(isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = "default";
        }

        if(isset($instance['post_count'])) {
            $post_count = $instance['post_count'];
        } else {
            $post_count = 3;
        }

        if(isset($instance['include_date'])) {
            $include_date = $instance['include_date'];
        } else {
            $include_date = false;
        }

        if(isset($instance['sort_by'])) {
            $sort_by = $instance['sort_by'];
        } else {
            $sort_by = 'date';
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php esc_html_e('Title:', '_themename'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_count') ?>"><?php esc_html_e('Number Of Posts:', '_themename'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_count') ?>" name="<?php echo $this->get_field_name('post_count') ?>" type="number" min="1" value="<?php echo intval($post_count); ?>" />
        </p>
        <p>
            <input <?php checked($include_date); ?> type="checkbox" id="<?php echo $this->get_field_id('include_date') ?>" name="<?php echo $this->get_field_name('include_date') ?>" />
            <label for="<?php echo $this->get_field_id('include_date') ?>"><?php esc_html_e('Include Date?', '_themename'); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('sort_by') ?>"><?php esc_html_e('Sort By:', '_themename'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('sort_by') ?>" name="<?php echo $this->get_field_name('sort_by') ?>">
                <option <?php selected($sort_by, 'date'); ?> value="date"><?php esc_html_e('Most Recent', "_themename") ?></option>
                <option <?php selected($sort_by, 'rand'); ?> value="rand"><?php esc_html_e('Random', "_themename") ?></option>
                <option <?php selected($sort_by, 'comment_count'); ?> value="comment_count"><?php esc_html_e('Number Of Comments', "_themename") ?></option>
            </select>
        </p>

        <?php
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

            if(isset($instance['title']) && !empty($instance['title'])) {
                $title = apply_filters('widget_title', $instance['title']);
                echo $args['before_title'] . esc_html($title) . $args['after_title'];
            }

            $most_recent_query = new WP_query(
                array(
                    'ignore_sticky_posts' => true,
                    'post_type' => 'post',
                    'posts_per_page' => isset($instance['post_count']) ? intval($instance['post_count']) : 3,
                    'orderby' => isset($instance['sort_by']) ? _themename_sanitize_sort_by($instance['sort_by']) : 'date'
                )
            );

            if($most_recent_query->have_posts()) {
                echo '<div class="most_recent_widget">';
                while($most_recent_query->have_posts()) {
                    $most_recent_query->the_post();
                    echo '<div>';
                    echo '<h6><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h6>';
                    echo isset($instance['include_date']) && $instance['include_date'] ? get_the_date() : '';
                    echo '</div>';
                }
                echo '</div>';
            }

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] =  sanitize_text_field($new_instance['title']);
        $instance['post_count'] = intval($new_instance['post_count']);
        $instance['include_date'] = boolval($new_instance['include_date']);
        $instance['sort_by'] = _themename_sanitize_sort_by($new_instance['sort_by']);
        return $instance;
    }
}

function _themename_register_most_recent_widget() {
    register_widget('_themename_Most_Recent_Widget');
}

add_action('widgets_init', '_themename_register_most_recent_widget');