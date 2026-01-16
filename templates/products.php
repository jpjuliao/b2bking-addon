<div class="b2bk_user_dashboard_popular_products">
  <h3><?php echo esc_html__('Popular Products', 'b2bking'); ?></h3>
  <table>
    <thead>
      <tr>
        <th><?php echo esc_html__('Name', 'b2bking'); ?></th>
        <th><?php echo esc_html__('Quantity', 'b2bking'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product_id => $quantity): ?>
        <?php $link = get_the_permalink($product_id); ?>
        <tr>
          <td><a href="<?php echo esc_url($link); ?>"><?php echo esc_html(get_the_title($product_id)); ?></a></td>
          <td><?php echo esc_html($quantity); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>