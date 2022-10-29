<?php

namespace App\sts\Controllers;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of StsAbout
 *
 * @author jbonhin
 */

class Client{
    private array $dados;

    public function index() {
        $client = new \App\sts\Models\StsClient();
        $client->index();
        
        $this->dados = [];
        $carregarView = new \Core\ConfigView("sts/Views/client/client", $this->dados);
        
        $carregarView->renderizar();
    }
}