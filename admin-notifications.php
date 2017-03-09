<?php

  /**
   * KVwpBaseFunctions - Admin notifications
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */

  if ( current_user_can( 'administrator' ) ) {

    if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
      add_action( 'admin_notices', 'showDebugMessages' );
      function showDebugMessages() {
        echo '<div id="message" class="notice notice-warning">';
          echo '<p><strong>FIGYELEM!</strong> A <strong><em>DEBUG MÓD</em></strong> aktív. Az oldal élesítése előtt inaktíválandó!</p>';
        echo '</div>';
      }
    }

    if ( empty( DEVELOPER_NAME ) ) {
      add_action( 'admin_notices', 'showDebugMessages2' );
      function showDebugMessages2() {
        echo '<div id="message" class="notice notice-warning">';
          echo '<p><strong>FIGYELEM!</strong> Nincs megadva a Fejlesztő cég neve.</p>';
        echo '</div>';
      }
    }

    if ( empty( GA_CODE ) ) {
      add_action( 'admin_notices', 'showDebugMessages3' );
      function showDebugMessages3() {
        echo '<div id="message" class="notice notice-warning">';
          echo '<p><strong>FIGYELEM!</strong> Nincs megadva a Google Analytics követőkód.</p>';
        echo '</div>';
      }
    }

    if ( empty( TEXTDOMAIN ) ) {
      add_action( 'admin_notices', 'showDebugMessages4' );
      function showDebugMessages4() {
        echo '<div id="message" class="notice notice-error">';
          echo '<p><strong>HIBA!</strong> Nincs definiálva a TEXTDOMAIN a functions.php-ban!.</p>';
        echo '</div>';
      }
    }

    if ( USE_EDITOR_STYLE == FALSE ) {
      add_action( 'admin_notices', 'showDebugMessages5' );
      function showDebugMessages5() {
        echo '<div id="message" class="notice notice-info">';
          echo '<p><strong>HELLO!</strong> A Téma nem tartalmaz editor-style.css file-t. Cselekedj ma jót és készítsd el :)</p>';
        echo '</div>';
      }
    }

  }

?>
