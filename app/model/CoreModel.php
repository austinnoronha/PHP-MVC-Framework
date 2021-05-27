<?php
/**
 * Core Model Class File
 * 
 * @package crudapp
 * @file Core File
 * @type class
 * @subtype model
 */

/**
 * @namespace model - all models will be under App Model namespace
 */
namespace model;

use classes\DB;

class CoreModel
{
    protected $db;
 
    function __construct( )
    {
        $this->init();
    }

    private function init()
    {
        $this->db = DB::instance();
    }
}

