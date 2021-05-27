<?php

namespace includes;

use \Smarty;

class SmartySingleton
{
	static private $instance;
	
	function __construct() {}
	
	private function __clone() {}
	
	private function __wakeup() {}
	
	static public function instance()
	{
		if( !isset( self::$instance ) )
		{
			$smarty = new Smarty;
			
			$smarty->setTemplateDir( APPABSPATH . '/views/' );
			$smarty->setCompileDir( APPABSPATH . '/views_c/' );
			$smarty->setCacheDir( APPABSPATH . '/cache/' );
			
			$smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
			$smarty->debugging = APPDEBUG;
			
			#define( 'CFG_DIR_TEMPLATES', $smarty->getTemplateDir(0) );
			
			self::$instance = $smarty;
		};
		
		return self::$instance;
	}
	
}

?>