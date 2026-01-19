<?php

namespace JPJULIAO\B2BKing_Addons;

abstract class Shop_Filters_Base
{
  protected function get_filter_values(string $key): array
  {
    if (!isset($_GET[$key])) {
      return [];
    }

    $value = $_GET[$key];

    if (is_array($value)) {
      return array_map('sanitize_text_field', $value);
    }

    if (is_string($value)) {
      $values = explode(',', $value);
      return array_map('sanitize_text_field', $values);
    }

    return [];
  }

  protected function render_simple_taxonomy_filter(string $taxonomy, string $title, string $param_name): string
  {
    $options = $this->get_terms_options($taxonomy);
    $current_filters = $this->get_filter_values($param_name);

    return $this->render_checkbox_list($title, $options, $param_name, $current_filters);
  }

  protected function get_terms_options(string $taxonomy): array
  {
    global $wp_query;

    $args = [
      'taxonomy' => $taxonomy,
      'hide_empty' => true, // Only show terms with products
    ];

    if ($wp_query->is_main_query() && (is_shop() || is_product_taxonomy())) {
      $query_args = $wp_query->query_vars;

      unset($query_args['paged'], $query_args['page'], $query_args['offset']);

      $query_args['posts_per_page'] = 999999;
      $query_args['fields'] = 'ids';
      $query_args['no_found_rows'] = true;

      if (isset($_GET['min_price']) || isset($_GET['max_price'])) {
        $meta_query = isset($query_args['meta_query']) ? $query_args['meta_query'] : [];
        $price_query = ['key' => '_price', 'type' => 'numeric', 'compare' => 'BETWEEN'];

        $min = isset($_GET['min_price']) ? floatval($_GET['min_price']) : 0;
        $max = isset($_GET['max_price']) ? floatval($_GET['max_price']) : 999999999;

        $price_query['value'] = [$min, $max];
        $meta_query[] = $price_query;
        $query_args['meta_query'] = $meta_query;
      }

      $filtered_product_ids = get_posts($query_args);

      if (!empty($filtered_product_ids)) {
        $args['object_ids'] = $filtered_product_ids;
      } else {
        $args['object_ids'] = [0];
      }
    }

    $terms = get_terms($args);

    if (empty($terms) || is_wp_error($terms)) {
      return [];
    }

    $options = [];
    foreach ($terms as $term) {
      $options[$term->slug] = $term->name;
    }

    return $options;
  }

  protected function render_checkbox_list(string $title, array $items, string $input_name, array $selected_values = []): string
  {
    ob_start();
    ?>
    <div class="filter-group">
      <h4 class="filter-title"><?php echo esc_html($title); ?></h4>
      <ul class="filter-options">
        <?php foreach ($items as $value => $label): ?>
          <li>
            <label>
              <input type="checkbox" name="<?php echo esc_attr($input_name); ?>[]" value="<?php echo esc_attr($value); ?>"
                <?php checked(in_array($value, $selected_values)); ?>>
              <?php echo esc_html($label); ?>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php
    return ob_get_clean();
  }
}
