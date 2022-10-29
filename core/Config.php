<?php

namespace Core;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}


class Config {
    protected function config(){
        define('URL', 'http://localhost/sts/test/site/');
        
        define('CONTROLLER', 'Home');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Erro');

        //Credencias de acesso ao Banco de dados
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'job_test_2u');
        define('PORT', 3306);
        
        define('EMAILADM', 'jfbonhin@gmail.com');
    }
}
