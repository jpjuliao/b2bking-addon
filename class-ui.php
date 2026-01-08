<?php

namespace JPJULIAO\B2BKing\User_Dashboard;

class UI
{
  public function __construct()
  {

    add_action(
      'woocommerce_account_dashboard',
      [$this, 'reports_page_content']
    );

    add_action(
      'woocommerce_account_dashboard',
      [$this, 'popular_products']
    );
  }

  public static function get_header_bar()
  {

    ?>
    <div id="b2bking_admin_header_bar">
      <div id="b2bking_admin_header_bar_left">
        <img style="width:112px;margin-left:5px;position: relative;top: 1.5px;" src="<?php

        $custom_logo = 'no';
        if (defined('B2BKINGLABEL_DIR')) {
          if (!empty(get_option('b2bking_whitelabel_logo_setting', ''))) {
            $custom_logo = get_option('b2bking_whitelabel_logo_setting', '');
          }
        }

        if ($custom_logo === 'no') {
          $custom_logo = plugins_url('./includes/assets/images/logo.png', __FILE__);
        }

        echo $custom_logo;

        ?>">
        <div id="b2bking_admin_header_version2"><?php echo B2BKING_VERSION; ?></div>
      </div>
      <div id="b2bking_admin_header_bar_right">
        <?php
        $supportlink = 'https://webwizards.ticksy.com';

        if (!defined('B2BKINGLABEL_DIR')) {
          ?>
          <a class="b2bking_admin_header_right_element" target="_blank" href="https://woocommerce-b2b-plugin.com/docs"><span
              class="dashicons b2bking_header_icon"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.27103 2.11151C5.46135 2.21816 5.03258 2.41324 4.72718 2.71244C4.42179 3.01165 4.22268 3.43172 4.11382 4.225C4.00176 5.04159 4 6.12387 4 7.67568V16.2442C4.38867 15.9781 4.82674 15.7756 5.29899 15.6517C5.82716 15.513 6.44305 15.5132 7.34563 15.5135L20 15.5135V7.67568C20 6.12387 19.9982 5.04159 19.8862 4.22499C19.7773 3.43172 19.5782 3.01165 19.2728 2.71244C18.9674 2.41324 18.5387 2.21816 17.729 2.11151C16.8955 2.00172 15.7908 2 14.2069 2H9.7931C8.2092 2 7.10452 2.00172 6.27103 2.11151ZM6.75862 6.59459C6.75862 6.1468 7.12914 5.78378 7.58621 5.78378H16.4138C16.8709 5.78378 17.2414 6.1468 17.2414 6.59459C17.2414 7.04239 16.8709 7.40541 16.4138 7.40541H7.58621C7.12914 7.40541 6.75862 7.04239 6.75862 6.59459ZM7.58621 9.56757C7.12914 9.56757 6.75862 9.93058 6.75862 10.3784C6.75862 10.8262 7.12914 11.1892 7.58621 11.1892H13.1034C13.5605 11.1892 13.931 10.8262 13.931 10.3784C13.931 9.93058 13.5605 9.56757 13.1034 9.56757H7.58621Z"
                    fill="#c9c8cf"></path>
                  <path
                    d="M8.68965 17.1351H7.47341C6.39395 17.1351 6.01657 17.1421 5.72738 17.218C4.93365 17.4264 4.30088 18.0044 4.02952 18.7558C4.0463 19.1382 4.07259 19.4746 4.11382 19.775C4.22268 20.5683 4.42179 20.9884 4.72718 21.2876C5.03258 21.5868 5.46135 21.7818 6.27103 21.8885C7.10452 21.9983 8.2092 22 9.7931 22H14.2069C15.7908 22 16.8955 21.9983 17.729 21.8885C18.5387 21.7818 18.9674 21.5868 19.2728 21.2876C19.5782 20.9884 19.7773 20.5683 19.8862 19.775C19.9776 19.1088 19.9956 18.2657 19.9991 17.1351H13.1034V20.1417C13.1034 20.4397 13.1034 20.5886 12.9988 20.6488C12.8941 20.709 12.751 20.6424 12.4647 20.5092L11.0939 19.8713C10.9971 19.8262 10.9486 19.8037 10.8966 19.8037C10.8445 19.8037 10.796 19.8262 10.6992 19.8713L9.32842 20.5092C9.04213 20.6424 8.89899 20.709 8.79432 20.6488C8.68965 20.5886 8.68965 20.4397 8.68965 20.1417V17.1351Z"
                    fill="#c9c8cf"></path>
                </g>
              </svg></span><?php esc_html_e('Documentation', 'b2bking'); ?></a>
          <a class="b2bking_admin_header_right_element" target="_blank" href="<?php echo esc_attr($supportlink); ?>"><span
              class="dashicons b2bking_header_icon"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <path
                    d="M19.5816 18.5209C21.0889 16.7701 22 14.4915 22 12C22 9.50853 21.0889 7.22987 19.5816 5.47906L15.3089 9.75178C15.745 10.3925 16 11.1665 16 12C16 12.8335 15.745 13.6075 15.3089 14.2482L19.5816 18.5209Z"
                    fill="#c9c8cf"></path>
                  <path
                    d="M18.5209 19.5816C16.7701 21.0889 14.4915 22 12 22C9.50853 22 7.22987 21.0889 5.47906 19.5816L9.75178 15.3089C10.3925 15.745 11.1665 16 12 16C12.8335 16 13.6075 15.745 14.2482 15.3089L18.5209 19.5816Z"
                    fill="#c9c8cf"></path>
                  <path
                    d="M4.4184 18.5209L8.69112 14.2482C8.25495 13.6075 8 12.8335 8 12C8 11.1665 8.25495 10.3925 8.69112 9.75178L4.4184 5.47906C2.91114 7.22987 2 9.50853 2 12C2 14.4915 2.91114 16.7701 4.4184 18.5209Z"
                    fill="#c9c8cf"></path>
                  <path
                    d="M12 8C11.1665 8 10.3925 8.25495 9.75178 8.69112L5.47906 4.4184C7.22987 2.91114 9.50853 2 12 2C14.4915 2 16.7701 2.91114 18.5209 4.4184L14.2482 8.69112C13.6075 8.25495 12.8335 8 12 8Z"
                    fill="#c9c8cf"></path>
                </g>
              </svg></span><?php esc_html_e('Support', 'b2bking'); ?></a>
          <?php
        }
        ?>

      </div>
    </div>
    <?php
  }

