<?php

/**
 * Plugin Name: B2BKing User Dashboard
 * Plugin URI: https://jpjuliao.github.io
 * Description: User Dashboard for B2BKing
 * Version: 1.0.0
 * Author: Juan Pablo Juliao
 * Author URI: https://jpjuliao.github.io
 * Text Domain: jpjuliao-b2bking-user-dashboard
 */

if (!defined('WPINC')) {
  die;
}

// if (!defined('B2BKING_VERSION')) {
//   define('B2BKING_VERSION', 'v5.4.50');
// }
// if (!defined('B2BKING_FILE_RELEASE')) {
//   define('B2BKING_FILE_RELEASE', 'PROD');
// }

// if (!defined('B2BKING_DIR')) {
//   define('B2BKING_DIR', plugin_dir_path(__FILE__));
// }

// if (!defined('B2BKINGMAIN_DIR')) {
//   define('B2BKINGMAIN_DIR', plugin_dir_path(__FILE__));
// }

// if (!defined('B2BKING_LANG')) {
//   define('B2BKING_LANG', basename(dirname(__FILE__)) . '/languages');
// }

// require_once(B2BKING_DIR . 'includes/class-b2bking-global-helper.php');

// if (!function_exists('b2bking')) {
//   function b2bking()
//   {
//     return B2bking_Globalhelper::init();
//   }
// }

// Includes
require_once plugin_dir_path(__FILE__) . 'plugin/class-fe-html.php';
require_once plugin_dir_path(__FILE__) . 'plugin/class-fe-assets.php';
require_once plugin_dir_path(__FILE__) . 'plugin/class-be-api.php';

// Init
new b2bking_custom_fe_html();
new b2bking_custom_fe_assets();
new b2bking_custom_be_api();