<?php


namespace App\sts\Models\helper;

//Impede que o usuario acessa diretamente.
if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Description of StsRead
 *
 * @author jbonhin
 */

use PDO;

class StsRead extends StsConn{
    private string $select;
    private array $values = [];
    private array $result = [];
    private object $query;
    private object $conn;
    
    function getResult(): array {
        return $this->result;
    }
    
    public function exeRead($table, $terms = null, $parseString = null) {
        echo $parseString . "<br>";
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
            var_dump($this->values);
        }
        $this->select = "SELECT * FROM {$table} {$terms}";
        echo "Read" . "<br>";
        $this->exeInstruction();
        var_dump($this->query);
    }
    
    private function exeInstruction() {
        $this->connection();
        try {
            $this->exeParameter();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        } catch (Exception $exc) {
            $this->result = null;
        }
    }
    
    private function connection() {
        $this->conn = $this->connect();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
        
    }
    
    private function exeParameter(){
        if ($this->values) {
            foreach ($this->values as $link => $value){
                if ($link == 'limit' || $link == 'offser') {
                    $value = (int) $value;
                }
                $this->query->bindValue(":{$link}", $value, (is_int($value)? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
