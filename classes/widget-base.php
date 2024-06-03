<?php

namespace AELA\Classes;

class Widget_Base extends \Elementor\Widget_Base {
	
	public function get_name() {
		return AELA_SLUG;
	}

	public function get_categories() {
		return [ 'awesome-elementor-addons' ];
	}

	public function get_attributes_string( $attributes=[] ) {
		$string = "";
		if( count($attributes) > 0 ) {
			foreach ($attributes as $key => $value) {
				$string .= $key . '="' . $value . '" ';
			}
		}
		return $string;
	}

	public function get_html_tag_options() {
		$options = [
			'h1'	=> 'H1',
			'h2'	=> 'H2',
			'h3'	=> 'H3',
			'h4'	=> 'H4',
			'h5'	=> 'H5',
			'h6'	=> 'H6',
			'div'	=> 'DIV',
			'p'		=> 'P',
			'span'	=> 'SPAN'
		];
		return $options;
	}

	public function get_render_html_tag( $tag, $content, $attributes=[] ) {
		?>
			<<?php echo $tag; ?> <?php echo $this->get_attributes_string($attributes); ?>><?php echo $content ?></<?php echo $tag; ?>>
		<?php
	}

	public function get_render_icon( $icon_type, $icon, $attributes=[] ) {
		if( $icon_type == 'icon' ) {
			if( $icon['library'] == 'svg' ) {
				$this->get_render_icon_type_image( $icon['value']['url'], $attributes );
			}
			else {
				$this->get_render_icon_type_icon( $icon, $attributes );
			}
		}
		else {
			$this->get_render_icon_type_image( $icon['url'], $attributes );
		}
	}

	public function get_render_icon_type_image( $image, $attributes=[] ) {
		?>
			<img src="<?php echo $image; ?>" <?php echo $this->get_attributes_string($attributes); ?> alt="icon-image" />
		<?php
	}

	public function get_render_icon_type_icon( $icon, $attributes=[] ) {
		\Elementor\Icons_Manager::render_icon( $icon, $attributes );
	}
	
}