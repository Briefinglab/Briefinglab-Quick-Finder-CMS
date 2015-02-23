<?php
/**
 * The file responsible for starting the plugin
 *
 * The Online Magazine is a WordPress plugin that enable WordPress within the elements necessary
 * to manage efficiently an online magazine. online magazine is composed by issues delivered periodically.
 * Each issue contains article grouped by category/rubric.
 * *
 * @wordpress-plugin
 * Plugin Name: Briefinglab Quick Finder CMS
 * Contributors: Briefinglab, Luca Maroni
 * Donate link: http://briefinglab.com
 * Plugin URI: http://briefinglab.com
 * Description: Plugin to manage quick finder.
 * Version: 1.0.0
 * Author: Luca Maroni
 * Author URI: http://maronl.it
 * Text Domain: bl-quick-finder-cms
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /langs
 */

// If this file is called directly, then abort execution.
if (!defined('WPINC')) {
    die;
}

/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */
require_once plugin_dir_path(__FILE__) . 'includes/class-bl-quick-finder-cms-manager.php';

/**
 * Instantiates the Manager class and then
 * calls its run method officially starting up the plugin.
 */
function run_bl_quick_finder_cms_manager()
{
    $bl_quick_finder = new Bl_Quick_Finder_Cms_Manager();
    $bl_quick_finder->run();
}

// Call the above function to begin execution of the plugin.
run_bl_quick_finder_cms_manager();
