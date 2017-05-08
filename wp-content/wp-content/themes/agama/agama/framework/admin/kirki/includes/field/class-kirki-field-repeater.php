<?php
/**
 * Override field methods
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.2.7
 */

if ( ! class_exists( 'Kirki_Field_Repeater' ) ) {

	/**
	 * Field overrides.
	 */
	class Kirki_Field_Repeater extends Kirki_Field {

		/**
		 * Sets the control type.
		 *
		 * @access protected
		 */
		protected function set_type() {

			$this->type = 'repeater';

		}

		/**
		 * Sets the $sanitize_callback
		 *
		 * @access protected
		 */
		protected function set_sanitize_callback() {

			// If a custom sanitize_callback has been defined,
			// then we don't need to proceed any further.
			if ( ! empty( $this->sanitize_callback ) ) {
				return;
			}
			$this->sanitize_callback = array( $this, 'sanitize' );

		}

		/**
		 * The sanitize method that will be used as a falback
		 *
		 * @param string|array $value The control's value.
		 */
		public function sanitize( $value ) {

			// is the value formatted as a string?
			if ( is_string( $value ) ) {
				$value = rawurldecode( $value );
				$value = json_decode( $value, true );
			}

			// Nothing to sanitize if we don't have fields.
			if ( empty( $this->fields ) ) {
				return $value;
			}

			foreach ( $value as $row_id => $row_value ) {

				// Make sure the row is formatted as an array.
				if ( ! is_array( $row_value ) ) {
					$value[ $row_id ] = array();
					continue;
				}
				// Start parsing sub-fields in rows.
				foreach ( $row_value as $subfield_id => $subfield_value ) {
					// Make sure this is a valid subfield.
					// If it's not, then unset it.
					if ( ! isset( $this->fields[ $subfield_id ] ) ) {
						unset( $value[ $row_id ][ $subfield_id ] );
					}
					// Get the subfield-type.
					$subfield_type = $this->fields[ $subfield_id ]['type'];

					// Allow using a sanitize-callback on a per-field basis.
					if ( isset( $this->fields[ $subfield_id ]['sanitize_callback'] ) ) {

						$subfield_value = call_user_func( $this->fields[ $subfield_id ]['sanitize_callback'], $subfield_value );

					} else {

						switch ( $subfield_type ) {
							case 'image':
							case 'cropped_image':
							case 'upload':
								if ( ! is_numeric( $subfield_value ) && is_string( $subfield_value ) ) {
									$subfield_value = esc_url_raw( $subfield_value );
								}
								break;
							case 'dropdown-pages':
								$subfield_value = (int) $subfield_value;
								break;
							case 'color':
								// Instantiate the object.
								$color_obj = ariColor::newColor( $subfield_value );
								$$subfield_value = $color_obj->toCSS( $color_obj->mode );
								break;
							case 'text':
								$subfield_value = esc_textarea( $subfield_value );
								break;
							case 'url':
							case 'link':
								$subfield_value = esc_url_raw( $subfield_value );
								break;
							case 'email':
								$subfield_value = filter_var( $subfield_value, FILTER_SANITIZE_EMAIL );
								break;
							case 'tel':
								$subfield_value = esc_attr( $subfield_value );
								break;
							case 'checkbox':
								$subfield_value = (string) intval( $subfield_value );
								break;
							case 'select':
							case 'radio':
							case 'radio-image':
								$subfield_value = esc_attr( $subfield_value );
								break;
							case 'textarea':
								$subfield_value = wp_kses_post( $subfield_value );

						}
					}
					$value[ $row_id ][ $subfield_id ] = $subfield_value;
				}
			}

			return $value;
		}
	}
}
