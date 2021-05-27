<?php
/**
 * Include Common Loader File
 * 
 * @package crudapp
 * @file Config File
 */


/**
 * Content Securoty Policy set in the header for all responses
 */
header("Content-Security-Policy: default-src 'self';script-src 'self'");


/**
 * Load the CRUD APP Core class file
 */
require_once ( APPABSPATH . 'classes/Core.php' );


/**
 * Load the Smarty Templating Engine
 */
require_once ( APPABSPATH . 'includes/smarty/SmartyLoader.php' );
spl_autoload_register(array( 'SmartyLoader', 'loadHelper' ));


function app_debug()
{
    $tmp = '<div style="width: calc(100% - 40px);margin: 10px;padding:10px;font-size: 14px;color:#333;background: #fffae1;display: block;border: 1px solid #ffe9b2;border-radius: 4px;">';

    $tmp_args = func_get_args();
    foreach($tmp_args as $key => $val)
    {
        $tmp .= '<code style="padding: 10px;margin: 0;width: calc(100% - 20px);word-break: break-word;white-space: pre-wrap;border-radius: 5px;"><pre>'.( is_string($val) ? $val : print_r($val, 1) ) . '</pre></code>';
    }
    $tmp .= '</div>';

    echo $tmp;
}

?>