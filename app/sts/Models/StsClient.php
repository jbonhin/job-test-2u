<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\sts\Models;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

//use PDO;

/**
 * Description of StsClient
 *
 * @author jbonh
 */
class StsClient {

    //private object $connection;
    
    public function index(){
        $table = "customers";
        $terms = "WHERE id=:id LIMIT :limit";
        $parseString = "id=1&limit=5";
        
        $listCustomers = new \App\sts\Models\helper\StsRead();
        $listCustomers->exeRead($table, $terms, $parseString);
        var_dump($listCustomers->getResult());
    }
}
