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

class Home{
    private array $dados;

    public function index() {

        $home = new \App\sts\Models\StsHome();
        $home->index();

        $this->dados = [];
        $carregarView = new \Core\ConfigView("sts/Views/home/home", $this->dados);
        
        $carregarView->renderizar();
    }
}