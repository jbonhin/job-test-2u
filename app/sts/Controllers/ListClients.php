<?php

namespace App\sts\Controllers;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of listClient
 *
 * @author jbonhin
 */
class ListClients {
    private array $dados;

    public function index() {
        $list = new \App\sts\Models\StsListClients();
        $this->dados['customers'] = $list->index();
        
        $carregarView = new \Core\ConfigView("sts/Views/client/listclients", $this->dados);
        $carregarView->renderizar();
    }
}
