<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Clients_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_clients';
    }

    public function get_title()
    {
        return esc_html__('EG Clients', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-carousel';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'xoon_clients_content_section',
            [
                'label' => esc_html__('General', 'xoon-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'xoon_clients_section_icon',
            [
                'label' => esc_html__('Clients Icon', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],

            ]
        );

        $this->add_control(
            'xoon_clients_list',
            [
                'label' => esc_html__('Clients List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_clients_section_icon' => esc_html__('Clients List', 'xoon-core'),
                    ],

                ],
                'title_field' => '{{{ xoon_clients_section_icon }}}',
            ]
        );
        $this->end_controls_section();

        //General Style
        $this->start_controls_section(
            'xoon_clients_icon_style_section',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'xoon_clients_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-patner-area .our-patner-slider .swiper-slide svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .our-patner-area .our-patner-slider .swiper-slide i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_clients_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-patner-area .our-patner-slider .swiper-slide svg:hover' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .our-patner-area .our-patner-slider .swiper-slide i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xoon_clients_svg_size',
            [
                'label' => esc_html__('Icon Size', 'xoon-core'),
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
                    '{{WRAPPER}} .our-patner-area .our-patner-slider .swiper-slide svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .our-patner-area .our-patner-slider .swiper-slide i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $items = $settings['xoon_clients_list'];
?>
        <?php if (is_admin()) : ?>
            <script>
                // Our Partner
                var swiper = new Swiper(".our-patner-slider", {
                    slidesPerView: 1,
                    loop: true,
                    spaceBetween: 0,
                    slidesPerView: 5,
                    speed: 5000,
                    autoplay: {
                        delay: 2000,
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
                            slidesPerView: 3,
                            navigation: false,
                        },
                        768: {
                            slidesPerView: 3,
                            navigation: false,
                        },
                        992: {
                            slidesPerView: 4
                        },
                        1200: {
                            slidesPerView: 5
                        },
                        1400: {
                            slidesPerView: 6
                        },
                    }
                });
            </script>
        <?php endif; ?>

        <div class="our-patner-area two">
            <div class="container">
                <div class="row">
                    <div class="swiper our-patner-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($items as $item) : ?>
                                <div class="swiper-slide">
                                    <?php if (!empty($item['xoon_clients_section_icon'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon($item['xoon_clients_section_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Clients_Widget());
