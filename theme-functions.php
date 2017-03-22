<?php

  /**
   * KVwpBaseFunctions
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0.3
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
  define( 'USE_EDITOR_STYLE', TRUE );
  /**
   * Használat:
   * Ha jó a beépített, akkor hagyjuk üresen a CUSTOM_LOGIN_LOGO-t.
   * Ha szeretnénk egyedi logót, akkor használjuk a következő formulát:
   * KÉPFILE_NEVE - pl.: custom_logo.png
   * define( 'CUSTOM_LOGIN_LOGO', serialize(array('KÉPFILE_NEVE', 'KÉPFILE_MAGASSÁGA', 'KÉPFILE_SZÉLESSÉGE')) );
   * KÉPFILE_MAGASSÁGA és KÉPFILE_SZÉLESSÉGE - pl.: 55, a px kiterjesztést nem kell hozzáteni
   */
  define( 'CUSTOM_LOGIN_LOGO', '' );
  define( 'USE_CUSTOM_POST_TYPES', FALSE );
  define( 'SHOW_DEBUG_BAR', FALSE );


  /**
   * Define social variables
   */
  define( 'FACEBOOK', '' );
  define( 'YOUTUBE', '' );
  define( 'TWITTER', '' );
  define( 'INSTAGRAM', '' );



  /**
   * Rewrite global definition
   */


  /**
   * Megtiltjuk, minden felhasználónak, hogy új témát, plugin-t tudjon feltölteni
   */
  //define( 'DISALLOW_FILE_MODS', true );

  /**
   * Megtiltjuk minden felhasználónak, hogy szerkeszteni tudja a téma vagy a plugin file-jait
   */
  define( 'DISALLOW_FILE_EDIT', true );

  /**
   * Egy adott posztból hány db változatot őrizzen meg a WP,
   * ha a szám helyett false szerepel, le van tiltva az adott funkció
   */
  define( 'WP_POST_REVISIONS', 3 );

  /**
   * A WP X nap után törli a lomtárat
   * Ha 0, akkor a WP nem kérdezz rá, hogy akarja-e törölni,
   * hanem automatikusan törli anélkül, hogy a lomtárba helyezné az adott elemet
   */
  define('EMPTY_TRASH_DAYS', 7);

  /**
   * x másodperc után mentődjön a post, az alap 60 mp
   */
  define('AUTOSAVE_INTERVAL', 120);

  /**
   * alapértelmezett téma beállítása
   */
  //define('WP_DEFAULT_THEME', '');



  /**
   * Ha USE_CUSTOM_POST_TYPES === TRUE
   * Példa: cpt-example.md
   * Hozz létre az includes mappán belül egy új file-t, az elnevezésben kövesd az alábbi patternt:
   * CUSTOM_POST_TYPES_NAME-post.php
   * Majd a létrehozott file-t add hozzá a $includes tömbhöz.
   */
  if ( USE_CUSTOM_POST_TYPES === TRUE ):
    require_once 'CPT_Core.php';
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
    'login-screen.php'              // Login screen modification
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
  if ( SHOW_DEBUG_BAR === TRUE ):
    require_once 'show-debugbar.php';
  endif;

?>
