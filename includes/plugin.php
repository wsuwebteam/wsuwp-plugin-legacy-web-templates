<?php namespace WSUWP\Plugin\Legacy_Web_Templates;

class Plugin {


	public static function get( $property ) {

		switch ( $property ) {

			case 'version':
				return WSUWPPLUGINWEBTEMPLATEVERSION;

			case 'dir':
				return plugin_dir_path( dirname( __FILE__ ) );

			case 'url':
				return plugin_dir_url( dirname( __FILE__ ) );

			default:
				return '';

		}

	}





	public static function init() {

		require_once __DIR__ . '/settings.php';

        require_once __DIR__ . '/endpoint.php';

	}


}

Plugin::init();
