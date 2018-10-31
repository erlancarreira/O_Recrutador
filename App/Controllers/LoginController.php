<?php 

include_once("config.php");

class LoginController extends Controller 
{
	private $SignIn;
  private $checkValue;

	public function index() 
	{   
		if(isset($_POST) && !empty($_POST)) {
      $request = filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);
      $this->SignIn($request);
		}

	    $this->renderView('login');	
	}

	private function SignIn($request) 
	{
        
    if(!$this->checkValue($request)) {
        self::setViewParam('alert', 'alert-danger');
        self::setViewParam('msg', 'Preencha todos os campos!');       	
   	} 

    $LoginDAO = new LoginDAO();
   	// Se os dados nao estiverem corretos eu entro no IF
   	if(!$LoginDAO->loginIn($request)) 
   	{
   		self::setViewParam('alert', 'alert-danger');
      self::setViewParam('msg', 'Usuario ou senha incorreta!');   
   	} else {
   	//Caso os dados estejam corretos eu entro no ELSE
   		self::redirect('/home');
   	}

	}

  public function SignOut() {
    unset($_SESSION['user']);
    session_destroy();

    self::redirect('/home');
  } 


	private function checkValue($request) {
		
		foreach($request as $value) {
		    if(isset($value) && !empty($value)) {
		    	return true;
		    }
    }	
	}
}