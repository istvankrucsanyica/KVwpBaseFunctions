<?php

  /**
   * KVwpBaseFunctions - Disable/Remove meta elements
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */

  /**
   * <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://domain.name/xmlrpc.php?rsd" />
   */
  remove_action( 'wp_head', 'rsd_link' );

  /**
   * <meta name="generator" content="WordPress 4.7.3" />
   */
  remove_action( 'wp_head', 'wp_generator' );

  /**
   * remove feed links
   */
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'feed_links_extra', 3 );

  /**
   * remove adjacent post links
   */
  remove_action( 'wp_head', 'index_rel_link' );
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

  /**
   * <link rel='shortlink' href='http://domain.name/?p=1487' />
   */
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

  /**
   * <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://domain.name/wp-includes/wlwmanifest.xml" />
   */
  remove_action( 'wp_head', 'wlwmanifest_link' );

  /**
   * remove Emoji scripts
   */
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );

?>
