<?php

  /**
   * KVwpBaseFunctions - WPML functions
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */


  /**
   * Display avialable language
   * @usage <?php icl_post_language(); ?>
   */
  function icl_post_languages() {
    $languages = icl_get_languages( 'skip_missing = 0' );
    if(1 < count($languages)){
      foreach($languages as $l){
        if( $l['active'] ) {
          $langs[] = '<a href="'.$l['url'].'" class="current">'.$l['code'].'</a><span class="sep">|</span>';
        } else {
          $langs[] = '<a href="'.$l['url'].'">'.$l['code'].'</a><span class="sep">|</span>';
        }
      }
      echo join('', $langs);
    }
  }


  /**
   * Remove WPML generator meta tag
   */
  if ( ! empty ( $GLOBALS['sitepress'] ) ) {
    add_action( 'wp_head', function() {
      remove_action( current_filter(), array ( $GLOBALS['sitepress'], 'meta_generator_tag' ) );
    }, 0 );
  }

?>
