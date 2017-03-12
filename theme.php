<?php

  /**
   * KVwpBaseFunctions - Add theme supports and more functions
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */



  /**
   * Setting Theme support
   */
  add_action( 'after_setup_theme', 'kvbf_setup' );
  function kvbf_setup() {
    load_theme_textdomain( TEXTDOMAIN, THEME_URL . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
      'search-form',
      'gallery',
      'caption'
      )
    );
  }


  /**
   * Add slug and category to the body tag
   */
  add_filter( 'body_class', 'kvbf_add_slug_body_class' );
  function kvbf_add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
      $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
  }


  /**
   * Limit excerpt length, $length = words count
   */
  add_filter( 'excerpt_length', 'kvbf_custom_excerpt_length', 999 );
  function kvbf_custom_excerpt_length( $length ) {
    return 30;
  }


  /**
   * Replace [...] -> ...
   */
  add_filter('excerpt_more', 'kvbf_excerpt_more');
  function kvbf_excerpt_more( $more ) {
    return '...';
  }


?>
