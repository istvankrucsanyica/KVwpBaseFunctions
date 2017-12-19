<?php

  /**
   * KVwpBaseFunctions - Admin Menu Customize
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.1.3
   * @version 1.0.0
   */



  /**
   * Remove Admin menu items for non administrators
   */
  function disable_menu_items() {

    if ( !current_user_can( 'administrator' ) ) :

      $menu_page_item = array(
        'edit-comments.php',
        'plugins.php',
        'options-general.php',
        'tools.php',
        'edit.php?post_type=acf'
      );

      $submenu_page_item = array(
        '0' => array(
          'menu_slug'     => 'themes.php',
          'submenu_slug'  => 'themes.php',
        ),
        '1' => array(
          'menu_slug'     => 'themes.php',
          'submenu_slug'  => 'widgets.php',
        ),
        '2' => array(
          'menu_slug'     => 'index.php',
          'submenu_slug'  => 'update-core.php',
        ),
        '3' => array(
          'menu_slug'     => 'themes.php',
          'submenu_slug'  => 'theme-editor.php',
        )
      );

      foreach( $menu_page_item as $item ) :
        remove_menu_page( $item );
      endforeach;

      foreach( $submenu_page_item as $item ) :
        remove_submenu_page( $item['menu_slug'], $item['submenu_slug'] );
      endforeach;

    endif;

  }
  add_action( 'admin_menu', 'disable_menu_items' );
  add_action( 'admin_init', 'disable_menu_items' );


  /**
   *
   * Remove Admin Menu Link for non administrators from Theme Customizer
   *
   */
  function remove_customize() {

    if ( !current_user_can( 'administrator' ) ) :

      $customize_url_arr = array();
      $customize_url_arr[] = 'customize.php';
      $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
      $customize_url_arr[] = $customize_url;

      if ( current_theme_supports( 'custom-header' ) ) :
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url );
        $customize_url_arr[] = 'custom-header';
      endif;

      if ( current_theme_supports( 'custom-background' ) ) :
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url );
        $customize_url_arr[] = 'custom-background';
      endif;

      foreach ( $customize_url_arr as $customize_url ) :
        remove_submenu_page( 'themes.php', $customize_url );
      endforeach;

    endif;

  }
  add_action( 'admin_menu', 'remove_customize', 999 );

  remove_action('welcome_panel', 'wp_welcome_panel');

  /**
   *
   * Remove Admin dashboard widgets, with whitelist support
   *
   */
  function kvbf_remove_dashboard_widgets() {

    global $wp_meta_boxes;

    $skipped = array();

    foreach ($wp_meta_boxes as $meta_boxes => $boxes) :

      foreach( $boxes as $place => $place_name ) :

        foreach( $place_name as $core => $core_item ) :

          foreach( $core_item as $key => $item ) :

            if ( !in_array( $key, $skipped ) ) :
              unset($wp_meta_boxes[$meta_boxes][$place][$core][$key]);
            endif;

          endforeach;

        endforeach;

      endforeach;

    endforeach;

  }
  add_action( 'wp_dashboard_setup', 'kvbf_remove_dashboard_widgets', 999 );
