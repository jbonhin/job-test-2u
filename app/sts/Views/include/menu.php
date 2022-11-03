<?php
if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
            <div class="container">
                <a class="navbar-brand" href="https://tecnologia2u.com.br/">
                    <img class="rounded-circle logo" src="<?php echo URL;?>app/sts/assets/img/logo.jpg" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL;?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL;?>listClients">Teste</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>