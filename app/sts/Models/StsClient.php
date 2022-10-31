<?php

namespace App\sts\Models;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}


/**
 * Description of StsClient
 *
 * @author jbonhin
 */
class StsClient {

    //private object $connection;
    
    public function index(){
        $sql = [
            "columns" => "* ",
            "table" => "customers ",
            "where" => "",
            "limit" => "",
            "orderBy" => "ORDER BY name ",
            "order" => "DESC",
        ]; 
        
        $listCustomers = new \App\sts\Models\helper\StsRead();
        $listCustomers->fullRead($sql);
        
        return $listCustomers->getResult();
    }
}
