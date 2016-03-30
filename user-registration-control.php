<?php
/**
 * Plugin Name: User Registration Control
 * Description: Dynamic control over who can register on your site and when.
 * Version: 0.1.0
 * Author: Frankie Jarrett
 * Author URI: http://frankiejarrett.com
 * Text Domain: user-registration-control
 * 
 * Copyright: © 2015 Frankie Jarrett.
 * License: GNU General Public License v2.0
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

class User_Registration_Control {

	/**
	 * Plugin version number
	 *
	 * @const string
	 */
	const VERSION = '0.1.0';

	/**
	 * Hold plugin instance
	 *
	 * @var string
	 */
	public static $instance;

	/**
	 * Class constructor
	 */
	private function __construct() {
		define( 'USER_REGISTRATION_CONTROL_PLUGIN', plugin_basename( __FILE__ ) );
		define( 'USER_REGISTRATION_CONTROL_DIR', plugin_dir_path( __FILE__ ) );
		define( 'USER_REGISTRATION_CONTROL_URL', plugin_dir_url( __FILE__ ) );
		define( 'USER_REGISTRATION_CONTROL_INC_DIR', USER_REGISTRATION_CONTROL_DIR . 'includes/' );
		define( 'USER_REGISTRATION_CONTROL_LANG_PATH', dirname( USER_REGISTRATION_CONTROL_PLUGIN ) . '/languages' );

		add_action( 'plugins_loaded', array( __CLASS__, 'i18n' ) );
		add_action( 'init', array( __CLASS__, 'load' ) );
	}

	/**
	 * Load languages
	 *
	 * @action plugins_loaded
	 *
	 * @return void
	 */
	public static function i18n() {
		load_plugin_textdomain( 'user-registration-control', false, USER_REGISTRATION_CONTROL_LANG_PATH );
	}

	/**
	 * Register hooks
	 *
	 * @action init
	 *
	 * @return void
	 */
	public static function load() {
		// Hooks here
	}

	/**
	 * Return active instance of User_Registration_Control, create one if it doesn't exist
	 *
	 * @return User_Registration_Control
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}

		return self::$instance;
	}

}

$GLOBALS['user_registration_control'] = User_Registration_Control::get_instance();
