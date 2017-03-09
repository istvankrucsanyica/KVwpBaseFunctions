<?php

  /**
   * KVwpBaseFunctions - Login screen modification
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */



  // Change admon login logo - respect Ricsi
  function kvbf_login_logo() {
    $logo_image = '';
    $height = 51;
    $width  = 331;
    if ( $logo_image == '') {
      $image = THEME_URL . '/includes/login/admin_logo.svg';
      $w = '';
      $h = '';
    } else {
      $image = THEME_URL . '/images/' . $logo_image;
      $w = 'width: ' . $width . 'px!important;';
      $h = 'height: ' . $height . 'px!important;';
    }
    echo '
    <style type="text/css">
      body.login div#login h1 a {
        background-image: url(\'' . $image . '\');
        background-size: 100%;
        margin-bottom: 10px;
        position: relative;
        '. $w .'
        '. $h .'
      }
    </style>';
  }
  add_action('login_head', 'kvbf_login_logo');



  // Add new stylesheet to the login page
  function kvbf_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . THEME_URL . '/includes/login/custom-login-styles.css" />';
  }
  add_action('login_head', 'kvbf_custom_login');



  // Mod login logo url
  function kvbf_login_logo_url() {
    return get_bloginfo( 'url' );
  }
  add_filter( 'login_headerurl', 'kvbf_login_logo_url' );



  // Mod login logo url title
  function kvbf_login_logo_url_title() {
    return get_bloginfo( 'sitename' );
  }
  add_filter( 'login_headertitle', 'kvbf_login_logo_url_title' );



  // Override login error
  function kvbf_login_error_override() {
    return __('A megadott bejelentkezési adatok helytelenek!', TEXTDOMAIN);
  }
  add_filter('login_errors', 'kvbf_login_error_override');



  // Remove login page shake js
  function kvbf_login_head() {
    remove_action('login_head', 'wp_shake_js', 12);
  }
  add_action('login_head', 'kvbf_login_head');



  // Set "Remember Me" To Checked
  function kvbf_login_checked_remember_me() {
    add_filter( 'login_footer', 'kvbf_rememberme_checked' );
  }
  //add_action( 'init', 'kvbf_login_checked_remember_me' );

  function kvbf_rememberme_checked() {
    echo "<script>document.getElementById('rememberme').checked = true;</script>";
  }



  // Add login footer text
  function kvbf_loginfooter() {
    echo '<p id="footer-text">&copy; ' . date('Y') . ' <a href="' . DEVELOPER_URL . '" target="_blank">' . DEVELOPER_NAME . '</a> - ' . get_bloginfo( 'sitename' ) . '<br/><small>powered by <a href="https://wordpress.org/" target="_blank">WordPress</a></small></p>';
  }
  add_action('login_footer','kvbf_loginfooter');
