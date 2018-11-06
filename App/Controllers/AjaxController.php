<?php 
include_once("config.php");

class AjaxController extends Controller 
{
    private $ProfileDAO;

    public function __construct() 
    {
	    $this->ProfileDAO = new ProfileDAO();
	    
    }

	public function index(){}

	public function getCitys() 
	{ 
        $data = array();
        
        $data['cidades'] = $this->ProfileDAO->getCity($_POST['estado']);
        
        self::setViewParam('cidades', $data);
        
        echo json_encode($data);

	} 
	
}