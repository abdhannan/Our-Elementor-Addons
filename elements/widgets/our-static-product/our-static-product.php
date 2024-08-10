<?php

namespace AELA\Elements\Widgets\Our_Static_Product;

class Our_Static_Product extends \AELA\Classes\Widget_Base {
    public function get_name() {
		return 'aela-static-product';
	}

	public function get_title() {
		return esc_html__( 'Static Product', AELA_SLUG );
	}

	public function get_icon() {
		return 'eicon-product-info';
	}

    public function get_keywords() {
		return [ 'Product', 'Static Product', 'Awesome Static Product' ];
	}

	public function get_style_depends() {
		return [ 'our-static-product-css' ];
	}

    protected function register_controls() {
        $element_control = new Our_Static_Product_Control();
        $element_control->register_content_controls();
        $element_control->register_style_controls();
	}


     //  Render
     protected function render() {
		$settings = $this->get_settings_for_display();

        /**
         * Ribbon absolute at the top
         */
        ?>
        <?php if ($settings['show_ribbon'] === 'yes') : ?>
        <div class="aela_static_product_ribbon">
            <span><?php echo $settings['ribbon_text']; ?></span>
        </div>
        <?php endif; ?>
        <?php

        $imgStyle = $settings['custom_dimension'];
        var_dump($imgStyle['width']);
         

		// Get image URL
		echo '<img src="' . $settings['product_image']['url'] . '" width="'. $imgStyle['width'] .'" height="' . $imgStyle['height'] .'">';

		// Get image 'thumbnail' by ID
		// echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );

		// Get image HTML
		// $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
		// $this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
		// $this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
		// $this->add_render_attribute( 'image', 'class', 'my-custom-class' );
		// echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
        ?>
        <div class="content_wrapper">
            <h3 class="aela_static_product_title">
                <?php echo $settings['product_title'] ?>
            </h3>
            <div class="product_price">
                <span class="normal_price <?php if('yes' === $settings['normal_price_linethrough']) echo 'linethrough'; ?>"><?php echo $settings['product_normal_price']; ?></span>
                <span class="special_price"><?php echo $settings['product_special_price']; ?></span>
            </div>
            <p class="aela_static_product_desc">
                <?php echo $settings['product_description']; ?>
            </p>
            <?php
            if ( ! empty( $settings['product_button']['url'] ) ) {
                $this->add_link_attributes( 'product_button', $settings['product_button'] );
            }
            ?>
            <a class="aela_static_product_button" <?php echo $this->get_render_attribute_string('product_button'); ?>>
                <?php if( $settings['button_icon'] ) : ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], ['aria-hidden' => 'true'] ); ?> 
                <?php endif; ?>
                <span><?php echo $settings['product_button_text']; ?></span>
            </a>
        </div>
        <?php
	}
    
}