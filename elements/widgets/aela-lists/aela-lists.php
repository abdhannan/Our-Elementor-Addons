<?php

namespace AELA\Elements\Widgets\Aela_Lists;

use AELA\Elements\Widgets\Aela_Lists\Aela_Lists_Control;

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
*/
class Aela_Lists extends \AELA\Classes\Widget_Base {
	public function get_name() {
		return 'aela-lists';
	}

	public function get_title() {
		return esc_html__( 'Awesome Lists', AELA_SLUG );
	}

	public function get_icon() {
		return 'aela-icon';
	}

	public function get_style_depends() {
		return [ 'aela-lists-css' ];
	}

	protected function register_controls() {
        $element_control = new Aela_Lists_Control();
        $element_control->register_content_controls();
        $element_control->register_style_controls();
	}

	protected function render() {
        $settings = $this->get_settings_for_display();

        $icon_view_classes = '';
        if( $settings['aela_lists_icon_view'] !== '' ) {
            $icon_view_classes = 'aela-lists__item__icon-' . $settings['aela_lists_icon_view'] . '-' . $settings['aela_lists_icon_' . $settings['aela_lists_icon_view'] . '_view'];
        }

        $this->add_render_attribute( 'lists-class', [ 'class' => [ 'aela-lists' ] ] );
        if( $settings['aela_lists_layout'] == 'inline' ) {
            $this->add_render_attribute( 'lists-class', [
                'class' => [ 'aela-lists--inline' ]
            ]);
        }
        $this->add_render_attribute( 'icon-classes', [
            'class' => [ 
                'aela-lists__item', 
                'aela-lists-icon-position-' . $settings['aela_lists_icon_position'],
                $icon_view_classes
            ]
        ]);

        ?>
            <ul <?php echo $this->get_render_attribute_string('lists-class'); ?>>
                <?php foreach( $settings['aela_lists'] as $list ) : ?>
                    
                    <?php 
                        $this->add_link_attributes( 'aela_lists_link', $list['aela_lists_link'] ); 
                    ?>

                    <li <?php echo $this->get_render_attribute_string('icon-classes'); ?>>
                        <a href="<?php echo $list['aela_lists_link']['url'] ?>" <?php echo $this->get_render_attribute_string('aela_lists_link'); ?> class="aela-lists__item__container">
                            
                            <?php 
                                if( !empty($list['aela_lists_image']['url']) || !empty($list['aela_lists_icon']['value']) ) : 
                            ?>
                                <div class="aela-lists__item__icon-container">
                                    <?php
                                        $this->get_render_icon(
                                            $list['aela_lists_icon_use_image'] == 'yes' ? 'image' : 'icon',
                                            $list['aela_lists_icon_use_image'] == 'yes' ? $list['aela_lists_image'] : $list['aela_lists_icon'],
                                            array(
                                                'class' => 'aela-lists__item__icon'
                                            )
                                        );
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="aela-lists__item__content">
                                <?php 
                                    $this->get_render_html_tag( 
                                        $settings['aela_lists_title_tag'], 
                                        $list['aela_lists_title'],
                                        array(
                                            'class' => 'aela-lists__item__content__title'
                                        )
                                    );  
                                ?>
                                <div class="aela-lists__item__content__description">
                                    <?php echo $list['aela_lists_content']; ?>
                                </div>
                            </div>
                        </a>
                    </li>

                <?php endforeach; ?>
            </ul>
        <?php
	}
}