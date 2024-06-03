<?php

namespace AELA\Elements\Widgets\Our_Static_Product;

class Our_Static_Product_Control extends \AELA\Elements\Widgets\Our_Static_Product\Our_Static_Product {
    
    public function register_content_controls() {
        /**
         * Content section controls
         * 
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Static Product', AELA_SLUG ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            /**
             * Product Image control
             */
            $this->add_control(
                'product_image',
                [
                    'label' => esc_html__( 'Choose Product Image', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'sepator' => 'after',
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            /**
             * size group control for image
             * @link https://developers.elementor.com/docs/editor-controls/group-control-image-size/
             */
            $this->add_group_control(
                \Elementor\Group_Control_Image_Size::get_type(),
                [
                    'name' => 'thumbnail',
                    'exclude' => [],
                    'include' => ['large', 'full', 'custom', 'small'],
                    'default' => 'full',
                ],
            );


            /**
             * Divider control
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-divider/
             */
            $this->add_control(
                'hr',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ],
            );

            /**
             * Product Title control
             */
            $this->add_control(
                'product_title',
                [
                    'label' => esc_html__( 'Product Name', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'AELA Product', AELA_SLUG ),
                    'description' => 'Add your product name',
                    'classes' => 'aela__statis_product_name',
                    'label_block' => true,
                    'separator' => 'after',
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            /**
             * 
             * Divider Control
             * 
             * https://developers.elementor.com/docs/editor-controls/control-divider/
             */
            $this->add_control(
                'hr_name',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ],
            );

            /**
             * Product normal price control
             * 
             * @link 
             */

            $this->add_control(
                'product_normal_price',
                [
                    'label' => esc_html__( 'Normal Price', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'separator' => 'after',
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );


            /**
             * Product special control
             * 
             * @link 
             */

            $this->add_control(
                'product_special_price',
                [
                    'label' => esc_html__( 'Special Price', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'separator' => 'after',
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );


            /**
             * 
             * Divider Control
             * 
             * https://developers.elementor.com/docs/editor-controls/control-divider/
             */
            $this->add_control(
                'hr_price',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ],
            );
            


            /**
             * Product description control
             * 
             */
            $this->add_control(
                'product_description',
                [
                    'label' => esc_html__( 'Product Description', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => esc_html__( 'Your product description', AELA_SLUG ),
                    'separator' => 'after',
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            /**
             * 
             * Divider Control
             * 
             * https://developers.elementor.com/docs/editor-controls/control-divider/
             */
            $this->add_control(
                'hr_desc',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ],
            );

            /**
             * Product button control
             */
            $this->add_control(
                'product_button',
                [
                    'label' => esc_html__( 'Button Link', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $this->add_control(
                'product_button_text',
                [
                    'label' => esc_html__( 'Button Text', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Buy Now', AELA_SLUG ),
                    'label_block' => true,
                ]
            );

            /**
             * Icons in button
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-icons/
             */
            $this->add_control(
                'button_icon',
                [
                    'label' => esc_html__( 'Icon', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-cart',
                        'library' => 'fa-solid',
                    ],
                    'recommended' => [
                        'fa-solid' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                ]
            );

            /**
             * 
             * Button icon width
             * 
             * @return string px
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-slider/
             */
            $this->add_control(
                'icon_button_size',
                [
                    'label' => esc_html__( 'Icon width', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'custom'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


            /**
             * Icon button color control
             * 
             * @return color picker
             * @link https://developers.elementor.com/docs/editor-controls/control-color/
             */
            $this->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button svg path' => 'fill: {{VALUE}}',
                    ],
                ]
            );

            /**
             * 
             * To control where the icon will show on button (before/after) text
             * 
             * @return flex-direction row & row-reverse
             * @link https://developers.elementor.com/docs/editor-controls/control-select/
             */
            $this->add_control(
                'icon_button_position',
                [
                    'label' => esc_html__( 'Show icon', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'row',
                    'options' => [
                        'row' => esc_html__( 'Before', AELA_SLUG ),
                        'row-reverse' => esc_html__( 'After', AELA_SLUG ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button' => 'flex-direction: {{VALUE}}',
                    ],
                ]
            );

            /**
             * Gap between icon and button text
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-slider/
             */
            $this->add_control(
                'icon_gap',
                [
                    'label' => esc_html__( 'Icon spacing', AELA_SLUG ),
                    'description' => 'Space between icon and text',
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'step' => 1,
                            'max' => 50,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => '5',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button svg' => 'margin: 0 {{SIZE}}{{UNIT}}',
                    ],
                ]
            );


            /**
             * 
             * Divider Control
             * 
             * https://developers.elementor.com/docs/editor-controls/control-divider/
             */
            $this->add_control(
                'hr_btn',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ],
            );

            /**
             * show ribbon or not / switcher to show or hide ribbon
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-switcher/
             */
            $this->add_control(
                'show_ribbon',
                [
                    'label' => esc_html__( 'Show Ribbon?', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'show', AELA_SLUG ),
                    'label_off' => esc_html__( 'hide', AELA_SLUG ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ],
            );

            /**
             * Ribbon Text
             * @link https://developers.elementor.com/docs/editor-controls/control-text/
             */
            $this->add_control(
                'ribbon_text',
                [
                    'label' => esc_html__( 'Ribbon Text', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Best Seller', AELA_SLUG ),
                    'condition' => [
                        'show_ribbon' => 'yes',
                    ],
                ],
            );

        $this->end_controls_section();
    }
    // End control section function classes


    /**
     * START STYLE TABS SECTION HERE
     */
    public function register_style_controls() {
         /**
         * Product box style / General settings for static product box
         * 
         * @link
         */
        $this->start_controls_section(
            'general_style_section',
            [
                'label' => esc_html__( 'General Style', AELA_SLUG ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            /**
         * 
         * Margin control for box
         * 
         * @link https://developers.elementor.com/docs/editor-controls/control-dimensions/
         */
        $this->add_control(
            'margin_box',
            [
                'label' => esc_html__( 'Margin', AELA_SLUG ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],
        );

        /**
         * 
         * Padding control for box
         * 
         * @link https://developers.elementor.com/docs/editor-controls/control-dimensions/
         */
        $this->add_control(
            'padding_box',
            [
                'label' => esc_html__( 'Content Padding', AELA_SLUG ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ],
        );

        /**
         * Alignment control for all text inside box of static product widget
         * 
         * @link https://developers.elementor.com/docs/editor-controls/control-choose/
         */
        $this->add_control(
            'general_text_align',
            [
                'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .content_wrapper' => 'align-items: {{VALUE}};'
				],
            ]
        );

        /**
         * Static wrapper background group control style
         * 
         * @link https://developers.elementor.com/docs/editor-controls/group-control-background/
         */
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'type' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}}'
            ]
        );


        /**
         * 
         * Border for general box
         * 
         * @link https://developers.elementor.com/docs/editor-controls/group-control-border/
         * @return border group control
         */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}}'
            ]
        );

        /**
         * Box shadow group control for wrapper static product widget
         * @link https://developers.elementor.com/docs/editor-controls/group-control-box-shadow/
         */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'general-box-shadow',
                'selector' => '{{WRAPPER}}',
            ],
        );


        


        

        $this->end_controls_section();
       

        /**
         * Style section tab controls for title
         * 
         * @link https://developers.elementor.com/docs/editor-controls/control-tabs/
         */
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Title Style', AELA_SLUG ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        
            /**
             * 
             * Heading control
             * @link https://developers.elementor.com/docs/editor-controls/control-heading/
             */
            $this->add_control(
                'product_title_style',
                [
                    'label' => esc_html__( 'Product Title', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'after'
                ]
            );

            /**
             * Font Family control
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-font/
             */
            $this->add_control(
                'font_family',
                [
                    'label' => esc_html__( 'Font Family', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::FONT,
                    'default' => "'Open Sans', sans-serif",
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_title' => 'font-family: {{VALUE}}',
                    ],
                ]
            );

            /**
             * 
             * Typography Group Control
             * 
             * @link https://developers.elementor.com/docs/editor-controls/group-control-typography/
             */
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'product_title',
                    'selector' => '{{WRAPPER}} .aela_static_product_title',
                ]
            );

            /**
             * Title color control
             * @link https://developers.elementor.com/docs/editor-controls/control-color/
             */
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => 
                    [
                        '{{WRAPPER}} .aela_static_product_title' => 'color: {{value}}',
                    ],
                ],
            );

            $this->end_controls_section();
            // End title style control


            /**
             * Start price style control section
             * 
             */
            $this->start_controls_section(
                'price_style_section',
                [
                    'label' => esc_html__( 'Price style', AELA_SLUG ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            /**
             * Price tabs normal & sale/discount price
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-tabs/
             */
            $this->start_controls_tabs(
                'price_tabs',
            );

            /**
             * Control tab for normal price
             */
            $this->start_controls_tab(
                'normal_price_tab',
                [
                    'label' => esc_html__( 'Normal Price', AELA_SLUG ),
                ]
            );

            /**
             * Typography group control for price section
             * 
             * @link https://developers.elementor.com/docs/editor-controls/group-control-typography/
             * @return typography group
             */
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'normal_price_typo',
                    'selector' => '{{WRAPPER}} .normal_price',
                    'selector' => '{{WRAPPER}} .special_price > span:first-child',
                    
                ]
            );

            /**
             * Color control for normal price
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-color/
             */
            $this->add_control(
                'normal_price_color',
                [
                    'label' => esc_html__( 'Text Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .normal_price' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .special_price > span:first-child' => 'color: {{VALUE}}',
                    ],
                ]
            );


            $this->end_controls_tab();
            // end control tab for normal price


            /**
             * Control tab for sale/discount price
             */
            $this->start_controls_tab(
                'sale_price_tab',
                [
                    'label' => esc_html__( 'Sale Price', AELA_SLUG ),
                ]
            );

            /**
             * Typography group control for price section
             * 
             * @link https://developers.elementor.com/docs/editor-controls/group-control-typography/
             * @return typography group
             */
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'sale_price_typo',
                    'selector' => '{{WRAPPER}} .special_price',
                    'selector' => '{{WRAPPER}} .special_price > span:last-child',
                ]
            );

            /**
             * Color control for sale price
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-color/
             */
            $this->add_control(
                'sale_price_color',
                [
                    'label' => esc_html__( 'Text Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .special_price' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .special_price > span:nth-child(2)' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_tab();
            // end control sale price tab

            $this->end_controls_tabs();
            // end tabs

            

            $this->end_controls_section();
            // End price control section


            /**
             * 
             * Start style controls section for product descriptions
             * 
             */
            $this->start_controls_section(
                'static_product_desc_style',
                [
                    'label' => esc_html__( 'Product Description', AELA_SLUG ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                /**
                 * 
                 * Product description typography group control
                 * 
                 * @link https://developers.elementor.com/docs/editor-controls/group-control-typography/
                 */
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'product_desc_font',
                        'selector' => '{{WRAPPER}} .aela_static_product_desc',
                    ]
                );

                /**
                 * 
                 * Color control for product desc
                 * 
                 * @link https://developers.elementor.com/docs/editor-controls/control-color/
                 */
                $this->add_control(
                    'product_desc_color',
                    [
                        'label' => esc_html__( 'Color', AELA_SLUG ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aela_static_product_desc' => 'color: {{VALUE}}',
                        ]
                    ]
                );

            $this->end_controls_section();
            // End product description controls section


            /**
             * 
             * START BUTTON CONTROLS SECTION STYLE
             * 
             */
            $this->start_controls_section(
                'product_btn_style_section',
                [
                    'label' => esc_html__( 'Button Style', AELA_SLUG ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            /**
             * 
             * Padding button control style
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-dimensions/
             * 
             * @return padding value
             */
            $this->add_control(
                'button_padding',
                [
                    'label' => esc_html__( 'Padding', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                    'default' => [
                        'top' => 8,
                        'right' => 8,
                        'bottom' => 8,
                        'left' => 8,
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                    ],
                ]
            );

            /**
             * 
             * Margin button control style
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-dimensions/
             * 
             * @return padding value
             */
            $this->add_control(
                'button_margin',
                [
                    'label' => esc_html__( 'Margin', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                    ],
                ]
            );


            /**
             * Controls tabs for button background normal and hover state
             * 
             * @return tabs under section
             * @link https://developers.elementor.com/docs/editor-controls/control-tabs/
             */
            $this->start_controls_tabs(
                'button_tabs'
            );

                $this->start_controls_tab(
                    'button_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', AELA_SLUG ),
                    ]
                );

                    /**
                     * 
                     * Background group control for button
                     * 
                     * @return background group control
                     * @link https://developers.elementor.com/docs/editor-controls/group-control-background/
                     */
                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'button_normal_background',
                            'types' => ['classic', 'gradient', 'video'],
                            'selector' => '{{WRAPPER}} .aela_static_product_button',
                        ],
                    );


                $this->end_controls_tab();
                // END NORMAL TAB STATE

                $this->start_controls_tab(
                    'button_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', AELA_SLUG ),
                    ]
                );

                    /**
                     * 
                     * Background group control for button
                     * 
                     * @return background group control
                     * @link https://developers.elementor.com/docs/editor-controls/group-control-background/
                     */
                    $this->add_group_control(
                        \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'button_hover_background',
                            'types' => ['classic', 'gradient', 'video'],
                            'selector' => '{{WRAPPER}} .aela_static_product_button:hover',
                        ],
                    );


                $this->end_controls_tab();
                // END HOVER TAB STATE

            $this->end_controls_tabs();
            
            /**
             * Divider between button bg and text section
             * 
             * @link https://developers.elementor.com/docs/editor-controls/control-divider/
             */
            $this->add_control(
                'divider_button',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );

            /**
             * Typography group control for button text
             * 
             * @return typography styler
             * @link https://developers.elementor.com/docs/editor-controls/group-control-typography/
             */
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_ttpgraphy',
                    'selector' => '{{WRAPPER}} .aela_static_product_button',
                ]
            );

            /**
             * Color control for button text color
             * 
             * @return color picker
             * @link https://developers.elementor.com/docs/editor-controls/control-color/
             */
            $this->add_control(
                'button_color',
                [
                    'label' => esc_html__( 'Color', AELA_SLUG ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .aela_static_product_button' => 'color: {{VALUE}}',
                    ],
                ]
            );

        
            $this->end_controls_section();
            // END CONTROLS SECTION FOR STYLE TABS


            /**
             * Start controls section style tabs for ribbon text
             * 
             * @return section
             * @link https://developers.elementor.com/docs/editor-controls/control-section/
             */
            $this->start_controls_section(
                'ribbon_style_section', [
                    'label' => esc_html__( 'Ribbon Style', AELA_SLUG ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                /**
                 * Ribbon background control
                 * 
                 * @link https://developers.elementor.com/docs/editor-controls/control-color/
                 */
                $this->add_control(
                    'ribbon_backgroubd',
                    [
                        'label' => esc_html__( 'Ribbon Background', AELA_SLUG ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aela_static_product_ribbon' => 'background: {{VALUE}}',
                        ],
                    ]
                );

                /**
                 * Ribbon Text font group typography control
                 * 
                 * @link https://developers.elementor.com/docs/editor-controls/group-control-typography/
                 */
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'ribbon_typography',
                        'selector' => '{{WRAPPER}} .aela_static_product_ribbon',
                    ]
                );

                /**
                 * Ribbon text color control
                 * 
                 * @return color picker
                 * @link https://developers.elementor.com/docs/editor-controls/control-color/
                 */
                $this->add_control(
                    'ribbon_color',
                    [
                        'label' => esc_html__( 'Color', AELA_SLUG ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aela_static_product_ribbon' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                /**
                 * Divider ribbon text
                 * 
                 * @link https://developers.elementor.com/docs/editor-controls/control-divider/
                 */
                $this->add_control(
                    'ribbon_divider',
                    [
                        'type' => \Elementor\Controls_Manager::DIVIDER,
                    ]
                );

                /**
                 * Ribbon width controls
                 * 
                 * @link https://developers.elementor.com/docs/editor-controls/control-slider/
                 */
                $this->add_control(
                    'ribbon_width',
                    [
                        'label' => esc_html__( 'Width', AELA_SLUG ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'range' => [
                            'px' => [
                                'min' => 1,
                                'max' => 1000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => '%',
                            'size' => '40%',
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .aela_static_product_ribbon' => 'width: {{SIZE}}{{UNIT}}',
                        ],
                    ]
                );


            $this->end_controls_section();
            // END RIBBON STYLE SECTION
    }
}