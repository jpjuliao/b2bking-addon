<?php

namespace JPJULIAO\B2BKing_Addon;

class User_Report
{
  public function __construct()
  {

    add_action(
      'woocommerce_account_dashboard',
      [$this, 'main_content'],
      5
    );

    add_action(
      'wp_loaded',
      [$this, 'main_content_ajax']
    );

    add_action(
      'template_redirect',
      [$this, 'main_content_scripts']
    );

    add_action(
      'woocommerce_account_dashboard',
      [$this, 'popular_products'],
      5
    );
  }

  public function main_content(): void
  {
    require_once(PLUGIN_PATH . 'templates/dashboard.php');
  }

  public function main_content_ajax(): void
  {
    if (!is_b2b_user() || !wp_doing_ajax()) {
      return;
    }
    require_once(
      PLUGIN_PATH . 'modules/user-report/class-user-report-ajax.php'
    );
    new User_Report_AJAX();
  }

  public function main_content_scripts(): void
  {
    if (!is_b2b_user()) {
      return;
    }
    require_once(
      PLUGIN_PATH . 'modules/user-report/class-user-report-scripts.php'
    );
    new User_Report_Scripts();
  }

  public function popular_products(): void
  {
    $products = [];
    $id = get_current_user_id();
    $orders = \wc_get_orders(array(
      'customer_id' => $id,
      'limit' => -1,
    ));
    foreach ($orders as $order) {
      foreach ($order->get_items() as $item) {
        $product_id = $item->get_product_id();

        if (!$product_id) {
          continue;
        }

        $quantity = $item->get_quantity();
        if (isset($products[$product_id])) {
          $products[$product_id] += $quantity;
        } else {
          $products[$product_id] = $quantity;
        }
      }
    }
    if (empty($products)) {
      return;
    }
    require_once(PLUGIN_PATH . 'templates/products.php');
  }

}