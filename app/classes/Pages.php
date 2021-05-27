<?php
/**
 * Pages Class File
 * 
 * @package crudapp
 * @file Pages File
 * @type class
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */
namespace classes;

use classes\Feeds\FetchData;
use Exception;
use model\ArticlesModel;

class Pages extends Core
{   
    protected $ArticlesModelObj;

    function __construct(Request $request)
    {
        parent::__construct( $request );
        $this->ArticlesModelObj = new ArticlesModel();
    }

    public function display($page)
    {
        app_debug("(PAGES) PDO ID: ".$this->db->pdoid);
        
        $this->ArticlesModelObj->fetch('all');

        $this->smarty->display('pages/home.tpl');
    }
}

