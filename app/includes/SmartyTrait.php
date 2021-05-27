<?php

trait SmartyTrait
{
    function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $smarty = new SmartySingleton();

        
    }
}

?>