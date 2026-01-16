<?php

namespace JPJULIAO\B2BKing_Addons;

class Bulk_Actions
{
  public function __construct()
  {
    add_action('template_redirect', [$this, 'run']);
  }

  public function run(): void
  {
    if (!isset($_GET['bulk-action'])) {
      return;
    }
    if ($_GET['bulk-action'] !== 'update-prices') {
      return;
    }
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );
    $products = get_posts($args);
    foreach ($products as $product) {
      var_dump($product->ID);
      $this->update_b2b_prices($product);
    }
    die;
  }

  public function update_b2b_prices(
    $post,
    $info_table = "1-30:0%;31-50:5%;51-100:7%;101+:10%;",
    $price_tiers = "31:5;51:7;101:10;"
  ): void {

    if (!$post || $post->post_type !== 'product') {
      return;
    }

    update_post_meta(
      $post->ID,
      'b2bking_product_customrows_group_b2c',
      ""
    );

    $b2c_prices = get_post_meta(
      $post->ID,
      'b2bking_product_customrows_group_b2c',
      true
    );
    var_dump($b2c_prices);

    $b2bgroups = get_posts(['post_type' => 'b2bking_group']);
    $first_b2bgroup = $b2bgroups[0];

    update_post_meta(
      $post->ID,
      'b2bking_product_customrows_group_' . $first_b2bgroup->ID,
      $info_table
    );

    $b2b_prices = get_post_meta(
      $post->ID,
      'b2bking_product_customrows_group_' . $first_b2bgroup->ID,
      true
    );
    var_dump($b2b_prices);

    $product = wc_get_product($post->ID);
    // check if method get_available_variations() exists
    if (!method_exists($product, 'get_available_variations')) {
      var_dump('No variations method');
      return;
    }
    $variations = $product->get_available_variations();
    $meta_key = 'b2bking_product_pricetiers_group_' . $first_b2bgroup->ID;

    foreach ($variations as $variation) {
      update_post_meta(
        $variation['variation_id'],
        $meta_key,
        "31:5;51:7;101:10;"
      );
      var_dump($variation['attributes']['attribute_pa_flavor']);

      $price_tiers = get_post_meta(
        $variation['variation_id'],
        $meta_key,
        true
      );
      var_dump($price_tiers);
    }
  }
}