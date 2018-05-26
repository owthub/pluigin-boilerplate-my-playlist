<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://onlinewebtutorhub.blogspot.in/
 * @since             1.0.0
 * @package           Owt_Boiler
 *
 * @wordpress-plugin
 * Plugin Name:       OWT Boilerplate 
 * Plugin URI:        http://onlinewebtutorhub.blogspot.in/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Online Web Tutor
 * Author URI:        http://onlinewebtutorhub.blogspot.in/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       owt-boiler
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!defined("OWT_BOILER_PLAGIN_DIR"))
    define("OWT_BOILER_PLAGIN_DIR", plugin_dir_path(__FILE__));
if (!defined("OWT_BOILER_PLAGIN_URL"))
    define("OWT_BOILER_PLAGIN_URL", plugins_url() . "/owt-boiler");

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-owt-boiler-activator.php
 */
function activate_owt_boiler() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-owt-boiler-activator.php';
    $table = owt_tables_generator();
    $activator = new Owt_Boiler_Activator($table);
    $activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-owt-boiler-deactivator.php
 */
function deactivate_owt_boiler() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-owt-boiler-deactivator.php';
    $table = owt_tables_generator();
    $deactivator = new Owt_Boiler_Deactivator($table);
    $deactivator->deactivate();
}

function owt_tables_generator(){
    require_once plugin_dir_path(__FILE__) . 'includes/class-owt-boiler-tables.php';
    $table = new Owt_Boiler_Tables();
    return $table;
}

register_activation_hook(__FILE__, 'activate_owt_boiler');
register_deactivation_hook(__FILE__, 'deactivate_owt_boiler');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-owt-boiler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_owt_boiler() {

    $plugin = new Owt_Boiler();
    $plugin->run();
}

run_owt_boiler();
