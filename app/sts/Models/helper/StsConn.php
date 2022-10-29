<?php

namespace App\sts\Models\helper;

use PDO;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of StsAbout
 *
 * @author jbonhin
 */

abstract class StsConn 
{
    private string $host = HOST;
    private string $user = USER;
    private string $pass = PASS;
    private string $dbName = DBNAME;
    private int $port = PORT;
    private object $connect;

    protected function connect() {
        try {
            $this->connect = new PDO("mysql:host={$this->host};port={$this->port};dbname=" . $this->dbName, $this->user, $this->pass );
            return $this->connect;
        } catch (\Throwable $th) {
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador ' . EMAILADM . '<br>');
        }
    }
}