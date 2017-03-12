<?php

  /**
   * KVwpBaseFunctions - Custom navigation
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */



  /**
   * Register custom menu's
   */
  add_action( 'init', 'kvbf_register_custom_menu' );
  function kvbf_register_custom_menu() {
    register_nav_menus(
      array(
        'fomenu'             => 'Fejléc menü',
        'footer-menu'        => 'Lábléc menü'
      )
    );
  }

?>
