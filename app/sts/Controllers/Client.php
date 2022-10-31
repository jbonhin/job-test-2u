<?php

namespace App\sts\Controllers;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of Client
 *
 * @author jbonhin
 */

class Client{
    private array $dados;

    public function index() {
        $list = new \App\sts\Models\StsClient();
        $this->dados['customers'] = $list->index();
        
        $carregarView = new \Core\ConfigView("sts/Views/client/client", $this->dados);
        $carregarView->renderizar();
    }
}