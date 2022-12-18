<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Video_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_video_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Video Testimonial', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-slider-video';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'xoon_video_testimonial_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        $this->add_control(
            'xoon_video_testimonial_heading_title',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('TESTIMONIAL', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'xoon_video_testimonial_video_style_select',
            [
                'label'     => esc_html__('Choose (Video/Link)', 'xoon-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__('Video', 'xoon-core'),
                    'style_two'        => esc_html__('Link', 'xoon-core'),

                ],
            ]
        );

        $this->add_control(
            'xoon_video_testimonial_video_controller',
            [
                'label' => esc_html__('Video', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => array('video'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'xoon_video_testimonial_video_style_select' => ['style_one',],
                ],
            ]
        );
        $this->add_control(
            'xoon_video_testimonial_video_link',
            [
                'label' => esc_html__('Youtube Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'xoon_video_testimonial_video_style_select' => ['style_two',],
                ],
            ]
        );

        $this->add_control(
            'xoon_video_testimonial_contact_form_shortcode',
            [
                'label' => esc_html__('Contact Form Shortcode', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'xoon_video_testimonial_author_name',
            [
                'label' => esc_html__('Author Name', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Johan Martin Sr', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'xoon_video_testimonial_author_designation',
            [
                'label' => esc_html__('Author Designation', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Photographer', 'xoon-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'xoon_video_testimonial_author_description',
            [
                'label' => esc_html__('Author Description', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.", 'xoon-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'xoon_video_testimonial_author_image',
            [
                'label' => esc_html__('Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_video_testimonial_list',
            [
                'label' => esc_html__('Testimonial List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_video_testimonial_author_name' => esc_html__('Johan Martin Sr', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_video_testimonial_author_name' => esc_html__('Johan Martin Sr', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_video_testimonial_author_name }}}',
            ]
        );

        $this->end_controls_section();


        //Style Section Start
        //Video Testimonial video Style Section Start
        $this->start_controls_section(
            'xoon_video_testimonial_style_heading_section',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_video_testimonial_style_heading_title_color',
            [
                'label'     => esc_html__('Title Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_video_testimonial_heading_title_bar_color',
            [
                'label'     => esc_html__('Title Top Bar Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h5::after' => 'background: {{VALUE}};',
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_video_testimonial_style_heading_title_typography',
                'selector' => '{{WRAPPER}} .section-title2 h5',

            ]
        );
        $this->add_responsive_control(
            'xoon_video_testimonial_style_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //Author Name Style Section Start
        $this->start_controls_section(
            'xoon_video_testimonial_style_author_name_section',
            [
                'label' => esc_html__('Author Name', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_video_testimonial_style_author_name_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_video_testimonial_style_author_name_typography',
                'selector' => '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content h5',

            ]
        );
        $this->add_responsive_control(
            'xoon_video_testimonial_style_author_name_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'xoon_video_testimonial_style_author_designation_section',
            [
                'label' => esc_html__('Author Designation', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_video_testimonial_style_author_designation_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_video_testimonial_style_author_designation_typography',
                'selector' => '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content span',

            ]
        );
        $this->add_responsive_control(
            'xoon_video_testimonial_style_author_designation_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'xoon_video_testimonial_style_author_description_section',
            [
                'label' => esc_html__('Author Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_video_testimonial_style_author_description_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_video_testimonial_style_author_description_typography',
                'selector' => '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-content p',

            ]
        );
        $this->add_responsive_control(
            'xoon_video_testimonial_style_author_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_video_testimonial_style_pagination_section',
            [
                'label' => esc_html__('Pagination Bullet', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_video_testimonial_style_pagination_bullet_normal_color',
            [
                'label'     => esc_html__('Bullet Normal Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_video_testimonial_style_pagination_bullet_active_color',
            [
                'label'     => esc_html__('Bullet Active Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area2 .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-area2 .swiper-pagination-bullet-active::after' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_video_testimonial_list'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // Testimonial Slider2
                var swiper = new Swiper(".testimonial-slider", {
                    slidesPerView: 1,
                    loop: true,
                    spaceBetween: 20,
                    slidesPerView: 1,
                    speed: 3000,
                    autoplay: {
                        delay: 2000,
                    },
                    pagination: {
                        el: ".testimonial-paginnation",
                        clickable: 'true',
                    },
                });
            </script>
        <?php endif ?>


        <div class="video-contact-testimonial-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video-wraper">
                            <?php if ($settings['xoon_video_testimonial_video_style_select'] == 'style_one' && !empty($settings['xoon_video_testimonial_video_controller']['url'])) : ?>
                                <video autoplay loop="loop" muted preload="auto">
                                    <source src="<?php echo esc_url($settings['xoon_video_testimonial_video_controller']['url']) ?>" type="video/mp4">
                                </video>
                            <?php endif ?>
                            <?php
                            $videoURL = $settings['xoon_video_testimonial_video_link'];
                            if (!empty($videoURL)) {
                                $convertedURL = str_replace("watch?v=", "embed/", $videoURL);
                            }
                            ?>
                            <?php if ($settings['xoon_video_testimonial_video_style_select'] == 'style_two' && !empty($convertedURL['url'])) : ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="auto" height="728" class="embed-responsive-item" src="<?php echo esc_url($convertedURL['url']); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <?php if (!empty($settings['xoon_video_testimonial_contact_form_shortcode'])) : ?>
                            <?php echo do_shortcode($settings['xoon_video_testimonial_contact_form_shortcode']) ?>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-7">
                        <div class="testimonial-area2">
                            <div class="section-title2">
                                <?php if (!empty($settings['xoon_video_testimonial_heading_title'])) : ?>
                                    <h5><?php echo esc_html__($settings['xoon_video_testimonial_heading_title'], 'xoon') ?></h5>
                                <?php endif ?>
                            </div>
                            <div class="swiper testimonial-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data as $items) : ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-wrrap">
                                                <div class="testimonial-content">
                                                    <?php if (!empty($items['xoon_video_testimonial_author_description'])) : ?>
                                                        <p><?php echo wp_kses($items['xoon_video_testimonial_author_description'], wp_kses_allowed_html('post')) ?></p>
                                                    <?php endif ?>
                                                </div>
                                                <div class="testimonial-meta d-flex align-items-center ">
                                                    <div class="author-img">
                                                        <?php if (!empty($items['xoon_video_testimonial_author_image']['url'])) : ?>
                                                            <img class="testi-author-img" src="<?php echo esc_url($items['xoon_video_testimonial_author_image']['url']) ?>" alt="image">
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="content">
                                                        <?php if (!empty($items['xoon_video_testimonial_author_name'])) : ?>
                                                            <h5><?php echo esc_html__($items['xoon_video_testimonial_author_name'], 'xoon') ?></h5>
                                                        <?php endif ?>
                                                        <?php if (!empty($items['xoon_video_testimonial_author_designation'])) : ?>
                                                            <span><?php echo esc_html__($items['xoon_video_testimonial_author_designation'], 'xoon') ?></span>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="swiper-pagination testimonial-paginnation"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Video_Testimonial_Widget());
