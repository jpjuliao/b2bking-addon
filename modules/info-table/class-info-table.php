<?php
namespace JPJULIAO\B2BKing_Addons;

class Info_Table
{
  public function __construct()
  {
    if (is_b2b_user()) {
      add_filter(
        'b2bking_information_table_content_rows',
        [$this, 'b2b_info_table']
      );
    } else {
      add_action(
        'woocommerce_single_product_summary',
        [$this, 'guest_info_table']
      );
    }
  }

  public function b2b_info_table($rows_array): array
  {

    $is_percentage_tiered = intval(
      get_option('b2bking_enter_percentage_tiered_setting', 0)
    ) === 1;

    if (!$is_percentage_tiered) {
      return $rows_array;
    }

    // Get price
    $price = get_post_meta(
      get_the_ID(),
      '_price',
      true
    );

    foreach ($rows_array as $key => $row) {
      $row_values = explode(':', $row, 2);
      if (sizeof($row_values) === 2) {
        $row_values[1] = str_replace('%', '', $row_values[1]);
        $discounted_price = $price - ($price * ($row_values[1] / 100));
        $row_values[1] = number_format($discounted_price, 2, '.', '');
        $rows_array[$key] = implode(':', $row_values);
      }
    }
    return $rows_array;
  }

  public function get_b2b_prices(): string
  {

    global $post;
    $b2bgroups = get_posts(['post_type' => 'b2bking_group']);
    $first_b2bgroup = $b2bgroups[0];
    $b2b_prices = get_post_meta(
      $post->ID,
      'b2bking_product_customrows_group_' . $first_b2bgroup->ID,
      true
    );
    return $b2b_prices;
  }

  public function guest_info_table(): void
  {
    $b2b_prices = $this->get_b2b_prices();
    ?>
    <div class="custom-info-table">
      <table class="shop_table b2bking_shop_table b2bking_information_table">
        <thead>
          <tr>
            <th><?php esc_html_e('Information Table', 'b2bking'); ?></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $customrows = str_replace('&amp;', '&', $b2b_prices);
          $rows_array = explode(';', $customrows);
          $rows_array = apply_filters(
            'b2bking_information_table_content_rows',
            $rows_array
          );
          foreach ($rows_array as $row) {
            $row_values = explode(':', $row, 2);
            if (!empty($row_values[0]) && !empty($row_values[1])) {
              ?>
              <tr>
                <td>
                  <?php echo wp_kses(
                    $row_values[0],
                    array(
                      'br' => true,
                      'strong' => true,
                      'b' => true,
                      'a' => array('href' => array(), 'target' => array())
                    )
                  ); ?>
                </td>
                <td class="locked">🔒</td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
      <div>
        <a href="/sign-up" class="btn btn-style-default btn-shape-rectangle btn-size-default">
          Sing up to see prices</a>
      </div>
    </div>
    <?php
  }

}