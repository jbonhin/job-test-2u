<?php

if (!defined('2u2022out')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

echo "<h1>View da Página Cliente</h1>";

var_dump($this->dados['customers']);