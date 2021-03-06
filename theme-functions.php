<?php

  /**
   * KVwpBaseFunctions
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0.0
   * @version 1.1.4
   */


  /**
   * Define main variables
   */
  define( 'TEXTDOMAIN', '' );
  define( 'THEME_DIR', get_template_directory() );
  define( 'THEME_URL', get_template_directory_uri() );
  define( 'DEVELOPER_NAME', 'Kreatív Vonalak' );
  define( 'DEVELOPER_URL', 'http://www.kreativvonalak.hu/' );
  define( 'GA_CODE', '' );
  define( 'USE_EDITOR_STYLE', FALSE );
  /**
   * Használat:
   * Ha jó a beépített, akkor hagyjuk üresen a CUSTOM_LOGIN_LOGO-t.
   * Ha szeretnénk egyedi logót, akkor használjuk a következő formulát:
   * KÉPFILE_NEVE - pl.: custom_logo.png
   * define( 'CUSTOM_LOGIN_LOGO', serialize(array('KÉPFILE_NEVE', 'KÉPFILE_MAGASSÁGA', 'KÉPFILE_SZÉLESSÉGE')) );
   * KÉPFILE_MAGASSÁGA és KÉPFILE_SZÉLESSÉGE - pl.: 55, a px kiterjesztést nem kell hozzáteni
   */
  define( 'CUSTOM_LOGIN_LOGO', '' );
  define( 'ENABLE_CUSTOM_POST_TYPES', FALSE );
  define( 'ENABLE_CUSTOM_TAXONOMY', FALSE );
  define( 'ENABLE_CUSTOM_POST_TYPES_COLUMNS', FALSE );
  define( 'SHOW_QUERY_BAR', FALSE );
  define( 'ENABLE_COOKIE_NOTICE', FALSE );
  define( 'WOOCOMMERCE_ENABLED', FALSE );
  define( 'WPML_ENABLED', FALSE );
  define( 'ROLE_FUNCTIONS' , FALSE );
  define( 'ENABLE_TGM', TRUE );

  /**
   * Define social variables
   */
  define( 'FACEBOOK', '' );
  define( 'YOUTUBE', '' );
  define( 'TWITTER', '' );
  define( 'INSTAGRAM', '' );



  /**
   * Ha ENABLE_CUSTOM_POST_TYPES === TRUE
   * Példa: cpt-example.md
   * Hozz létre a types mappán belül egy új file-t, az elnevezésben kövesd az alábbi patternt:
   * CUSTOM_POST_TYPES_NAME-post.php
   * Majd a létrehozott file-t add hozzá a $includes tömbhöz.
   */
  if ( ENABLE_CUSTOM_POST_TYPES === TRUE ):
    require_once 'CPT_Core.php';
  endif;


  /**
   * Ha ENABLE_CUSTOM_TAXONOMY === TRUE
   * Példa: README.md
   */
  if ( ENABLE_CUSTOM_TAXONOMY === TRUE ):
    require_once 'CT_Core.php';
  endif;


  /**
   * Ha ENABLE_CUSTOM_POST_TYPES_COLUMNS === TRUE
   * Példa: cpt-example.md
   */
  if ( ENABLE_CUSTOM_POST_TYPES_COLUMNS === TRUE ):
    require_once 'CPT_Columns.php';
  endif;


  /**
   * Ha ENABLE_COOKIE_NOTICE === TRUE
   * Tájékoztató a sütik használatáról
   * Példa: README.md
   */
  if ( ENABLE_COOKIE_NOTICE === TRUE ):
    require_once 'enable-cookie-notice.php';
    $cookieNotice = new KVBF_CookieNotice();
    $cookieNotice->setTime( '+30 days' );
    $cookieNotice->setName( 'cookieNoticeAccepted' );
    $cookieNotice->setButonName( __( 'Elfogadom', TEXTDOMAIN ) );
    $cookieNotice->setMessage( __( 'Kedves Látogató! Tájékoztatjuk, hogy a honlap felhasználói élmény fokozásának érdekében sütiket alkalmazunk. A honlapunk használatával ön a tájékoztatásunkat tudomásul veszi.', TEXTDOMAIN ) );
    $cookieNotice->checkCookie();
  endif;


  /**
   * Alapértelmezett pluginok egyszerű telepítése és aktíválása
   */
  if ( ENABLE_TGM === TRUE ):
    require_once 'tgm-plugin/tgm-plugin-activation.php';
  endif;


  /**
   * Include functions
   *  - Site functions
   *  - Admin functions
   */

  $includes = array(
    'theme.php',                    // Add theme supports and more functions
    'navigation.php',               // Custom navigation
    'remove-metas.php',             // Disable/Remove meta elements
    'disable-rss.php',              // Disable RSS, Atom feeds
    'disable-emoji.php',            // Disable WP emoji
    'disable-json.php',             // Disable WP-JSON
    'disable-oembed.php',           // Disable oEmbend
    'load-script-css.php',          // Load script and css files
    'google-analytics.php',         // Insert Google Analytics code
    'yoast.php',                    // If use YOAST plugin -> Remove YOAST plugin generated comments
    'wpml.php',                     // WPML functions
    'widget.php',                   // Register Widget area
    'shortcodes.php',               // Shortcodes
    'thumbnail.php',                // Media functions
    'disable-search.php',           // Disable search
    'disable-comments.php',         // Disable comments
    'admin-bar.php',                // Admin bar modification
    'login-screen.php',             // Login screen modification
    'disable-menu-items.php',       // Remove Admin Menu items
  );

  if ( is_admin() ) {
    $includes_admin = array(
      'admin-notifications.php',    // Add admin notifications
      'admin-area.php',             // Modificate admin area
      'core-functions.php',         // Updates and more
      'tmce-editor.php'             // Editor functions, add shortcodes to the tinyMCE
    );
    $includes = array_merge($includes,$includes_admin);
  }

  foreach ( $includes as $i ) {
    require_once( $i );
  }


  /**
   * Show debug bar
   */
  if ( SHOW_QUERY_BAR === TRUE ):
    require_once 'show-querybar.php';
  endif;


  if ( ROLE_FUNCTIONS === TRUE ):
    require_once 'role-functions.php';
  endif;

?>
