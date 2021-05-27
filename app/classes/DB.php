<?php
/**
 * DB Class File
 * 
 * @package crudapp
 * @file DB File for MySQL using PDO 
 * @type class
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */

namespace classes;

use \PDO;

class DB
{
    protected static $instance = null;
    protected $pdo;
    public $pdoid;

    public function __construct() 
    {
        if(!APP_DB_IS_CONNECT) {
            $this->pdo = null;
            return;    
        }

        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        
        $dsn = 'mysql:host='.APP_DB_HOST.';dbname='.APP_DB_NAME.';charset='.APP_DB_CHARSET;

        $this->pdo = new PDO($dsn, APP_DB_USER, APP_DB_PASSWORD, $opt);
        $this->pdoid = rand(99999,999999);
    }

    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        if( is_null($this->pdo) )
            return -1;
            
        return call_user_func_array(array($this->pdo, $method), $args);
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = [])
    {
        if (!$args)
        {
             return $this->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
