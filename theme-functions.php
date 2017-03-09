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


  /** Define main variables */
  define( 'TEXTDOMAIN', '' );
  define( 'THEME_DIR', get_template_directory() );
  define( 'THEME_URL', get_template_directory_uri() );
  define( 'DEVELOPER_NAME', 'Kreatív Vonalak' );
  define( 'GA_CODE', '' );
  define( 'USE_EDITOR_STYLE', TRUE );


  /** Define social variables */
  define( 'FACEBOOK', '' );
  define( 'YOUTUBE', '' );
  define( 'TWITTER', '' );
  define( 'INSTAGRAM', '' );



  /** Rewrite global definition */

  /** Megtiltjuk, minden felhasználónak, hogy új témát, plugin-t tudjon feltölteni */
  //define( 'DISALLOW_FILE_MODS', true );

  /** Megtiltjuk minden felhasználónak, hogy szerkeszteni tudja a téma vagy a plugin file-jait */
  define( 'DISALLOW_FILE_EDIT', true );



  /**
   * Include functions
   *
   *  - Admin functions
   *  - Site functions
   */

  if ( is_admin() ) :
    include( 'admin-notifications.php' );
  endif;


?>

