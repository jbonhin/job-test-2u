<?php

namespace App\sts\Models;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}


/**
 * Description of StsClient
 *
 * @author jbonhin
 */
class StsClient {

    /** @var array $data Recebe os dados que devem ser inseridos no BD */
    private array $data;

    /**
     * Cadastrar novo cliente no banco de dados
     * 
     * @param array $data Recebe os dados que devem ser inseridos no BD
     * @return bool Retorna true quando o cadatro é realizado com sucesso e false quando houver erro
     */
    
    public function index(){
        $sql = [
            "columns" => "* ",
            "table" => "customers ",
            "where" => "",
            "limit" => "",
            "orderBy" => "ORDER BY name ",
            "order" => "DESC",
        ]; 
        
        $listCustomers = new \App\sts\Models\helper\StsRead();
        $listCustomers->fullRead($sql);
        
        return $listCustomers->getResult();
    }

    public function create(array $data): bool
    {
        $this->data = $data;
        $this->data['created'] = date("Y-m-d H:i:s");
/*
        $zipCode = $this->busca_cep($this->data['zip_code']);

        if(!empty($zipCode)){
            if(!empty($zipCode['cidade']) && !empty($zipCode['uf'])){ 
                
                $this->data['address'] = $zipCode['tipo_logradouro'] ." ". $zipCode['logradouro'];
                $this->data['district'] = $zipCode['bairro'];
                $this->data['city'] = $zipCode['cidade'];
                $this->data['fu'] = $zipCode['uf'];
                
            } else {
                $_SESSION['msg'] = "CEP Inválido!";
                return false;
            }
        }
*/
        $createNewClient = new \App\sts\Models\helper\StsCreate();
        $createNewClient->exeCreate("customers", $this->data);

        if ($createNewClient->getResult()) {
            $_SESSION['msg'] = "Cliente cadastrado com sucesso!";
            return true;
        } else {
            $_SESSION['msg'] = "Cliente não cadastrado!";
            return false;
        }
    }

    /* 
     *  Função de busca de Endereço pelo CEP 
     *  -   Desenvolvido Felipe Olivaes para ajaxbox.com.br 
     *  -   Utilizando WebService de CEP da republicavirtual.com.br 
     */  
    public function busca_cep($cep){  
        $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
        if(!$resultado){  
            $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
        }  
        parse_str($resultado, $retorno);   
        return $retorno;  
    }    
}
