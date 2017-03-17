<?php

  /**
   * KVwpBaseFunctions - Modificate admin area
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0.2
   */



  /**
   * Revrite WP admin footer text
   */
  if ( ! empty( DEVELOPER_NAME ) ) {
    add_filter( 'admin_footer_text', 'kvbf_remove_footer_admin' );
    function kvbf_remove_footer_admin() {
      echo '&copy; '.date('Y').' '.DEVELOPER_NAME;
    }
  }


  /**
   * Remove WP logo from admin bar header
   */
  add_action( 'wp_before_admin_bar_render', 'kvbf_admin_bar_remove', 999 );
  function kvbf_admin_bar_remove() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
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
   * Disable admin help link
   */
  add_action('admin_head', 'kvbf_remove_help_tabs');
  function kvbf_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
  }

?>
