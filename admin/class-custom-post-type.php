<?php

/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.0.0
 * */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); //exit if access directly
}
if ( ! class_exists( 'Egens_Custom_Post_Type' ) ) {
	class Egens_Custom_Post_Type {

		//$instance variable
		private static $instance;

		public function __construct() {
			//register post type
			add_action( 'init', array( $this, 'register_custom_post_type') );
		}

		/**
		 * get Instance
		 * @since  2.0.0
		 * */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  2.0.0
		 * */
		// Register Custom Post Type
		public function register_custom_post_type() {
			if (!defined('ELEMENTOR_VERSION')){
				return;
			}
			$all_post_type = array(
				[
					'post_type' => 'xoon-service',
					'args'      => array(
						'label'              => esc_html__( 'Our Services', 'xoon-core' ),
						'description'        => esc_html__( 'Our Services', 'xoon-core' ),
						'menu_icon'           => 'dashicons-groups',
						'labels'             => array(
							'name'               => esc_html_x( 'Our Services', 'Post Type General Name', 'xoon-core' ),
							'singular_name'      => esc_html_x( 'Our Services', 'Post Type Singular Name', 'xoon-core' ),
							'menu_name'          => esc_html__( 'Our Services', 'xoon-core' ),
							'all_items'          => esc_html__( 'All Services', 'xoon-core' ),
							'view_item'          => esc_html__( 'View Services', 'xoon-core' ),
							'add_new_item'       => esc_html__( 'Add New Service', 'xoon-core' ),
							'add_new'            => esc_html__( 'Add New Service', 'xoon-core' ),
							'edit_item'          => esc_html__( 'Edit Services', 'xoon-core' ),
							'update_item'        => esc_html__( 'Update Services', 'xoon-core' ),
							'search_items'       => esc_html__( 'Search Services', 'xoon-core' ),
							'not_found'          => esc_html__( 'Not Found', 'xoon-core' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'xoon-core' ),
						),
						'supports'           => array( 'title','editor', 'excerpt','thumbnail'),
						'hierarchical'       => true,
						'public'             => true,
						'has_archive' 		=> true,
						"publicly_queryable" => true,
						'show_ui'            => true,
						"rewrite" => array( 'slug' => 'service', 'with_front' => true),
						'exclude_from_search'   => false,
						'can_export'         => true,
						'capability_type'    => 'post',
						'query_var'          => true,
						"show_in_rest"		 => false,
						'menu_icon'           => 'dashicons-format-gallery',
					)
				],
			);
			
			if ( ! empty( $all_post_type ) && is_array( $all_post_type ) ) {
				foreach ( $all_post_type as $post_type ) {
					call_user_func_array( 'register_post_type', $post_type );
				}
			}
			// Job details custom post
			$all_job_types = array(
				[
					'post_type' => 'xoon-portfolio',
					'args'      => array(
						'label'              => esc_html__( 'Portfolio', 'xoon-core' ),
						'description'        => esc_html__( 'Portfolio', 'xoon-core' ),
						'menu_icon'           => 'dashicons-portfolio',
						'labels'             => array(
							'name'               => esc_html_x( 'Portfolio', 'Post Type General Name', 'xoon-core' ),
							'singular_name'      => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'xoon-core' ),
							'menu_name'          => esc_html__( 'Portfolio', 'xoon-core' ),
							'all_items'          => esc_html__( 'All Portfolio', 'xoon-core' ),
							'view_item'          => esc_html__( 'View Portfolio', 'xoon-core' ),
							'add_new_item'       => esc_html__( 'Add New Portfolio', 'xoon-core' ),
							'add_new'            => esc_html__( 'Add New Portfolio', 'xoon-core' ),
							'edit_item'          => esc_html__( 'Edit Portfolio', 'xoon-core' ),
							'update_item'        => esc_html__( 'Update Portfolio', 'xoon-core' ),
							'search_items'       => esc_html__( 'Search Portfolio', 'xoon-core' ),
							'not_found'          => esc_html__( 'Not Found', 'xoon-core' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'xoon-core' ),
						),
						'supports'           => array( 'title','editor', 'excerpt','thumbnail'),
						'hierarchical'       => true,
						'public'             => true,
						'has_archive' 		=> true,
						"publicly_queryable" => true,
						'show_ui'            => true,
						"rewrite" => array( 'slug' => 'portfolio', 'with_front' => true),
						'exclude_from_search'   => false,
						'can_export'         => true,
						'capability_type'    => 'post',
						'query_var'          => true,
						"show_in_rest"		 => false,
						'menu_icon'           => 'dashicons-admin-users',
					)
				],
			);
			
			if ( ! empty( $all_job_types ) && is_array( $all_job_types ) ) {
				foreach ( $all_job_types as $all_job_type ) {
					call_user_func_array( 'register_post_type', $all_job_type );
				}
			}

			/**
			 * Custom Taxonomy Register
			 */
			$all_custom_taxonmy = array(
				array(
					'taxonomy' => 'xoon-service-category',
					'object_type' => 'xoon-service',
					'args' => array(
						"labels" => array(
							"name" => esc_html__( "Service Categories", 'xoon-core' ),
							"singular_name" => esc_html__( "Service Categories", 'xoon-core' ),
							"menu_name" => esc_html__( "Service Categories", 'xoon-core' ),
							"all_items" => esc_html__( "All Service Category", 'xoon-core' ),
							"add_new_item" => esc_html__( "Add New Service Category", 'xoon-core' )
						),
						"public" => true,
						"hierarchical" => true,
						'has_archive' => true,
						"show_ui" => true,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"rewrite" => array( 'slug' => 'service-category', 'with_front' => true),
						"query_var" => true,
						"show_admin_column" => true,
						"show_in_rest" => false,
						"show_in_quick_edit" => true,
					)
				),
			);
			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)){
				foreach ($all_custom_taxonmy as $taxonomy){
					call_user_func_array('register_taxonomy',$taxonomy);
				}
			}
			// Job details category
			$all_jobs_taxonmy = array(
				array(
					'taxonomy' => 'xoon-portfolio-category',
					'object_type' => 'xoon-portfolio',
					'args' => array(
						"labels" => array(
							"name" => esc_html__( "Portfolio Categories", 'xoon-core' ),
							"singular_name" => esc_html__( "Portfolio Categories", 'xoon-core' ),
							"menu_name" => esc_html__( "Portfolio Categories", 'xoon-core' ),
							"all_items" => esc_html__( "All Portfolio Category", 'xoon-core' ),
							"add_new_item" => esc_html__( "Add New Portfolio Category", 'xoon-core' )
						),
						"public" => true,
						"hierarchical" => true,
						'has_archive' => true,
						"show_ui" => true,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"rewrite" => array( 'slug' => 'portfolio-category', 'with_front' => true),
						"query_var" => true,
						"show_admin_column" => true,
						"show_in_rest" => false,
						"show_in_quick_edit" => true,
					)
				),
			);
			if (is_array($all_jobs_taxonmy) && !empty($all_jobs_taxonmy)){
				foreach ($all_jobs_taxonmy as $all_jobs){
					call_user_func_array('register_taxonomy',$all_jobs);
				}
			}
			flush_rewrite_rules();
		}


	}//end class

	if ( class_exists( 'Egens_Custom_Post_Type' ) ) {
		Egens_Custom_Post_Type::getInstance();
	}
}