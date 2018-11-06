<?php 

include_once("config.php");

class LoginController extends Controller 
{
  private $message;
  
	public function index() 
	{   
    if ($this->checkValue($_POST)) { //Checo se esta setado e nao esta vazio
        $request = (object)filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES); //Dou um Sanitize em meus dados posts e passo para a variavel request como objeto
        $this->SignIn($request); //Chamo minha funcao que vai checar as informacoes passada e validar
		}

	  $this->renderView('login');	// Renderiza a view 
	}

	private function SignIn($request) 
	{
    $this->message = new Message();
    //Verifico se o usuario realmente enviou os dados, caso contrario eu dou um alert
    if(!$this->checkValue($request)) {
      $this->message->setMessage('alert-danger','Preencha todos os campos!');   	
   	} 
    //Instanciamos a nossa classe Login
    $LoginDAO = new LoginDAO();
    
   	if(!$LoginDAO->loginIn($request)) // Se os dados nao estiverem corretos eu entro no IF
   	{ 
   	  $this->message->setMessage('alert-danger','Usuario ou senha incorreta!'); //Exibo uma mensagem de erro para o usuario
   	  
      
   	} else {//Caso os dados estejam corretos eu entro no ELSE
   	  //Se o lembrar nao estiver vazio eu seto o COOKIE
      if (!empty($request->remember_me)) {
        $this->rememberMe($request->email, $request->pass); 
      }
      //Redireciono para a home e exibo uma mensagem
      $this->message->setMessage('alert-success','Seja bem vindo');
   		self::redirect('/home');//Redireciona para a pagina especificada
   	}

	}

  public function SignOut() { //Minha funcao SAIR
    unset($_SESSION['user']); //Retiro os dados do usuario da SESSAO 
    session_destroy($_SESSION['user']); // Destruo a sessao por garantia

    self::redirect('/home');//Redireciona para a pagina especificada
  }
  
  /*
  * Essa funcao recebe dois parametros 
  * Email e Senha
  */
  private function rememberMe($email, $password) 
  { 
    if (!isset($_COOKIE['cookie_user']) || !isset($_COOKIE['password'])) {
        setcookie('userEmail', $email, (time() + (2 * 3600)));
        setcookie('pass', $password, (time() + (2 * 3600)));
    } 
    return false;
  } 

  // private function setCookie() {
  //   if (isset($_COOKIE['cookie_user']) && isset($_COOKIE['password'])) {
  //     $this->data['cookie_user'] = $_COOKIE['user'];
  //     $this->data['cookie_password'] = $_COOKIE['password'];
  //   }
  // }


	private function checkValue($request) {
		
		foreach($request as $value) {
		    if(isset($value) && !empty($value)) {
		    	return true;
		    }
    }	
	}
}