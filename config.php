<?php

$config = [
    'widgets' => [
        'aela-lists' => [
            'class' => '\AELA\Elements\Widgets\Aela_Lists\Aela_Lists',
            'dependency' => [
                'css' => [
                    [
                        'handle' => 'aela-lists-css', 
                        'file' => AELA_URL . "assets/frontend/css/aela-lists.css"
                    ]
                ]
            ]
        ],
        'aela-static-product' => [
            'class' => '\AELA\Elements\Widgets\Aela_Static_Product\Aela_Static_Product',
            'dependency' => [
                'css' => [
                    [
                        'handle' => 'aela-static-product-css', 
                        'file' => AELA_URL . "assets/frontend/css/aela-static-product.css"
                    ]
                ]
            ]
        ]
    ],
    'forms' => [
        'fields' => [
            'phone-fields' => [
                'class' => '\AELA\Elements\Forms\Fields\Phone_Fields',
                'dependency' => [
                    'css' => [
                        [
                            'handle' => 'aela-select2-css',
                            'file' => AELA_URL . "assets/frontend/plugins/select2/select2.min.css"
                        ],
                        [
                            'handle' => 'aela-forms-phone-fields-css',
                            'file' => AELA_URL . "assets/frontend/css/forms/fields/phone-fields.css"
                        ]
                    ],
                    'js' => [
                        [
                            'handle' => 'aela-select2-js',
                            'file' => AELA_URL . "assets/frontend/plugins/select2/select2.min.js"
                        ],
                        [
                            'handle' => 'aela-forms-phone-fields-js',
                            'file' => AELA_URL . "assets/frontend/js/forms/fields/phone-fields.js"
                        ]
                    ]
                ]
            ]
        ]
    ]
];

return $config;