<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
} //Exit if accessed directly

use Elementor\Core\Schemes;

class xoon_accordion_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_accordion';
    }

    public function get_title()
    {
        return esc_html__('EG Accordion', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-help';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {

        //-------------Content-------------------//
        //accordion Section

        $this->start_controls_section(
            'xoon_section_content_accordion',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();
        // accordion title
        $repeater->add_control(
            'xoon_section_content_accordion_title',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('What is your philosophy regarding photography?', 'xoon-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'xoon_section_content_accordion_description',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__('Lorem ipsum dolor sit amet, an simul salutandi efficiantur mel. Eum at dicant reprehendunt, in tritani mediocrem duo, eam ne lorem accusam explicari. Ut impedit molestie vix, sit at affert congue', 'xoon-core'),
                'placeholder' => esc_html__('Type your description here', 'xoon-core'),
            ]
        );

        $repeater->add_control(
            'xoon_section_content_accordion_icon',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->add_control(
            'xoon_accordion_section_list',
            [
                'label' => esc_html__('Accordion List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_section_content_accordion_title' => esc_html__('What is your philosophy regarding photography?', 'xoon-core'),
                    ],


                ],
                'title_field' => '{{{ xoon_section_content_accordion_title }}}',
            ]
        );

        $this->end_controls_section();

        //---------------Style----------------------//

        //title style
        $this->start_controls_section(
            'xoon_accordion_title_style_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xoon_accordion_title_text_color',
            [
                'label' => esc_html__('Color', 'xoon-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'xoon_accordion_title_typography',
                'selector' => '{{WRAPPER}} .faq-page .faq-wrap .faq-item .accordion-button',
            ]
        );

        $this->add_responsive_control(
            'xoon_accordion_title_style_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //description style

        $this->start_controls_section(
            'xoon_accordion_description_style_section',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xoon_accordion_description_text_color',
            [
                'label' => esc_html__('Color', 'xoon-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .faq-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'xoon_accordion_description_typography',
                'selector' => '{{WRAPPER}} .faq-page .faq-wrap .faq-item .faq-body',
            ]
        );

        $this->add_responsive_control(
            'xoon_accordion_description_style_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .faq-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //description style

        $this->start_controls_section(
            'xoon_accordion_button_icon_style_section',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xoon_accordion_button_icon_color',
            [
                'label' => esc_html__('Icon Color', 'xoon-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .accordion-button svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xoon_accordion_button_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'xoon-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .accordion-button:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xoon_accordion_section_svg_size',
            [
                'label' => esc_html__('SVG Size', 'xoon-core'),
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
                    '{{WRAPPER}} .faq-page .faq-wrap .faq-item .accordion-button svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $accordionlists = $settings['xoon_accordion_section_list'];
?>

        <div class="faq-page">
            <div class="faq-wrap">
                <?php if (!empty($accordionlists)) :   ?>
                    <?php foreach ($accordionlists as $key => $item) : ?>
                        <div class="faq-item">
                            <h5 id="heading<?php echo $key; ?>" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-controls="collapse<?php echo $key; ?>" aria-expanded="true">
                                <?php if (!empty($item['xoon_section_content_accordion_icon'])) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon($item['xoon_section_content_accordion_icon'], ['aria-hidden' => 'true']); ?>
                                <?php endif ?>
                                <?php if (!empty($item['xoon_section_content_accordion_title'])) : ?>
                                    <?php echo esc_html__($item['xoon_section_content_accordion_title'], 'xoon') ?>
                                <?php endif ?>
                            </h5>
                            <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key; ?>">
                                <div class="faq-body">
                                    <?php if (!empty($item['xoon_section_content_accordion_description'])) : ?>
                                        <?php echo wp_kses($item['xoon_section_content_accordion_description'], wp_kses_allowed_html('post')) ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif ?>
            </div>
        </div>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new xoon_accordion_Widget());
