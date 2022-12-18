<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_banner_two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_banner_two';
    }

    public function get_title()
    {
        return esc_html__('EG Banner Agency', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'xoon_banner_two_content_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );


        $this->add_control(
            'xoon_banner_two_content_style_select',
            [
                'label'     => esc_html__('Select Style', 'xoon-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__('HOME', 'xoon-core'),
                    'style_two'        => esc_html__('HOME VIDEO', 'xoon-core'),
                    'style_three'        => esc_html__('HOME THUMBNAIL', 'xoon-core'),
                    'style_four'        => esc_html__('HOME PAGINATION', 'xoon-core'),
                    'style_five'        => esc_html__('HOME CENTER SLIDER', 'xoon-core'),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_content_scroll',
            [
                'label' => esc_html__('Scroll Down (Show/Hide)', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xoon-core'),
                'label_off' => esc_html__('Hide', 'xoon-core'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_two_content_style_one_section',
            [
                'label' => esc_html__('Banner Contents', 'xoon-core'),
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_one',],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'xoon_banner_two_content_style_one_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .agency-banner-section',
            ]
        );

        $this->add_control(
            'xoon_banner_two_content_style_one_image',
            [
                'label' => esc_html__('Thumb Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_content_style_one_sub_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_banner_two_content_style_one_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Love to Capture Beauty Moments !', 'xoon-core'),
                'label_block' => true,

            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_two_content_style_two_section',
            [
                'label' => esc_html__('Video Contents', 'xoon-core'),
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_two',],
                ],
            ]
        );


        $this->add_control(
            'xoon_banner_two_content_style_two_video',
            [
                'label' => esc_html__('Select Video', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => array('video'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_content_style_two_sub_title',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_banner_two_content_style_two_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Love to Capture Beauty Moments !', 'xoon-core'),
                'label_block' => true,

            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_two_content_style_two_contact_section',
            [
                'label' => esc_html__('Contacts', 'xoon-core'),
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_two',],
                ],
            ]
        );
        $this->add_control(
            'xoon_banner_two_content_style_two_phone_number',
            [
                'label' => esc_html__('Contact Number', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+880176 1111 456', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_banner_two_content_style_two_photographer_info',
            [
                'label' => esc_html__('Photographer Info', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Johan Doe / Photographer', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_banner_two_content_style_two_photographer_link',
            [
                'label' => esc_html__('Photographer Link', 'xoon-core'),
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

        $this->start_controls_section(
            'xoon_banner_two_content_style_one_button_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_one', 'style_two'],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_content_button_text',
            [
                'label' => esc_html__('Text', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_banner_two_content_button_link',
            [
                'label' => esc_html__('Link', 'xoon-core'),
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

        //Content Section

        //social icon
        $this->start_controls_section(
            'xoon_banner_two_content_social_icon_section',
            [
                'label' => esc_html__('Social Icon Link', 'xoon-core'),

            ]
        );

        //facebook Link
        $this->add_control(
            'xoon_banner_two_social_link_facebook',
            [
                'label' => esc_html__('Facebook Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //instagram Link
        $this->add_control(
            'xoon_banner_two_social_link_instagram',
            [
                'label' => esc_html__('Instagram Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //linkedin Link
        $this->add_control(
            'xoon_banner_two_social_link_linkedin',
            [
                'label' => esc_html__('Linkedin Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        //twitter Link
        $this->add_control(
            'xoon_banner_two_social_link_twitter',
            [
                'label' => esc_html__('Twitter Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //pinterest Link
        $this->add_control(
            'xoon_banner_two_social_link_pinterest',
            [
                'label' => esc_html__('Pinterest Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //Youtube Link
        $this->add_control(
            'xoon_banner_two_social_link_youtube',
            [
                'label' => esc_html__('Youtube Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        //Google plus link
        $this->add_control(
            'xoon_banner_two_social_link_google_plus',
            [
                'label' => esc_html__('Google Plus Link', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'xoon-core'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_two_items_content_section',
            [
                'label' => esc_html__('Banner Slider Items', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_three', 'style_four', 'style_five'],
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'xoon_banner_two_items_content_image_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,


            ]
        );
        $repeater->add_control(
            'xoon_banner_two_items_content_image_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,


            ]
        );

        $repeater->add_control(
            'xoon_banner_two_items_content_image',
            [
                'label' => esc_html__('Choose Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_content_list_one',
            [
                'label' => esc_html__('Slider List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_banner_two_items_content_image_subtitle' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_banner_two_items_content_image_subtitle' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_banner_two_items_content_image_subtitle }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_two_style_three_content_small_image_section',
            [
                'label' => esc_html__('Small Image', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_three',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_three_content_small_image_one',
            [
                'label' => esc_html__('Image One', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'xoon_banner_two_style_three_content_small_image_two',
            [
                'label' => esc_html__('Image Two', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'xoon_banner_two_style_three_content_small_image_three',
            [
                'label' => esc_html__('Image Three', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'xoon_banner_two_style_three_content_small_image_four',
            [
                'label' => esc_html__('Image Four', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        //styling starts here

        //image subtitle Style
        $this->start_controls_section(
            'xoon_banner_two_image_heading_section',
            [
                'label' => esc_html__('Image Subtitle', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_banner_two_image_heading_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .agency-banner-content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-center-content.style-two span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-pagination-image-content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-pagination-image-content span::after' => 'background-color: {{VALUE}};',


                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_two_image_heading_typography',
                'selector' => '{{WRAPPER}} .agency-banner-content span,
                .horo-style-2 .hero-wrrap .hero-content span,
                .banner-center-content span,
                .banner-pagination-image-content span',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_two_image_heading_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .agency-banner-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-center-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-pagination-image-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //SLider Image title Style
        $this->start_controls_section(
            'xoon_banner_two_image_title_section',
            [
                'label' => esc_html__('Image Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_banner_two_image_title_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .agency-banner-content h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-pagination-image-content h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-content h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-center-content h2' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_two_image_title_typography',
                'selector' => '{{WRAPPER}} .agency-banner-content h1,
                .banner-pagination-image-content h2,
                .banner-center-content h2,
                .horo-style-2 .hero-wrrap .hero-content h1',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_two_image_title_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .agency-banner-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-pagination-image-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-center-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();
        //Contact Number  Style
        $this->start_controls_section(
            'xoon_banner_two_style_two_contact_number_section',
            [
                'label' => esc_html__('Contact Number', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_two',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_two_contact_number_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-meta .contact-number a' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'xoon_banner_two_style_two_contact_number_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-meta .contact-number a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'xoon_banner_two_style_two_contact_number_typography',
                'selector' => '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-meta .contact-number a',
            ]
        );

        $this->end_controls_section();
        //Contact Number  Style
        $this->start_controls_section(
            'xoon_banner_two_style_two_contact_photographer_section',
            [
                'label' => esc_html__('Photographer Info', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_two',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_two_contact_photographer_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-meta .photographer a' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'xoon_banner_two_style_two_contact_photographer_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-meta .photographer a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'xoon_banner_two_style_two_contact_photographer_typography',
                'selector' => '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-meta .photographer a',
            ]
        );

        $this->end_controls_section();

        //Icon Style
        $this->start_controls_section(
            'xoon_banner_two_style_pagination_section',
            [
                'label' => esc_html__('Slider Pagination', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_four',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_pagination_icon_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-pagination-section .swiper-pagination-bullet' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-pagination-section .swiper-pagination-bullet-active::after' => 'background-color: {{VALUE}};',


                ],

            ]
        );

        $this->end_controls_section();
        //Icon Style
        $this->start_controls_section(
            'xoon_banner_two_style_social_icon_section',
            [
                'label' => esc_html__('Social Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_banner_two_style_social_icon_icon_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-2 .social-area ul li a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        //Button Style
        $this->start_controls_section(
            'xoon_banner_two_button_style_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_two_content_style_select' => ['style_one', 'style_two'],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_button_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .agency-banner-content .eg-btn1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .horo-style-2 .hero-wrrap .hero-content .eg-btn1' => 'color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_button_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn--primary:hover::before' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .btn--primary:hover::after' => 'border-color: {{VALUE}};',

                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_two_button_typography',
                'selector' => '{{WRAPPER}} .eg-btn1',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_two_button_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eg-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_banner_two_content_list_one'];
?>
        <?php if (is_admin()) : ?>
            <script>
                var swiper2 = new Swiper(".banner-pagination-image-slider", {
                    spaceBetween: 10,
                    // autoplay: true,
                    effect: 'fade',
                    speed: 1000,
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    thumbs: {
                        swiper: swiper,
                    },
                });
                // banner-pagination-slider
                var mySwiper = new Swiper('.banner-pagination-slider', {
                    loop: true,
                    speed: 1000,
                    slidesPerView: 1,
                    // autoplay:true,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true,
                    },
                    pagination: {
                        el: ".swiper-pagination-num",
                        clickable: true,
                        renderBullet: function(index, className) {
                            return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
                        }
                    },
                });

                //   center-banner-slider
                var mySwiper = new Swiper('.banner-center-slider', {
                    loop: true,
                    speed: 1000,
                    centeredSlides: true,
                    slidesPerView: 2,
                    // autoplay:true,
                    autoplay: {
                        delay: 3000,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                            navigation: false,
                        },
                        386: {
                            slidesPerView: 1,
                            navigation: false,
                        },
                        576: {
                            slidesPerView: 1,
                            navigation: false,
                        },
                        768: {
                            slidesPerView: 2,
                            navigation: false,
                        },
                    }
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_two_content_style_select'] == 'style_one') : ?>
            <div class="horo-style-2">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_two_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_facebook']['url']) ?>"><?php esc_html_e('FB.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_linkedin']['url']) ?>"><?php esc_html_e('LI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_instagram']['url']) ?>"><?php esc_html_e('IN.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_twitter']['url']) ?>"><?php esc_html_e('TW.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_pinterest']['url']) ?>"><?php esc_html_e('PI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_youtube']['url']) ?>"><?php esc_html_e('YT.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_google_plus']['url']) ?>"><?php esc_html_e('GP.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($settings['xoon_banner_two_content_scroll'] == 'yes') : ?>
                    <div class="scroll-down">
                        <a href="#about-style-2">
                            <svg width="22" height="60" viewBox="0 0 22 60" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="21" height="40" rx="10.5" />
                                <path d="M11.5 29C11.5 28.7239 11.2761 28.5 11 28.5C10.7239 28.5 10.5 28.7239 10.5 29L11.5 29ZM10.6464 59.3536C10.8417 59.5488 11.1583 59.5488 11.3536 59.3536L14.5355 56.1716C14.7308 55.9763 14.7308 55.6597 14.5355 55.4645C14.3403 55.2692 14.0237 55.2692 13.8284 55.4645L11 58.2929L8.17157 55.4645C7.97631 55.2692 7.65973 55.2692 7.46447 55.4645C7.26921 55.6597 7.26921 55.9763 7.46447 56.1716L10.6464 59.3536ZM10.5 29L10.5 59L11.5 59L11.5 29L10.5 29Z" />
                                <circle cx="11" cy="11" r="3" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="hero-wrrap agency-banner-section">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-7 col-lg-8">
                                <div class=" agency-banner-content">
                                    <?php if (!empty($settings['xoon_banner_two_content_style_one_sub_title'])) : ?>
                                        <span><?php echo esc_html__($settings['xoon_banner_two_content_style_one_sub_title'], 'xoon') ?></span>
                                    <?php endif ?>
                                    <?php if (!empty($settings['xoon_banner_two_content_style_one_title'])) : ?>
                                        <h1><?php echo esc_html__($settings['xoon_banner_two_content_style_one_title'], 'xoon') ?></h1>
                                    <?php endif ?>
                                    <?php if (!empty($settings['xoon_banner_two_content_button_text'])) : ?>
                                        <a class="eg-btn1 btn--primary" href="<?php echo esc_url($settings['xoon_banner_two_content_button_link']['url']) ?>"><?php echo esc_html__($settings['xoon_banner_two_content_button_text'], 'xoon') ?></a>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4">
                                <div class="agency-banner-img">
                                    <?php if (!empty($settings['xoon_banner_two_content_style_one_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['xoon_banner_two_content_style_one_image']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_two_content_style_select'] == 'style_two') : ?>
            <div class="horo-style-2">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_two_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_facebook']['url']) ?>"><?php esc_html_e('FB.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_linkedin']['url']) ?>"><?php esc_html_e('LI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_instagram']['url']) ?>"><?php esc_html_e('IN.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_twitter']['url']) ?>"><?php esc_html_e('TW.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_pinterest']['url']) ?>"><?php esc_html_e('PI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_youtube']['url']) ?>"><?php esc_html_e('YT.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_google_plus']['url']) ?>"><?php esc_html_e('GP.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($settings['xoon_banner_two_content_scroll'] == 'yes') : ?>
                    <div class="scroll-down">
                        <a href="#about-style-2">
                            <svg width="22" height="60" viewBox="0 0 22 60" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="21" height="40" rx="10.5" />
                                <path d="M11.5 29C11.5 28.7239 11.2761 28.5 11 28.5C10.7239 28.5 10.5 28.7239 10.5 29L11.5 29ZM10.6464 59.3536C10.8417 59.5488 11.1583 59.5488 11.3536 59.3536L14.5355 56.1716C14.7308 55.9763 14.7308 55.6597 14.5355 55.4645C14.3403 55.2692 14.0237 55.2692 13.8284 55.4645L11 58.2929L8.17157 55.4645C7.97631 55.2692 7.65973 55.2692 7.46447 55.4645C7.26921 55.6597 7.26921 55.9763 7.46447 56.1716L10.6464 59.3536ZM10.5 29L10.5 59L11.5 59L11.5 29L10.5 29Z" />
                                <circle cx="11" cy="11" r="3" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="hero-wrrap">
                    <div class="video-wraper">
                        <video autoplay loop="loop" muted preload="auto">
                            <?php if (!empty($settings['xoon_banner_two_content_style_two_video']['url'])) : ?>
                                <source src="<?php echo esc_url($settings['xoon_banner_two_content_style_two_video']['url']) ?>" type="video/mp4">
                            <?php endif ?>
                        </video>
                    </div>
                    <div class="hero-content">
                        <?php if (!empty($settings['xoon_banner_two_content_style_two_sub_title'])) : ?>
                            <span><?php echo esc_html__($settings['xoon_banner_two_content_style_two_sub_title'], 'xoon') ?></span>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_content_style_two_title'])) : ?>
                            <h1><?php echo esc_html__($settings['xoon_banner_two_content_style_two_title'], 'xoon') ?></h1>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_content_button_text'])) : ?>
                            <a class="eg-btn1 btn--primary" href="<?php echo esc_url($settings['xoon_banner_two_content_button_link']['url']) ?>"><?php echo esc_html__($settings['xoon_banner_two_content_button_text'], 'xoon') ?></a>
                        <?php endif ?>
                    </div>
                    <div class="hero-meta">
                        <div class="contact-number">
                            <?php if (!empty($settings['xoon_banner_two_content_style_two_phone_number'])) : ?>
                                <a href="tel:<?php echo esc_html__($settings['xoon_banner_two_content_style_two_phone_number'], 'xoon') ?>"><?php echo esc_html__('Call Us: ', 'xoon') ?><?php echo esc_html__($settings['xoon_banner_two_content_style_two_phone_number'], 'xoon') ?></a>
                            <?php endif ?>
                        </div>
                        <div class="photographer">
                            <?php if (!empty($settings['xoon_banner_two_content_style_two_photographer_info'])) : ?>
                                <a href="<?php echo esc_url($settings['xoon_banner_two_content_style_two_photographer_link']['url']) ?>"><?php echo esc_html__($settings['xoon_banner_two_content_style_two_photographer_info'], 'xoon') ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_two_content_style_select'] == 'style_three') : ?>
            <div class="horo-style-2">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_two_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_facebook']['url']) ?>"><?php esc_html_e('FB.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_linkedin']['url']) ?>"><?php esc_html_e('LI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_instagram']['url']) ?>"><?php esc_html_e('IN.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_twitter']['url']) ?>"><?php esc_html_e('TW.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_pinterest']['url']) ?>"><?php esc_html_e('PI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_youtube']['url']) ?>"><?php esc_html_e('YT.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_google_plus']['url']) ?>"><?php esc_html_e('GP.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($settings['xoon_banner_two_content_scroll'] == 'yes') : ?>
                    <div class="scroll-down">
                        <a href="#about-style-2">
                            <svg width="22" height="60" viewBox="0 0 22 60" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="21" height="40" rx="10.5" />
                                <path d="M11.5 29C11.5 28.7239 11.2761 28.5 11 28.5C10.7239 28.5 10.5 28.7239 10.5 29L11.5 29ZM10.6464 59.3536C10.8417 59.5488 11.1583 59.5488 11.3536 59.3536L14.5355 56.1716C14.7308 55.9763 14.7308 55.6597 14.5355 55.4645C14.3403 55.2692 14.0237 55.2692 13.8284 55.4645L11 58.2929L8.17157 55.4645C7.97631 55.2692 7.65973 55.2692 7.46447 55.4645C7.26921 55.6597 7.26921 55.9763 7.46447 56.1716L10.6464 59.3536ZM10.5 29L10.5 59L11.5 59L11.5 29L10.5 29Z" />
                                <circle cx="11" cy="11" r="3" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="hero-wrrap banner-pagination-image-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="swiper banner-pagination-image-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data as $item) : ?>
                                        <div class="swiper-slide">
                                            <?php if (!empty($item['xoon_banner_two_items_content_image']['url'])) : ?>
                                                <img src="<?php echo esc_url($item['xoon_banner_two_items_content_image']['url']) ?> " alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                            <?php endif ?>
                                            <div class="banner-pagination-image-content">
                                                <?php if (!empty($item['xoon_banner_two_items_content_image_subtitle'])) : ?>
                                                    <span><?php echo esc_html__($item['xoon_banner_two_items_content_image_subtitle'], 'xoon') ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($item['xoon_banner_two_items_content_image_title'])) : ?>
                                                    <h2><?php echo esc_html__($item['xoon_banner_two_items_content_image_title'], 'xoon') ?></h2>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="swiper banner-pagination-small-image">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <?php if (!empty($settings['xoon_banner_two_style_three_content_small_image_one']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['xoon_banner_two_style_three_content_small_image_one']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="swiper-slide">
                                        <?php if (!empty($settings['xoon_banner_two_style_three_content_small_image_two']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['xoon_banner_two_style_three_content_small_image_two']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="swiper-slide">
                                        <?php if (!empty($settings['xoon_banner_two_style_three_content_small_image_three']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['xoon_banner_two_style_three_content_small_image_three']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="swiper-slide">
                                        <?php if (!empty($settings['xoon_banner_two_style_three_content_small_image_four']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['xoon_banner_two_style_three_content_small_image_four']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_two_content_style_select'] == 'style_four') : ?>
            <div class="horo-style-2">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_two_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_facebook']['url']) ?>"><?php esc_html_e('FB.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_linkedin']['url']) ?>"><?php esc_html_e('LI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_instagram']['url']) ?>"><?php esc_html_e('IN.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_twitter']['url']) ?>"><?php esc_html_e('TW.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_pinterest']['url']) ?>"><?php esc_html_e('PI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_youtube']['url']) ?>"><?php esc_html_e('YT.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_google_plus']['url']) ?>"><?php esc_html_e('GP.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($settings['xoon_banner_two_content_scroll'] == 'yes') : ?>
                    <div class="scroll-down">
                        <a href="#about-style-2">
                            <svg width="22" height="60" viewBox="0 0 22 60" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="21" height="40" rx="10.5" />
                                <path d="M11.5 29C11.5 28.7239 11.2761 28.5 11 28.5C10.7239 28.5 10.5 28.7239 10.5 29L11.5 29ZM10.6464 59.3536C10.8417 59.5488 11.1583 59.5488 11.3536 59.3536L14.5355 56.1716C14.7308 55.9763 14.7308 55.6597 14.5355 55.4645C14.3403 55.2692 14.0237 55.2692 13.8284 55.4645L11 58.2929L8.17157 55.4645C7.97631 55.2692 7.65973 55.2692 7.46447 55.4645C7.26921 55.6597 7.26921 55.9763 7.46447 56.1716L10.6464 59.3536ZM10.5 29L10.5 59L11.5 59L11.5 29L10.5 29Z" />
                                <circle cx="11" cy="11" r="3" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="hero-wrrap banner-pagination-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="swiper banner-pagination-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($data as $item) : ?>
                                        <div class="swiper-slide">
                                            <?php if (!empty($item['xoon_banner_two_items_content_image']['url'])) : ?>
                                                <img src="<?php echo esc_url($item['xoon_banner_two_items_content_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                            <?php endif ?>
                                            <div class="banner-pagination-content">
                                                <?php if (!empty($item['xoon_banner_two_items_content_image_subtitle'])) : ?>
                                                    <span><?php echo esc_html__($item['xoon_banner_two_items_content_image_subtitle'], 'xoon') ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($item['xoon_banner_two_items_content_image_title'])) : ?>
                                                    <h2><?php echo esc_html__($item['xoon_banner_two_items_content_image_title'], 'xoon') ?></h2>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="swiper-pagination swiper-pagination-num"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_two_content_style_select'] == 'style_five') : ?>
            <div class="horo-style-2">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_two_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_facebook']['url']) ?>"><?php esc_html_e('FB.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_linkedin']['url']) ?>"><?php esc_html_e('LI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_instagram']['url']) ?>"><?php esc_html_e('IN.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_twitter']['url']) ?>"><?php esc_html_e('TW.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_pinterest']['url']) ?>"><?php esc_html_e('PI.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_youtube']['url']) ?>"><?php esc_html_e('YT.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_two_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_two_social_link_google_plus']['url']) ?>"><?php esc_html_e('GP.', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <?php if ($settings['xoon_banner_two_content_scroll'] == 'yes') : ?>
                    <div class="scroll-down">
                        <a href="#about-style-2">
                            <svg width="22" height="60" viewBox="0 0 22 60" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="21" height="40" rx="10.5" />
                                <path d="M11.5 29C11.5 28.7239 11.2761 28.5 11 28.5C10.7239 28.5 10.5 28.7239 10.5 29L11.5 29ZM10.6464 59.3536C10.8417 59.5488 11.1583 59.5488 11.3536 59.3536L14.5355 56.1716C14.7308 55.9763 14.7308 55.6597 14.5355 55.4645C14.3403 55.2692 14.0237 55.2692 13.8284 55.4645L11 58.2929L8.17157 55.4645C7.97631 55.2692 7.65973 55.2692 7.46447 55.4645C7.26921 55.6597 7.26921 55.9763 7.46447 56.1716L10.6464 59.3536ZM10.5 29L10.5 59L11.5 59L11.5 29L10.5 29Z" />
                                <circle cx="11" cy="11" r="3" />
                            </svg>
                        </a>
                    </div>
                <?php endif ?>
                <div class="hero-wrrap hero-center-slider-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper banner-center-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($data as $item) : ?>
                                            <div class="swiper-slide">
                                                <div class="banner-center-single">
                                                    <?php if (!empty($item['xoon_banner_two_items_content_image']['url'])) : ?>
                                                        <img src="<?php echo esc_url($item['xoon_banner_two_items_content_image']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                                    <?php endif ?>
                                                    <div class="banner-center-content style-two">
                                                        <?php if (!empty($item['xoon_banner_two_items_content_image_subtitle'])) : ?>
                                                            <span><?php echo esc_html__($item['xoon_banner_two_items_content_image_subtitle'], 'xoon') ?></span>
                                                        <?php endif ?>
                                                        <?php if (!empty($item['xoon_banner_two_items_content_image_title'])) : ?>
                                                            <h2><?php echo esc_html__($item['xoon_banner_two_items_content_image_title'], 'xoon') ?></h2>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_banner_two_Widget());
