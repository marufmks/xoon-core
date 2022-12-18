<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Portfolio_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_portfolio';
    }

    public function get_title()
    {
        return esc_html__('EG Portfolio', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-post-slider';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {

        //grneral section
        $this->start_controls_section(
            'xoon_portfolio_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );



        $this->add_control(
            'xoon_portfolio_general_section_select',
            [
                'label'     => esc_html__('Style', 'xoon-core'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style_one',
                'options'   => [
                    'style_one'        => esc_html__('Style One', 'xoon-core'),
                    'style_two'        => esc_html__('Style Two', 'xoon-core'),
                    'style_three'        => esc_html__('Portfolio Gallery', 'xoon-core'),
                ],
            ]
        );
        $this->end_controls_section();
        //grneral section
        $this->start_controls_section(
            'xoon_portfolio_template_section',
            [
                'label' => esc_html__('Template', 'xoon-core'),
                'condition' => [
                    'xoon_portfolio_general_section_select' => ['style_one', 'style_two',],
                ],
            ]
        );

        $this->add_control(
            'xoon_portfolio_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'xoon-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'xoon_portfolio_template_order_by',
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
            'xoon_portfolio_template_order',
            [
                'label'   => esc_html__('Order', 'xoon-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'xoon-core'),
                    'desc' => esc_html__('Descending', 'xoon-core')
                ],
                'default' => 'desc',
            ]
        );


        $this->end_controls_section();


        // --------------styling start----------------------//

        //title Style
        $this->start_controls_section(
            'xoon_portfolio_title_section_one',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_portfolio_general_section_select' => ['style_one',],
                ],

            ]
        );

        $this->add_control(
            'xoon_portfolio_title_section_color_one',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .gallery-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_portfolio_title_section_hover_color_one',
            [
                'label'     => esc_html__('Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .gallery-content h4 a:hover' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_portfolio_title_section_typ_one',
                'selector' => '{{WRAPPER}} .photo-gallery .single-img .gallery-content h4 a',

            ]
        );
        $this->add_responsive_control(
            'xoon_portfolio_title_section_padding_one',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .gallery-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        //title Style
        $this->start_controls_section(
            'xoon_portfolio_title_section_two',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_portfolio_general_section_select' => ['style_two',],
                ],

            ]
        );

        $this->add_control(
            'xoon_portfolio_title_section_color_two',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_portfolio_title_section_typ_two',
                'selector' => '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .content h4 a',

            ]
        );
        $this->add_responsive_control(
            'xoon_portfolio_title_section_padding_two',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //date Style
        $this->start_controls_section(
            'xoon_portfolio_date_section_style',
            [
                'label' => esc_html__('Date', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_portfolio_general_section_select' => ['style_one', 'style_two',],
                ],
            ]
        );

        $this->add_control(
            'xoon_portfolio_date_section_text_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .gallery-content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .content span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_portfolio_date_section_typ',
                'selector' => '{{WRAPPER}} .photo-gallery .single-img .gallery-content span,.portfolio-area2 .portfolio-img .overlay .content span',

            ]
        );
        $this->add_responsive_control(
            'xoon_portfolio_date_section_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .gallery-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //icon Style
        $this->start_controls_section(
            'xoon_portfolio_icon_style_section_one',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_portfolio_general_section_select' => ['style_one',],
                ],

            ]
        );

        $this->add_control(
            'xoon_portfolio_style_icon_color_one',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .overlay svg' => 'stroke: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'xoon_portfolio_style_icon_hover_color_one',
            [
                'label'     => esc_html__('Icon Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .photo-gallery .single-img .overlay svg:hover' => 'stroke: {{VALUE}};',
                ],


            ]
        );


        $this->end_controls_section();
        //icon Style
        $this->start_controls_section(
            'xoon_portfolio_icon_style_section_two',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_portfolio_general_section_select' => ['style_two',],
                ],

            ]
        );

        $this->add_control(
            'xoon_portfolio_style_icon_color_two',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .icon a i' => 'color: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'xoon_portfolio_style_icon_background_color',
            [
                'label'     => esc_html__('Icon Background Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-area2 .portfolio-img .overlay .icon a' => 'background: {{VALUE}};',
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
                'post_type'      => 'xoon-portfolio',
                'posts_per_page' => $settings['xoon_portfolio_posts_per_page'],
                'orderby'        => $settings['xoon_portfolio_template_order_by'],
                'order'          => $settings['xoon_portfolio_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );

?>

        <?php if ($settings['xoon_portfolio_general_section_select'] == 'style_one') : ?>

            <div class="photo-gallery">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <div class="col-lg-4 col-md-6  col-sm-8">
                                    <div class="single-img  magnetic-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                        <div class="overlay">
                                            <a data-cursor="View<br>Details" class=" magnetic-item" href="<?php the_permalink() ?>">
                                                <svg width="114" height="105" viewBox="0 0 114 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.7 104L113 1M113 1H1M113 1V104" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                            <div class="gallery-content">
                                                <h4><a data-cursor="View<br>Details" class="not-hide-cursor" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                                <span><?php echo esc_html__('Date: ', 'xoon') ?><?php echo get_the_date('F j, Y'); ?></span>
                                            </div>
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

        <?php if ($settings['xoon_portfolio_general_section_select'] == 'style_two') : ?>

            <div class="portfolio-area2">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <div class="col-lg-4 col-md-6 col-sm-8">
                                    <div class="portfolio-img magnetic-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon">
                                                <a data-cursor="View<br>Details" href="<?php the_permalink() ?>"><i class="bi bi-plus"></i></a>
                                            </div>
                                            <div class="content">
                                                <h4><a data-cursor="View<br>Details" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                                <span><?php echo esc_html__('Date: ', 'xoon') ?><?php echo get_the_date('F j, Y'); ?></span>
                                            </div>
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

        <?php if ($settings['xoon_portfolio_general_section_select'] == 'style_three') : ?>

            <div class="portfolio-details-pages">
                <div class="container position-relative">
                    <!-- tab-start -->
                    <div class="profile-tab-buttons">
                        <i class="bi bi-filter"></i>
                        <ul class="nav nav-pills mb-3 d-flex flex-column" id="pills-tab" role="tablist">
                            <?php $portfolio_cat = get_terms('xoon-portfolio-category'); ?>
                            <?php foreach ($portfolio_cat as $key => $cat) : ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo ($key == 0) ? "active" : ""; ?>" id="pills-<?php echo $cat->slug ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $cat->slug ?>" type="button" role="tab" aria-controls="pills-<?php echo $cat->slug ?>" aria-selected="true"><?php echo $cat->name ?></button>
                                </li>
                            <?php
                                $key++;
                            endforeach;
                            ?>
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
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <a href="<?php echo esc_url(get_the_post_thumbnail_url($items->ID)) ?>" class="portfolio-img" data-fancybox="gallery">
                                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url($items->ID)) ?>" alt="<?php echo esc_attr__('image', 'xoon') ?>">
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php $key++;
                        endforeach ?>
                    </div>
                    <!-- tab-end -->
                    <div class="col-lg-12 pt-70">
                        <div class="load-more-btn d-flex justify-content-center">
                            <a href="#" class="primary-btn3 button-hover-two"><?php echo esc_html__('Load More', 'xoon') ?></a>
                        </div>
                    </div>

                </div>
            </div>

        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Xoon_Portfolio_Widget());
