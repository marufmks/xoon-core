<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-testimonial';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'xoon_testimonial_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        $this->add_control(
            'xoon_testimonial_content_style_select',
            [
                'label'     => esc_html__('Style', 'xoon-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__('Style One', 'xoon-core'),
                    'style_two'        => esc_html__('Style Two', 'xoon-core'),
                ],
            ]
        );

       

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_testimonial_content_testimony_section',
            [
                'label' => esc_html__('Testimonial Contents', 'xoon-core'),
                'condition' => [
                    'xoon_testimonial_content_style_select' => ['style_one',],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'xoon_testimonial_author_name',
            [
                'label' => esc_html__('Author Name', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Johan Martin Sr', 'xoon-core'),
                'label_block' => true,
            ]
        );
       

        $repeater->add_control(
            'xoon_testimonial_author_description',
            [
                'label' => esc_html__('Author Testimony', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.", 'xoon-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'xoon_testimonial_author_image',
            [
                'label' => esc_html__('Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_testimonial_list',
            [
                'label' => esc_html__('Testimonial List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_testimonial_author_name' => esc_html__('Johan Martin Sr', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_testimonial_author_name' => esc_html__('Johan Martin Sr', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_testimonial_author_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_testimonial_content_testimony_section_two',
            [
                'label' => esc_html__('Testimonial Contents', 'xoon-core'),
                'condition' => [
                    'xoon_testimonial_content_style_select' => ['style_two',],
                ],
            ]
        );
        $this->add_control(
            'xoon_testimonial_heading_text',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('TESTIMONIAL', 'xoon-core'),
                'label_block' => true,
                
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'xoon_testimonial_author_name_two',
            [
                'label' => esc_html__('Author Name', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Johan Martin Sr', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $repeater2->add_control(
            'xoon_testimonial_author_designation_two',
            [
                'label' => esc_html__('Author Designation', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Photographer', 'xoon-core'),
                'label_block' => true,
                
            ]
        );

        $repeater2->add_control(
            'xoon_testimonial_author_description_two',
            [
                'label' => esc_html__('Author Testimony', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.", 'xoon-core'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'xoon_testimonial_author_image_two',
            [
                'label' => esc_html__('Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_testimonial_list_two',
            [
                'label' => esc_html__('Testimonial List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'xoon_testimonial_author_name_two' => esc_html__('Johan Martin Sr', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_testimonial_author_name_two' => esc_html__('Johan Martin Sr', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_testimonial_author_name_two }}}',
            ]
        );

        $this->end_controls_section();


        //Style Section Start

        //Heading Style Section Start
        $this->start_controls_section(
            'xoon_testimonial_style_heading_title_section',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_testimonial_content_style_select' => ['style_two',],
                ],

            ]
        );
        $this->add_control(
            'xoon_testimonial_style_heading_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_testimonial_style_heading_bar_color',
            [
                'label'     => esc_html__('Title Bar Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2.style-two h5::after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_testimonial_style_heading_title_typography',
                'selector' => '{{WRAPPER}} .section-title2 h5',

            ]
        );
        $this->add_responsive_control(
            'xoon_testimonial_style_heading_title_margin',
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

        $this->start_controls_section(
            'xoon_testimonial_style_author_name_section',
            [
                'label' => esc_html__('Author Name', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_testimonial_style_author_name_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area .testimonial-wrrap .author-area .author-name h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_testimonial_style_author_name_typography',
                'selector' => '{{WRAPPER}} .testimonial-area .testimonial-wrrap .author-area .author-name h4,.testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content h5',

            ]
        );
        $this->add_responsive_control(
            'xoon_testimonial_style_author_name_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area .testimonial-wrrap .author-area .author-name h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'xoon_testimonial_style_author_designation_section',
            [
                'label' => esc_html__('Author designation', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_testimonial_content_style_select' => ['style_two',],
                ],

            ]
        );
        $this->add_control(
            'xoon_testimonial_style_author_designation_color',
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
                'name'     => 'xoon_testimonial_style_author_designation_typography',
                'selector' => '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-meta .content span',

            ]
        );
        $this->add_responsive_control(
            'xoon_testimonial_style_author_designation_margin',
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
            'xoon_testimonial_style_author_description_section',
            [
                'label' => esc_html__('Author Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_testimonial_style_author_description_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area .testimonial-wrrap .content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_testimonial_style_author_description_typography',
                'selector' => '{{WRAPPER}} .testimonial-area .testimonial-wrrap .content p,.testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-content p',

            ]
        );
        $this->add_responsive_control(
            'xoon_testimonial_style_author_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area .testimonial-wrrap .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-area2 .testimonial-slider .testimonial-wrrap .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_testimonial_style_pagination_section',
            [
                'label' => esc_html__('Pagination Bullet', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_testimonial_style_pagination_bullet_color',
            [
                'label'     => esc_html__('Bullet Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-area .swiper-pagination-bullet-active' => 'background: {{VALUE}};border-color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-area2.style-two .swiper-pagination-bullet-active' => 'background: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_testimonial_list'];
        $data2 = $settings['xoon_testimonial_list_two'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // Testimonial slider
                var swiper = new Swiper(".services-slider", {
                    loop: true,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    speed: 2000,
                    autoplay: {
                        delay: 2000,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                });
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

        <?php if ($settings['xoon_testimonial_content_style_select'] == 'style_one') : ?>
            <div class="testimonial-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper services-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data as $items) : ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-wrrap">
                                                <div class="content">
                                                    <?php if (!empty($items['xoon_testimonial_author_description'])) : ?>
                                                        <p><?php echo wp_kses($items['xoon_testimonial_author_description'], wp_kses_allowed_html('post')) ?></p>
                                                    <?php endif ?>
                                                </div>
                                                <div class="author-area mb-50">
                                                    <div class="author-name">
                                                        <?php if (!empty($items['xoon_testimonial_author_name'])) : ?>
                                                            <h4><?php echo esc_html__($items['xoon_testimonial_author_name'], 'xoon') ?></h4>
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="author-img">
                                                        <?php if (!empty($items['xoon_testimonial_author_image']['url'])) : ?>
                                                            <img class="testi-author-img" src="<?php echo esc_url($items['xoon_testimonial_author_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($settings['xoon_testimonial_content_style_select'] == 'style_two') : ?>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="testimonial-area2 two style-two">
                        <div class="section-title2 style-two">
                            <?php if (!empty($settings['xoon_testimonial_heading_text'])) : ?>
                                <h5><?php echo esc_html__($settings['xoon_testimonial_heading_text'], 'xoon') ?></h5>
                            <?php endif ?>
                        </div>
                        <div class="swiper testimonial-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($data2 as $items) : ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-wrrap">
                                            <div class="testimonial-content">
                                                <?php if (!empty($items['xoon_testimonial_author_description_two'])) : ?>
                                                    <p><?php echo wp_kses($items['xoon_testimonial_author_description_two'], wp_kses_allowed_html('post')) ?></p>
                                                <?php endif ?>
                                            </div>
                                            <div class="testimonial-meta d-flex align-items-center ">
                                                <div class="author-img">
                                                    <?php if (!empty($items['xoon_testimonial_author_image_two']['url'])) : ?>
                                                        <img class="testi-author-img" src="<?php echo esc_url($items['xoon_testimonial_author_image_two']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                                    <?php endif ?>
                                                </div>
                                                <div class="content">
                                                    <?php if (!empty($items['xoon_testimonial_author_name_two'])) : ?>
                                                        <h5><?php echo esc_html__($items['xoon_testimonial_author_name_two'], 'xoon') ?></h5>
                                                    <?php endif ?>
                                                    <?php if (!empty($items['xoon_testimonial_author_designation_two'])) : ?>
                                                        <span><?php echo esc_html__($items['xoon_testimonial_author_designation_two'], 'xoon') ?></span>
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
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Testimonial_Widget());
