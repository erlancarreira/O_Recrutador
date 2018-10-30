<?php
include_once('config.php'); 
/**
 * 
 */
class ProfileDAO extends BaseDAO
{
	private $result;
	public static $state;

	public function createProfile(Profile $profile, $lastInsert = false) 
    {   
    	
        // var_dump($profile); exit;
        try {
            
            //Classe PROFILE
            $idUser         = $profile->getIdUser();
            $career         = $profile->getCareer();
            $name           = $profile->getName();
            $age            = $profile->getAge();
            $gender         = $profile->getGender();
            $description    = $profile->getDescription(); 
            
            //Classe ADDRESS  
            $address        = $profile->getAddress();
            $number         = $profile->getNumber();
            $city           = $profile->getCity();
            $state          = $profile->getState();
            $zip            = $profile->getZip();    

            // var_dump($address, $number, $city, $state, $zip); exit();        
            // var_dump($profile); exit;
            $this->result = $this->insert(
                'profile',
                ":idUser,:career,:name,:age,:gender,:description",
                [   
                    ':idUser'=>$idUser,
                    ':career'=>$career,
                    ':name'=>$name,
                    ':age'=>$age,
                    ':gender'=>$gender,
                    ':description'=>$description
                ], $lastInsert
            );
            
            // var_dump($this->result); exit;
            if($this->result) {
	            return $this->insert(
	                'address',
	                ":idProfile,:address,:number,:city,:state,:zip",
	                [   
	                    ':idProfile'=>$this->result,
	                    ':address'=>$address,
	                    ':number'=>$number,
	                    ':city'=>$city,
	                    ':state'=>$state,
	                    ':zip'=>$zip
	                ]
	            );
            }

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function readProfile($id = null, $idProfile = null) 
    {

        if($id && $idProfile == null) {
            
            $result = $this->select(
                "SELECT * FROM profile p, address a WHERE p.idUser = {$id} AND p.idProfile = a.idProfile"
            );

            return $result->fetchAll(\PDO::FETCH_CLASS, Profile::class); 
            
        
        } elseif($idProfile) {
            
            $result = $this->select(
                "SELECT * FROM profile p, address a WHERE p.idProfile = {$idProfile} AND p.idProfile = a.idProfile"
            );
            // return $result->fetchAll(\PDO::FETCH_CLASS, Profile::class);    
            return $result->fetchObject(Profile::class);
        } else {
            
            $result = $this->select(
                "SELECT * FROM profile p, address a WHERE p.idProfile = a.idProfile"
            );
            return $result->fetchAll(\PDO::FETCH_CLASS, Profile::class);
        }
        return false;
    }

    public function updateProfile(Profile $profile) 
    {
    	// var_dump($profile); exit;
        try {
            //Classe Profile
            $idProfile      = $profile->getIdProfile();
            $career         = $profile->getCareer();
            $name           = $profile->getName();
            $age            = $profile->getAge();
            $gender         = $profile->getGender();
            $description    = $profile->getDescription(); 
            // var_dump($idProfile); exit;
            return $this->update(
                'profile',
                "career = :career, name = :name, age = :age, gender = :gender, description = :description",
                [
                    ':idProfile'=>$idProfile,
                               
                    ':career'=>$career,
                    ':name'=>$name,
                    ':age'=>$age,
                    ':gender'=>$gender,
                    ':description'=>$description,
                ],

                "idProfile = :idProfile"
            );



            // //Classe Address
            // $address        = $profile->getAddress();
            // $number         = $profile->getNumber();
            // $city           = $profile->getCity();
            // $state          = $profile->getState();
            // $zip            = $profile->getZip();
            
            // $this->result = $this->update(
            //     'address',
            //     "address = :address, number = :number, city = :city, state = :state, zip = :zip",
            //     [
                    
            //         ':idProfile'=>$idProfile,

            //         ':address'=>$address,
            //         ':number'=>$number,
            //         ':city'=>$city,
            //         ':state'=>$state,
            //         ':zip'=>$zip,
            //     ],
            //     "idProfile = :idProfile"
            // );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }   
    }

    public function updateAddress(Profile $profile)       
    {        
        // var_dump($address); exit;
        try {
            //Classe Address 
            $idProfile      = $profile->getIdProfile();
            $address        = $profile->getAddress();
            $number         = $profile->getNumber();
            $city           = $profile->getCity();
            $state          = $profile->getState();
            $zip            = $profile->getZip();
            // var_dump($address);
            // if($this->result) {
            return $this->update(
                'address',
                "address = :address, number = :number, city = :city, state = :state, zip = :zip",
                [
                    ':idProfile'=>$idProfile,
                    ':address'=>$address,
                    ':number'=>$number,
                    ':city'=>$city,
                    ':state'=>$state,
                    ':zip'=>$zip,
                ],
                "idProfile = :idProfile"
            );
            // }

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function deleteProfile(Profile $profile) 
    {
    	return true;
        try {
            $id = $profile->getIdProfile();

            return $this->delete('profile',"idProfile = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    
    }

    public function getLocation($string)
    {
       

        $this->result = $this->select(
            "SELECT * FROM $string"
        );
         
        if($this->result->rowCount() > 0) { 
            return $this->result->fetchAll(PDO::FETCH_OBJ);
        }
        
    }

}