<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_About_Me_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_about_me';
    }

    public function get_title()
    {
        return esc_html__('EG About Me', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'xoon_about_me_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'xoon_about_me_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .about-style-1::before',
            ]
        );

        $this->add_control(
            'xoon_about_me_content_title_one',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Who am i', 'xoon-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'xoon_about_me_content_description_one',
            [
                'label' => esc_html__('Main Title', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("“The long story short is that I'm just a guy lucky enough to pick up a camera. 
                How that went down is quite a tale,", 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'xoon_about_me_content_description_two',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("“The long story short is that I'm just a guy lucky enough to pick up a camera. 
                How that went down is quite a tale,nd the fact that I get to do what I love every day is something that 
                I'll always cherish and be forever grateful for.", 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_about_me_images_section',
            [
                'label' => esc_html__('Images', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'xoon_about_me_image_one',
            [
                'label' => esc_html__('Image One', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'xoon_about_me_image_two',
            [
                'label' => esc_html__('Image Two', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'xoon_about_me_image_three',
            [
                'label' => esc_html__('Image Three', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_about_me_button_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,

            ]
        );
        $this->add_control(
            'xoon_about_me_button_icon_display',
            [
                'label' => esc_html__('Button Icon', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xoon-core'),
                'label_off' => esc_html__('Hide', 'xoon-core'),
                'return_value' => 'yes',
                'default' => 'yes',


            ]
        );

        $this->add_control(
            'xoon_about_me_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_about_me_button_content_button_url',
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
        //Sub Title Style Section Start
        $this->start_controls_section(
            'xoon_about_me_style_one_sub_title_section',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_about_me_style_one_sub_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .section-title1 h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_about_me_style_one_sub_title_typography',
                'selector' => '{{WRAPPER}} .about-style-1 .section-title1 h6',

            ]
        );
        $this->add_responsive_control(
            'xoon_about_me_style_one_sub_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .section-title1 h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //Sub Title Style Section Start
        $this->start_controls_section(
            'xoon_about_me_style_one_main_title_section',
            [
                'label' => esc_html__('Main Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_about_me_style_one_main_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .section-title1 h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_about_me_style_one_main_title_typography',
                'selector' => '{{WRAPPER}} .about-style-1 .section-title1 h3',

            ]
        );
        $this->add_responsive_control(
            'xoon_about_me_style_one_main_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .section-title1 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_about_me_style_one_sub_description_section',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_about_me_style_one_sub_description_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_about_me_style_one_sub_description_typography',
                'selector' => '{{WRAPPER}} .about-style-1 .about-content p',

            ]
        );
        $this->add_responsive_control(
            'xoon_about_me_style_one_sub_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .about-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'xoon_button_style_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .textalign' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'xoon_about_button_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'xoon_button_style_text_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_button_style_typography',
                'selector' => '{{WRAPPER}} .primary-btn2 ',


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
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}}',

                ],

            ]
        );
        $this->add_control(
            'xoon_button_style_border_and_icon_hover_color',
            [
                'label' => esc_html__('Icon & Border Color', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover svg' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .primary-btn2:hover' => 'border-color: {{VALUE}}',
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
?>

        <div class="about-style-1 pt-120 mb-120" id="about-style-1">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-12">
                        <div class="section-title1">
                            <?php if (!empty($settings['xoon_about_me_content_title_one'])) : ?>
                                <h6><?php echo esc_html__($settings['xoon_about_me_content_title_one'], 'xoon') ?></h6>
                            <?php endif ?>
                            <?php if (!empty($settings['xoon_about_me_content_description_one'])) : ?>
                                <h3><?php echo wp_kses($settings['xoon_about_me_content_description_one'], wp_kses_allowed_html('post')) ?></h3>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-70">
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="about-img1">
                            <div class="magnetic-wrap">
                                <?php if (!empty($settings['xoon_about_me_image_one']['url'])) : ?>
                                    <img class="img-fluid  magnetic-item" src="<?php echo esc_url($settings['xoon_about_me_image_one']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-img2">
                            <?php if (!empty($settings['xoon_about_me_image_two']['url'])) : ?>
                                <img class="img-fluid  magnetic-item" src="<?php echo esc_url($settings['xoon_about_me_image_two']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end align-items-end">
                        <div class="about-img3">
                            <?php if (!empty($settings['xoon_about_me_image_three']['url'])) : ?>
                                <img class="img-fluid  magnetic-item" src="<?php echo esc_url($settings['xoon_about_me_image_three']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-content">
                            <?php if (!empty($settings['xoon_about_me_content_description_two'])) : ?>
                                <p><?php echo wp_kses($settings['xoon_about_me_content_description_two'], wp_kses_allowed_html('post')) ?></p>
                            <?php endif ?>
                            <?php if (!empty($settings['xoon_about_me_button_content_button_text'])) : ?>
                                <a class="primary-btn2" <?php echo esc_url($settings['xoon_about_me_button_content_button_url']['url']); ?>>
                                    <?php if ('yes' === $settings['xoon_about_me_button_icon_display']) : ?>
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_126_82)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 0.000100587C11.6326 0.000100581 11.7598 0.0527787 11.8536 0.146547C11.9473 0.240315 12 0.367492 12 0.500101L12 6.5001C12 6.63271 11.9473 6.75989 11.8536 6.85365C11.7598 6.94742 11.6326 7.0001 11.5 7.0001C11.3674 7.0001 11.2402 6.94742 11.1465 6.85365C11.0527 6.75989 11 6.63271 11 6.5001L11 1.7071L0.854021 11.8541C0.807533 11.9006 0.752344 11.9375 0.691605 11.9626C0.630865 11.9878 0.565765 12.0007 0.500021 12.0007C0.434277 12.0007 0.369177 11.9878 0.308438 11.9626C0.247698 11.9375 0.192509 11.9006 0.146021 11.8541C0.0995332 11.8076 0.0626571 11.7524 0.037498 11.6917C0.0123389 11.6309 -0.000610371 11.5658 -0.000610373 11.5001C-0.000610376 11.4344 0.0123389 11.3693 0.037498 11.3085C0.0626571 11.2478 0.0995332 11.1926 0.146021 11.1461L10.293 1.0001L5.50002 1.0001C5.36741 1.0001 5.24024 0.947423 5.14647 0.853655C5.0527 0.759887 5.00002 0.632709 5.00002 0.500101C5.00002 0.367492 5.0527 0.240315 5.14647 0.146547C5.24024 0.052779 5.36741 0.000100855 5.50002 0.000100849L11.5 0.000100587Z">
                                                </path>
                                            </g>
                                        </svg>
                                    <?php endif ?>
                                    <?php echo esc_html__($settings['xoon_about_me_button_content_button_text'], 'xoon'); ?>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_About_Me_Widget());
