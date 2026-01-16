<?php

$active_number = get_option('b2bking_posts_per_page_backend_setting', 20);
?>
<div class="b2bking_post_toolbar">
  <div class="b2bking_toolbar_selected_count b2bking_toolbar_selected_inactive">
    <span class="b2bking_toolbar_selected_count_number">3</span>
    <span class="b2bking_toolbar_selected_count_text"><?php esc_html_e('selected', 'b2bking'); ?></span>
  </div>
  <div id="b2bking_toolbar_settings_tab" class="b2bking_toolbar_settings_tab_inactive">
    <ul class="b2bking_toolbar_settings_list">
      <li><span class="b2bking_show_per_page"><?php esc_html_e('SHOW', 'b2bking'); ?></span></li>
      <li class="b2bking_show_per_page_number <?php if ($active_number == 20) {
        echo 'b2bking_active_page_number';
      } ?>">20</li>
      <li class="b2bking_show_per_page_number <?php if ($active_number == 50) {
        echo 'b2bking_active_page_number';
      } ?>">50</li>
      <li class="b2bking_show_per_page_number <?php if ($active_number == 100) {
        echo 'b2bking_active_page_number';
      } ?>">100</li>
    </ul>
  </div>
  <div class="b2bking_toolbar_select b2bking_select">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
      <path fill="#A0A0A0"
        d="M17.08 4.69a1.875 1.875 0 0 1 1.253 1.768v8.334a3.542 3.542 0 0 1-3.541 3.541H6.458A1.875 1.875 0 0 1 4.69 17.08l1.748.003h8.355a2.291 2.291 0 0 0 2.291-2.291V6.458l-.003-.042V4.689Zm-2.708-3.023a1.875 1.875 0 0 1 1.875 1.875v10.83a1.875 1.875 0 0 1-1.875 1.875H3.542a1.875 1.875 0 0 1-1.875-1.874V3.542a1.875 1.875 0 0 1 1.875-1.875h10.83Zm-3.147 4.558-3.242 3.24-.816-1.09a.625.625 0 1 0-1 .75l1.25 1.667a.626.626 0 0 0 .941.066l3.75-3.75a.625.625 0 0 0-.883-.883Z" />
    </svg>
    <span class="b2bking_toolbar_select_text"><?php esc_html_e('Select All', 'b2bking'); ?></span>
  </div>
  <div class="b2bking_toolbar_enable_disable b2bking_toolbar_enable b2bking_toolbar_inactive">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path fill="#A0A0A0" d="M17 7H7a5 5 0 1 0 0 10h10a5 5 0 1 0 0-10Zm0 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
    </svg>
    <span class="b2bking_toolbar_select_text"><?php esc_html_e('Enable', 'b2bking'); ?></span>
  </div>
  <div class="b2bking_toolbar_enable_disable b2bking_toolbar_disable b2bking_toolbar_inactive">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path fill="#A0A0A0"
        d="M17 6H7c-3.31 0-6 2.69-6 6s2.69 6 6 6h10c3.31 0 6-2.69 6-6s-2.69-6-6-6Zm0 10H7c-2.21 0-4-1.79-4-4s1.79-4 4-4h10c2.21 0 4 1.79 4 4s-1.79 4-4 4ZM7 9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3Z" />
    </svg>
    <span class="b2bking_toolbar_select_text"><?php esc_html_e('Disable', 'b2bking'); ?></span>
  </div>
  <div id="b2bking_toolbar_settings">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"
      style="pointer-events: none">
      <g clip-path="url(#a)">
        <path stroke="#AEAEAE" stroke-linecap="square" stroke-linejoin="round"
          d="m7.925.667-.114.582-.439 2.131A7.36 7.36 0 0 0 5.46 4.477L3.316 3.76l-.576-.177-.299.513L.965 6.564l-.298.516.437.383 1.659 1.41c-.06.37-.138.734-.138 1.122 0 .388.078.753.138 1.122l-1.659 1.41-.437.382.298.515 1.476 2.467.299.516.576-.18 2.144-.716c.575.45 1.21.829 1.912 1.097l.439 2.13.114.583h4.148l.116-.582.438-2.131a7.368 7.368 0 0 0 1.912-1.097l2.144.716.576.18.3-.515 1.474-2.468.3-.515-.438-.382-1.659-1.411c.061-.37.137-.733.137-1.123 0-.386-.076-.752-.137-1.121l1.659-1.41.438-.383-.3-.515-1.474-2.467-.3-.514-.576.178-2.144.716a7.361 7.361 0 0 0-1.912-1.097l-.438-2.13-.116-.583H7.925Z"
          clip-rule="evenodd" />
        <path stroke="#AEAEAE" stroke-linecap="square" stroke-linejoin="round"
          d="M12.667 9.993a2.667 2.667 0 1 1-5.334 0 2.667 2.667 0 0 1 5.334 0Z" clip-rule="evenodd" />
      </g>
      <defs>
        <clipPath id="a">
          <path fill="#fff" d="M0 0h20v20H0z" />
        </clipPath>
      </defs>
    </svg>
  </div>
</div>