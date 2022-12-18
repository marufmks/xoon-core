<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class xoon_Heading_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_heading';
    }

    public function get_title()
    {
        return esc_html__('EG Heading', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'xoon_heading_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        $this->add_control(
            'xoon_heading_style_selection',
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


        $this->add_responsive_control(
            'xoon_heading_content_text_align',
            [
                'label'         => esc_html__('Text Align', 'xoon-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'left'         => [
                        'title' => esc_html__('Left', 'xoon-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'xoon-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'xoon-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                    'justify'     => [
                        'title' => esc_html__('Justified', 'xoon-core'),
                        'icon'     => 'eicon-text-align-justify',
                    ],
                ],
                'default'         => 'center',
                'selectors'     => [
                    '{{WRAPPER}} .section-title1' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .section-title3' => 'text-align: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'xoon_heading_content_title_section_one',
            [
                'label' => esc_html__('Heading', 'xoon-core'),
                'condition' => [
                    'xoon_heading_style_selection' => ['style_one',],
                ],

            ]
        );
        $this->add_control(
            'xoon_heading_content_title_one',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is heading title', 'xoon-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'xoon_heading_content_description_one',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is heading description', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'xoon_heading_content_title_section_two',
            [
                'label' => esc_html__('Heading', 'xoon-core'),
                'condition' => [
                    'xoon_heading_style_selection' => ['style_two',],
                ],

            ]
        );
        $this->add_control(
            'xoon_heading_content_title_two',
            [
                'label' => esc_html__('Subtitle', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is heading subtitle', 'xoon-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'xoon_heading_content_description_two',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is heading main title', 'xoon-core'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();


        //Style Section Start
        //Sub Title Style Section Start
        $this->start_controls_section(
            'xoon_heading_style_one_sub_title_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_heading_style_title_bar_color',
            [
                'label'     => esc_html__('Heading Top Bar Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title3::after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'xoon_heading_style_selection' => ['style_two',],
                ],
            ]
        );
        $this->add_control(
            'xoon_heading_style_one_sub_title_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_heading_style_one_sub_title_typography',
                'selector' => '{{WRAPPER}} .section-title1 h2,.section-title3 span',

            ]
        );
        $this->add_responsive_control(
            'xoon_heading_style_one_sub_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_heading_style_one_sub_description_section',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'xoon_heading_style_one_sub_description_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title1 p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_heading_style_one_sub_description_typography',
                'selector' => '{{WRAPPER}} .section-title1 p,.section-title3 h2',

            ]
        );
        $this->add_responsive_control(
            'xoon_heading_style_one_sub_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title1 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title3 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <?php if ($settings['xoon_heading_style_selection'] == 'style_one') : ?>
            <div class="section-title1">
                <?php if (!empty($settings['xoon_heading_content_title_one'])) : ?>
                    <h2><?php echo esc_html__($settings['xoon_heading_content_title_one'], 'xoon') ?></h2>
                <?php endif ?>
                <?php if (!empty($settings['xoon_heading_content_description_one'])) : ?>
                    <p><?php echo wp_kses($settings['xoon_heading_content_description_one'], wp_kses_allowed_html('post')) ?></p>
                <?php endif ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_heading_style_selection'] == 'style_two') : ?>
            <div class="section-title3">
                <?php if (!empty($settings['xoon_heading_content_title_two'])) : ?>
                    <span><?php echo esc_html__($settings['xoon_heading_content_title_two'], 'xoon') ?></span>
                <?php endif ?>
                <?php if (!empty($settings['xoon_heading_content_description_two'])) : ?>
                    <h2><?php echo wp_kses($settings['xoon_heading_content_description_two'], wp_kses_allowed_html('post')) ?></h2>
                <?php endif ?>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new xoon_Heading_Widget());
