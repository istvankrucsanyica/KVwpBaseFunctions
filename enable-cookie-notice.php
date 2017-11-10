<?php

if ( ! class_exists( 'KVBF_CookieNotice' ) ) {

  /**
   * Cookie Notice
   * A felhasználók tájékoztatása a sütik használatáról.
   * @author Istvan Krucsanyica <istvan.krucsanyica@gmail.com>
   * @version 1.0.3
   * @since 1.0.6
   * @copyright 2017 Istvan Krucsanyica
   */

  class KVBF_CookieNotice {

    private $cookie_name;
    private $cookie_validity;
    private $button_name;
    private $message;

    public function __construct() {

    }


    public function show_script() {
      $this->set_script();
    }


    public function show_html() {
      $this->display();
    }


    private function set_script() {
      echo '
      <script type="text/javascript">
        var button = document.getElementById("accept_cookie");
        var cn_container = document.getElementsByClassName("cookie-notice-container");

        button.addEventListener("click",function(e){
          createCookie( "' . $this->getName() . '", ' . current_time( 'timestamp' ) . ', ' . $this->getTime() . ', "/" );
          cn_container[0].style.display ="none";
        },false);

        function createCookie(name, value, expires, path, domain) {
          var cookie = name + "=" + escape(value) + ";";
          if (expires) {
            if(expires instanceof Date) {
              if (isNaN(expires.getTime()))
               expires = new Date();
            }
            else
              expires = new Date(new Date().getTime() + parseInt(expires) * 1000 * 60 * 60 * 24);

            cookie += "expires=" + expires.toGMTString() + ";";
          }

          if (path)
            cookie += "path=" + path + ";";
          if (domain)
            cookie += "domain=" + domain + ";";

          document.cookie = cookie;
        }
      </script>';
    }


    private function display() {
      echo '
      <div class="cookie-notice-container">
        <div class="cookie-notice-message">' . $this->getMessage() . '</div>
        <div class="cookie-notice-button"><button id="accept_cookie">' . $this->getButtonName() . '</button></div>
      </div>
      ';
    }


    private function storeCookie() {
      return setcookie( $this->getName(), current_time( 'timestamp' ), $this->getTime(), '/' );
    }


    public function checkCookie() {
      if ( ! $this->isSearchEngine() ):
        if ( ! isset( $_COOKIE[$this->getName()] ) ):
          add_action( 'wp_footer', array( $this, 'show_html' ) );
          add_action( 'wp_footer', array( $this, 'show_script' ), 10, 1 );
        endif;
      endif;
    }


    public function setName( $cookie_name ) {
      $this->cookie_name = $cookie_name;
    }


    private function getName() {
      return $this->cookie_name;
    }


    public function setTime( $cookie_validity ) {
      $date = new DateTime();
      $date->modify( $cookie_validity );
      $this->cookie_validity = $date->getTimestamp();
    }


    private function getTime() {
      return $this->cookie_validity;
    }


    public function setButonName( $button_name ) {
      $this->button_name = $button_name;
    }


    private function getButtonName() {
      return __( $this->button_name, TEXTDOMAIN );
    }


    public function setMessage( $message ) {
      $this->message = $message;
    }


    private function getMessage() {
      return __( $this->message, TEXTDOMAIN );
    }


    private function isSearchEngine() {
      $bots  = array( 'google', 'googlebot', 'yahoo', 'facebook', 'twitter', 'slurp', 'search.msn.com', 'nutch', 'simpy', 'bot', 'aspseek', 'crawler', 'msnbot', 'libwww-perl', 'fast', 'baidu' );
      if ( empty ( $_SERVER['HTTP_USER_AGENT'] ) ):
        return false;
      endif;
      $ua = strtolower( $_SERVER['HTTP_USER_AGENT'] );
      foreach ( $bots as $bot ):
        if (stripos($ua, $bot) !== false):
          return true;
        endif;
        return false;
      endforeach;
    }

  }

}
