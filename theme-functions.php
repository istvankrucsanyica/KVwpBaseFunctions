<?php

  /**
   * KVwpBaseFunctions
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
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
   * Include functions
   *  - Site functions
   *  - Admin functions
   */

  $includes = array(
    'remove-metas.php',             // Disable/Remove meta elements
    'disable-rss.php',              // Disable RSS, Atom feeds
    'disable-emoji.php',            // Disable WP emoji
    'disable-json.php',             // Disable WP-JSON
    'disable-oembed.php'            // Disable oEmbend
    'google-analytics.php',         // Insert Google Analytics code
    'yoast.php',                    // If use YOAST plugin -> Remove YOAST plugin generated comments
    'wpml.php',                     // WPML functions
    'widgets.php',                  // Register Widget area
    'login-screen.php'              // Login screen modification
  );

  if ( is_admin() ) {
    $includes_admin = array(
      'admin-notifications.php',    // Add admin notifications
      'core-functions.php'          // Updates and more
    );
    $includes = array_merge($includes,$includes_admin);
  }

  foreach ( $includes as $i ) {
    locate_template( $i, true, true );
  }

?>

