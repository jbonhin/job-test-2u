<?php

namespace Core;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Receber a URL e manipular.
 * Carregar a CONTROLLER
 *
 * @author jbonhin
 */

class ConfigController extends Config
{
    /** @var string $url Recebe a URL do .htaccess */
    private string $url;
    /** @var array $urlConjunto Recebe o URL convertida para array */
    private array $urlConjunto;
    /** @var string $urlController Recebe da URL o nome da controller */
    private string $urlController;
    /** @var string $urlParamentro Recebe da URL o parâmetro */
    private string $urlParamentro;
    /** @var string $urlSlugController Recebe a controller convertida para o formato do nome da classe */
    private string $urlSlugController;
    /** @var array $format Recebe o array de caracteres especiais que devem ser substituido */
    private array $format;
    /** @var string $classe Recebe a classe */
    private string $classe;

    /**
     * Receber a URL do .htaccess.
     * Validar a URL.
     */
    public function __construct() {
        $config = new \Core\Config();
        $config->config();
        if (!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);

            //echo "URL: {$this->url} <br>";
            $this->limparUrl();
            //echo "URL Limpa: {$this->url} <br>";

            $this->urlConjunto = explode("/", $this->url);
            //var_dump($this->urlConjunto);

            if (isset($this->urlConjunto[0])) {
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            } else {
                $this->urlController = $this->slugController(CONTROLLER);
            }
            
            if(isset($this->urlConjunto[1])){
                $this->urlParamentro = $this->urlConjunto[1];
            }else{
                $this->urlParamentro = "";
            }
        }else{
            $this->urlController = $this->slugController(CONTROLLER);
            $this->urlParamentro = "";
        }
    }

    /**
     * Limpara a URL, elimando as TAG, os espaços em brancos, retirar a barra no final da URL e retirar os caracteres especiais
     * 
     * @return void
     */
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
    
    /**
     * Converter o valor obtido da URL "client" e converter no formato da classe "Client".
     * Utilizado as funções para converter tudo para minúsculo, converter o traço pelo espaço, converter cada letra da primeira palavra para maiúsculo, retirar os espaços em branco
     * @param string $slugController Nome da classe
     * @return string Retorna a controller "client" convertido para o nome da Classe "Client"
     */    
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
    
    /**  
     * Verificar se a classe existe.
     * Não existindo a classe atribuir a classe erro
     * 
     * @return void
     */
    public function carregar(): void {
        $this->classe = "\\App\\sts\\Controllers\\" . $this->urlController;
        if(class_exists($this->classe)){
            $this->carregarClasse();
        }else{
            $this->urlController = $this->slugController(CONTROLLERERRO);
            $this->carregar();
        }
    }
    
    /**  
     * Verificar se o método existe, existindo o método carrega a página;
     * Não existindo o método, para o carregamento e apresenta mensagem de erro.
     * 
     * @return void
     */    
    private function carregarClasse(): void {
        $classeCarregar = new $this->classe();
        if(method_exists($classeCarregar, "index")){
            $classeCarregar->index();
        }else{
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador ' . EMAILADM . '<br>');
        }
    }

}
