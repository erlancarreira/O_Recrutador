<?php
include_once("config.php");

try {
    $app = new App();
    $app->run();
}catch (Exception $e){
    $oError = new Erro($e);
    $oError->render();
}

