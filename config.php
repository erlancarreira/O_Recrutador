<?php 
date_default_timezone_set("America/Fortaleza");
setlocale(LC_ALL, 'pt_BR');

if(!session_id()) {
	session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

spl_autoload_register(function($value){

    $controllers = __DIR__."/App/Controllers".DIRECTORY_SEPARATOR.$value.".php";
    if(file_exists($controllers)) {
        require_once($controllers);   
    }

    $filename = __DIR__."/App/model".DIRECTORY_SEPARATOR.$value.".php";
    if(file_exists($filename)) {
    	require_once($filename);
    }

    $entities = __DIR__."/App/model/Entities".DIRECTORY_SEPARATOR.$value.".php";
    if(file_exists($entities)) {
    	require_once($entities);
    }
    
    $dao = __DIR__."/App/model/DAO".DIRECTORY_SEPARATOR.$value.".php";
    if(file_exists($dao)) {
        require_once($dao);
    }
    
    $Libs = __DIR__."/App/Libs".DIRECTORY_SEPARATOR.$value.".php";
    if(file_exists($Libs)) {
        require_once($Libs);       
    }

    $App = __DIR__."/App".DIRECTORY_SEPARATOR.$value.".php";
    if(file_exists($App)) {
        require_once($App);
    }

 
});


  



