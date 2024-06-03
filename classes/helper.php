<?php

namespace AELA\Classes;

class Helper {
    public static function get_styles_dependencies( $dependencies=[] ) {
        $results = [];
        foreach ($dependencies as $key => $item) {
            if( isset($item['dependency']) && isset($item['dependency']['css']) ) {
                foreach ($item['dependency']['css'] as $css) {
                    $results[] = [
                        'key' => $css['handle'],
                        'file' => $css['file']
                    ];
                }
            }
        }

        return $results;
    }

    public static function get_scripts_dependencies( $dependencies=[] ) {
        $results = [];
        foreach ($dependencies as $key => $item) {
            if( isset($item['dependency']) && isset($item['dependency']['js']) ) {
                foreach ($item['dependency']['js'] as $js) {
                    $results[] = [
                        'key' => $js['handle'],
                        'file' => $js['file']
                    ];
                }
            }
        }

        return $results;
    }
}