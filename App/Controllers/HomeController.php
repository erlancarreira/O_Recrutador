<?php 
include_once("config.php");

class HomeController extends Controller 
{
    private $ProfileDAO;

    public function __construct() 
    {
        // $profileDAO = new UserDAO();   
	    $this->ProfileDAO = new ProfileDAO();
	    self::setViewParam('perfil', $this->ProfileDAO->readProfile()); 
	    self::setViewParam('estados', $this->ProfileDAO->getLocation('state'));
        self::setViewParam('cidades', $this->ProfileDAO->getLocation('city'));
    }

	public function index() 
	{   
	   
	    // if(isset($_GET['idUser']) && !empty($_GET['idUser'])) {
     //        $request = (object)filter_input_array(INPUT_GET,FILTER_SANITIZE_MAGIC_QUOTES);   
     //        // self::visualizar($request);   
	    // }

	    $this->render('home');	
	}

	public function visualizar() 
	{ 
        self::setViewParam('perfil', $this->ProfileDAO->readProfile($_GET['idUser'], $_GET['idProfile']));           
	    $this->render('home/visualizar');
	} 

	public function search() 
	{	
       self::setViewParam('perfil', $this->ProfileDAO->searchProfile(Helps::getRequest($_GET['search']))); 
       
       $this->render('home/search');
	}      
}