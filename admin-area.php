<?php

  /**
   * KVwpBaseFunctions - Modificate admin area
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0.0
   * @version 1.0.4
   */



  /**
   * Revrite WP admin footer text
   */
  if ( ! empty( DEVELOPER_NAME ) ) {
    add_filter( 'admin_footer_text', 'kvbf_remove_footer_admin' );
    function kvbf_remove_footer_admin() {
      echo '&copy; ' . date('Y') . ' <a href=" ' . DEVELOPER_URL . ' " target="_blank">' . DEVELOPER_NAME . '</a>';
    }
  }


  /**
   * If Administrator - Show WP version in footer
   */
  add_action( 'admin_menu', 'kvbf_clear_admin_dashboard_footer_right' );
  function kvbf_clear_admin_dashboard_footer_right() {
    if ( ! current_user_can( 'update_core' ) ) {
      remove_filter( 'update_footer', 'core_update_footer' );
    }
  }


  /**
   * Disable admin help link, if WooCommerce is not enabled
   */
  add_action('admin_head', 'kvbf_remove_help_tabs');
  function kvbf_remove_help_tabs() {
    if ( !class_exists( 'WooCommerce', false ) ) {
      $screen = get_current_screen();
      $screen->remove_help_tabs();
    }
  }

  /**
   * Add custom background color to the posts lists
   */
  add_action('admin_footer','kvbf_posts_status_color');
  function kvbf_posts_status_color(){
  ?>
    <style>
    .status-draft{background: #FCE3F2!important;}
    .status-pending{background: #87C5D6!important;}
    .status-publish{}
    .status-future{background: #C6EBF5!important;}
    .status-private{background:#F2D46F!important;}
    </style>
  <?php
  }

?>
