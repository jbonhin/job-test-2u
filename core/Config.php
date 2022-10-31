<?php

namespace Core;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Configurações básicas do site.
 *
 * @author jbonhin
 */


class Config {

    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados
     * E-mail do administrador.
     * 
     * @return void
     */
    protected function config(){
        define('URL', 'http://localhost/sts/test/site/');
        
        define('CONTROLLER', 'Home');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Error');

        //Credencias de acesso ao Banco de dados
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'job_test_2u');
        define('PORT', 3306);
        
        define('EMAILADM', 'jfbonhin@gmail.com');
    }
}
