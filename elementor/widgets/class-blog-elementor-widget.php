<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Xoon_Blog_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xoon_blog';
    }

    public function get_title()
    {
        return esc_html__('EG Blog', 'xoon-core');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['xoon_widgets'];
    }

    protected function register_controls()
    {

        //grneral section
        $this->start_controls_section(
            'xoon_blog_general_section',
            [
                'label' => esc_html__('General', 'xoon-core')
            ]
        );



        $this->add_control(
            'xoon_blog_general_section_select',
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
            'xoon_blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'xoon-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 5,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'xoon_blog_template_order_by',
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
            'xoon_blog_template_order',
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
            'xoon_blog_title_section',
            [
                'label' => esc_html__('Title', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_blog_title_section_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .gallery-content h4 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-wrrap .blog-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_blog_title_section_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .gallery-content h4 a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-wrrap .blog-content.style-two h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_blog_title_section_typ',
                'selector' => '{{WRAPPER}} .news-area .single-news .gallery-content h4 a,.blog-wrrap .blog-content h3 a',

            ]
        );
        $this->add_responsive_control(
            'xoon_blog_title_section_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .gallery-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .blog-wrrap .blog-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //date Style
        $this->start_controls_section(
            'xoon_blog_date_section_style',
            [
                'label' => esc_html__('Date', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'xoon_blog_date_section_text_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .gallery-content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-wrrap .blog-img .publish-date span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog-wrrap .blog-img .publish-date p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_blog_date_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-wrrap .blog-img .publish-date' => 'border:1px solid {{VALUE}};',
                ],
                'condition' => [
                    'xoon_blog_general_section_select' => ['style_two',],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_blog_date_section_typ',
                'selector' => '{{WRAPPER}} .news-area .single-news .gallery-content span,.blog-wrrap .blog-img .publish-date span',

            ]
        );
        $this->add_responsive_control(
            'xoon_blog_date_section_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .gallery-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .blog-wrrap .blog-img .publish-date span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'xoon_blog_one_icon_section_style',
            [
                'label' => esc_html__('Icon', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_blog_general_section_select' => ['style_one',],
                ],

            ]
        );

        $this->add_control(
            'xoon_blog_one_icon_section_color',
            [
                'label'     => esc_html__('Icon Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .overlay svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'xoon_blog_one_icon_section_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-area .single-news .overlay svg:hover' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        //tags Style
        $this->start_controls_section(
            'xoon_blog_tags_section_style',
            [
                'label' => esc_html__('Tags', 'xoon-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'xoon_blog_general_section_select' => ['style_two',],
                ],

            ]
        );

        $this->add_control(
            'xoon_blog_tags_section_color',
            [
                'label'     => esc_html__('Color', 'xoon-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-wrrap .blog-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'xoon-core'),
                'name'     => 'xoon_blog_tags_section_typ',
                'selector' => '{{WRAPPER}} .blog-wrrap .blog-content span',

            ]
        );
        $this->add_responsive_control(
            'xoon_blog_tags_section_padding',
            [
                'label' => esc_html__('Padding', 'xoon-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .blog-wrrap .blog-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'post_type'      => 'post',
                'posts_per_page' => $settings['xoon_blog_posts_per_page'],
                'orderby'        => $settings['xoon_blog_template_order_by'],
                'order'          => $settings['xoon_blog_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish'
            )
        );

?>

        <?php if ($settings['xoon_blog_general_section_select'] == 'style_one') : ?>

            <div class="news-area">
                <div class="container">
                    <div class="row g-4 justify-content-center">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div class="single-news magnetic-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'blog-img-thumb', 'title' => 'Feature image']); ?>
                                        <?php endif; ?>
                                        <div class="overlay">
                                            <a data-cursor="View<br>Details" href="<?php the_permalink() ?>">
                                                <svg width="114" height="105" viewBox="0 0 114 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.7 104L113 1M113 1H1M113 1V104" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                            <div class="gallery-content">
                                                <h4><a data-cursor="View<br>Details" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                                <span><?php echo get_the_date('F j, Y'); ?></span>
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

        <?php if ($settings['xoon_blog_general_section_select'] == 'style_two') : ?>

            <div class="blog-history-area">
                <div class="container">
                    <div class="row gy-5">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog-wrrap">
                                        <div class="blog-img magnetic-item">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php endif; ?>
                                            <div class="publish-date">
                                                <span><?php echo get_the_date('M'); ?></span>
                                                <p><?php echo get_the_date('j'); ?></p>
                                                <span><?php echo get_the_date('Y'); ?></span>
                                            </div>
                                        </div>
                                        <div class="blog-content style-two">
                                            <?php
                                            $post_tags = get_the_tags();
                                            $count_tags = count($post_tags);

                                            if (!empty($post_tags)) {
                                                $key = 1;
                                                foreach ($post_tags as  $tag) {
                                                    echo '<span>' . $tag->name . '</span>';
                                                    echo ($key < $count_tags) ?  '<span>' . ',' . '</span>' : '';
                                                    echo ' ';

                                                    $key++;
                                                }
                                            }
                                            ?>
                                            <h3><a data-cursor="View<br>Details" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
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

Plugin::instance()->widgets_manager->register(new Xoon_Blog_Widget());
