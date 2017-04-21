<?php

	/**
	 * KVwpBaseFunctions - Add a new role and remove useless default roles
	 *
	 * @author Kreatív Vonalak - Leila Kiss <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
	 * @copyright (c) 2017, GNUv2
	 * @package KVwpBaseFunctions
	 * @since 1.0.8
	 * @version 1.0.0
	 */


	/**
	 * 'Admin' szerepkör hozzáadása
	 * Egyedi jogkörök kiosztása
	 * Custom jogkör kiosztás módja: 'capability_name' => true
	 * Beállításhoz segítség: <https://codex.wordpress.org/Roles_and_Capabilities#Capabilities>
	 */

	function add_admin_role() {

		// Levizsgáljuk, hogy a Woocommerce engedélyezve van-e a theme-functions.php-ben
		if ( WOOCOMMERCE_ENABLED === TRUE ) :

			$wc_cap = array(
				'assign_product_terms' => true,
				'assign_shop_coupon_terms' => true,
				'assign_shop_order_terms' => true,
				'assign_shop_webhook_terms' => true,
				'delete_others_products' => true,
				'delete_others_shop_coupons' => true,
				'delete_others_shop_orders' => true,
				'delete_others_shop_webhooks' => true,
				'delete_private_products' => true,
				'delete_private_shop_coupons' => true,
				'delete_private_shop_orders' => true,
				'delete_private_shop_webhooks' => true,
				'delete_product' => true,
				'delete_product_terms' => true,
				'delete_products' => true,
				'delete_published_products' => true,
				'delete_published_shop_coupons' => true,
				'delete_published_shop_orders' => true,
				'delete_published_shop_webhooks' => true,
				'delete_shop_coupon' => true,
				'delete_shop_coupon_terms' => true,
				'delete_shop_coupons' => true,
				'delete_shop_order' => true,
				'delete_shop_order_terms' => true,
				'delete_shop_orders' => true,
				'delete_shop_webhook' => true,
				'delete_shop_webhook_terms' => true,
				'delete_shop_webhooks' => true,
				'edit_others_products' => true,
				'edit_others_shop_coupons' => true,
				'edit_others_shop_orders' => true,
				'edit_others_shop_webhooks' => true,
				'edit_private_products' => true,
				'edit_private_shop_coupons' => true,
				'edit_private_shop_orders' => true,
				'edit_private_shop_webhooks' => true,
				'edit_product' => true,
				'edit_product_terms' => true,
				'edit_products' => true,
				'edit_published_products' => true,
				'edit_published_shop_coupons' => true,
				'edit_published_shop_orders' => true,
				'edit_published_shop_webhooks' => true,
				'edit_shop_coupon' => true,
				'edit_shop_coupon_terms' => true,
				'edit_shop_coupons' => true,
				'edit_shop_order' => true,
				'edit_shop_order_terms' => true,
				'edit_shop_orders' => true,
				'edit_shop_webhook' => true,
				'edit_shop_webhook_terms' => true,
				'edit_shop_webhooks' => true,
				'manage_product_terms' => true,
				'manage_shop_coupon_terms' => true,
				'manage_shop_order_terms' => true,
				'manage_shop_webhook_terms' => true,
				'manage_woocommerce' => true,
				'publish_products' => true,
				'publish_shop_coupons' => true,
				'publish_shop_orders' => true,
				'publish_shop_webhooks' => true,
				'read_private_products' => true,
				'read_private_shop_coupons' => true,
				'read_private_shop_orders' => true,
				'read_private_shop_webhooks' => true,
				'read_product' => true,
				'read_shop_coupon' => true,
				'read_shop_order' => true,
				'read_shop_webhook' => true,
				'view_woocommerce_reports' => true
			);

		else:
			$wc_cap = array();

		endif;

		// Levizsgáljuk, hogy a WPML engedélyezve van-e a theme-functions.php-ben
		if ( WPML_ENABLED === TRUE ) :

			$wpml_cap = array(
				'wpml_manage_languages' => true,
				'wpml_manage_media_translation' => true,
				'wpml_manage_navigation' => true,
				'wpml_manage_sticky_links' => true,
				'wpml_manage_string_translation' => true,
				'wpml_manage_support' => true,
				'wpml_manage_taxonomy_translation' => true,
				'wpml_manage_theme_and_plugin_localization' => true,
				'wpml_manage_translation_analytics' => true,
				'wpml_manage_translation_management' => true,
				'wpml_manage_translation_options' => true,
				'wpml_manage_troubleshooting' => true,
				'wpml_manage_woocommerce_multilingual' => true,
				'wpml_manage_wp_menus_sync' => true,
				'wpml_operate_woocommerce_multilingual' => true
			);

		else:
			$wpml_cap = array();

		endif;

		add_role( 'admin', 'Admin', array(
			'create_pages' => true,
			'create_posts' => true,
			'create_users' => true,
			'delete_others_pages' => true,
			'delete_others_posts' => true,
			'delete_pages' => true,
			'delete_posts' => true,
			'delete_private_pages' => true,
			'delete_private_posts' => true,
			'delete_published_pages' => true,
			'delete_published_posts' => true,
			'edit_dashboard' => true,
			'edit_others_pages' => true,
			'edit_others_posts' => true,
			'edit_pages' => true,
			'edit_posts' => true,
			'edit_private_pages' => true,
			'edit_private_posts' => true,
			'edit_published_pages' => true,
			'edit_published_posts' => true,
			'edit_theme_options' => true,
			'edit_users' => true,
			'list_users' => true,
			'manage_categories' => true,
			'manage_options' => true,
			'moderate_comments' => true,
			'promote_users' => true,
			'publish_pages' => true,
			'publish_posts' => true,
			'read' => true,
			'read_private_pages' => true,
			'read_private_posts' => true,
			'unfiltered_upload' => true,
			'update_themes' => true,
			'upload_files' => true,
			$wp_cap,
			$wpml_cap,
		) );

	}
	add_action('init', 'add_admin_role');

	// Remove default roles
	function remove_roles() {
		remove_role( 'editor' );  			// Szerkesztő
		remove_role( 'author' );				// Szerző
		remove_role( 'contributor' );		// Közreműködő
		remove_role( 'subscriber' );		// Feliratkozó
	}
	add_action('init', 'remove_roles');

 ?>
