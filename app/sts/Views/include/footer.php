<?php
if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>



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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="<?php echo URL;?>app/sts/assets/js/stsCustom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>