<?php

/**
 * Elementor Addons Init
 * @package infotek
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly
}

if ( ! class_exists( 'Infotek_Elementor_Widget_Init' ) ) {

	class Infotek_Elementor_Widget_Init {
	   /**
		* $instance
		* @since 1.0.0
		*/
		private static $instance;

	   /**
		* construct()
		* @since 1.0.0
		*/
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array( $this, '_widget_categories' ) );
			//elementor widget registered
			add_action( 'elementor/widgets/widgets_registered', array( $this, '_widget_registered' ) );
			// elementor editor css
			add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'load_assets_for_elementor' ) );

			// for icomoon icon
			add_action( 'init', [ $this, 'i18n' ] );
			// for icomoon icon
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		public function i18n() {
			load_plugin_textdomain( 'infotek-core' );
		}

		/**
	     * getInstance()
	     * @since 1.0.0
	     */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 */
		public function _widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'infotek_widgets',
				[
					'title' => esc_html__( 'Infotek Widgets', 'infotek-core' ),
					'icon'  => 'fas fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 */
		public function _widget_registered() {
			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}
			$elementor_widgets = array(
				'banner-with-image',
				'text-slide',
				'about-image',
				'about-content',
				'brands',
				'service-post',
				'counters',
				'project-post',
				'testimonials',
				'team-post',
				'pricing',
				'faq-with-image',
				'blog-post',
				'cta-with-image',
				'offer-icon-box',
				'heading-with-button',
				'progress-bar',
				'choose-images',
				'contact-form',
				'form-images',
				'service-sidebar',
				'service-sidebar-hour',
				'project-info',
				'project-details-paination',
				'contact-info',
				'banner-slider',
				'work-process-icon',
				'buttons',
			);

			$elementor_widgets = apply_filters( 'infotek_elementor_widget', $elementor_widgets );
			ksort( $elementor_widgets );
			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				foreach ( $elementor_widgets as $widget ) {
					if ( file_exists( INFOTEK_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php' ) ) {
						require_once INFOTEK_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php';
					}
				}
			}
		}	

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		*/
		public function load_assets_for_elementor() {
			wp_enqueue_style( 'infotek-core-elementor-style', INFOTEK_CORE_ADMIN_ASSETS . '/css/elementor-editor.css' );
		}

		/**
		 * load custom icons for elementor
		 * @since 1.0.0
		*/

		public function init() {
			add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		}

		public function init_widgets() {
			require_once plugin_dir_path( __FILE__ ) . '../customicon/icon.php';
		}
	}

	if ( class_exists( 'Infotek_Elementor_Widget_Init' ) ) {
		Infotek_Elementor_Widget_Init::getInstance();
	}
}//end if
