<?php
/**
 * Plugin Name: Woo Hide Order Address Details
 * Plugin URI:  https://github.com/chigozieorunta/woo-hide-order-address-details
 * Description: A simple woocommerce plugin designed to help hide the displayed address information on each order.
 * Version:     1.0.0
 * Author:      Chigozie Orunta
 * Author URI:  https://github.com/chigozieorunta
 * License:     MIT
 * Text Domain: woo-hide-order-address-details
 * Domain Path: ./
 */

//Define Plugin Path
define("WHOAD", plugin_dir_path(__FILE__));

wooHideOrderAddressDetails::getInstance();

/**
 * Class wooHideOrderAddressDetails
 */
class wooHideOrderAddressDetails {
    /**
	 * Constructor
	 *
	 * @since  1.0.0
	 */
    public function __construct() {
		add_action('plugins_loaded', array($this, 'hideOrderAddress'));
    }
    
    /**
	 * Load only when pluggable.php is ready
	 *
     * @access public 
	 * @since  1.0.0
	 */
    public static function hideOrderAddress() {
		$user = wp_get_current_user();
		if(isset($user->roles[0]) && $user->roles[0] == 'vendor') {
			add_action('admin_enqueue_scripts', array(get_called_class(), 'registerScripts'));
		}
    }

    /**
	 * Register Scripts Method
	 *
     * @access public 
	 * @since  1.0.0
	 */
    public static function registerScripts() {
		wp_register_style('woo-hide-order-address-details', plugin_dir_url(__FILE__).'css/woo-hide-order-address-details.css');
		wp_enqueue_style('woo-hide-order-address-details');
    }

    /**
	 * Points the class, singleton.
	 *
	 * @access public
	 * @since  1.0.0
	 */
    public static function getInstance() {
        static $instance;
        if($instance === null) $instance = new self();
        return $instance;
    }
}

?>