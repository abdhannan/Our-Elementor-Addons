<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://abdhannan.codes
 * @since             1.0.0
 * @package           Our_Elementor_Addons
 *
 * @wordpress-plugin
 * Plugin Name:       Our Elementor Addons
 * Plugin URI:        https://mbuletstudio.com
 * Description:       "Our Elementor Addons" is a powerful set of supplementary tools and features designed to enhance your experience with the Elementor page builder for WordPress.
 * Version:           1.0.0
 * Author:            Abd Hannan
 * Author URI:        https://mbuletstudio.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       our-elementor-addons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if( !defined('AELA_VERSION') ) define( 'AELA_VERSION', '1.0.0' );
if( !defined('AELA_NAME') ) define( 'AELA_NAME', 'Our Elementor Addons' );
if( !defined('AELA_SLUG') ) define( 'AELA_SLUG', 'our-elementor-addons' );
if( !defined('AELA_PATH') ) define( 'AELA_PATH', plugin_dir_path( __FILE__ ) );
if( !defined('AELA_URL') ) define( 'AELA_URL', plugin_dir_url( __FILE__ ) );
if( !defined('AELA_UPLOAD_PATH') ) define ( 'AELA_UPLOAD_PATH', wp_upload_dir()['basedir'] . "/Our-elementor-addons" );
if( !defined('AELA_UPLOAD_URL') ) define ( 'AELA_UPLOAD_URL', wp_upload_dir()['baseurl'] . "/Our-elementor-addons" );

/** 
 * Run autoload file
*/
require_once AELA_PATH . "autoload.php";

/** 
 * Run it when plugin loaded
*/ 
add_action('plugins_loaded', function () {
    \AELA\Classes\Bootstrap::instance();
});

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-Our-elementor-addons-activator.php
 */
function activate_our_elementor_addons() {
	\AELA\Classes\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-Our-elementor-addons-deactivator.php
 */
function deactivate_our_elementor_addons() {
	\AELA\Classes\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_our_elementor_addons' );
register_deactivation_hook( __FILE__, 'deactivate_our_elementor_addons' );
