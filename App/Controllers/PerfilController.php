<?php 
include_once('config.php');

class PerfilController extends Controller
{   
    private $ProfileDAO = array(); 
    private $Profile;
    private $Message; 
    public function __construct() 
    {
    	if(!$_SESSION['user']) { self::redirect('/home'); }  
    	
    	
    	$this->Message = new Message();
        
    	$this->ProfileDAO = new ProfileDAO();
        self::setViewParam('estados', $this->ProfileDAO->getLocation('state'));
        self::setViewParam('cidades', $this->ProfileDAO->getLocation('city'));
    }

	public function index() 
	{   	
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	        // $this->ProfileDAO = new ProfileDAO();
	        self::setViewParam('perfis', $this->ProfileDAO->readProfile($_SESSION['user']['idUser']));
        } else {
        	self::setViewParam('msg', 'Cadastre um recruta e seja um recrutador!');
        }

        if(!empty($this->Message->has('alert-success'))) {
        self::setAlert('msg', 'alert-success', $this->Message->getMessage('alert-success'));
        }   
        // if(!empty($this->Message->has('alert-danger'))) {
        // 	self::setViewParam('msg', $this->Message->getMessage('alert-danger')); 
        // 	self::setViewParam('alert', 'alert-danger'); 
        // }

        // if(!empty($this->Message->has('alert-success'))) { 
        // 	self::setViewParam('msg', $this->Message->getMessage('alert-success')); 
        // 	self::setViewParam('alert', 'alert-success');        
        // }


        $this->render('perfil/listar');	
	}

	public function cadastrar() 
	{ 
		if(Helps::getRequest($_POST)) {
		   
		    $request = (object) filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);
		    // $request->idProfile = null;    
		    $this->Profile = $this->setProfile($request);      
            
            //Recebe dois parâmetros 
            //1 Os valores armazenados 
            //2 Confirma se precisa do lastInsertId que por padrao é definido como falso  
            if(!$this->ProfileDAO->createProfile($this->Profile, true)) {
                $this->Message->setMessage('alert-danger','Preencha todos os campos');
                $this->redirect('/perfil');               

            } else {
            	$this->Message->setMessage('alert-success','Dados cadastrado com sucesso');
            	$this->redirect('/perfil');    	
                // self::setViewParam('alert', 'alert-success');
                // self::setViewParam('msg', 'Dados cadastrado com sucesso!'); 
            }
		} 

      $this->render('perfil/cadastrar');	
	}

	public function editar($request) 
	{ 
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	       
	        $request = (object)filter_input_array(INPUT_GET,FILTER_SANITIZE_MAGIC_QUOTES);
            
            self::setViewParam('perfil', $this->ProfileDAO->readProfile($_SESSION['user']['idUser'], $request->idProfile));

        } 
         
        if(isset($request->idUser) && !empty($request->idUser) && isset($request->idProfile) && !empty($request->idProfile)) 
        {   
           	if(isset($_POST) && !empty($_POST)) {
        	    $request = (object)filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES);
        	    
        	    $this->Profile = $this->setProfile($request);  

        	    if($this->ProfileDAO->updateProfile($this->Profile) || $this->ProfileDAO->updateAddress($this->Profile)) {
        	    	// $this->ProfileDAO->updateAddress($this->Profile);
                    // echo "ENTREI no UPDATEPROFILE"; 
                    	
        	   	    self::setViewParam('alert', 'alert-success');
                    self::setViewParam('msg', 'Dados atualizado com sucesso!'); 
        	        $this->redirect('/perfil'); 
		    	} else { 
		    	    //echo "NAO ENTREI no UPDATEPROFILE";
		            // Message::showMsg("Preencha todos os campos!", "alert-danger");
		           
		            self::setViewParam('alert', 'alert-danger');
		            self::setViewParam('msg', 'Nenhum campo foi alterado!');
		            
		            $this->render('/perfil/editar');     
		        } 



        	}        	 
        }  

        $this->render('/perfil/editar');
	}

	public function excluir() 
	{   
        if(isset($_POST['idProfile']) && !empty($_POST['idProfile']) && isset($_POST['idUser']) && !empty($_POST['idUser'])) {
		        
	        $this->request = (object)filter_input_array(INPUT_POST,FILTER_SANITIZE_MAGIC_QUOTES); 
	          
            if($id = $this->ProfileDAO->readProfile($this->request->idUser, $this->request->idProfile)) {	
	        	
	        	if($this->ProfileDAO->deleteProfile($id)) {
	        		self::setMessage('msg', 'Recruta deletado com sucesso');
	        		self::setViewParam('alert', 'alert-success');
                    self::setViewParam('msg', 'Recruta deletado com sucesso!'); 
                    $this->redirect('/perfil/excluir');
	        	} 
	        }

	        unset($_SESSION['idUser']);
	        unset($_SESSION['idProfile']);
        } 

        if(isset($_GET['idProfile']) && !empty($_GET['idProfile'])) {
	        $_SESSION['idUser'] = $_GET['idUser'];
	        $_SESSION['idProfile'] = $_GET['idProfile'];
	        
	        $result = $this->ProfileDAO->readProfile($_SESSION['idUser'],$_SESSION['idProfile']);
            
        } 
	        //else {	        

		    // $this->redirect('/perfil');
        
      //   }  
	                    
        self::setViewParam('perfil', $this->ProfileDAO->readProfile($_SESSION['idUser'], $_SESSION['idProfile']));

        $this->render('perfil/excluir');	
	}

	private function setProfile($request)
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

	
    
    // public function getMsg() 
    // {
        
    //     return ($this->msg) ? $this->msg : null;
    // }

    // public function setMsg($msg) 
    // {
    // 	$this->msg = $msg;
    // }
}