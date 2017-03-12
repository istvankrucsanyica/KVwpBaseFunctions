<?php

  /**
   * KVwpBaseFunctions - Widgets
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */


  function kvbf_register_widgets() {
    register_sidebar( array(
      'name' => 'Sidebar widget area',
      'id' => 'sidebar-widget-area-kvbf',
      'description' => 'Description',
      'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    ) );
  }
  add_action( 'widgets_init', 'kvbf_register_widgets' );

  ?>
