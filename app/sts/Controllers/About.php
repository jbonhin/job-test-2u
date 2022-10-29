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

class About{
    private array $dados;

    public function index() {
        $this->dados = [];
        $carregarView = new \Core\ConfigView("sts/Views/about/about", $this->dados);
        
        $carregarView->renderizar();
    }
}
