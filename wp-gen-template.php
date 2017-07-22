<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              chaksaray.com
 * @since             1.0.0
 * @package           Wp_Gen_Template
 *
 * @wordpress-plugin
 * Plugin Name:       GenTemplate
 * Plugin URI:        https://github.com/chaksaray/GenTemplate
 * Description:       This plugin is to generate the html template from the header, description, image, and other text you filled from the article forms.
 * Version:           1.0.0
 * Author:            chaksaray
 * Author URI:        chaksaray.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-gen-template
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-gen-template-activator.php
 */
function activate_wp_gen_template() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-gen-template-activator.php';
	Wp_Gen_Template_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-gen-template-deactivator.php
 */
function deactivate_wp_gen_template() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-gen-template-deactivator.php';
	Wp_Gen_Template_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_gen_template' );
register_deactivation_hook( __FILE__, 'deactivate_wp_gen_template' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-gen-template.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_gen_template() {

	$plugin = new Wp_Gen_Template();
	$plugin->run();

}
run_wp_gen_template();
