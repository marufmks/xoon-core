<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_team';
    }

    public function get_title()
    {
        return esc_html__('EG Team', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-preferences';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {
        //General Section
        $this->start_controls_section(
            'xoon_team_content_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'xoon_team_member_name',
            [
                'label' => esc_html__('Member Name', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('William Robert', 'xoon-core'),
                'label_block' => true,

            ]
        );
        $repeater->add_control(
            'xoon_team_member_designation',
            [
                'label' => esc_html__('Member Designation', 'xoon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Lead Photographer', 'xoon-core'),
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'xoon_team_member_image',
            [
                'label' => esc_html__('Member Image', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        //instagram Link
        $repeater->add_control(
            'xoon_team_social_link_instagram',
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
        $repeater->add_control(
            'xoon_team_social_link_twitter',
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
        $repeater->add_control(
            'xoon_team_social_link_behance',
            [
                'label' => esc_html__('Behance Link', 'xoon-core'),
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
        //facebook Link
        $repeater->add_control(
            'xoon_team_social_link_facebook',
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
        $repeater->add_control(
            'xoon_team_social_link_linkedin',
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
        $repeater->add_control(
            'xoon_team_social_link_pinterest',
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
        $repeater->add_control(
            'xoon_team_social_link_youtube',
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

        $this->add_control(
            'xoon_team_content_list',
            [
                'label' => esc_html__('Member List', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'xoon_team_member_name' => esc_html__('Robin Anderson.', 'xoon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'xoon-core'),
                    ],
                ],
                'title_field' => '{{{ xoon_team_member_name }}}',
            ]
        );

        $this->end_controls_section();


        //styling starts here

        //member Name Style
        $this->start_controls_section(
            'xoon_team_style_member_name_section',
            [
                'label' => esc_html__('Member Name', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_team_style_member_names_typography',
                'selector' => '{{WRAPPER}} .team-item .portfilio-img-overlay h2',

            ]
        );
        $this->add_control(
            'xoon_team_style_member_names_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .portfilio-img-overlay h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_team_style_member_names_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-item .portfilio-img-overlay h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //member designation Style
        $this->start_controls_section(
            'xoon_team_style_member_designation_section',
            [
                'label' => esc_html__('Member Designation', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,


            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_team_style_member_designation_typography',
                'selector' => '{{WRAPPER}} .team-item .portfilio-img-overlay p',

            ]
        );
        $this->add_control(
            'xoon_team_style_member_designation_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .portfilio-img-overlay p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'xoon_team_style_member_designation_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .team-item .portfilio-img-overlay p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //member social_icon Style
        $this->start_controls_section(
            'xoon_team_style_member_social_icon_section',
            [
                'label' => esc_html__('Social Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_team_style_member_social_icons_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .social-icon li i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_team_style_member_social_icons_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .social-icon li i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $data = $settings['xoon_team_content_list'];
?>


        <div class="team-section position-relative">
            <div class="row g-4 justify-content-center">
                <?php foreach ($data as $item) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="magnetic-wrap">
                            <div class="team-item magnetic-item">
                                <?php if (!empty($item['xoon_team_member_image']['url'])) : ?>
                                    <img src="<?php echo esc_url($item['xoon_team_member_image']['url']) ?>" class="img-fluid" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                <?php endif ?>
                                <div class="portfilio-img-overlay">
                                    <?php if (!empty($item['xoon_team_member_name'])) : ?>
                                        <h2><?php echo esc_html__($item['xoon_team_member_name'], 'xoon') ?></h2>
                                    <?php endif ?>
                                    <?php if (!empty($item['xoon_team_member_designation'])) : ?>
                                        <p><?php echo esc_html__($item['xoon_team_member_designation'], 'xoon') ?></p>
                                    <?php endif ?>
                                    <ul class="social-icon">
                                        <?php if (!empty($item['xoon_team_social_link_instagram']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_instagram']['url']) ?>"><i class="fab fa-instagram"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['xoon_team_social_link_twitter']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_twitter']['url']) ?>"><i class="fab fa-twitter"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['xoon_team_social_link_behance']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_behance']['url']) ?>"><i class="fab fa-behance"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['xoon_team_social_link_facebook']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_facebook']['url']) ?>"><i class="fab fa-facebook"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['xoon_team_social_link_linkedin']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_linkedin']['url']) ?>"><i class="fab fa-linkedin"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['xoon_team_social_link_pinterest']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_pinterest']['url']) ?>"><i class="fab fa-pinterest"></i></a></li>
                                        <?php endif ?>
                                        <?php if (!empty($item['xoon_team_social_link_youtube']['url'])) : ?>
                                            <li><a href="<?php echo esc_url($item['xoon_team_social_link_youtube']['url']) ?>"><i class="fab fa-youtube"></i></a></li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Team_Widget());
