<?php
/**
 * FEtch Data Class File
 * 
 * @package crudapp
 * @file FetchData File
 * @type class
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */
namespace classes\Feeds;

use classes\Core;
use classes\Request;

class FetchData extends Core
{
    protected $API_BASE_URL;
    function __construct(Request $request)
    {
        parent::__construct( $request );
        $this->init();
    }

    private function init()
    {
        $this->API_BASE_URL = 'https://cdn-api.co-vin.in/api/v2';
    }

    public function getDataByPincode($req_int_pincode=0, $req_str_date='')
    {
        $req_int_pincode = (int) $req_int_pincode;
        $req_str_date = (string) $req_str_date;//dd-mm-yyyy
        $api_url = $this->API_BASE_URL . '/appointment/sessions/public/calendarByPin?pincode='+$req_int_pincode+'&date='.$req_str_date;
    }

    private function _getData($url)
    {
        try{
            $_userAgent = 'Mozilla/5.1 (compatible; MSIE 6.0; Windows NT 8.1)';
            $_timeout = 30;
            $_maxRedirects = 3;
            $_noBody = false;
            $_referer ="http://www.google.com";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_TIMEOUT, $_timeout);
            curl_setopt($ch, CURLOPT_MAXREDIRS,$_maxRedirects);
            curl_setopt($ch, CURLOPT_NOBODY, $_noBody); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_USERAGENT, $_userAgent);
            curl_setopt($ch, CURLOPT_REFERER, $_referer);

            /*curl_setopt($s,CURLOPT_POST,true);
             curl_setopt($s,CURLOPT_POSTFIELDS,$_postFields);*/

            $head = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

        }
        catch(\Exception $e){

        }
    }
}

