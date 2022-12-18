<?php

//recent post custom widget

class Egns_Recent_Post_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_recent_post',

            // Widget name
            __('Egns Recent Post', 'xoon-core'),

            // Widget description
            array('description' => __('Egns Recent Post', 'xoon-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

?>

            <div class="single-widgets widget_egns_recent_post">
                <div class="widget-title">
                    <?php if( !empty( $title ) ): ?>
                        <h3><?php echo esc_html($title) ?></h3>
                    <?php endif; ?>
                </div>
                <div class="recent-post-wraper">
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
                    <div class="widget-cnt">
                        <div class="wi">
                        <a href="<?php esc_url( the_permalink() ); ?>">
                            <?php  
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( array(80,80) );
                                    
                                }
                            ?>
                        </a>
                        </div>
                        <div class="wc">
                            <h6><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html__( the_title() ); ?></a></h6>
                            <span><?php echo get_the_date( 'F j, Y' );?></span>
                        </div>
                    </div>
                    
                </div>
            </div>

            <?php
                }
            }
                wp_reset_postdata();
            ?>
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
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'xoon-core'); ?></label>
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

if (!function_exists('Egns_Recent_Post_Widget')) {
    function Egns_Recent_Post_Widget()
    {
        register_widget('Egns_Recent_Post_Widget');
    }
    add_action('widgets_init', 'Egns_Recent_Post_Widget');
}
