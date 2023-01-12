<?php namespace WSUWP\Plugin\Legacy_Web_Templates;

class Endpoint {


	public static function init() {

		add_action( 'template_redirect', array( __CLASS__, 'handle_template_request' ) );

	}


	/**
	 * Look for and handle any requests made to the `/web-template/` URL so that a JSON object containing
	 * the two parts of the template can be returned. We force the response to 200 OK and die as soon as
	 * the JSON is output.
	 */
	public static function handle_template_request() {

		global $wp_query;

		if ( self::is_template_request() ) {

			$pre = self::build_pre_content();

			$post = self::build_post_content();

			status_header( 200 );

			$wp_query->is_404 = false;

			header( 'HTTP/1.1 200 OK' );

			header( 'Content-Type: application/json' );

			echo json_encode( array( 'before_content' => $pre, 'after_content' => $post ) );

			die(0);

		}
	}


	/**
	 * Determine if this is a template request.
	 *
	 * @return bool
	 */
	public static function is_template_request() {


		if ( isset( $_SERVER['REQUEST_URI'] ) && false !== strpos( $_SERVER['REQUEST_URI'], '/web-template/' ) ) {

			return true;

		}

		return false;

	}


	public static function build_pre_content() {

		$html_title = ( isset( $_GET['html_title'] ) ) ? $_GET['html_title'] : 'Washington State University';

		$html = get_option( 'web_template_before', '' );

		$html = str_replace( '[page_title]', $html_title, $html );

		return $html;

	}

	public static function build_post_content() {

		$html = get_option( 'web_template_after', '' );

		return $html;

	}


}

Endpoint::init();
