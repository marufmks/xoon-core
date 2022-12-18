<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Services_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_services';
    }

    public function get_title()
    {
        return esc_html__('EG Services', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-kit-parts';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'xoon_services_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        $this->add_control(
            'xoon_services_style_selection',
            [
                'label'     => esc_html__('Style', 'xoon-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'      => esc_html__('Style One', 'xoon-core'),
                    'style_two'      => esc_html__('Style Two', 'xoon-core'),
                ],
            ]
        );

        $this->add_control(
            'xoon_services_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'xoon-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 5,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'xoon_services_template_order_by',
            [
                'label'   => esc_html__('Order By', 'xoon-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'xoon-core'),
                    'author'     => esc_html__('Post Author', 'xoon-core'),
                    'title'      => esc_html__('Title', 'xoon-core'),
                    'post_date'  => esc_html__('Date', 'xoon-core'),
                    'rand'       => esc_html__('Random', 'xoon-core'),
                    'menu_order' => esc_html__('Menu Order', 'xoon-core'),
                ],
            ]
        );
        $this->add_control(
            'xoon_services_template_order',
            [
                'label'   => esc_html__('Order', 'xoon-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'xoon-core'),
                    'desc' => esc_html__('Descending', 'xoon-core')
                ],
                'default' => 'asc',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'xoon_service_content_templates_section',
            [
                'label' => esc_html__('Heading', 'xoon-core')
            ]
        );


        $this->add_control(
            'xoon_services_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('What we do?', 'xoon-core'),
                'label_block' => true,
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],
            ]
        );

        $this->add_control(
            'xoon_services_content_main_title',
            [
                'label' => esc_html__('Main Title', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("MY SERVICES", 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_services_content_description',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("We Envision Design & Develop Digital Digital Experience that create possibility in an ever changing world.", 'xoon-core'),
                'label_block' => true,
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_services_button_content_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],
            ]
        );

        $this->add_control(
            'xoon_services_content_button_text',
            [
                'label' => esc_html__('Button Text', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('MORE SERVICES', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_services_content_button_url',
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
            'xoon_services_style_one_sub_title_section',
            [
                'label' => esc_html__('Heading Subtitle', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_services_style_one_sub_title_color',
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
                'name'     => 'xoon_services_style_one_sub_title_typography',
                'selector' => '{{WRAPPER}} .about-style-1 .section-title1 h6',

            ]
        );
        $this->add_responsive_control(
            'xoon_services_style_one_sub_title_margin',
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
            'xoon_services_style_one_main_title_section',
            [
                'label' => esc_html__('Heading Main Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_services_style_one_main_title_bar_color',
            [
                'label'     => esc_html__('Title Top Bar Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title2 h5::after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'xoon_services_style_selection' => ['style_two',],
                ],
            ]
        );
        $this->add_control(
            'xoon_services_style_one_main_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .section-title1 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title2 h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_services_style_one_main_title_typography',
                'selector' => '{{WRAPPER}} .about-style-1 .section-title1 h3,.section-title2 h5',

            ]
        );
        $this->add_responsive_control(
            'xoon_services_style_one_main_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-style-1 .section-title1 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title2 h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_services_style_one_sub_description_section',
            [
                'label' => esc_html__('Heading Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_services_style_one_sub_description_color',
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
                'name'     => 'xoon_services_style_one_sub_description_typography',
                'selector' => '{{WRAPPER}} .about-style-1 .about-content p',

            ]
        );
        $this->add_responsive_control(
            'xoon_services_style_one_sub_description_margin',
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

        //Icon Styling

        $this->start_controls_section(
            'xoon_services_icon_style_section',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_services_icon_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-area .services-content .nav-pills .nav-item .nav-link svg path' => 'fill: {{VALUE}};border-color: {{VALUE}};',
                    '{{WRAPPER}} .service-area2 .service-wrrap .icon svg path' => 'fill: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'xoon_services_icon_style_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-area .services-content .nav-pills .nav-item .nav-link:hover svg path' => 'fill: {{VALUE}};border-color: {{VALUE}};',
                ],
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_services_icon_style_icon_border_color',
            [
                'label'     => esc_html__('Icon Border Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-area .services-content .nav-pills .nav-item .nav-link .icon-service-dot' => 'border:2px dashed {{VALUE}};',
                ],
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_services_icon_style_icon_border_hover_color',
            [
                'label'     => esc_html__('Icon Border Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-area .services-content .nav-pills .nav-item .nav-link:hover .icon-service-dot' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],

            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_services_button_style_section',
            [
                'label' => esc_html__('Button', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_services_style_selection' => ['style_one',],
                ],
            ]
        );

        $this->add_responsive_control(
            'xoon_services_button_style_margin',
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
            'xoon_services_button_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'xoon_services_button_style_text_color',
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
                'name'     => 'xoon_services_button_style_typography',
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
            'xoon_services_button_style_hover_color',
            [
                'label' => esc_html__('Text Color', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2:hover' => 'color: {{VALUE}}',

                ],

            ]
        );
        $this->add_control(
            'xoon_services_button_style_border_and_icon_hover_color',
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

        //Service Title Style Section Start
        $this->start_controls_section(
            'xoon_services_style_two_service_title_section',
            [
                'label' => esc_html__('Service Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_services_style_selection' => ['style_two',],
                ],

            ]
        );
        $this->add_control(
            'xoon_services_style_two_service_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-area2 .service-wrrap .secvice-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_services_style_two_service_title_typography',
                'selector' => '{{WRAPPER}} .service-area2 .service-wrrap .secvice-content h3 a',

            ]
        );
        $this->add_responsive_control(
            'xoon_services_style_two_service_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service-area2 .service-wrrap .secvice-content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Service Description Style Section Start
        $this->start_controls_section(
            'xoon_services_style_two_service_description_section',
            [
                'label' => esc_html__('Service Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_services_style_selection' => ['style_two',],
                ],

            ]
        );
        $this->add_control(
            'xoon_services_style_two_service_description_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-area2 .service-wrrap .secvice-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_services_style_two_service_description_typography',
                'selector' => '{{WRAPPER}} .service-area2 .service-wrrap .secvice-content p',

            ]
        );
        $this->add_responsive_control(
            'xoon_services_style_two_service_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service-area2 .service-wrrap .secvice-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $query = new \WP_Query(
            array(
                'post_type'      => 'xoon-service',
                'posts_per_page' => $settings['xoon_services_posts_per_page'],
                'orderby'        => $settings['xoon_services_template_order_by'],
                'order'          => $settings['xoon_services_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );
?>
        <?php if (is_admin()) : ?>
            <script>
                // Services slider
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
            </script>
        <?php endif ?>

        <?php if ($settings['xoon_services_style_selection'] == 'style_one') : ?>
            <div class="services-area mb-120">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0">
                            <div class="services-border">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="services-content">
                                            <div class="section-title1 mb--40">
                                                <?php if (!empty($settings['xoon_services_content_subtitle'])) : ?>
                                                    <span><?php echo esc_html__($settings['xoon_services_content_subtitle'], 'xoon') ?></span>
                                                <?php endif ?>
                                                <?php if (!empty($settings['xoon_services_content_main_title'])) : ?>
                                                    <h2><?php echo esc_html__($settings['xoon_services_content_main_title'], 'xoon') ?></h2>
                                                <?php endif ?>
                                                <?php if (!empty($settings['xoon_services_content_description'])) : ?>
                                                    <p><?php echo wp_kses($settings['xoon_services_content_description'], wp_kses_allowed_html('post')) ?></p>
                                                <?php endif ?>
                                            </div>
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <?php
                                                if ($query->have_posts()) {
                                                    $index = 1;
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                        $postId = get_the_ID();
                                                        $slug = basename(get_permalink($postId));
                                                ?>
                                                        <?php if ($index <= 5) { ?>

                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link services-items <?php echo ($index == 1) ? "active" : ""; ?>" id="pills-<?php echo esc_attr($slug) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr($slug) ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr($slug) ?>" aria-selected="true">
                                                                    <div class="icon-service-dot">
                                                                    <?php
                                                                        $service_svg_icon = get_post_meta(get_the_ID(), 'xoon_service_icon', true);

                                                                        if (!empty($service_svg_icon['svg_icon']['url'])) {
                                                                            echo file_get_contents($service_svg_icon['svg_icon']['url']);
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                    <?php the_title(); ?>
                                                                </button>
                                                            </li>
                                                        <?php } ?>




                                                <?php
                                                        $index++;
                                                    }
                                                }
                                                wp_reset_postdata();
                                                ?>
                                                <li class="nav-item" role="presentation">
                                                    <a class="primary-btn2" href="<?php echo esc_url($settings['xoon_services_content_button_url']['url']) ?>">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_126_82)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 0.000100587C11.6326 0.000100581 11.7598 0.0527787 11.8536 0.146547C11.9473 0.240315 12 0.367492 12 0.500101L12 6.5001C12 6.63271 11.9473 6.75989 11.8536 6.85365C11.7598 6.94742 11.6326 7.0001 11.5 7.0001C11.3674 7.0001 11.2402 6.94742 11.1465 6.85365C11.0527 6.75989 11 6.63271 11 6.5001L11 1.7071L0.854021 11.8541C0.807533 11.9006 0.752344 11.9375 0.691605 11.9626C0.630865 11.9878 0.565765 12.0007 0.500021 12.0007C0.434277 12.0007 0.369177 11.9878 0.308438 11.9626C0.247698 11.9375 0.192509 11.9006 0.146021 11.8541C0.0995332 11.8076 0.0626571 11.7524 0.037498 11.6917C0.0123389 11.6309 -0.000610371 11.5658 -0.000610373 11.5001C-0.000610376 11.4344 0.0123389 11.3693 0.037498 11.3085C0.0626571 11.2478 0.0995332 11.1926 0.146021 11.1461L10.293 1.0001L5.50002 1.0001C5.36741 1.0001 5.24024 0.947423 5.14647 0.853655C5.0527 0.759887 5.00002 0.632709 5.00002 0.500101C5.00002 0.367492 5.0527 0.240315 5.14647 0.146547C5.24024 0.052779 5.36741 0.000100855 5.50002 0.000100849L11.5 0.000100587Z" />
                                                            </g>
                                                        </svg>
                                                        <?php if (!empty($settings['xoon_services_content_button_text'])) : ?>
                                                            <?php echo esc_html__($settings['xoon_services_content_button_text'], 'xoon') ?></a>
                                                <?php endif ?>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class=" col-lg-5 col-md-8 col-sm-10">
                                        <div class="tab-content" id="pills-tabContent">
                                            <?php
                                            if ($query->have_posts()) {
                                                $index = 1;
                                                while ($query->have_posts()) {
                                                    $query->the_post();
                                                    $postId = get_the_ID();
                                                    $slug = basename(get_permalink($postId));
                                                    $get_gallery_image = egens_core()->get_custom_meta_value(get_the_ID(), 'xoon_service_gallery', 'gallery_images');
                                                    $makeImageIdToArray = explode(',', $get_gallery_image);

                                            ?>

                                                    <div class="tab-pane fade <?php echo ($index == 1) ? "show active" : ""; ?>" id="pills-<?php echo esc_attr($slug) ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($slug) ?>-tab">
                                                        <div class="swiper services-slider">
                                                            <div class="swiper-wrapper">
                                                                <?php foreach ($makeImageIdToArray as $gallery_img) : ?>
                                                                    <div class="swiper-slide">
                                                                        <div class="magnetic-wrap">
                                                                            <a class=" magnetic-item" href="<?php the_permalink(); ?>">
                                                                                <img class="img-fluid anim-image-parallax tt-lazy" data-cursor="View<br>Services" src="<?php echo wp_get_attachment_image_url($gallery_img, $size = 'full') ?>" alt="<?php echo esc_attr__('service-image', 'xoon') ?>">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach ?>
                                                            </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                    </div>
                                            <?php
                                                    $index++;
                                                }
                                            }
                                            wp_reset_postdata();
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_services_style_selection'] == 'style_two') : ?>
            <div class="service-area2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title2">
                                <?php if (!empty($settings['xoon_services_content_main_title'])) : ?>
                                    <h5><?php echo esc_html__($settings['xoon_services_content_main_title'], 'xoon') ?></h5>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-5">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="service-wrrap">
                                        <div class="icon">
                                            <?php
                                            $service_svg_icon = get_post_meta(get_the_ID(), 'xoon_service_icon', true);

                                            if (!empty($service_svg_icon['svg_icon']['url'])) {
                                                echo file_get_contents($service_svg_icon['svg_icon']['url']);
                                            }
                                            ?>
                                        </div>
                                        <div class="secvice-content">
                                            <h3><a data-cursor="View<br>Details" href="<?php the_permalink(); ?>" class="not-hide-cursor"><?php the_title(); ?></a>
                                            </h3>
                                            <p><?php echo wp_trim_words( get_the_content(), 15, '...' );; ?></p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Services_Widget());
