<?php

  /**
   * KVwpBaseFunctions - Shortcodes
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */


  /**
   * Youtube videó beágyazása
   *
   * Szükséges a helyes megjelenítéshez a .embed-container beépítése a CSS file-ba
   *
   * @usage [youtube videoid="xxxxxxxxxx"]
   */
  add_shortcode('youtube', 'kvbf_embend_youtube');
  function kvbf_embend_youtube( $atts ) {
    $atts = shortcode_atts(array('videoid' => ''), $atts);
    return '<div class="embed-container"><iframe src="http://www.youtube.com/embed/' . $atts['videoid'] . '" frameborder="0" allowfullscreen></iframe></div>';
  }


  /**
   * Button shortcode
   * @usage [button link="http://valami.hu" szoveg="Gomb szövege" ujoldal="igen/nem"]
   */
  add_shortcode( 'button', 'kvbf_button_shortcode' );
  function kvbf_button_shortcode( $attrs ) {
    $button_attrs = shortcode_atts( array( 'link' => '', 'szoveg' => '', 'ujoldal' => 'igen' ), $attrs );
    if ( $button_attrs['ujoldal'] == 'igen' ) { $new_window = ' target="_blank"'; } else { $new_window = ''; }
    return '<a href="' . $button_attrs['link'] . '"' . $new_window . ' class="btn">' . $button_attrs['szoveg'] . ' &raquo;</a>';
  }

?>
