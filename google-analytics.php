<?php

  /**
   * KVwpBaseFunctions - Google Analytics code
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */

  if ( !empty( GA_CODE ) ) {
    add_action('wp_head', 'kvbf_add_google_analytics', 999);
    function kvbf_add_google_analytics() {
      echo "<script>";
      echo " (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');";
      echo "ga('create', '".GA_CODE."', 'auto');";
      echo "ga('send', 'pageview');";
      echo '</script>';
    }
  }

?>
