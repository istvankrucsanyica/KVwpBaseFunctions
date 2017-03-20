<?php

  /**
   * KVwpBaseFunctions - Show debug bar
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0.2
   * @version 1.0.3
   */



class KVBF_Debug_Bar {

  private $average_option;

  public function __construct() {
    add_action( 'wp_footer', array( $this, 'kvbf_footer' ) );
    add_action( 'admin_footer', array( $this, 'kvbf_footer' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'kvbf_style' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'kvbf_style' ) );
  }

  public function kvbf_footer() {
    $this->display();
  }

  public function kvbf_style() {
    echo '
    <style type="text/css">
      #kvbf-debug-box{color:#8B0000;background:#FA8072;padding:1em 1em 1em 1.5em;position:fixed;bottom:0px;left:0px;z-index:9999;font-family:monospace;font-size:13px;}
      #kvbf-debug-box ul{list-style:none outside;margin:0;padding:0;}
      #kvbf-debug-box ul li{list-style:none outside;margin:0;padding:0;line-height:1.5em;}
    </style>';
  }

  public function display() {
    $timer_stop         = timer_stop(0);
    $query_count        = get_num_queries();
    $memory_usage       = $this->convert( memory_get_usage() );
    $memory_peak_usage  = $this->convert( memory_get_peak_usage() );
    $memory_limit       = $this->convert( $this->let_to_num( ini_get('memory_limit') ) );
    $wpmemory_limit     = $this->convert( $this->let_to_num( WP_MEMORY_LIMIT ) );
    ?>
    <div id="kvbf-debug-box">
      <ul>
        <li><?php printf( '%s lekérdezés %s másodperc alatt', $query_count, $timer_stop ); ?></li>
        <li><?php printf( '%s-ból %s felhasználva (%s)', $memory_limit, $memory_usage, round( ( $memory_usage / $memory_limit ), 2 ) * 100 . '%' ); ?></li>
        <li><?php printf( 'Legnagyobb memória használat: %s', $memory_peak_usage ); ?></li>
        <li><?php printf( 'memory_limit: %s (php.ini)', $memory_limit ); ?></li>
        <li><?php printf( 'WP_MEMORY_LIMIT: %s (wp-config.php)', $wpmemory_limit ); ?></li>
      </ul>
    </div>
    <?php
  }

  public function convert( $size ) {
    $unit=array('B','KB','MB','GB','TB','PB');
    return @round( $size / pow( 1024, ( $i = floor( log( $size, 1024 ) ) ) ),2 ).' '.$unit[$i];
  }

  public function let_to_num( $size ) {
    $l     = substr( $size, -1 );
    $ret   = substr( $size, 0, -1 );
    switch( strtoupper( $l ) ) {
      case 'P':
        $ret *= 1024;
      case 'T':
        $ret *= 1024;
      case 'G':
        $ret *= 1024;
      case 'M':
        $ret *= 1024;
      case 'K':
        $ret *= 1024;
    }
    return $ret;
  }

}

$KVBF_Debug_Bar = new KVBF_Debug_Bar();

?>
