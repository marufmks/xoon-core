<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Address_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_address';
    }

    public function get_title()
    {
        return esc_html__('EG Address', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-map-pin';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'xoon_address_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );


        $this->add_control(
            'xoon_address_content_style_select',
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

        $this->add_control(
            'xoon_address_content_heading_title_text',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Me', 'xoon-core'),
                'label_block' => true,
                'condition' => [
                    'xoon_address_content_style_select' => ['style_two',],
                ],

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_address_content_section',
            [
                'label' => esc_html__('Address', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'xoon_address_content_description_text',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'xoon_address_content_icon',
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
            'xoon_address_content_list',
            [
                'label' => esc_html__('Contact List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_address_content_description_text' => esc_html__('2464 Royal Ln 1 Ave Mesa New Jersey USA.', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_address_content_description_text }}}',
            ]
        );

        $this->end_controls_section();

        //Heading Title Style
        $this->start_controls_section(
            'xoon_address_style_heading_title_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_address_content_style_select' => ['style_two',],
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_address_style_heading_title_typography',
                'selector' => '{{WRAPPER}} .contact-me-area .contact-left h3',

            ]
        );
        $this->add_control(
            'xoon_contact_style_heading_title_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .contact-left h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_contact_style_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .contact-left h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Heading Description Style
        $this->start_controls_section(
            'xoon_contact_style_description_section',
            [
                'label' => esc_html__('Description', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_contact_style_description_typography',
                'selector' => '{{WRAPPER}} .contact-us-page .contact-left ul li .content h6,.contact-me-area .contact-left ul li .content h6',

            ]
        );
        $this->add_control(
            'xoon_contact_style_description_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-us-page .contact-left ul li .content h6' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li .content h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_contact_style_description_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-us-page .contact-left ul li .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li .content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Icon Style
        $this->start_controls_section(
            'xoon_contact_style_contact_list_section',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xoon_contact_style_contact_list_icon_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-us-page .contact-left ul li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-us-page .contact-left ul li svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_contact_style_contact_list_icon_background_color',
            [
                'label'     => esc_html__('Background Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-us-page .contact-left ul li .icon' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xoon_contact_style_contact_list_icon_size',
            [
                'label' => esc_html__('Size', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-us-page .contact-left ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-us-page .contact-left ul li svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-me-area .contact-left ul li svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_address_content_list'];
?>

        <?php if ($settings['xoon_address_content_style_select'] == 'style_one') : ?>
            <div class="contact-us-page">
                <div class="contact-left">
                    <ul>
                        <?php foreach ($data as $item) : ?>
                            <li>
                                <div class="icon">
                                    <?php if (!empty($item['xoon_address_content_icon'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon($item['xoon_address_content_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php endif ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty($item['xoon_address_content_description_text'])) : ?>
                                        <h6><?php echo wp_kses($item['xoon_address_content_description_text'], wp_kses_allowed_html('post')) ?></h6>
                                    <?php endif ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_address_content_style_select'] == 'style_two') : ?>
            <div class="contact-me-area">
                <div class="contact-left">
                    <?php if (!empty($settings['xoon_address_content_heading_title_text'])) : ?>
                        <h3><?php echo esc_html__($settings['xoon_address_content_heading_title_text'], 'xoon') ?></h3>
                    <?php endif ?>
                    <ul>
                        <?php foreach ($data as $item) : ?>
                            <li>
                                <div class="icon">
                                    <?php if (!empty($item['xoon_address_content_icon'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon($item['xoon_address_content_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php endif ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty($item['xoon_address_content_description_text'])) : ?>
                                        <h6><?php echo wp_kses($item['xoon_address_content_description_text'], wp_kses_allowed_html('post')) ?></h6>
                                    <?php endif ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Address_Widget());