  public function reports_page_content()
  {

    echo self::get_header_bar();

    // preloader if not in ajax - in ajax preloader is added via JS for smoother animations
    if (!wp_doing_ajax()) {
      ?>
      <div class="b2bkingpreloader">
        <img class="b2bking_loader_icon_button"
          src="<?php echo esc_attr(plugins_url('./includes/assets/images/loaderpagegold5.svg', __FILE__)); ?>">
      </div>
      <?php
    }

    ?>
    <div id="b2bking_dashboard_wrapper">
      <div class="b2bking_dashboard_page_wrapper b2bking_reports_page_wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-hover">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h3 class="card-title"><?php esc_html_e('Sales Reports', 'b2bking'); ?></h3>
                      <h5 class="card-subtitle"><?php esc_html_e('Total Sales Value', 'b2bking'); ?></h5>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                      <ul class="list-inline font-12 dl m-r-15 m-b-0 b2bking_reports_chart_info">
                        <li class="list-inline-item text-primary"><i class="mdi mdi-checkbox-blank-circle"></i>
                          <?php esc_html_e('Gross Sales', 'b2bking'); ?></li>
                        <li class="list-inline-item text-cyan"><i class="mdi mdi-checkbox-blank-circle"></i>
                          <?php esc_html_e('Net Sales', 'b2bking'); ?></li>
                        <li class="list-inline-item text-info"><i class="mdi mdi-checkbox-blank-circle"></i>
                          <?php esc_html_e('Number of Orders', 'b2bking'); ?></li>

                      </ul>
                      <div class="b2bking_reports_topright_container">
                        <div class="dl b2bking_reports_topright">
                          <div class="b2bking_reports_fromto">
                            <div class="b2bking_reports_fromto_text"><?php esc_html_e('From:', 'b2bking'); ?></div>
                            <input type="date" id="b2bking_reports_date_input_from"
                              class="b2bking_reports_date_input b2bking_reports_date_input_from">
                          </div>
                          <div class="b2bking_reports_fromto">
                            <div class="b2bking_reports_fromto_text"><?php esc_html_e('To:', 'b2bking'); ?></div>
                            <input type="date" class="b2bking_reports_date_input b2bking_reports_date_input_to">
                          </div>
                        </div>
                        <div id="b2bking_reports_quick_links">
                          <div class="b2bking_reports_linktext"><?php esc_html_e('Quick Select:', 'b2bking'); ?></div>
                          <a id="b2bking_reports_link_thismonth" hreflang="thismonth"
                            class="b2bking_reports_link"><?php esc_html_e('This Month', 'b2bking'); ?></a>
                          <a hreflang="lastmonth"
                            class="b2bking_reports_link"><?php esc_html_e('Last Month', 'b2bking'); ?></a>
                          <a hreflang="thisyear"
                            class="b2bking_reports_link"><?php esc_html_e('This Year', 'b2bking'); ?></a>
                          <a hreflang="lastyear"
                            class="b2bking_reports_link"><?php esc_html_e('Last Year', 'b2bking'); ?></a>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-3">
                      <h1 class="b2bking_total_b2b_sales_today m-b-0 m-t-30"><?php echo 0 ?></h1>
                      <h6 class="font-light text-muted"><?php esc_html_e('Sales', 'b2bking'); ?></h6>
                      <h3 class="b2bking_number_orders_today m-t-30 m-b-0"><?php echo 0; ?></h3>
                      <h6 class="font-light text-muted"><?php esc_html_e('Orders', 'b2bking'); ?></h6>
                      <a id="b2bking_export_report_button" class="btn btn-info m-t-20 p-15 p-l-25 p-r-25 m-b-20"
                        href="javascript:void(0)"><?php esc_html_e('Export Report File', 'b2bking'); ?></a>
                    </div>
                    <!-- column -->
                    <img class="b2bking_reports_icon_loader"
                      src="<?php echo esc_attr(plugins_url('./includes/assets/images/loaderpagegold5.svg', __FILE__)); ?>">
                    <div class="col-lg-9">
                      <div class="campaign ct-charts"></div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-9">
                      <div class="campaign2 ct-charts"></div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- Info Box -->
                <!-- ============================================================== -->
                <div class="card-body border-top">
                  <div class="row m-b-0" id="b2bking_reports_first_row">
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-cart"></i></span></div>
                        <div><span><?php esc_html_e('Gross Sales', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_gross_sales font-medium m-b-0"><?php echo 0; ?></h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-cyan display-5"><i
                              class="mdi mdi-cart-outline"></i></i></span></div>
                        <div><span><?php esc_html_e('Net Sales', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_net_sales font-medium m-b-0">
                            <?php echo 0; ?>
                          </h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-info display-5"><i class="mdi mdi-package-variant"></i></span>
                        </div>
                        <div><span><?php esc_html_e('Orders Placed', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_number_orders font-medium m-b-0"><?php echo 0; ?></h3>
                        </div>
                      </div>
                    </div>

                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-primary display-5"><i
                              class="mdi mdi-tag-multiple"></i></i></span></div>
                        <div><span><?php esc_html_e('Items Purchased', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_items_purchased font-medium m-b-0"><?php echo 0; ?></h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                  </div>
                  <div class="row m-b-0" id="b2bking_reports_second_row">
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-shopping"></i></span>
                        </div>
                        <div><span><?php esc_html_e('Average Order Value', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_average_order_value font-medium m-b-0"><?php echo 0; ?></h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-cyan display-5"><i
                              class="mdi mdi-credit-card-off"></i></i></span></div>
                        <div><span><?php esc_html_e('Refund Amount', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_refund_amount font-medium m-b-0">
                            <?php echo 0; ?>
                          </h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-info display-5"><i class="mdi mdi-ticket-percent"></i></span>
                        </div>
                        <div><span><?php esc_html_e('Coupons Used', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_coupons_amount font-medium m-b-0"><?php echo 0; ?></h3>
                        </div>
                      </div>
                    </div>

                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                      <div class="d-flex align-items-center">
                        <div class="m-r-10"><span class="text-primary display-5"><i
                              class="mdi mdi-truck-delivery"></i></i></span></div>
                        <div><span><?php esc_html_e('Shipping Charges', 'b2bking'); ?></span>
                          <h3 class="b2bking_reports_shipping_charges font-medium m-b-0"><?php echo 0; ?></h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table id="b2bking_admin_reports_export_table" style="display:none">
      <thead>
        <tr>
          <th><?php esc_html_e('Date', 'b2bking'); ?></th>
          <th><?php esc_html_e('Gross Sales', 'b2bking'); ?></th>
          <th><?php esc_html_e('Net Sales', 'b2bking'); ?></th>
          <th><?php esc_html_e('Number of Orders', 'b2bking'); ?></th>
          <th><?php esc_html_e('Number of Items', 'b2bking'); ?></th>
          <th><?php esc_html_e('Refund Amount', 'b2bking'); ?></th>
          <th><?php esc_html_e('Worth of Coupons', 'b2bking'); ?></th>
          <th><?php esc_html_e('Shipping Charges', 'b2bking'); ?></th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    <?php

  }

  public function popular_products()
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
    echo '<div class="b2bk_user_dashboard_popular_products">';
    echo '<h3>' . esc_html__('Popular Products', 'b2bking') . '</h3>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . esc_html__('Name', 'b2bking') . '</th>';
    echo '<th>' . esc_html__('Quantity', 'b2bking') . '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($products as $product_id => $quantity) {
      $link = get_the_permalink($product_id);
      echo '<tr>';
      echo '<td><a href="' . $link . '">' . get_the_title($product_id) . '</a></td>';
      echo '<td>' . $quantity . '</td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
  }
}