<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Package_Plan_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_package_plan';
    }

    public function get_title()
    {
        return esc_html__('EG Package Plan', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-product-price';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'xoon_package_plan_content_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );
        $this->add_control(
            'xoon_package_plan_package_name',
            [
                'label' => esc_html__('Package Name', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Weadding', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->add_control(
            'xoon_package_plan_package_price',
            [
                'label' => esc_html__('Package Price', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$300', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'xoon_package_plan_package_items',
            [
                'label' => esc_html__('Package Items', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('200 Personal Photograph.', 'xoon-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'xoon_package_plan_content_list',
            [
                'label' => esc_html__('Package Items List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_package_plan_package_items' => esc_html__('200 Personal Photograph.', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_package_plan_package_items }}}',
            ]
        );

        $this->end_controls_section();

        //button controls
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
                'default' => esc_html__('Book Now', 'xoon-core'),
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

        //styling starts here

        //package Title Style
        $this->start_controls_section(
            'xoon_package_plan_style_package_title_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,


            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_package_plan_style_package_title_typography',
                'selector' => '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-title h2',

            ]
        );
        $this->add_control(
            'xoon_package_plan_style_package_title_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_package_plan_style_package_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //package price Style
        $this->start_controls_section(
            'xoon_package_plan_style_package_price_section',
            [
                'label' => esc_html__('Price', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_package_plan_style_package_price_typography',
                'selector' => '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-title .price',

            ]
        );
        $this->add_control(
            'xoon_package_plan_style_package_price_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-title .price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_package_plan_style_package_price_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-title .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //package items Style
        $this->start_controls_section(
            'xoon_package_plan_style_package_items_section',
            [
                'label' => esc_html__('Package Items', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_package_plan_style_package_items_typography',
                'selector' => '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-features li',

            ]
        );
        $this->add_control(
            'xoon_package_plan_style_package_items_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-features li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_package_plan_style_package_items_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .pricing-features li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_button_color',
            [
                'label'     => esc_html__('Text Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .book-btn a' => 'color: {{VALUE}};',


                ],
            ]
        );

        $this->add_control(
            'xoon_banner_two_style_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .book-btn a::before' => 'border:1px solid {{VALUE}};border-left:none;',
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .book-btn a::after' => 'border:1px solid {{VALUE}};border-right:none;',

                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_banner_two_button_typography',
                'selector' => '{{WRAPPER}} .pricing-plan-area .pricing-wrap .book-btn a',

            ]
        );

        $this->add_responsive_control(
            'xoon_banner_two_button_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-plan-area .pricing-wrap .book-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_package_plan_content_list'];
?>

        <div class="pricing-plan-area">
            <div class="pricing-wrap">
                <div class="pricing-title">
                    <?php if (!empty($settings['xoon_package_plan_package_name'])) : ?>
                        <h2><?php echo esc_html__($settings['xoon_package_plan_package_name'], 'xoon') ?></h2>
                    <?php endif ?>
                    <?php if (!empty($settings['xoon_package_plan_package_price'])) : ?>
                        <h5 class="price"><?php echo esc_html__($settings['xoon_package_plan_package_price'], 'xoon') ?></h5>
                    <?php endif ?>
                </div>
                <ul class="pricing-features">
                    <?php foreach ($data as $item) : ?>
                        <?php if (!empty($item['xoon_package_plan_package_items'])) : ?>
                            <li><?php echo esc_html__($item['xoon_package_plan_package_items'], 'xoon') ?></li>
                        <?php endif ?>
                    <?php endforeach; ?>
                </ul>
                <div class="book-btn">
                    <?php if (!empty($settings['xoon_button_content_button_text'])) : ?>
                        <a href="<?php echo esc_url($settings['xoon_button_content_button_url']['url']); ?>">
                            <?php echo esc_html__($settings['xoon_button_content_button_text'], 'xoon'); ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Package_Plan_Widget());
