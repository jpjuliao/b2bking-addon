<?php

namespace JPJULIAO\B2BKing_Addons;

class Shop_Filters
{

  public function __construct()
  {
    $this->includes();
    $this->init();
  }

  private function includes()
  {
    require_once __DIR__ . '/class-shop-filters-base.php';
    require_once __DIR__ . '/class-shop-filters-query.php';
    require_once __DIR__ . '/class-shop-filters-renderer.php';
    require_once __DIR__ . '/class-shop-filters-url-handler.php';
    if (is_admin()) {
      require_once __DIR__ . '/class-shop-filters-admin.php';
    }
  }

  private function init()
  {
    new Shop_Filters_Query();
    new Shop_Filters_URL_Handler();
    new Shop_Filters_Renderer();
    if (is_admin()) {
      new Shop_Filters_Admin();
    }
  }
}
