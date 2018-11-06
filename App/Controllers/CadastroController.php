<?php 
include_once("config.php");

class CadastroController extends Controller 
{
	
	private $message;
	
	public function __construct() {
	    $this->message = new Message();
	}

	public function index() 
	{   
        // unset($_COOKIE['user']);
        //Verifico se esta setado e nao esta vazio
		if(isset($_POST) && !empty($_POST)) {
            $request = (object) filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES); //Dou um Sanitize em meus dados posts e passo para a variavel request como objeto
            $this->SignUp($request); //Chamo minha funcao que vai tratar e validar estes dados passando como parametro o meu request
		}
        
	    $this->renderView('cadastro');	//Renderizo minha VIEW
	}

	private function SignUp($request) 
	{
        // $this->message->setMessage('alert-danger','Preencha todos os campos!');
        // var_dump($request); exit;
        if(!$this->checkValue($request)) {
        	echo "ESTOU AQUI 1";
        	$this->message->setMessage('alert-danger','Preencha todos os campos!');
       	} 

       	$LoginDAO = new LoginDAO();
       	if($LoginDAO->checkUser($request)) { 
   	       echo "ESTOU AQUI 2";	
   	      //Caso o usuario exista eu entro no IF
           $this->message->setMessage('alert-danger','Usuario existente!');
   	    } else {
   	    //Caso nao exista eu entro no ELSE
            $User = new User();
	        $User->setUserName($request->userName);
	        $User->setEmail($request->email);
	        $User->setPassword($request->pass);      
            
   	        if($LoginDAO->register($User))	{
   		        $this->message->setMessage('alert-success','Cadastrado feito com sucesso, vamos entrar?');
	           
	            // session_unset('user');
	            self::redirect('/login');
	   	    }
	   	    
	   	     $this->message->setMessage('alert-danger','Usuario existente!');
	   	}
	   	// self::redirect('/cadastro');
	}

	private function checkValue($request) {
		
		foreach($request as $value) {
		    if(isset($value) && !empty($value)) {
		    	return true;
		    }
        }	
	}
}