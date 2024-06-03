<?php

namespace AELA\Elements\Forms\Fields;

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
*/
class Phone_Fields extends \ElementorPro\Modules\Forms\Fields\Field_Base {

    public function __construct() {
		parent::__construct();
		add_action( 'elementor/preview/init', [ $this, 'editor_preview_footer' ] );
	}

	public $depended_styles = [ 'aela-select2-css', 'aela-forms-phone-fields-css' ];

	public $depended_scripts = [ 'aela-select2-js', 'aela-forms-phone-fields-css', 'aela-forms-phone-fields-js' ];

	public function get_type() {
        return 'aela_phone_field';
    }

	public function get_name() {
        return 'Phone';
    }

	public function render( $item, $item_index, $form ) {
        $form_id = $item['custom_id'];

		$attributes = [
			'class' => 'aela-phone-field__input',
			'for' => 'form-field-' . $form_id,
			'name' => 'form_fields[' . $form_id . ']',
			'placeholder' => $item['aela-phone-field-placeholder']
		];

		if( $item['required'] ) {
			$attributes['required'] = 'required';
			$attributes['aria-required'] = 'true';
		}

		$form->add_render_attribute('aela-phone-field__input' . $item_index, $attributes);

		?>
			<div class="aela-phone-field">
				<div class="aela-phone-field__container">
					<select name="phone-code" class="aela-phone-field__phone-code"></select>
					<input <?php echo $form->get_render_attribute_string( 'aela-phone-field__input' . $item_index ); ?> />
				</div>
			</div>
		<?php
    }

	public function validation( $field, $record, $ajax_handler ) {
		if( empty( $field['value'] ) ) {
			return;
		}

		if( !str_contains( $field['value'], '+' ) ) {
			$ajax_handler->add_error(
				$field['id'],
				'Phone field should contain country code'
			);
		}
    }

	public function update_controls( $widget ) {
		$elementor = \ElementorPro\Plugin::elementor();

		$control_data = $elementor->controls_manager->get_control_from_stack( $widget->get_unique_name(), 'form_fields' );

		if ( is_wp_error( $control_data ) ) {
			return;
		}

		$field_controls = [
			'aela-phone-field-placeholder' => [
				'name' => 'aela-phone-field-placeholder',
				'label' => esc_html__( 'Placeholder', AELA_SLUG ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'field_type' => $this->get_type(),
				],
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs'
			],
		];

		$control_data['fields'] = $this->inject_field_controls( $control_data['fields'], $field_controls );

		$widget->update_control( 'form_fields', $control_data );
	}

	public function editor_preview_footer() {
		add_action( 'wp_footer', [ $this, 'content_template_script' ] );
	}

	public function content_template_script() {
		?>
            <script>
                jQuery( document ).ready( () => {
                    elementor.hooks.addFilter(
                        'elementor_pro/forms/content_template/field/<?php echo $this->get_type(); ?>',
                        function ( inputField, item, i ) {
                            const fieldId      = `form-field-${i}`;
                            const fieldClass   = `aela-phone-field__input`;
							const fieldName	   = `form_fields[${i}]`;
							const fieldPlaceholder = item['aela-phone-field-placeholder'];

                            return `<div class="aela-phone-field">
									<div class="aela-phone-field__container">
										<select name="phone-code" class="aela-phone-field__phone-code"></select>
										<input class='${fieldClass}' for='${fieldId}' name='${fieldName}' />
									</div>
								</div>`;
                        }, 10, 3
                    );
                });
            </script>
		<?php
	}

}