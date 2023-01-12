<?php namespace WSUWP\Plugin\Legacy_Web_Templates;

class Settings {


	public static function init() {

		add_action( 'admin_init', array( __CLASS__, 'add_template_settings' ) );

	}


	public static function add_template_settings() {

		$args = array(
			'type' => 'string',
			'default' => '',
		);

		register_setting(
			'reading', // option group "reading", default WP group
			'web_template_before', // option name
			$args
		);

		register_setting(
			'reading', // option group "reading", default WP group
			'web_template_after', // option name
			$args
		);

		// add our new setting
		add_settings_field(
			'web_template_before', // ID
			'Web Template Before', // Title
			array( __CLASS__, 'web_template_before_render' ), // Callback
			'reading', // page
			'default', // section
		);

		// add our new setting
		add_settings_field(
			'web_template_after', // ID
			'Web Template After', // Title
			array( __CLASS__, 'web_template_after_render' ), // Callback
			'reading', // page
			'default', // section
		);

	}


	public static function web_template_before_render( $args ) {

		$web_template = get_option( 'web_template_before', '' );

		echo '<textarea id="web_template_before" name="web_template_before">';

		echo $web_template;

		echo '</textarea>';

	}

	public static function web_template_after_render( $args ) {

		$web_template = get_option( 'web_template_after', '' );

		echo '<textarea id="web_template_after" name="web_template_after">';

		echo $web_template;

		echo '</textarea>';

	}


}

Settings::init();
