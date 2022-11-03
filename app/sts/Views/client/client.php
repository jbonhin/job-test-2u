<?php

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

if (isset($this->dados['form'])) {
    $valueForm = $this->dados['form'];
    extract($valueForm);
}

?>

    <form id="form_client" method="POST" action="" style='color: black;'>
        <div class="jumbotron test">
            <div class="container header-test">
                <div class="col-md-12 head-test">
                    <h1>Cadastro de Cliente</h1>
                </div>
                <div class="col-md-12 msg-test">
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo "<h3 style='color: red;'>". $_SESSION['msg'] ."</h3><br>";
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="row featurette">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nome Completo:</label>
                            <input 
                                name="name" 
                                type="text" 
                                placeholder="Nome completo" 
                                class="form-control" 
                                id="name" 
                                value="<?php if(isset($valueForm['name'])) { echo $valueForm['name']; } ?>" 
                                required
                                /><br>
                        </div>
 
                        <div class="form-group">
                            <label for="zip_code">CEP:</label>
                            <input 
                                name="zip_code" 
                                type="text" 
                                class="form-control" 
                                id="zip_code" 
                                placeholder="CEP"                            
                                onblur="pesquisacep(this.value);" 
                                required
                            /><br>
                        </div>

                        <div class="form-group">
                            <label for="address">Endereço:</label>
                            <input 
                                name="address" 
                                type="text" 
                                class="form-control" 
                                id="address" 
                                placeholder="Endereço" 
                                value="<?php if(isset($valueForm['address'])) { echo $valueForm['address'];}?>" 
                                
                            ><br>
                        </div>

                        <div class="form-group">
                            <label for="complement">Complemento:</label>
                            <input 
                                name="complement" 
                                type="text" 
                                class="form-control" 
                                id="complement" 
                                placeholder="Número e Complemento" 
                                value="<?php if(isset($valueForm['complement'])) { echo $valueForm['complement'];}?>"
                                
                            ><br>
                        </div>
                    </div>

                    <div class="col-md-6">  

                        <div class="form-group">
                            <label for="district">Bairro:</label>
                            <input 
                                name="district" 
                                type="text" 
                                class="form-control" 
                                id="district" 
                                placeholder="Bairro" 
                                value="<?php if(isset($valueForm['district'])) { echo $valueForm['district'];}?>" 
                                readonly
                                ><br>
                        </div>
                        
                        <div class="form-group">
                            <label for="city">Cidade:</label>
                            <input 
                                name="city" 
                                type="text" 
                                class="form-control" 
                                id="city" 
                                placeholder="Cidade" 
                                value="<?php if(isset($city)) { echo $city;}?>" 
                                readonly
                            ><br>
                        </div>

                        <div class="form-group">
                            <label for="fu">Estado:</label>
                            <input 
                                name="fu" 
                                type="text" 
                                class="form-control" 
                                id="fu"  
                                placeholder="Estado" 
                                value="<?php if(isset($fu)) { echo $fu;}?>" 
                                size="4" 
                                maxlength="2"
                                readonly
                            ><br>
                        </div>
                        <input class="btn btn-primary form-btn" name="CreateNewClint" type="submit" value="Salvar">
                    </div>
                </div>
            </div>
        </div>
    </form>