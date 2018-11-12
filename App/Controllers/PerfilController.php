<?php 
include_once('config.php');

class PerfilController extends Controller
{   
    private $ProfileDAO = array(); 
    private $Profile;
    private $message; 
    
    public function __construct() 
    {
    	if(!$_SESSION['user']) { self::redirect('/home'); }  // Se a sessao nao existir eu redireciono pra home
    	
    	$this->ProfileDAO = new ProfileDAO(); //Instancio o ProfileDAO
        self::setViewParam('estados', $this->ProfileDAO->getLocation('state')); //Chamo os Estados
        self::setViewParam('cidades', $this->ProfileDAO->getLocation('city')); // Chamo as Cidades
    }

	public function index() 
	{   	
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])) { //Verifico se o usuario tem um ID
	        self::setViewParam('perfis', $this->ProfileDAO->readProfile($_SESSION['user']['idUser'])); //Caso sim eu chamo os perfis deste usuario
        } else {
        	self::setViewParam('msg', 'Cadastre um recruta e seja um recrutador!'); //Caso nao tenha nenhum perfil cadastrado eu exibo esta mensagem
        }

        $this->render('perfil/listar'); //Renderizo minha view listar	
	}

	public function cadastrar() 
	{ 
		$this->message = new Message(); //Instancio minhas mensagens
		
		if(Helps::getRequest($_POST)) { // Se tiver sido enviado um post eu entro no if
		    
		    $request = (object) filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES); // Passo um Sanitize e transformo em um objeto do stdclass
		       
		    $this->Profile = $this->setProfile($request); // Faco o meu set da classe Profile      
            
            //Recebe dois parâmetros 
            //1 Os valores armazenados 
            //2 Confirma se precisa do lastInsertId que por padrao é definido como falso  
            if(!$this->ProfileDAO->createProfile($this->Profile, true)) {
                $this->message->setMessage('alert-danger','Preencha todos os campos'); // Caso esteja vazio eu exibo uma mensagem de erro
    
            } else { // Do contrario eu entro no ELSE e redireciono para a view listagem e exibo uma mensagem de sucesso. 
            	$this->message->setMessage('alert-success','Dados cadastrado com sucesso');
            	$this->redirect('/perfil');    	
            }
		} 

      $this->render('perfil/cadastrar'); // Renderizo a minha view de cadastrar perfil	
	}

	public function editar($request) 
	{ 
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])) { // Se estiver setado a sessao eu entro no IF
	       
	        $request = (object)filter_input_array(INPUT_GET,FILTER_SANITIZE_MAGIC_QUOTES); // Passo um sanitize e transformo em um objeto do stdclass
            
            self::setViewParam('perfil', $this->ProfileDAO->readProfile($_SESSION['user']['idUser'], $request->idProfile)); //Trago todos os perfis deste usuario

        } 
         
        if(isset($request->idUser) && !empty($request->idUser) && isset($request->idProfile) && !empty($request->idProfile)) { // Se estiver setado o idUser e o idProfile eu entro no IF  
        $this->message = new Message(); // Instancio a minha classe de mensagens    
           	if(isset($_POST) && !empty($_POST)) { // Se o post estiver setado e nao for vazio eu entro no IF
        	    $request = (object)filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES); // Passo um sanitize e transformo em um objeto do stdclass
        	    
        	    $this->Profile = $this->setProfile($request);  // Faco o meu set da classe Profile  

        	    if($this->ProfileDAO->updateProfile($this->Profile) || $this->ProfileDAO->updateAddress($this->Profile)) { // Caso o usuario tenha alterado algum dos campos eu entro no IF
                    $this->message->setMessage('alert-success','Dados atualizado com sucesso!'); //Exibo uma mensagem de sucesso e redireciono para a view listagem	
        	        $this->redirect('/perfil'); 
		    	} else { 
		            $this->message->setMessage('alert-danger','Nenhum campo foi alterado!'); //Se nada foi alterado eu exibo um alert informando que nada foi modificado.
		               
		        } 



        	}        	 
        }  

        $this->render('/perfil/editar');
	}

	public function excluir() 
	{   
       
        if(isset($_POST['idProfile']) && !empty($_POST['idProfile']) && isset($_POST['idUser']) && !empty($_POST['idUser'])) { // Se estiver setado o idUser e o idProfile eu entro no IF  
		        
	        $this->request = (object)filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);  // Passo um sanitize e transformo em um objeto do stdclass
	          
            if($id = $this->ProfileDAO->readProfile($this->request->idUser, $this->request->idProfile)) { // Pego o ID do profile que o usuario escolheu     	
	        	$this->message = new Message(); // Instancio a minha classe de mensagens    
	        	if($this->ProfileDAO->deleteProfile($id)) { // Chamo minha funcao de delete 
	                
	                $this->message->setMessage('alert-success','Recruta deletado com sucesso!'); // Se ok eu deleto o usuario redireciono para a view de listagem e exibo uma mensagem
                    $this->redirect('/perfil');
	        	} else {
	        	    $this->message->setMessage('alert-danger','Usuario nao deletado!'); // Se por algum motivo nao deletar eu redireciono e exibo um alerta
	        	    $this->redirect('/perfil');
	        	}
	        }

	        unset($_SESSION['idUser']);
	        unset($_SESSION['idProfile']);
        } 
        
       //Listamos todos os recrutas deste usuario  
        if(isset($_GET['idProfile']) && !empty($_GET['idProfile'])) { // Se estiver setado o idProfile e caso ele nao esteja vazio 
	        $_SESSION['idUser'] = $_GET['idUser'];
	        $_SESSION['idProfile'] = $_GET['idProfile'];
	        
	        $result = $this->ProfileDAO->readProfile($_SESSION['idUser'],$_SESSION['idProfile']);
            
        } 
        
        self::setViewParam('perfil', $this->ProfileDAO->readProfile($_SESSION['idUser'], $_SESSION['idProfile']));

        $this->render('perfil/excluir');	
	}

	private function setProfile($request) // Get & Set
	{
        if(isset($request) && !empty($request)) {
	        $this->Profile = new Profile();
	        $this->Profile->setIdProfile((!empty($request->idProfile)) ? $request->idProfile : null);
		    $this->Profile->setIdUser($_SESSION['user']['idUser']);
	        $this->Profile->setCareer($request->profissao);
	        $this->Profile->setName($request->nome);
	        $this->Profile->setAge($request->idade);
	        $this->Profile->setGender($request->sexo);
	        $this->Profile->setDescription($request->sobre);
	        
	        $this->Profile->setAddress($request->endereco);
	        $this->Profile->setNumber($request->numero);
	        $this->Profile->setCity($request->cidade);
	        $this->Profile->setState($request->estado);
	        $this->Profile->setZip($request->cep);

	        return $this->Profile;
        }
	}
}