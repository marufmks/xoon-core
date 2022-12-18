<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
} //Exit if accessed directly

use Elementor\Core\Schemes;

class xoon_instagram_feed_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_instagram_feed';
    }

    public function get_title()
    {
        return esc_html__('EG Instagram Feed', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-instagram-gallery';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {

        //-------------Content-------------------//
        //stats Section

        $this->start_controls_section(
            'xoon_section_content_general',
            [
                'label' => esc_html__('General', 'xoon-core')

            ]
        );


        $this->add_control(
            'xoon_insta_feed_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Instagram Feed', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'inst_access_token',
            [
                'label' => esc_html__('Instagram Access Token', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'inst_post_limit',
            [
                'label' => __('Item Limit', 'xoon-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 200,
                'step' => 1,
                'default' => 8,
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();

        //---------------Style----------------------//


        //Instagram Feed Title Style
        $this->start_controls_section(
            'xoon_instagram_feed_title_style_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,


            ]
        );
        $this->add_control(
            'xoon_instagram_feed_title_style_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-small span' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_instagram_feed_title_style_typography',
                'selector' =>
                '{{WRAPPER}} .section-title-small span',



            ]
        );
        $this->add_responsive_control(
            'xoon_instagram_feed_title_style_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-small span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //Instagram Feed Icon Style
        $this->start_controls_section(
            'xoon_instagram_feed_icon_style_section',
            [
                'label' => esc_html__('Instagram Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,


            ]
        );
        $this->add_control(
            'xoon_instagram_feed_icon_style_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-small i' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_instagram_feed_icon_style_ize',
            [
                'label' => esc_html__('Icon Size', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',

                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title-small i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        // query the user media
        $fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
        $token = !empty($settings['inst_access_token']) ? $settings['inst_access_token'] : '';
        $limit = !empty($settings['inst_post_limit']) ? $settings['inst_post_limit'] : '';

        $json_feed_url = "https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
        $json_feed = @file_get_contents($json_feed_url);
        $contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);

?>
        <?php if (is_admin()) : ?>
            <script>
                // insta-feed-slider
                var swiper = new Swiper(".insta-feed-slider", {
                    slidesPerView: 1,
                    // speed: 800,
                    loop: true,
                    freeMode: true,
                    spaceBetween: 10,
                    grabCursor: true,
                    slidesPerView: 8,
                    loop: true,
                    autoplay: {
                        delay: 1,
                        disableOnInteraction: true
                    },
                    // freeMode: true,
                    speed: 5000,
                    freeModeMomentum: false,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: 'true',
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                            navigation: false,
                        },
                        386: {
                            slidesPerView: 2,
                            navigation: false,
                        },
                        576: {
                            slidesPerView: 3,
                            navigation: false,
                        },
                        768: {
                            slidesPerView: 4,
                            navigation: false,
                        },
                        992: {
                            slidesPerView: 4
                        },
                        1200: {
                            slidesPerView: 5
                        },
                        1400: {
                            slidesPerView: 6
                        },
                    }
                });
            </script>
        <?php endif ?>

        <div class="instagram-feed-section">
            <div class="container">
                <div class="row justify-content-lg-start justify-content-center">
                    <div class="col-lg-4">
                        <div class="section-title-small text-lg-start text-center">
                            <?php if (!empty($settings['xoon_insta_feed_title'])) : ?>
                                <i class="bi bi-instagram"></i><span><?php echo esc_html__($settings['xoon_insta_feed_title'], 'xoon') ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="swiper insta-feed-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($contents["data"] as $post) : ?>
                            <div class="swiper-slide">
                                <?php if (!empty($post['media_url'])) : ?>
                                    <div class="insta-feed-single magnetic-item">
                                        <img src="<?php echo esc_url($post['media_url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new xoon_instagram_feed_Widget());
