<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_social_icon_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_social_icon';
    }

    public function get_title()
    {
        return esc_html__('EG Social Icon', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-social-icons';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //Content Section
        $this->start_controls_section(
            'xoon_social_icon_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );



        $this->add_control(
            'xoon_social_icon_content_heading_title_text',
            [
                'label' => esc_html__('Heading Title', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Join us on Social Media!', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'xoon_social_icon_content_section',
            [
                'label' => esc_html__('Social Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        //instagram Link
        $this->add_control(
            'xoon_social_link_instagram',
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
        //twitter Link
        $this->add_control(
            'xoon_social_link_twitter',
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

        //Behance link
        $this->add_control(
            'xoon_social_link_behance',
            [
                'label' => esc_html__('Behance Link', 'xoon-core'),
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
        //facebook Link
        $this->add_control(
            'xoon_social_link_facebook',
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
        //linkedin Link
        $this->add_control(
            'xoon_social_link_linkedin',
            [
                'label' => esc_html__('Linkedin Link', 'xoon-core'),
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
            'xoon_social_link_pinterest',
            [
                'label' => esc_html__('Pinterest Link', 'xoon-core'),
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
        //Youtube Link
        $this->add_control(
            'xoon_social_link_youtube',
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

        $this->end_controls_section();

        //Heading Title Style
        $this->start_controls_section(
            'xoon_social_icon_style_heading_title_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,


            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_social_icon_style_heading_title_typography',
                'selector' => '{{WRAPPER}} .contact-me-area .join-us-title h3',

            ]
        );
        $this->add_control(
            'xoon_social_icon_style_heading_title_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .join-us-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_social_icon_style_heading_title_margin',
            [
                'label' => esc_html__('Margin', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .join-us-title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();



        //Icon Style
        $this->start_controls_section(
            'xoon_social_icon_list_section',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'xoon_social_icon_list_icon_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .social-icon li a i' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'xoon_social_icon_list_icon_background_color',
            [
                'label'     => esc_html__('Background Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .social-icon li a' => 'background-color: {{VALUE}};border:1px solid {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_social_icon_list_icon_background_hover_color',
            [
                'label'     => esc_html__('Background Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-me-area .social-icon li a:hover' => 'background-color: {{VALUE}};border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'xoon_social_icon_list_icon_size',
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
                    '{{WRAPPER}} .contact-me-area .social-icon li a i' => 'font-size: {{SIZE}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>

        <div class="contact-me-area">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <div class="join-us-title">
                        <?php if (!empty($settings['xoon_social_icon_content_heading_title_text'])) : ?>
                            <h3><?php echo esc_html__($settings['xoon_social_icon_content_heading_title_text'], 'xoon') ?></h3>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="social-icon">
                        <?php if (!empty($settings['xoon_social_link_facebook']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_facebook']['url']) ?>"><i class="bx bxl-facebook"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_social_link_twitter']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_twitter']['url']) ?>"><i class="bx bxl-twitter"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_social_link_pinterest']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_pinterest']['url']) ?>"><i class="bx bxl-pinterest-alt"></i></a></li>
                        <?php endif ?>
                        <?php if (!empty($settings['xoon_social_link_instagram']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_instagram']['url']) ?>"><i class="bx bxl-instagram"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($settings['xoon_social_link_behance']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_behance']['url']) ?>"><i class="bx bxl-behance"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($settings['xoon_social_link_linkedin']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_linkedin']['url']) ?>"><i class="bx bxl-linkedin"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($settings['xoon_social_link_youtube']['url'])) : ?>
                            <li><a href="<?php echo esc_url($settings['xoon_social_link_youtube']['url']) ?>"><i class="bx bxl-youtube"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_social_icon_Widget());
