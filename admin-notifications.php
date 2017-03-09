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
      add_action( 'admin_notices', 'kvbf_showDebugMessages' );
      function kvbf_showDebugMessages() {
        echo '<div id="message" class="notice notice-warning">';
          echo '<p><strong>' . __('FIGYELEM!', TEXTDOMAIN) . '</strong> <strong><em>DEBUG MOD</em></strong> ' . __('aktív. Az oldal élesítése előtt inaktíválandó!', TEXTDOMAIN) . '</p>';
        echo '</div>';
      }
    }

    if ( empty( DEVELOPER_NAME ) ) {
      add_action( 'admin_notices', 'kvbf_showDebugMessages2' );
      function kvbf_showDebugMessages2() {
        echo '<div id="message" class="notice notice-warning">';
          echo '<p><strong>' . __('FIGYELEM!', TEXTDOMAIN) . '</strong> ' . __('Nincs megadva a Fejlesztő cég neve.', TEXTDOMAIN) . '</p>';
        echo '</div>';
      }
    }

    if ( empty( GA_CODE ) ) {
      add_action( 'admin_notices', 'kvbf_showDebugMessages3' );
      function kvbf_showDebugMessages3() {
        echo '<div id="message" class="notice notice-warning">';
          echo '<p><strong>' . __('FIGYELEM!', TEXTDOMAIN) . '</strong> ' . __('Nincs megadva a Google Analytics követőkód.', TEXTDOMAIN) . '</p>';
        echo '</div>';
      }
    }

    if ( empty( TEXTDOMAIN ) ) {
      add_action( 'admin_notices', 'kvbf_showDebugMessages4' );
      function kvbf_showDebugMessages4() {
        echo '<div id="message" class="notice notice-error">';
          echo '<p><strong>' . __('HIBA!', TEXTDOMAIN) . '</strong> ' . __('Nincs definiálva a TEXTDOMAIN a functions.php-ban!.', TEXTDOMAIN) . '</p>';
        echo '</div>';
      }
    }

    if ( USE_EDITOR_STYLE == FALSE ) {
      add_action( 'admin_notices', 'kvbf_showDebugMessages5' );
      function kvbf_showDebugMessages5() {
        echo '<div id="message" class="notice notice-info">';
          echo '<p><strong>' . __('HELLO!', TEXTDOMAIN) . '</strong> ' . __('A Téma nem tartalmaz editor-style.css file-t. Cselekedj ma jót és készítsd el :)', TEXTDOMAIN) . '</p>';
        echo '</div>';
      }
    }

  }

?>
