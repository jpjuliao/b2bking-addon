<?php

namespace JPJULIAO\B2BKing_Addons;

class Shop_Filters_Renderer extends Shop_Filters_Base
{

  public function __construct()
  {
    add_shortcode(
      'shop_filter_container',
      [$this, 'render_container_shortcode']
    );
    add_shortcode(
      'shop_filter_section',
      [$this, 'render_section_shortcode']
    );
  }

  public function render_container_shortcode(array $atts, string $content): string
  {
    $shop_url = get_permalink(wc_get_page_id('shop'));
    $content = $this->remove_unwanted_shortcodes(
      $content,
      ['shop_filter_section']
    );
    ob_start();
    ?>
    <form method="get" action="<?php echo esc_url($shop_url); ?>" class="shop-filters-form">
      <?php
      foreach ($_GET as $key => $value) {
        if (in_array($key, ['filter', 'product_cat', 'product_tag', 'product_brand'])) {
          continue;
        }
        if (strpos($key, 'filter_') === 0) {
          continue;
        }

        if (is_array($value)) {
          foreach ($value as $v) {
            echo '<input type="hidden" name="' . esc_attr($key) . '[]" value="' . esc_attr($v) . '" />';
          }
        } else {
          echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" />';
        }
      }
      echo do_shortcode($content);
      ?>
      <div class="shop-filters-control">
        <button type="submit" class="apply-filters-btn">Apply Filters</button>
      </div>
    </form>
    <?php
    return ob_get_clean();
  }

  public function render_section_shortcode(array $atts, string $content): string
  {
    $section = $atts['section'];

    if ($section === 'best-new-discounts') {
      return $this->get_product_best_new_discounts_filter($atts);
    }
    if (in_array($section, ['product_tag', 'product_cat', 'product_brand'])) {
      return $this->get_product_taxonomies_filter($atts, $section);
    }
    if ($section === 'attributes') {
      return $this->get_product_attributes_filter($atts);
    }

    return '';
  }

  public function get_product_attributes_filter(array $atts): string
  {

    if (!function_exists('wc_get_attribute_taxonomies')) {
      return '';
    }

    $output = '';
    $attribute_taxonomies = wc_get_attribute_taxonomies();

    foreach ($attribute_taxonomies as $attribute) {
      $taxonomy = wc_attribute_taxonomy_name($attribute->attribute_name);

      if (!taxonomy_exists($taxonomy)) {
        continue;
      }

      $options = $this->get_terms_options($taxonomy);

      if (empty($options)) {
        continue;
      }

      $param_name = 'filter_' . $attribute->attribute_name;
      $current = $this->get_filter_values($param_name);

      $output .= $this->render_checkbox_list(
        $attribute->attribute_label,
        $options,
        $param_name,
        $current
      );
    }

    if (empty($output)) {
      return 'No results found.';
    } else {
      return $output;
    }
  }

  public function get_product_best_new_discounts_filter(array $atts): string
  {
    $current_filters = $this->get_filter_values('filter');

    $filters = [];

    $filters['best'] = 'Best Sellers';
    $filters['new'] = 'New Products';
    $filters['discounts'] = 'Discounts';

    if (empty($filters)) {
      return 'No results found.';
    }

    return $this->render_checkbox_list(
      'Filter',
      $filters,
      'filter',
      $current_filters
    );
  }

  public function get_product_taxonomies_filter(
    array $atts,
    string $section
  ): string {

    if ($section === 'product_tag') {
      return $this->render_simple_taxonomy_filter(
        'product_tag',
        'Product Tags',
        'product_tag'
      );
    }

    if ($section === 'product_cat') {
      return $this->render_simple_taxonomy_filter(
        'product_cat',
        'Product Categories',
        'product_cat'
      );
    }

    if ($section === 'product_brand') {
      return $this->render_simple_taxonomy_filter(
        'product_brand',
        'Product Brands',
        'product_brand'
      );
    }

    return 'No results found.';
  }
}