<?php

//Instagram Feed custom widget

class Egns_Blog_instagram_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of our widget
            'egns_blog_insta',

            // Widget name
            __('Egns Blog Instagram', 'xoon-core'),

            // Widget description
            array('description' => __('Egns Blog Instagram', 'xoon-core'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $token = apply_filters('widget_token', $instance['token']);
        $limit = apply_filters('widget_limit', $instance['limit']);

        $fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
        $token = !empty($instance['token']) ? $instance['token'] : '';
        $limit = !empty($instance['limit']) ? $instance['limit'] : '';

        $json_feed_url = "https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
        $json_feed = @file_get_contents($json_feed_url);
        $contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);


?>

        <div class="single-widgets widget_egns_social">
            <?php if (!empty($title)) : ?>
                <div class="widget-title">
                    <h3><?php echo esc_html($title) ?></h3>
                </div>
            <?php endif; ?>
            <ul class="social-link d-flex align-items-center flex-wrap justify-content-lg-start justify-content-center">
                <?php if (!empty($contents)) : ?>
                    <?php foreach ($contents["data"] as $key => $post) : ?>
                        <?php if ($key == $limit)
                            break;
                        ?>
                        <li class="instragram-wrap">
                            <?php if (!empty($post['media_url'])) : ?>
                                <div class="instra-img">
                                    <img class="img-fluid" src="<?php echo esc_url($post['media_url']) ?>" alt="<?php echo esc_attr__('image','xoon') ?>">
                                    <div class="instragram-icon">
                                        <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                                    </div>
                                </div>
                            <?php endif ?>
                        </li>
                    <?php endforeach ?>

                <?php endif ?>
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
        $token = '';
        if (isset($instance['token'])) {
            $token = $instance['token'];
        }
        $limit = '';
        if (isset($instance['limit'])) {
            $limit = $instance['limit'];
        }
    ?>
        <!--Title-->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Instagram Title:', 'xoon-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('token'); ?>"><?php _e('Instagram token:', 'xoon-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('token'); ?>" name="<?php echo $this->get_field_name('token'); ?>" type="text" value="<?php echo esc_attr($token); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Instagram limit:', 'xoon-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo esc_attr($limit); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['token'] = (!empty($new_instance['token'])) ? strip_tags($new_instance['token']) : '';
        $instance['limit'] = (!empty($new_instance['limit'])) ? strip_tags($new_instance['limit']) : '';
        return $instance;
    }
}

if (!function_exists('Egns_Blog_instagram_Widget')) {
    function Egns_Blog_instagram_Widget()
    {
        register_widget('Egns_Blog_instagram_Widget');
    }
    add_action('widgets_init', 'Egns_Blog_instagram_Widget');
}
