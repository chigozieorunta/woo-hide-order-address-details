<?php
/**
 * Plugin Name: Woo Modify Order Address Details
 * Plugin URI:  https://github.com/chigozieorunta/woo-modify-order-address-details
 * Description: A simple woocommerce plugin designed to help modify the displayed address information on each order.
 * Version:     1.0.0
 * Author:      Chigozie Orunta
 * Author URI:  https://github.com/chigozieorunta
 * License:     MIT
 * Text Domain: woo-modify-order-address-details
 * Domain Path: ./
 */

//Define Plugin Path
define("WPMOAD", plugin_dir_path(__FILE__));

wooModifyOrderAddressDetails::getInstance();

/**
 * Class wooModifyOrderAddressDetails
 */
class wooModifyOrderAddressDetails {
    /**
	 * Constructor
	 *
	 * @since  1.0.0
	 */
    public function __construct() {
        add_action('wp_enqueue_scripts', array(get_called_class(), 'registerScripts'));
    }

    /**
	 * Register Scripts Method
	 *
     * @access public 
	 * @since  1.0.0
	 */
    public static function registerScripts() {
        if(!is_admin()) {
            wp_register_style('woo-modify-order-address-details', plugin_dir_url(__FILE__).'css/woo-modify-order-address-details.css');
            wp_enqueue_style('woo-modify-order-address-details');
        }
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
