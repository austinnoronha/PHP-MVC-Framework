<?php 

class SmartyLoader
{
    public static function loadHelper($className) 
    {
        if (is_file($file = APPABSPATH . 'includes/smarty/' . $className . '.php')) 
        {
            require_once( $file );
        }
        else if (is_file($file = APPABSPATH . 'includes/smarty/' . $className . '.class.php')) 
        {
            require_once( $file );
        }
    }    
}

?>