<?php

namespace App\sts\Models\helper;

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

use PDO;
/**
 * Description of StsCreate
 *
 * @author jbonhin
 */
class StsCreate extends StsConn {

    /** @var string $table Recebe o nome da tabela */
    private string $table;
    /** @var array $data Recebe os dados que devem ser inseridos no BD */
    private array $data;
    /** @var string $values Recebe os valores dos dados que devem ser inseridos no BD */
    private string $values;
    /** @var string $result Retorna o status do cadastro */
    private string $result;
    /** @var object $insert Recebe a QUERY preparada */
    private object $insert;
    /** @var string $query Recebe a QUERY */
    private string $query;
    /** @var object $conn Recebe a conexão com o BD */
    private object $conn;
    
    /**
     * Retornar o status do cadastro, retorna o último id quando cadatrar com sucesso e null quando houver erro
     * @return string Retorna o último id inserido
     */
    function getResult(): string {
        return $this->result;
    }

    /**
     * Cadatrar no banco de dados
     * 
     * @param string $table Recebe o nome da tabela
     * @param array $data Recebe os dados do formulário
     * @return void
     */
    public function exeCreate($table, array $data): void {
        $this->table = (string) $table;
        $this->data = $data;
        $this->exeReplaceValues();
        $this->exeIntruction();
    }

    /**
     * Cria a QUERY e os links da QUERY
     * 
     * @return void
     */
    private function exeReplaceValues(): void {
        $columns = implode(', ', array_keys($this->data));
        //$values = ':' . implode(', :', array_keys($this->data));
        $values = $this->exeParameter();

        $this->query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$this->values})";
    }

    /**
     * Executa a QUERY. 
     * Quando executa a query com sucesso retorna o último id inserido, senão retorna null.
     * 
     * @return void
     */
    private function exeIntruction(): void {
        $this->connection();
        try {
            $this->insert->execute($this->data);
            $this->result = $this->conn->lastInsertId();
        } catch (e $ex) {
            $this->result = null;
        }
    }

    /**
     * Obtem a conexão com o banco de dados da classe pai "Conn".
     * Prepara uma instrução para execução e retorna um objeto de instrução.
     * 
     * @return void
     */
    private function connection(): void {
        $this->conn = $this->connect();
        $this->insert = $this->conn->prepare($this->query);
    }
    
    private function exeParameter(){
        if ($this->data) {
            $this->values = "";
            foreach ($this->data as $link => $value){
                if (!empty($this->values)) {
                    if ($link == 'created') {
                        $this->values = $this->values ."'". $value ."'";
                    } else {
                        $this->values = $this->values ."'". $value ."', ";
                    }
                } else {
                    $this->values = "'". $value ."', ";
                }
            }
        }
    }
}
