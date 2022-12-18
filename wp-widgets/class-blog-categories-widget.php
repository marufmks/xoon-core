<?php

//Search custom widget

class Egns_Blog_Categories_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_blog_categories',

            // Widget name
            __('Egns Blog Categories', 'xoon-core'),

            // Widget description
            array('description' => __('Egns Blog Categories', 'xoon-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

?>

        <div class="single-widgets widget_egns_categoris">
            <?php if( !empty( $title ) ): ?>
                <div class="widget-title">
                    <h3><?php echo esc_html($title) ?></h3>
                </div>
            <?php endif ?>
            <ul class="wp-block-categoris-cloud">
            <?php
                        $egensRecentPosts = new WP_Query( array(
                            'post_type'           =>'post',
                            'posts_per_page'      => 1,
                            'orderby'             => "asc"
                        ) );
                    ?>
                    <?php
                        if ( $egensRecentPosts ->have_posts() ) {
                        while( $egensRecentPosts -> have_posts() ) {
                            $egensRecentPosts -> the_post();
                    ?>
                <li><?php wp_list_categories('orderby=name&title_li=&show_count=1'); ?></li>
                <?php
                }
            }
                wp_reset_postdata();
            ?>
            </ul>
        </div>
    <?php
    echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = '';
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }
    ?>
        <!--Title-->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Categories Title:', 'xoon-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Blog_Categories_Widget')) {
    function Egns_Blog_Categories_Widget()
    {
        register_widget('Egns_Blog_Categories_Widget');
    }
    add_action('widgets_init', 'Egns_Blog_Categories_Widget');
}
