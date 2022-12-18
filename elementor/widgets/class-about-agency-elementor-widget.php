<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_About_Agency_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_about_agency';
    }

    public function get_title()
    {
        return esc_html__('EG About Agency', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-flip-box';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'xoon_about_agency_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );



        $this->add_control(
            'xoon_about_agency_content_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("We're Gleam a small and enthusiastic photography studio based in New York. We play with light.", 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'xoon_about_agency_content_description',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("The long story short is that I'm just a guy lucky enough to pick up a camera. How that went down is quite a tale,
                 and the fact that I get to do what I love every day is something that I'll always cherish and be forever grateful for. Lorem Ipsum decided
                  to leave for the far World of Grammar.", 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_about_agency_images_section',
            [
                'label' => esc_html__('About Image', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'xoon_about_agency_image_one',
            [
                'label' => esc_html__('Image One', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->end_controls_section();

        //slider images
        $this->start_controls_section(
            'xoon_about_agency_slider_images_section',
            [
                'label' => esc_html__('Slider Image', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,

            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'xoon_about_agency_slider_image',
            [
                'label' => esc_html__('Image One', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_about_agency_slider_image_list',
            [
                'label' => esc_html__('Image List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_about_agency_slider_image' => esc_html__('Image #1', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_about_agency_slider_image' => esc_html__('Image #2', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_about_agency_slider_image }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_about_agency_button_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,

            ]
        );


        $this->add_control(
            'xoon_about_agency_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_about_agency_button_content_button_url',
            [
                'label' => esc_html__('Button URL', 'xoon-core'),
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
            ]
        );

        $this->end_controls_section();
        //Style Section Start

        // Title Style Section Start
        $this->start_controls_section(
            'xoon_about_agency_style_one_main_title_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_about_agency_style_one_main_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-area2 .about-right .about-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_about_agency_style_one_main_title_typography',
                'selector' => '{{WRAPPER}} .about-area2 .about-right .about-title h3',

            ]
        );
        $this->add_responsive_control(
            'xoon_about_agency_style_one_main_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-area2 .about-right .about-title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_about_agency_style_one_sub_description_section',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_about_agency_style_one_sub_description_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-area2 .about-right .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_about_agency_style_one_sub_description_typography',
                'selector' => '{{WRAPPER}} .about-area2 .about-right .about-content p',

            ]
        );
        $this->add_responsive_control(
            'xoon_about_agency_style_one_sub_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-area2 .about-right .about-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_slider_pagination_style_section',
            [
                'label' => esc_html__('Slider Bullet', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xoon_slider_bullet_style_color',
            [
                'label'     => esc_html__('Bullet Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-area2.style-two .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .about-area2 .swiper-pagination-bullet' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //butoon Style
        $this->start_controls_section(
            'xoon_button_style_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'xoon_button_style_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('_tab_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label'         => __('Normal', 'xoon-core'),
            ]
        );

        $this->add_control(
            'xoon_button_style_text_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-area2 .about-right .about-content a.style-two' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_button_style_border_color',
            [
                'label'     => esc_html__('Border Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6.style-two' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xoon_button_style_background_color',
            [
                'label'     => esc_html__('Background Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_button_style_typography',
                'selector' => '{{WRAPPER}} .primary-btn6 ',


            ]
        );


        $this->end_controls_tab();
        //Hover start

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xoon-core'),

            ]
        );
        $this->add_control(
            'xoon_button_style_hover_color',
            [
                'label' => esc_html__('Text Color', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-hover-two:hover' => 'color: {{VALUE}} !important',

                ],

            ]
        );
        $this->add_control(
            'xoon_button_style_background_hover_color',
            [
                'label' => esc_html__('Background Hover Color', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-hover-two::before' => 'background-color: {{VALUE}}',
                ],

            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tab();
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_about_agency_slider_image_list'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // About Us slider
                var swiper = new Swiper(".about-img-slider", {
                    slidesPerView: 1,
                    loop: true,
                    spaceBetween: 20,
                    slidesPerView: 1,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    speed: 3000,
                    autoplay: {
                        delay: 1500,
                    },
                    pagination: {
                        el: ".about-img-paginnation",
                        clickable: 'true',
                    },
                });
            </script>
        <?php endif ?>
        <div class="about-area2 style-two">
            <div class="about-sm-img">
                <?php if (!empty($settings['xoon_about_agency_image_one']['url'])) : ?>
                    <img class=" magnetic-item" src="<?php echo esc_url($settings['xoon_about_agency_image_one']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                <?php endif ?>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 col-sm-10 position-relative">
                        <div class="swiper about-img-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($data as $images) : ?>
                                    <div class="swiper-slide">
                                        <?php if (!empty($images['xoon_about_agency_slider_image']['url'])) : ?>
                                            <img class="img-fluid" src="<?php echo esc_url($images['xoon_about_agency_slider_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                        <?php endif ?>
                                    </div>
                                <?php endforeach;  ?>
                            </div>
                        </div>
                        <div class="swiper-pagination about-img-paginnation"></div>
                    </div>
                    <div class="col-lg-7 col-md-10 col-sm-10">
                        <div class="about-right">
                            <div class="about-title">
                                <?php if (!empty($settings['xoon_about_agency_content_title'])) : ?>
                                    <h3><?php echo esc_html__($settings['xoon_about_agency_content_title'], 'xoon') ?></h3>
                                <?php endif ?>
                            </div>
                            <div class="about-content">
                                <?php if (!empty($settings['xoon_about_agency_content_description'])) : ?>
                                    <p><?php echo wp_kses($settings['xoon_about_agency_content_description'], wp_kses_allowed_html('post')) ?></p>
                                <?php endif ?>
                                <?php if (!empty($settings['xoon_about_agency_button_content_button_text'])) : ?>
                                    <a class="primary-btn6 style-two button-hover-two" href="<?php echo esc_url($settings['xoon_about_agency_button_content_button_url']['url']) ?>"><?php echo esc_html__($settings['xoon_about_agency_button_content_button_text'], 'xoon') ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_About_Agency_Widget());
