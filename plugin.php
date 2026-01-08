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

// Includes
require_once plugin_dir_path(__FILE__) . 'class-ui.php';
require_once plugin_dir_path(__FILE__) . 'class-scripts.php';
require_once plugin_dir_path(__FILE__) . 'class-ajax.php';

// Init
new JPJULIAO\B2BKing\User_Dashboard\UI();
new JPJULIAO\B2BKing\User_Dashboard\Scripts();
new JPJULIAO\B2BKing\User_Dashboard\AJAX();