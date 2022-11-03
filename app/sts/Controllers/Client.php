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
    /** @var array $data Recebe os dados que devem ser enviados para VIEW */
    private $data;
    /** @var array $dataForm Recebe os dados do formulário */
    private $dataForm;

    public function index(): void {

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['CreateNewClint'])) {

            unset($this->dataForm['CreateNewClint']);
            $createNewClint = new \App\sts\Models\StsClient();

            if ($createNewClint->create($this->dataForm)){
                $this->data['form'] = $this->dataForm;
            } else {
                $this->data['form'] = $this->dataForm;
            }
        }
        
        $carregarView = new \Core\ConfigView("sts/Views/client/client", $this->data);
        $carregarView->renderizar();
    }

}