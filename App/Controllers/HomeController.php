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
    }

	public function index() 
	{   
	   
	    if(isset($_GET['idUser']) && !empty($_GET['idUser'])) {
            $request = (object)filter_input_array(INPUT_GET,FILTER_SANITIZE_MAGIC_QUOTES);   
            self::visualizar($request);   
	    }

	    $this->render('home');	
	}

	public function visualizar($request) 
	{
        echo "ENTREI";
        

	    $this->render('visualizar');
	}       
}