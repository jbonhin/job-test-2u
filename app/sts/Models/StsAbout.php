<?php

namespace App\sts\Models;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of StsAbout
 *
 * @author jbonhin
 */
class StsAbout {

    //private object $connection;
    
    public function index(){
        /*$connection = new \App\sts\Models\helper\StsConn();
        $this->connection = $connection->connect();

        var_dump($this->connection);*/

        echo "Models: Listar dados da página home <br>";
    }
}
