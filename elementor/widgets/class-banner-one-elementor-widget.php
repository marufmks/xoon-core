<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Banner_One_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_banner_one';
    }

    public function get_title()
    {
        return esc_html__('EG Banner Personal', 'xoon-core');
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
            'xoon_banner_one_content_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );


        $this->add_control(
            'xoon_banner_one_content_style_select',
            [
                'label'     => esc_html__('Select Style', 'xoon-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__('HOME', 'xoon-core'),
                    'style_four'        => esc_html__('HOME VIDEO', 'xoon-core'),
                    'style_two'        => esc_html__('HOME SHOWCASE', 'xoon-core'),
                    'style_three'        => esc_html__('HOME FULLSCREEN', 'xoon-core'),
                    'style_five'        => esc_html__('HOME PORTFOLIO', 'xoon-core'),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_water_mark',
            [
                'label' => esc_html__('Water Mark Text', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('xoon', 'xoon-core'),
                'label_block' => true,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_two',],
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_one_content_video_section',
            [
                'label' => esc_html__('Banner Video Content', 'xoon-core'),
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_four',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_video',
            [
                'label' => esc_html__('Choose Video', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => array('video'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_items_content_video_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,


            ]
        );

        $this->add_control(
            'xoon_banner_one_items_content_video_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Wedding Photography', 'xoon-core'),
                'label_block' => true,

            ]
        );



        $this->end_controls_section();
        //Content Section
        $this->start_controls_section(
            'xoon_banner_one_content_photographer_section',
            [
                'label' => esc_html__('Photographer Section', 'xoon-core'),
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_photographer_image',
            [
                'label' => esc_html__('Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_photographer_name',
            [
                'label' => esc_html__('Name', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('LOUISA JACOBSON', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_banner_one_content_photographer_designation',
            [
                'label' => esc_html__('Designation', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Professional Photographer', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();

        //social icon
        $this->start_controls_section(
            'xoon_banner_one_content_social_icon_section',
            [
                'label' => esc_html__('Social Icon Link', 'xoon-core'),
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one', 'style_two'],
                ],

            ]
        );

        //facebook Link
        $this->add_control(
            'xoon_banner_one_social_link_facebook',
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
            'xoon_banner_one_social_link_instagram',
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
            'xoon_banner_one_social_link_linkedin',
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
            'xoon_banner_one_social_link_twitter',
            [
                'label' => esc_html__('Twitter Link', 'xoon-core'),
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
        //pinterest Link
        $this->add_control(
            'xoon_banner_one_social_link_pinterest',
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
            'xoon_banner_one_social_link_youtube',
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
            'xoon_banner_one_social_link_google_plus',
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
            'xoon_banner_one_items_content_section_one',
            [
                'label' => esc_html__('Banner Slider Items', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one',],
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'xoon_banner_one_items_content_image_title_one',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,


            ]
        );

        $repeater->add_control(
            'xoon_banner_one_items_content_image_one',
            [
                'label' => esc_html__('Choose Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_list_one',
            [
                'label' => esc_html__('Slider Image List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_banner_one_items_content_image_title_one' => esc_html__('Wedding', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_banner_one_items_content_image_title_one' => esc_html__('Photography', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_banner_one_items_content_image_title_one }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'xoon_banner_one_items_content_section_two',
            [
                'label' => esc_html__('Banner Slider Items', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_two',],
                ],
            ]
        );
        $repeater2 = new \Elementor\Repeater();


        $repeater2->add_control(
            'xoon_banner_one_items_content_image_title_two',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,


            ]
        );

        $repeater2->add_control(
            'xoon_banner_one_items_content_image_two',
            [
                'label' => esc_html__('Choose Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_list_two',
            [
                'label' => esc_html__('Slider Image List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'xoon_banner_one_items_content_image_title_two' => esc_html__('Wedding Photography', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_banner_one_items_content_image_title_two' => esc_html__('Personal Photography', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_banner_one_items_content_image_title_two }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_banner_one_items_content_section_three',
            [
                'label' => esc_html__('Banner Slider Items', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_three',],
                ],
            ]
        );
        $repeater3 = new \Elementor\Repeater();


        $repeater3->add_control(
            'xoon_banner_one_items_content_heading_title_three',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('XOON PHOTOGRAPHY', 'xoon-core'),
                'label_block' => true,


            ]
        );

        $repeater3->add_control(
            'xoon_banner_one_items_content_image_title_three',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Wedding Photography', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $repeater3->add_control(
            'xoon_banner_one_items_content_image_three',
            [
                'label' => esc_html__('Choose Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_content_list_three',
            [
                'label' => esc_html__('Slider Image List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'xoon_banner_one_items_content_heading_title_three' => esc_html__('XOON PHOTOGRAPHY ', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                    [
                        'xoon_banner_one_items_content_heading_title_three' => esc_html__('XOON PHOTOGRAPHY ', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_banner_one_items_content_heading_title_three }}}',
            ]
        );

        $this->end_controls_section();

        //styling starts here
        //Photographer name Style
        $this->start_controls_section(
            'xoon_banner_one_photographer_name_section',
            [
                'label' => esc_html__('Photographer Name', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_banner_one_photographer_name_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-right-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_one_photographer_name_typography',
                'selector' => '{{WRAPPER}} .horo-style-1 .banner-right-content h1',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_one_photographer_name_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-right-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Photographer Designation Style
        $this->start_controls_section(
            'xoon_banner_one_photographer_designation_section',
            [
                'label' => esc_html__('Photographer Designation', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_banner_one_photographer_designation_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-right-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_one_photographer_designation_typography',
                'selector' => '{{WRAPPER}} .horo-style-1 .banner-right-content h5',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_one_photographer_designation_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-right-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Photographer Designation Style
        $this->start_controls_section(
            'xoon_banner_one_image_heading_section',
            [
                'label' => esc_html__('Slider Image Subtitle', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_three', 'style_four'],
                ],

            ]
        );
        $this->add_control(
            'xoon_banner_one_image_heading_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-pagination-content.style-two span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-pagination-content.style-two span::after' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_one_image_heading_typography',
                'selector' => '{{WRAPPER}} .banner-pagination-content span',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_one_image_heading_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner-pagination-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //SLider Image Style
        $this->start_controls_section(
            'xoon_banner_one_image_title_section',
            [
                'label' => esc_html__('Slider Image Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_banner_one_image_title_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-slider .banner-slider1 .swiper-slide .slider-cetagory h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .bk-slider .banner-img-overlay h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-pagination-content h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfilio-img-overlay h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_one_image_title_typography',
                'selector' => '{{WRAPPER}} .horo-style-1 .banner-slider .banner-slider1 .swiper-slide .slider-cetagory h4,
                .bk-slider .banner-img-overlay h2,.banner-pagination-content h2,.portfilio-img-overlay h2',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_one_image_title_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-slider .banner-slider1 .swiper-slide .slider-cetagory h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .bk-slider .banner-img-overlay h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-pagination-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .portfilio-img-overlay h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Icon Style
        $this->start_controls_section(
            'xoon_contact_style_pagination_section',
            [
                'label' => esc_html__('Slider Pagination', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one', 'style_two', 'style_three'],
                ],
            ]
        );

        $this->add_control(
            'xoon_contact_style_pagination_icon_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .banner-slider .swiper-pagination-bullet' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .horo-style-1 .banner-slider .swiper-pagination-bullet-active::after' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .bk-slider .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .slider-arrows .swiper-next-arrow svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .slider-arrows .swiper-next-arrow' => 'border:1px solid {{VALUE}};',
                    '{{WRAPPER}} .slider-arrows .swiper-prev-arrow svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .slider-arrows .swiper-prev-arrow' => 'border:1px solid {{VALUE}};',

                ],

            ]
        );
        $this->add_control(
            'xoon_contact_style_pagination_icon_background_color',
            [
                'label'     => esc_html__('Background Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bk-slider .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background: {{VALUE}};',

                ],
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_two',],
                ],
            ]
        );


        $this->end_controls_section();
        //Icon Style
        $this->start_controls_section(
            'xoon_banner_one_style_social_icon_section',
            [
                'label' => esc_html__('Social Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_banner_one_content_style_select' => ['style_one', 'style_two',],
                ],
            ]
        );

        $this->add_control(
            'xoon_banner_one_style_social_icon_icon_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .social-area ul li a' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'xoon_banner_one_style_social_icon_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .social-area ul li a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'xoon_banner_one_style_social_icon_icon_topbar_color',
            [
                'label'     => esc_html__('Icon Topbar Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .horo-style-1 .social-area ul li a::after' => 'background-color: {{VALUE}};',

                ],
            ]
        );



        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data_one = $settings['xoon_banner_one_content_list_one'];
        $data_two = $settings['xoon_banner_one_content_list_two'];
        $data_three = $settings['xoon_banner_one_content_list_three'];

?>
        <?php if (is_admin()) : ?>
            <script>
                // Home One Banner Slider
                var swiper = new Swiper(".banner-slider1", {
                    spaceBetween: 20,
                    loop: true,
                    slidesPerView: 2,
                    speed: 2000,
                    autoplay: {
                        delay: 1500,
                    },
                    keyboard: {
                        enabled: true
                    },
                    pagination: {
                        el: ".swiper-pagination-h",
                        clickable: true,
                        renderBullet: function(index, className) {
                            return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
                        }
                    },
                });
                // personal center mode slider
                var swiper = new Swiper('.personal-center-banner', {
                    slidesPerView: 3,
                    centeredSlides: true,
                    loop: true,
                    speed: 1000,
                    spaceBetween: 30,
                    // autoplay: true,
                    mousewheel: {
                        enabled: true,
                        sensitivity: 5.5,
                    },
                    pagination: {
                        el: '.swiper-center-pagination',
                        clickable: true,
                        renderBullet: function(index, className) {
                            return '<span class="' + className + '">' + (index + 1) + '</span>';
                        },
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
                            slidesPerView: 2,
                            navigation: false,
                        },
                        768: {
                            slidesPerView: 2,
                            navigation: false,
                        },
                        1200: {
                            slidesPerView: 2,
                            navigation: false,
                        },
                        1400: {
                            slidesPerView: 3,
                            navigation: false,
                        }
                    }
                });
                // banner-fullscreen-slider
                var mySwiper = new Swiper('.banner-fullscreen-slider', {
                    loop: true,
                    speed: 1000,
                    slidesPerView: 1,
                    // autoplay:true,
                    effect: 'fade',
                    navigation: {
                        nextEl: ".banner-full-prev1",
                        prevEl: ".banner-full-next1",
                    },
                    fadeEffect: {
                        crossFade: true,
                    },
                })
            </script>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_one_content_style_select'] == 'style_one') : ?>
            <div class="horo-style-1">
                <div class="social-area">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_one_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_facebook']['url']) ?>"><?php esc_html_e('FACEBOOK', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_instagram']['url']) ?>"><?php esc_html_e('INSTAGRAM', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_linkedin']['url']) ?>"><?php esc_html_e('LINKED IN', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_twitter']['url']) ?>"><?php esc_html_e('TWITTER', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_pinterest']['url']) ?>"><?php esc_html_e('PINTEREST', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_youtube']['url']) ?>"><?php esc_html_e('YOUTUBE', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_google_plus']['url']) ?>"><?php esc_html_e('GOOGLE PLUS', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="banner-left-img">
                                <?php if (!empty($settings['xoon_banner_one_content_photographer_image']['url'])) : ?>
                                    <img class="img-fluid " src="<?php echo esc_url($settings['xoon_banner_one_content_photographer_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-slider">
                                <div class="swiper banner-slider1">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($data_one as $item) : ?>
                                            <div class="swiper-slide">
                                                <div class="slider-cetagory">
                                                    <?php if (!empty($item['xoon_banner_one_items_content_image_title_one'])) : ?>
                                                        <h4><?php echo esc_html__($item['xoon_banner_one_items_content_image_title_one'], 'xoon') ?></h4>
                                                    <?php endif ?>
                                                </div>
                                                <?php if (!empty($item['xoon_banner_one_items_content_image_one']['url'])) : ?>
                                                    <img class="img-fluid" src="<?php echo esc_url($item['xoon_banner_one_items_content_image_one']['url']) ?>" alt="<?php echo esc_attr__('slider-image', 'xoon') ?>">
                                                <?php endif ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination swiper-pagination-h"></div>
                                </div>
                            </div>
                            <div class="banner-right-content">
                                <?php if (!empty($settings['xoon_banner_one_content_photographer_name'])) : ?>
                                    <h1><?php echo esc_html__($settings['xoon_banner_one_content_photographer_name'], 'xoon') ?></h1>
                                <?php endif ?>
                                <?php if (!empty($settings['xoon_banner_one_content_photographer_designation'])) : ?>
                                    <h5><?php echo esc_html__($settings['xoon_banner_one_content_photographer_designation'], 'xoon') ?></h5>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_one_content_style_select'] == 'style_two') : ?>
            <div class="horo-style-1 overflow-hidden">
                <div class="warter-mark">
                    <?php if (!empty($settings['xoon_banner_one_content_water_mark'])) : ?>
                        <h2><?php echo esc_html__($settings['xoon_banner_one_content_water_mark'], 'xoon') ?></h2>
                    <?php endif ?>
                </div>
                <div class="social-area sytle-two">
                    <ul>
                        <?php if (!empty($settings['xoon_banner_one_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_facebook']['url']) ?>"><?php esc_html_e('FACEBOOK', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_instagram']['url']) ?>"><?php esc_html_e('INSTAGRAM', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_linkedin']['url']) ?>"><?php esc_html_e('LINKED IN', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_twitter']['url']) ?>"><?php esc_html_e('TWITTER', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_pinterest']['url']) ?>"><?php esc_html_e('PINTEREST', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_youtube']['url']) ?>"><?php esc_html_e('YOUTUBE', 'xoon-core') ?></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_social_link_google_plus']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_banner_one_social_link_google_plus']['url']) ?>"><?php esc_html_e('GOOGLE PLUS', 'xoon-core') ?></a></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="bk-slider">
                                <div class="swiper personal-center-banner">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($data_two as $item) : ?>
                                            <div class="swiper-slide magnetic-wrap">
                                                <div class="magnetic-item">
                                                    <?php if (!empty($item['xoon_banner_one_items_content_image_two']['url'])) : ?>
                                                        <img class="img-fluid" src="<?php echo esc_url($item['xoon_banner_one_items_content_image_two']['url']) ?>" alt="<?php echo esc_attr('slider-image') ?>">
                                                    <?php endif ?>
                                                    <div class="banner-img-overlay">
                                                        <?php if (!empty($item['xoon_banner_one_items_content_image_title_two'])) : ?>
                                                            <h2><?php echo esc_html__($item['xoon_banner_one_items_content_image_title_two'], 'xoon') ?></h2>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="swiper-center-pagination d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_one_content_style_select'] == 'style_three') : ?>
            <div class="banner-fullscreen-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="swiper banner-fullscreen-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($data_three as $item) : ?>
                                    <div class="swiper-slide">
                                        <?php if (!empty($item['xoon_banner_one_items_content_image_three']['url'])) : ?>
                                            <img class="img-fluid" src="<?php echo esc_url($item['xoon_banner_one_items_content_image_three']['url']) ?>" alt="<?php echo esc_attr__('slider-image', 'xoon') ?>">
                                        <?php endif ?>
                                        <div class="banner-pagination-content style-two">
                                            <?php if (!empty($item['xoon_banner_one_items_content_heading_title_three'])) : ?>
                                                <span><?php echo esc_html__($item['xoon_banner_one_items_content_heading_title_three'], 'xoon') ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($item['xoon_banner_one_items_content_image_title_three'])) : ?>
                                                <h2><?php echo esc_html__($item['xoon_banner_one_items_content_image_title_three'], 'xoon') ?></h2>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="slider-arrows fullscreen-arrows d-flex flex-row flex-wrap justify-content-between align-items-center gap-5">
                                <div class="banner-full-prev1 swiper-prev-arrow " tabindex="0" role="button" aria-label="Previous slide">
                                    <svg width="32" height="8" viewBox="0 0 32 8" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M31 3.5C31.2761 3.5 31.5 3.72386 31.5 4C31.5 4.27614 31.2761 4.5 31 4.5V3.5ZM0.646444 4.35355C0.451183 4.15829 0.451183 3.84171 0.646444 3.64645L3.82842 0.464466C4.02369 0.269204 4.34027 0.269204 4.53553 0.464466C4.73079 0.659728 4.73079 0.976311 4.53553 1.17157L1.70711 4L4.53553 6.82843C4.73079 7.02369 4.73079 7.34027 4.53553 7.53553C4.34027 7.7308 4.02369 7.7308 3.82842 7.53553L0.646444 4.35355ZM31 4.5L0.999998 4.5V3.5L31 3.5V4.5Z" />
                                    </svg>
                                </div>
                                <div class="banner-full-next1 swiper-next-arrow " tabindex="0" role="button" aria-label="Next slide">
                                    <svg width="32" height="8" viewBox="0 0 32 8" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5V3.5ZM31.3536 4.35355C31.5488 4.15829 31.5488 3.84171 31.3536 3.64645L28.1716 0.464466C27.9763 0.269204 27.6597 0.269204 27.4645 0.464466C27.2692 0.659728 27.2692 0.976311 27.4645 1.17157L30.2929 4L27.4645 6.82843C27.2692 7.02369 27.2692 7.34027 27.4645 7.53553C27.6597 7.7308 27.9763 7.7308 28.1716 7.53553L31.3536 4.35355ZM1 4.5L31 4.5V3.5L1 3.5V4.5Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_one_content_style_select'] == 'style_four') : ?>
            <div class="horo-style-2 px-0">
                <div class="hero-wrrap">
                    <div class="video-wraper">
                        <?php if (!empty($settings['xoon_banner_one_content_video']['url'])) : ?>
                            <video autoplay loop="loop" muted preload="auto">
                                <source src="<?php echo esc_url($settings['xoon_banner_one_content_video']['url']) ?>" type="video/mp4">
                            </video>
                        <?php endif ?>
                    </div>
                    <div class="banner-pagination-content style-two mb-5">
                        <?php if (!empty($settings['xoon_banner_one_items_content_video_subtitle'])) : ?>
                            <span><?php echo esc_html__($settings['xoon_banner_one_items_content_video_subtitle'], 'xoon') ?></span>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_banner_one_items_content_video_title'])) : ?>
                            <h2><?php echo esc_html__($settings['xoon_banner_one_items_content_video_title'], 'xoon') ?></h2>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_banner_one_content_style_select'] == 'style_five') : ?>
            <div class="portfolio-banner position-relative">
                <div class="container-fluid">
                    <!-- tab-start -->
                    <div class="profile-tab-buttons">
                        <i class="bi bi-filter"></i>
                        <ul class="nav nav-pills mb-3 d-flex flex-column" id="pills-tab" role="tablist">
                            <?php $portfolio_cat = get_terms('xoon-portfolio-category'); ?>
                            <?php foreach ($portfolio_cat as $key => $cat) : ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo ($key == 0) ? "active" : ""; ?>" id="pills-<?php echo $cat->slug ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $cat->slug ?>" type="button" role="tab" aria-controls="pills-<?php echo $cat->slug ?>" aria-selected="true"><?php echo $cat->name ?></button>
                                </li>
                            <?php $key++;
                            endforeach; ?>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">

                        <?php foreach ($portfolio_cat as $key => $value) : ?>
                            <div class="tab-pane fade <?php echo ($key == 0) ? "show active" : ""; ?>" id="pills-<?php echo $value->slug ?>" role="tabpanel" aria-labelledby="pills-<?php echo $value->slug ?>-tab">
                                <div class="row g-4 justify-content-center">

                                    <?php
                                    $portfolio_cat = get_posts(
                                        array(
                                            'showposts' => 9, //add -1 if you want to show all posts
                                            'post_type' => 'xoon-portfolio',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'xoon-portfolio-category',
                                                    'field' => 'slug',
                                                    'terms' => $value->slug //pass your term name here
                                                )
                                            )
                                        )
                                    );
                                    ?>
                                    <?php foreach ($portfolio_cat as $items) : ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="magnetic-wrap">
                                                <div class="portfolio-banner-item magnetic-item">
                                                    <?php echo get_the_post_thumbnail($items->ID) ?>
                                                    <div class="portfilio-img-overlay">
                                                        <h2><a data-cursor="View<br>Details" class="not-hide-cursor" href="<?php the_permalink($items->ID) ?>"><?php echo esc_html($items->post_title) ?></a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach ?>

                                </div>
                            </div>
                        <?php $key++;
                        endforeach ?>
                    </div>
                    <!-- tab-end -->
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Banner_One_Widget());
