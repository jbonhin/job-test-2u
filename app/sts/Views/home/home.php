<?php

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>
        <div class="jumbotron descr-top">
            <h1 class="display-4">Tecnologia 2U 2022</h1>
            <h3 class="lead"> Teste Admissional</h3>
            <p>Desenvolver uma tela de cadastro com bootstrap.</p>
            <a class="btn btn-primary btn-lg" href="<?php echo URL;?>listClients" role="button">Acessar</a>
        </div>        
        
        <div class="jumbotron footer-per">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3"></div>
                    <div class="col-12 col-sm-12 col-md-4">
                        <h5>2U</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?php echo URL;?>" class="link-footer">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo URL;?>listClients" class="link-footer">Teste</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4">
                        <h5>Contato</h5>
                        <ul class="list-unstyled">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="tel: XXXXXXXXXXX" class="link-footer">(19) 99496-2807</a>
                                    <p class="link-footer">João Fernando</p>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>

