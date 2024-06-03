<?php

namespace AELA\Elements\Widgets\Aela_Lists;

/**
 * Elementor Lists control Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
*/
class Aela_Lists_Control extends \AELA\Elements\Widgets\Aela_Lists\Aela_Lists {

    public function register_content_controls() {
        $this->start_controls_section(
			'aela_lists_content',
			[
				'label' => esc_html__( 'Awesome Lists', AELA_SLUG ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

            $this->add_control(
                'aela_lists_layout',
                [
                    'label' => esc_html__( 'Layout', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'default' => [
                            'title' => esc_html__( 'Default', AELA_SLUG ),
                            'icon' => 'eicon-editor-list-ul',
                        ],
                        'inline' => [
                            'title' => esc_html__( 'Inline', AELA_SLUG ),
                            'icon' => 'eicon-ellipsis-h',
                        ]
                    ],
                    'default' => 'default',
                    'toggle' => true
                ]
            );
            $this->add_responsive_control(
                'aela_lists_layout_colums',
                [
                    'label' => esc_html__( 'Columns', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'solid',
                    'options' => [
                        '100%' => esc_html__( '1', AELA_SLUG ),
                        '50% 50%' => esc_html__( '2', AELA_SLUG ),
                        '33.3% 33.3% 33.3%' => esc_html__( '3', AELA_SLUG ),
                        '25% 25% 25% 25%' => esc_html__( '4', AELA_SLUG ),
                    ],
                    'default' => '50% 50%',
                    'condition' => [
                        'aela_lists_layout' => 'inline'
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists.aela-lists--inline' => 'grid-template-columns: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'aela_lists_content_options',
                [
                    'label' => esc_html__( '', AELA_SLUG),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before'
                ]
            );
		    $aela_lists = new \Elementor\Repeater();
            $aela_lists->add_control(
                'aela_lists_title',
                [
                    'label' => esc_html__( 'Title', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => 'Place your list title',
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true
                    ]
                ]
            );
            $aela_lists->add_control(
                'aela_lists_content',
                [
                    'label' => esc_html__( 'Content', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true
                    ]
                ]
            );
            $aela_lists->add_control(
                'aela_lists_link',
                [
                    'label' => esc_html__( 'Link', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => 'Place your list link',
                    'label_block' => true,
                    'default' => [
                        'url' => '#'
                    ],
                    'dynamic' => [
                        'active' => true
                    ]
                ]
            );
            $aela_lists->add_control(
                'aela_lists_icon_section',
                [
                    'label' => esc_html__( 'List Icon', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $aela_lists->add_control(
                'aela_lists_icon_use_image',
                [
                    'label' => esc_html__( 'Use Image', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', AELA_SLUG ),
                    'label_off' => esc_html__( 'No', AELA_SLUG ),
                    'return_value' => 'yes',
                    'default' => 'no'
                ]
            );
            $aela_lists->add_control(
                'aela_lists_icon',
                [
                    'label' => esc_html__( '', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'condition' => [
                        'aela_lists_icon_use_image!' => 'yes'
                    ]
                ]
            );
            $aela_lists->add_control(
                'aela_lists_image',
                [
                    'label' => esc_html__( '', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true
                    ],
                    'condition' => [
                        'aela_lists_icon_use_image' => 'yes'
                    ]
                ]
            );

            $this->add_control(
                'aela_lists',
                [
                    'label' => esc_html__( 'Lists', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $aela_lists->get_controls(),
                    'title_field' => '{{{ aela_lists_title }}}'
                ]
            );

            $this->add_control(
                'aela_lists_more_options',
                [
                    'label' => esc_html__( '', AELA_SLUG),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before'
                ]
            );
            $this->add_control(
                'aela_lists_title_tag',
                [
                    'label' => esc_html__( 'Title HTML Tag', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'h3',
                    'options' => $this->get_html_tag_options()
                ]
            );
            $this->add_control(
                'aela_lists_icon_view',
                [
                    'label' => esc_html__( 'Icon View', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_html__( 'Default', AELA_SLUG ),
                        'stacked' => esc_html__( 'Stacked', AELA_SLUG ),
                        'framed'  => esc_html__( 'Framed', AELA_SLUG )
                    ]
                ]
            );
            $this->add_control(
                'aela_lists_icon_stacked_view',
                [
                    'label' => esc_html__( 'Shape', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'circle' => esc_html__( 'Circle', AELA_SLUG ),
                        'square'  => esc_html__( 'Square', AELA_SLUG )
                    ],
                    'default' => 'circle',
                    'condition' => [
                        'aela_lists_icon_view' => 'stacked'
                    ]
                ]
            );
            $this->add_control(
                'aela_lists_icon_framed_view',
                [
                    'label' => esc_html__( 'Shape', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'circle' => esc_html__( 'Circle', AELA_SLUG ),
                        'square'  => esc_html__( 'Square', AELA_SLUG )
                    ],
                    'default' => 'circle',
                    'condition' => [
                        'aela_lists_icon_view' => 'framed'
                    ]
                ]
            );
    

		$this->end_controls_section();
    }

    public function register_style_controls() {
        // Items style
        $this->start_controls_section(
			'aela_lists_style',
			[
				'label' => esc_html__( 'Items', AELA_SLUG ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);
            $this->add_responsive_control(
                'aela_lists_item_space_between',
                [
                    'label' => esc_html__( 'Space Between', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .aela-lists.aela-lists--inline .aela-lists__item' => 'margin-bottom: 0; padding: calc({{SIZE}}{{UNIT}} / 2);'
                    ],
                ]
            );
            $this->add_control(
                'aela_lists_icon_position',
                [
                    'label' => esc_html__( 'Icon Position', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', AELA_SLUG ),
                            'icon' => 'eicon-h-align-left'
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', AELA_SLUG ),
                            'icon' => 'eicon-v-align-top'
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', AELA_SLUG ),
                            'icon' => 'eicon-h-align-right'
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true
                ]
            );
            $this->add_responsive_control(
                'aela_lists_alignment',
                [
                    'label' => esc_html__( 'Alignment', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', AELA_SLUG ),
                            'icon' => 'eicon-text-align-left'
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', AELA_SLUG ),
                            'icon' => 'eicon-text-align-center'
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', AELA_SLUG ),
                            'icon' => 'eicon-text-align-right'
                        ],
                        'justify' => [
                            'title' => esc_html__( 'Justify', AELA_SLUG ),
                            'icon' => 'eicon-text-align-justify'
                        ]
                    ],
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content *' => 'text-align: {{VALUE}};',
                    ]
                ]
            );
        $this->end_controls_section();

        // Icon style
        $this->start_controls_section(
			'aela_lists_icon_style',
			[
				'label' => esc_html__( 'Icon', AELA_SLUG ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);
            $this->add_control(
                'aela_lists_icon_stacked_primary_color',
                [
                    'label' => esc_html__( 'Primary Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__icon-container .aela-lists__item__icon' => 'fill: {{VALUE}}',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-stacked-circle .aela-lists__item__icon-container' => 'background-color: {{VALUE}}; border: none;',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-stacked-square .aela-lists__item__icon-container' => 'background-color: {{VALUE}}; border: none;',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-framed-circle .aela-lists__item__icon-container' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-framed-square .aela-lists__item__icon-container' => 'background-color: {{VALUE}};'
                    ]
                ]
            );
            $this->add_control(
                'aela_lists_icon_secondary_color',
                [
                    'label' => esc_html__( 'Secondary Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'condition' => [
                        'aela_lists_icon_view!' => ''
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__icon-container .aela-lists__item__icon' => 'fill: {{VALUE}}',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-framed-circle .aela-lists__item__icon-container' => 'border-color: {{VALUE}};',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-framed-square .aela-lists__item__icon-container' => 'border-color: {{VALUE}};'
                    ]
                ]
            );
            $this->add_responsive_control(
                'aela_lists_icon_spacing',
                [
                    'label' => esc_html__( 'Spacing', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists-icon-position-left .aela-lists__item__icon-container' => 'margin: 0 {{SIZE}}{{UNIT}} 0 0;',
                        '{{WRAPPER}} .aela-lists .aela-lists-icon-position-right .aela-lists__item__icon-container' => 'margin: 0 0 0 {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .aela-lists .aela-lists-icon-position-center .aela-lists__item__icon-container' => 'margin: 0 0 {{SIZE}}{{UNIT}} 0;'
                    ]
                ]
            );
            $this->add_responsive_control(
                'aela_lists_icon_size',
                [
                    'label' => esc_html__( 'Size', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__icon-container .aela-lists__item__icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}'
                    ]
                ]
            );
            $this->add_responsive_control(
                'aela_lists_icon_padding',
                [
                    'label' => esc_html__( 'Padding', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__icon-container' => 'padding: {{SIZE}}{{UNIT}};'
                    ]
                ]
            );
            $this->add_responsive_control(
                'aela_lists_icon_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__icon-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_control(
                'aela_lists_icon_framed_border_width',
                [
                    'label' => esc_html__( 'Border Width', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'selectors' => [

                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-framed-circle .aela-lists__item__icon-container' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .aela-lists .aela-lists__item.aela-lists__item__icon-framed-square .aela-lists__item__icon-container' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                    'condition' => [
                        'aela_lists_icon_view' => 'framed'
                    ]
                ]
            );
        $this->end_controls_section();

        // Content style
        $this->start_controls_section(
			'aela_lists_content_style',
			[
				'label' => esc_html__( 'Content', AELA_SLUG ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);
            $this->add_responsive_control(
                'aela_lists_content_adjust_v_position',
                [
                    'label' => esc_html__( 'Adjust Vertical Position', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__title' => 'margin-top: {{SIZE}}{{UNIT}};'
                    ]
                ]
            );
            $this->add_control(
                'aela_lists_content_title_heading',
                [
                    'label' => esc_html__( 'Title', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'aela_lists_content_title_spacing',
                [
                    'label' => esc_html__( 'Spacing', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                    ]
                ]
            );
            $this->add_control(
                'aela_lists_content_title_color',
                [
                    'label' => esc_html__( 'Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__title' => 'color: {{VALUE}}'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'aela_lists_content_title_typography',
                    'selector' => '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__title'
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Text_Shadow::get_type(),
                [
                    'name' => 'aela_lists_content_title_text_shadow',
                    'selector' => '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__title'
                ]
            );
            $this->add_control(
                'aela_lists_content_description_heading',
                [
                    'label' => esc_html__( 'Description', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'aela_lists_content_description_color',
                [
                    'label' => esc_html__( 'Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__description *' => 'color: {{VALUE}}'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'aela_lists_content_description_typography',
                    'selector' => '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__description *'
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Text_Shadow::get_type(),
                [
                    'name' => 'aela_lists_content_description_text_shadow',
                    'selector' => '{{WRAPPER}} .aela-lists .aela-lists__item .aela-lists__item__content .aela-lists__item__content__description *'
                ]
            );
        $this->end_controls_section();
    }

}