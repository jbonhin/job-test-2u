<?php

namespace App\sts\Controllers;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of NewClient
 *
 * @author jbonhin
 */
class NewClient {
    
    private $dados;
    private $dadosForm;
    
    public function index() {
        echo "Cadastro de Cliente";
    }
}
