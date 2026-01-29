<?php

namespace JPJULIAO\B2BKing_Addon;

/**
 * Extended WooCommerce Products Shortcode with Taxonomy Support
 *
 * Usage examples:
 * [products_by_brand limit="12"]
 */

class Products_Shortcode_Taxonomy
{

  public function __construct()
  {
    add_shortcode('products_by_brand', [$this, 'render_shortcode']);
  }

  public function render_shortcode($atts)
  {
    $atts = shortcode_atts(array(
      'taxonomy' => 'product_brand',
      'limit' => 4,
    ), $atts, 'products_by_brand');

    global $products_by_brand_filter;
    $products_by_brand_filter = array(
      'taxonomy' => $atts['taxonomy'],
      'term_id' => null,
    );

    if (is_product()) {
      global $post;

      $terms = wp_get_post_terms($post->ID, $atts['taxonomy'], array('fields' => 'ids'));

      if (!empty($terms) && !is_wp_error($terms)) {
        $products_by_brand_filter['term_id'] = $terms[0];

        $shortcode_atts = array(
          'limit' => $atts['limit'],
        );

        unset($atts['taxonomy']);
        unset($atts['limit']);
        $shortcode_atts = array_merge($shortcode_atts, $atts);

        add_filter('woocommerce_shortcode_products_query', [$this, 'products_by_brand_filter_query'], 10, 3);

        $shortcode_string = '[products';
        foreach ($shortcode_atts as $key => $value) {
          $shortcode_string .= ' ' . $key . '="' . esc_attr($value) . '"';
        }
        $shortcode_string .= ']';

        $output = do_shortcode($shortcode_string);

        remove_filter('woocommerce_shortcode_products_query', [$this, 'products_by_brand_filter_query'], 10);

        return $output;
      }
    }

    return '';
  }

  function products_by_brand_filter_query($query_args, $atts, $type)
  {
    global $products_by_brand_filter;

    if (!empty($products_by_brand_filter['term_id'])) {
      if (!isset($query_args['tax_query'])) {
        $query_args['tax_query'] = array();
      }

      $query_args['tax_query'][] = array(
        'taxonomy' => $products_by_brand_filter['taxonomy'],
        'field' => 'term_id',
        'terms' => $products_by_brand_filter['term_id'],
      );
    }

    return $query_args;
  }
}
