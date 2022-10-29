    <?php
    session_start();
    ob_start();

    define('2u2022out', true);
    
    require './vendor/autoload.php';

    use Core\ConfigController as Home;

    $url = new Home();
    $url->carregar();