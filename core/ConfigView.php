<?php

namespace Core;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class ConfigView
{
    private string $nome;
    private array $dados;

    public function __construct($nome, array $dados){
        $this->nome = $nome;
        $this->dados = $dados;
        echo "Carregar a View: ". $this->nome ."<br>";
    }

    public function renderizar(){
        if(file_exists('app/' . $this->nome . '.php')){
            include 'app/sts/Views/include/head.php';
            include 'app/'. $this->nome .".php";
            include 'app/sts/Views/include/footer.php';
        } else {
            echo "Página não encontrada: {$this->nome}<br>";
            die("Página não encontrada!");
        }        
    }
}