<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class xoon_Button_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_button';
    }

    public function get_title()
    {
        return esc_html__('EG Button', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-button';
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
            'xoon_button_style_selection',
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
            'xoon_button_icon_display',
            [
                'label' => esc_html__('Button Icon', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xoon-core'),
                'label_off' => esc_html__('Hide', 'xoon-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'xoon_button_style_selection' => ['style_one',],
                ],


            ]
        );
        $this->add_responsive_control(
            'xoon_button_content_button_align',
            [
                'label'         => esc_html__('Button Align', 'xoon-core'),
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
                    '{{WRAPPER}} .textalign' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .see-more-btn' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'xoon_button_content_section',
            [
                'label' => esc_html__('Button', 'xoon-core')
            ]
        );

        $this->add_control(
            'xoon_button_content_button_text',
            [
                'label' => esc_html__('Button Text', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_button_content_button_url',
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
        // End Content section
        //Button Style
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
                    '{{WRAPPER}} .see-more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'xoon_button_style_icon_color_one',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'xoon_button_style_selection' => ['style_one',],
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
                    '{{WRAPPER}} .see-more-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_button_style_border_color',
            [
                'label'     => esc_html__('Border Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6' => 'border: 1px solid {{VALUE}};',
                ],
                'condition' => [
                    'xoon_button_style_selection' => ['style_two',],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_button_style_typography',
                'selector' => '{{WRAPPER}} .primary-btn2,.primary-btn6 ',


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
                    '{{WRAPPER}} .button-hover-one:hover' => 'color: {{VALUE}} !important',

                ],

            ]
        );
        $this->add_control(
            'xoon_button_style_background_hover_color',
            [
                'label' => esc_html__('Background Hover Color', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-hover-one::before' => 'background-color: {{VALUE}}',

                ],
                'condition' => [
                    'xoon_button_style_selection' => ['style_two',],
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
                'condition' => [
                    'xoon_button_style_selection' => ['style_one',],
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

        <?php if ($settings['xoon_button_style_selection'] == 'style_one') : ?>
            <div class="textalign">
                <a class="primary-btn2" <?php echo esc_url($settings['xoon_button_content_button_url']['url']); ?>>
                    <?php if ('yes' === $settings['xoon_button_icon_display']) : ?>
                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_126_82)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 0.000100587C11.6326 0.000100581 11.7598 0.0527787 11.8536 0.146547C11.9473 0.240315 12 0.367492 12 0.500101L12 6.5001C12 6.63271 11.9473 6.75989 11.8536 6.85365C11.7598 6.94742 11.6326 7.0001 11.5 7.0001C11.3674 7.0001 11.2402 6.94742 11.1465 6.85365C11.0527 6.75989 11 6.63271 11 6.5001L11 1.7071L0.854021 11.8541C0.807533 11.9006 0.752344 11.9375 0.691605 11.9626C0.630865 11.9878 0.565765 12.0007 0.500021 12.0007C0.434277 12.0007 0.369177 11.9878 0.308438 11.9626C0.247698 11.9375 0.192509 11.9006 0.146021 11.8541C0.0995332 11.8076 0.0626571 11.7524 0.037498 11.6917C0.0123389 11.6309 -0.000610371 11.5658 -0.000610373 11.5001C-0.000610376 11.4344 0.0123389 11.3693 0.037498 11.3085C0.0626571 11.2478 0.0995332 11.1926 0.146021 11.1461L10.293 1.0001L5.50002 1.0001C5.36741 1.0001 5.24024 0.947423 5.14647 0.853655C5.0527 0.759887 5.00002 0.632709 5.00002 0.500101C5.00002 0.367492 5.0527 0.240315 5.14647 0.146547C5.24024 0.052779 5.36741 0.000100855 5.50002 0.000100849L11.5 0.000100587Z">
                                </path>
                            </g>
                        </svg>
                    <?php endif ?>
                    <?php if (!empty($settings['xoon_button_content_button_text'])) : ?>
                        <?php echo esc_html__($settings['xoon_button_content_button_text'], 'xoon'); ?>
                    <?php endif ?>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($settings['xoon_button_style_selection'] == 'style_two') : ?>
            <div class="see-more-btn">
                <?php if (!empty($settings['xoon_button_content_button_text'])) : ?>
                    <a class="primary-btn6 button-hover-one" href="<?php echo esc_url($settings['xoon_button_content_button_url']['url']); ?>">
                        <?php echo esc_html__($settings['xoon_button_content_button_text'], 'xoon'); ?>
                    </a>
                <?php endif ?>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new xoon_Button_Widget());
