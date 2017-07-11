<?php

  /**
   * TGM Plugin activations
   * Alapértelmezett pluginok egyszerű telepítése és aktiválása
   * @author Thomas Griffin <http://tgmpluginactivation.com/>
   * @version 1.0.0
   * @since 1.1.2
   */

  if ( !defined( 'ABSPATH' ) ) { die( "Don't touch this." ); }

  require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

  add_action( 'tgmpa_register', 'kvbf_register_required_plugins' );
  function kvbf_register_required_plugins() {

    $plugins = array(
      array(
        'name'      => 'Advanced Custom Fields',
        'slug'      => 'advanced-custom-fields',
        'required'  => false,
      ),
      array(
        'name'      => 'Better WordPress Minify',
        'slug'      => 'bwp-minify',
        'required'  => false,
      ),
      array(
        'name'      => 'Contact Form 7',
        'slug'      => 'contact-form-7',
        'required'  => false,
      ),
      array(
        'name'      => 'Email Templates',
        'slug'      => 'email-templates',
        'required'  => false,
      ),
      array(
        'name'      => 'EWWW Image Optimizer',
        'slug'      => 'ewww-image-optimizer',
        'required'  => false,
      ),
      array(
        'name'      => 'Justified Gallery',
        'slug'      => 'justified-gallery',
        'required'  => false,
      ),
      array(
        'name'      => 'Minify HTML',
        'slug'      => 'minify-html-markup',
        'required'  => false,
      ),
      array(
        'name'      => 'Postman SMTP',
        'slug'      => 'postman-smtp',
        'required'  => false,
      ),
      array(
        'name'      => 'Rename wp-login.php',
        'slug'      => 'rename-wp-login',
        'required'  => false,
      ),
      array(
        'name'      => 'Simple Custom Post Order',
        'slug'      => 'simple-custom-post-order',
        'required'  => false,
      ),
      array(
        'name'      => 'TinyMCE Advanced',
        'slug'      => 'tinymce-advanced',
        'required'  => false,
      ),
    );

    $config = array(
      'id'           => 'tgmpa-hu_HU',
      'default_path' => '',
      'menu'         => 'tgmpa-install-plugins',
      'parent_slug'  => 'plugins.php',
      'capability'   => 'activate_plugins',
      'has_notices'  => true,
      'dismissable'  => true,
      'dismiss_msg'  => '',
      'is_automatic' => false,
      'message'      => ''
    );

    tgmpa( $plugins, $config );

  }
