<?php
/**
 * Core Class File
 * 
 * @package crudapp
 * @file Core File
 * @type class
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */
namespace classes;

use classes\DB;
use includes\SmartySingleton;

class Core
{
    protected $template_engine;
    protected $db;
    protected $smarty;
    protected $request;

    function __construct( Request $request )
    {
        $this->request = $request;
        $this->init();
    }

    private function init()
    {
        $this->db = DB::instance();
        $this->smarty = SmartySingleton::instance();
    }
}

