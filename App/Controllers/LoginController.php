<?php 

include_once("config.php");

class LoginController extends Controller 
{
	private $SignIn;
  private $checkValue;

	public function index() 
	{   
		


    if(Helps::getRequest($_POST)) {
      $request = (object)filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);
 
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
      if (!empty($request->remember_me)) {
        $this->setCookie();
        $this->rememberMe($request->email, $request->pass); 
      }
   		self::redirect('/home');
   	}

	}

  public function SignOut() {
    unset($_SESSION['user']);
    session_destroy();

    self::redirect('/home');
  }

  private function rememberMe($email, $password) 
  { 
    // var_dump($_COOKIE['password']); exit;
    if (!isset($_COOKIE['cookie_user']) || !isset($_COOKIE['password'])) {
        setcookie('userEmail', $email, (time() + (2 * 3600)));
        setcookie('pass', $password, (time() + (2 * 3600)));
    } 
    return false;
  } 

  private function setCookie() {
    if (isset($_COOKIE['cookie_user']) && isset($_COOKIE['password'])) {
      $this->data['cookie_user'] = $_COOKIE['user'];
      $this->data['cookie_password'] = $_COOKIE['password'];
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