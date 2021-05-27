<?php
/**
 * Articles Model Class File
 * 
 * @package crudapp
 * @file Articles File
 * @type class
 * @subtype model
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */
namespace model;

use model\CoreModel;
use \PDO;

class ArticlesModel extends CoreModel
{   
    function __construct()
    {
        parent::__construct();
    }

    function fetch($columns = '*')
    {
        $this->data = $this->db->run("SELECT * FROM ".APP_TBL_ARTICLES." WHERE 1", []);
        app_debug("For Fetching 1 row as object");
        app_debug($this->data->fetch(PDO::FETCH_OBJ));
        app_debug("For Fetching 1 row as array");
        app_debug($this->data->fetch(PDO::FETCH_ASSOC));

        app_debug("For Fetching with where clause row as array");
        $article_status = 1;
        $article_location = 'Gruitrode';
        $qrystatement = $this->db->prepare('SELECT *
            FROM '.APP_TBL_ARTICLES.'
            WHERE article_status = :article_status AND article_location LIKE :article_location');
        $qrystatement->bindParam(':article_status', $article_status, PDO::PARAM_INT);
        $qrystatement->bindValue(':article_location', "%{$article_location}%");
        $qrystatement->execute();
        app_debug($qrystatement->fetchAll(PDO::FETCH_ASSOC));
        $qrystatement->debugDumpParams();

        $sql = "SELECT COUNT(id) FROM ".APP_TBL_ARTICLES." WHERE 1";
        $res = $this->db->query($sql);
        $count = $res->fetchColumn();
        app_debug("For Fetching count of records: $count");
        
    }

    function fetchWhere()
    {
        
    }
}

