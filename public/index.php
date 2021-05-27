<?php
/**
 * Application Main Engine
 * 
 * @package crudapp
 * @file Main Index File
 * @author @austinnoronha
 */

/**
 * @constant APPABSPATH app folder absolute path
 */
if ( ! defined( 'APPABSPATH' ) ) {
	define( 'APPABSPATH', dirname(__DIR__) . '/app/' );
}

/**
 * @constant PUBLICABSPATH public folder absolute path
 */
if ( ! defined( 'PUBLICABSPATH' ) ) {
	define( 'PUBLICABSPATH', dirname(__FILE__) . '/' );
}

/**
 * @constant APPDEBUG used to debug the app
 */
if ( ! defined( 'APPDEBUG' ) ) {
	define( 'APPDEBUG', true );
}

require_once( APPABSPATH . 'index.php' );