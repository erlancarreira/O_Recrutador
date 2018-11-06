<?php 
/**
 * 
 */
class RegionController extends Controller
{
	public static $estado;
	public static $cidade;
	
	public static function getEstado()
    {
        
        $this->result = $this->select(
            "SELECT * FROM state"
        );
         
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getCidade($id)
    {
        if($id) {
            
            $this->result = $this->select(
                "SELECT * FROM city WHERE state = {$id}"
            );
        }
        
        return $this->result->fetchAll(PDO::FETCH_OBJ);
        
        
    }
    
    public static function getCidades() 
    {
        $data = array();
        
        if(isset($_POST['estado']) && !empty($_POST['estado'])) {
            $data = $this->ProfileDAO->getCity($_POST['estado']);
            self::setViewParam('cidades', $data);
            echo json_encode($data);
        }
    
    
    }

}