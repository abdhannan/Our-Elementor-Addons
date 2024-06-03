<?php

namespace AELA\Classes;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://mbuletstudio.com
 * @since      1.0.0
 *
 * @package    Awesome_Elementor_Addons
 * @subpackage Awesome_Elementor_Addons/classes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Awesome_Elementor_Addons
 * @subpackage Awesome_Elementor_Addons/classes
 * @author     Mbulet Studio <mbuletstudio@gmail.com>
 */

use AELA\Classes\Loader;
use AELA\Classes\Activator;
use AELA\Classes\Deactivator;
use AELA\Classes\Helper;

class Bootstrap {

    private static $instance = null;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Awesome_Elementor_Addons_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
     * Singleton instance
     *
     * @since 3.0.0
     */
    public static function instance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'AELA_VERSION' ) ) {
			$this->version = AELA_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'awesome-elementor-addons';

		$this->load_dependencies();
		$this->define_hooks();

		/**
		 * Begins execution of the plugin.
		 *
		 * Since everything within the plugin is registered via hooks,
		 * then kicking off the plugin from this point in the file does
		 * not affect the page life cycle.
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		*/
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Awesome_Elementor_Addons_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Awesome_Elementor_Addons_Loader. Orchestrates the hooks of the plugin.
	 * - Awesome_Elementor_Addons_i18n. Defines internationalization functionality.
	 * - Awesome_Elementor_Addons_Admin. Defines all hooks for the admin area.
	 * - Awesome_Elementor_Addons_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		$this->loader = new Loader();
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function define_hooks() {
		/** Register elementor widgets */
		$this->loader->add_action( 'elementor/widgets/register', $this, 'aela_register_elementor_widgets', 20 );

		/** Register elementor widget categories */
		$this->loader->add_action( 'elementor/elements/categories_registered', $this, 'aela_register_elementor_widget_categories', 10 );

		/** Register elementor custom fields. Disable it since it in development */
		$this->loader->add_action( 'elementor_pro/forms/fields/register', $this, 'aela_register_elementor_form_fields', 20 );

		/** enqueue scripts */
		$this->loader->add_action( 'wp_enqueue_scripts', $this, 'aela_enqueue_scripts', 10 );

		/** enqueue elementor scripts for editor */
		$this->loader->add_action( 'elementor/editor/after_enqueue_styles', $this, 'aela_enqueue_elementor_editor_scripts', 20 );
		$this->loader->add_action( 'elementor/preview/enqueue_styles', $this, 'aela_enqueue_elementor_editor_scripts', 30 );
	}

	/** 
	 * Register all elementor widgets
	 * 
	 * @since	1.0.0
	*/
	public function aela_register_elementor_widgets( $widgets_manager ) {
		$config = require AELA_PATH . "config.php";
		$widgets = $config['widgets'];

		foreach ($widgets as $widget) {
			$widgets_manager->register( new $widget['class'] );
		}
	}

	/** 
	 * Register elementor widget categories
	 * 
	 * @since	1.0.0
	*/
	function aela_register_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'awesome-elementor-addons',
			[
				'title' => esc_html__( 'Awesome Elementor Addons', AELA_SLUG ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/** 
	 * Register custom elementor forms fields
	 * Disable it since it in development
	 * 
	 * @since	1.0.0
	*/
	function aela_register_elementor_form_fields( $form_fields_registrar ) {
		$config = require AELA_PATH . "config.php";
		$fields = $config['forms']['fields'];

		foreach ($fields as $field) {
			$form_fields_registrar->register( new $field['class'] );
		}
	}

	/** 
	 * Enqueue editor scripts for elementor editor
	 * 
	 * @since	1.0.0
	*/
	public function aela_enqueue_elementor_editor_scripts() {
		wp_enqueue_style('aela-editor-icons', AELA_URL . 'assets/editor/css/aela-icons.css', [], false, 'all');
	}

	/** 
	 * Enqueue worpdress frontend scripts globally
	 * 
	 * @since	1.0.0
	*/
	public function aela_enqueue_scripts() {
		wp_enqueue_style( 'aela-app', AELA_URL . 'assets/frontend/css/app.css', [], false, 'all' );

		$this->register_elementor_dependencies();
	}

	/**
	 * Register all of the dependencies for elementor widgets
	 * of the plugin.
	 *
	 * @since    1.0.0
	 */
	public function register_elementor_dependencies() {
		$config = require AELA_PATH . "config.php";

		/** Widget scripts dependencies */
		$widget_styles_dependencies = Helper::get_styles_dependencies( $config['widgets'] );
		foreach ($widget_styles_dependencies as $style) {
			wp_register_style( 
				$style['key'], 
				$style['file'], 
				[], 
				AELA_VERSION, 
				'all'
			);
		}
		$widget_scripts_dependencies = Helper::get_scripts_dependencies( $config['widgets'] );
		foreach ($widget_scripts_dependencies as $script) {
			wp_register_script( 
				$script['key'], 
				$script['file'], 
				['jquery'], 
				AELA_VERSION,
				[]
			);
		}

		/** Form scripts dependencies */
		$form_fields_styles_dependencies = Helper::get_styles_dependencies( $config['forms']['fields'] );
		foreach ($form_fields_styles_dependencies as $form) {
			wp_register_style( 
				$form['key'], 
				$form['file'], 
				[], 
				AELA_VERSION,
				'all'
			);
		}
		$form_fields_scripts_dependencies = Helper::get_scripts_dependencies( $config['forms']['fields'] );
		foreach ($form_fields_scripts_dependencies as $form) {
			wp_register_script( 
				$form['key'], 
				$form['file'], 
				['jquery'], 
				AELA_VERSION,
				[]
			);
		}
	}
	
}
