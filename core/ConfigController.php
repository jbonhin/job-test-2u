<?php

namespace Core;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

class ConfigController extends Config
{

    private string $url;
    private array $urlConjunto;
    private string $urlController;
    private string $urlParamentro;
    private string $urlSlugController;
    private array $format;

    public function __construct() {
        $config = new \Core\Config();
        $config->config();
        if (!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);

            echo "URL: {$this->url} <br>";
            $this->limparUrl();
            echo "URL Limpa: {$this->url} <br>";

            $this->urlConjunto = explode("/", $this->url);
            var_dump($this->urlConjunto);

            if (isset($this->urlConjunto[0])) {
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            } else {
                $this->urlController = CONTROLLER;
            }
            
            if(isset($this->urlConjunto[1])){
                $this->urlParamentro = $this->urlConjunto[1];
            }else{
                $this->urlParamentro = "";
            }
        }else{
            $this->urlController = CONTROLLER;
            $this->urlParamentro = "";
        }
        echo "Controller: {$this->urlController} - Paramentro: {$this->urlParamentro}<br>";
    }

    private function limparUrl() {
        //Eliminar as tags
        $this->url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->url = trim($this->url);
        //Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");

        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']);
    }
    
    private function slugController($slugController) {
        //Converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //Converter o traço para espaço em braco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        //Converter a primeira letra de cada palavra para maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);
        //Retirar o espaço em braco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);
        return $this->urlSlugController;
    }
    
    public function carregar() {
        $classe = "\\App\\sts\\Controllers\\" . $this->urlController;
        $classeCarregar = new $classe();
        $classeCarregar->index();
    }

}
