<?php
/**
 * Application Config File
 * 
 * @package crudapp
 * @file Config File
 */

if( APPDEBUG )
{
    error_reporting(E_ALL);
}
else
{
    error_reporting(0);
}

spl_autoload_register(function($class) {
    $abs_path = APPABSPATH . str_replace('\\', '/', $class) . '.php';
    
    if(is_file( $abs_path )){
        include_once( $abs_path );
    }
});

/**
 * Define all config constants and variables
 */


/**
 * Define MYSQL Connection Params
 */
define('APP_DB_IS_CONNECT', true);
define('APP_DB_HOST', 'localhost');
define('APP_DB_USER', 'root');
define('APP_DB_PASSWORD', '');
define('APP_DB_NAME', 'mvc_mini_laravel');
define('APP_DB_CHARSET', 'utf8');

define('APP_TBL_ARTICLES', 'app_articles');

/**
 * Load the SMARTY Templating Engine
 */
require_once ( APPABSPATH . 'includes/loader.php' );
