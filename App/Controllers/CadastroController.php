<?php 
include_once("config.php");

class CadastroController extends Controller 
{
	private $SignUp;
	private $checkValue;

	public function index() 
	{   

		if(isset($_POST) && !empty($_POST)) {
            $request = filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);
            $this->SignUp($request);
		}
	    $this->renderView('cadastro');	
	}

	private function SignUp($request) 
	{
        if(!$this->checkValue($request)) {
            self::setViewParam('alert', 'alert-danger');
            self::setViewParam('msg', 'Preencha todos os campos!');       	
       	} 

       	$LoginDAO = new LoginDAO();
       	if($LoginDAO->checkUser($request)) 
   	    {
   	    //Caso o usuario exista eu entro no IF
   		   self::setViewParam('alert', 'alert-danger');
           self::setViewParam('msg', 'Usuario existente!');   
   	    } else {
   	    //Caso nao exista eu entro no ELSE
            $User = new User();
	        $User->setUserName($request['userName']);
	        $User->setEmail($request['email']);
	        $User->setPassword($request['pass']);      

   	        if($LoginDAO->register($User))	{
   		        self::setViewParam('alert', 'alert-success');
	            self::setViewParam('msg', 'Cadastrado com sucesso!');
	            sleep(3);
	            session_unset('user');
	            self::redirect('/login');
	   	    }
	   	}    
	}

	private function checkValue($request) {
		
		foreach($request as $value) {
		    if(isset($value) && !empty($value)) {
		    	return true;
		    }
        }	
	}
}