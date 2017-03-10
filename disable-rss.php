<?php

  /**
   * KVwpBaseFunctions - Disable RSS, Atom feeds
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */


  function kvbf_disable_feed() {
    wp_die( __( 'Nincs elérhető feed, kérem térjen vissza a <a href="'. esc_url( home_url( '/' ) ) .'">főoldalra</a>!', TEXTDOMAIN ) );
  }

  add_action('do_feed', 'kvbf_disable_feed', 1);
  add_action('do_feed_rdf', 'kvbf_disable_feed', 1);
  add_action('do_feed_rss', 'kvbf_disable_feed', 1);
  add_action('do_feed_rss2', 'kvbf_disable_feed', 1);
  add_action('do_feed_atom', 'kvbf_disable_feed', 1);
  add_action('do_feed_rss2_comments', 'kvbf_disable_feed', 1);
  add_action('do_feed_atom_comments', 'kvbf_disable_feed', 1);

?>
