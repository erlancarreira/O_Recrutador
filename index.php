<?php
include_once("config.php");

// if(Route::getUrl() == 'home') {
	
	
// 	$list = getTemplate('home', 'userController');
// 	var_dump($list);
// 	exit();
// }

// if(Route::getUrl() == '') {
// 	echo 'ESTOU No InICIO';
// }

// if(Route::getUrl() == 'painel') { 
// 	echo 'ESTOU NO PAINEL';
// 	// $estados = $crud->read('state');
//  //    $cidades = $crud->read('city');
//     // getTemplate('painel', 'userController');

// }

// var_dump(Route::getUrl());


try {
    $app = new App();
    $app->run();
}catch (\Exception $e){
    $oError = new Erro($e);
    $oError->render();
}

