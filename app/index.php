<?php
/**
 * Application Index File
 * 
 * @package crudapp
 * @file App File
 */

require_once( APPABSPATH . 'includes/config.php' );

use classes\Router;
use classes\Request;
use classes\Pages;

$router = new Router( new Request() );

$router->get('/', function($request) {
    app_debug( $request->getBody() );
  $PagesObj = new Pages($request);
  $PagesObj->display('home');
});


$router->get('/profile', function($request) {
  return <<<HTML
  <h1>Profile</h1>
HTML;
});

$router->post('/data', function($request) {
    app_debug( $request->getBody() );
  return json_encode($request->getBody());
});


/**
 * Admin Router
 */
$router->get('/admin/login', function($request) {

});
