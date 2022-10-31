### PRINCIPAIS COMENTÁRIOS:

### Para executar este projeto(teste) em localhost utilizei o recurso Wampserver

### Criei o arquivo composer.json na raiz do projeto
{
    "description": "Projeto Test",
    "authors": [
        {
            "name": "João Fernando Bonhin Jr",
            "email": "jbonhin@gmail.com"
        }
    ],
    "autoload": {
        "psr-4": {
            "Core\\":"core"
        }   
    },
    "require": {}
}

### Após criar o composer.json executar para gerar o autoload de arquivos:
composer update

### Na necessidade de acrescentar novos caminhos ex: diretório app faça:
    1) No arquivo raiz composer.json
        "autoload": {
            "psr-4": {
                "Core\\":"core",
                "App\\": "app"
            }   
        },
    2) Executar no prompt dentro do diretório do projeto
        > composer dumpautoload    

### Após executar o update verá quer foi criado a pasta /vendor. Nada deverá ser
### alterado na pasta ./vendor, sendo assim mantendo a integridade do site.

### Criar na raiz do projeto o arquivo:
. htaccess

    RewriteEngine On

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-l

    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]

    Options -Indexes


### DEFINIÇÕES DE ALGUNS SCRIPTS:

core/config.php
    arquivo de configuração básica

### DOCUMENTAÇÂO DO PROJETO
Os scripts foram parcialmente documentados utilizando as boas práticas do PSR
PSR-5: PHPDoc e PSR-19: PHPDoc tags.
