<?php 
include_once("config.php");
/**
 * 
 */
class LoginDAO extends BaseDAO
{
    public function checkUser($request)
    {
        
        try {
            
            !$email = $request['email'];
            !$userName = $request['userName'];
            
            $query = $this->select(
                "SELECT idUser, userName, email FROM users 
                WHERE email = '$email' 
                OR userName = '$userName'"
            );
            
            if($query->rowCount() > 0) {  
                return $query->fetch(PDO::FETCH_ASSOC);
            } 

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function register(User $request) 
    {
        
        try {
            $userName   = $request->getUserName();
            $email      = $request->getEmail();
            $pass       = $request->getPassword();

            // var_dump($userName, $email, $pass); exit;
            return $this->insert(
                'users',
                ":userName,:email,:password",
                [
                    ':userName'=>$userName,
                    ':email'=>$email,
                    ':password'=>$pass
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
        
    }

    public function loginIn($request) 
    {
        try {
            
            !$email = $request->email;
            !$pass = $request->pass;

            $query = $this->select(
                "SELECT idUser, userName, email FROM users 
                WHERE email = '$email' AND password = '$pass' 
                "
            );
            
            if($query->rowCount() > 0) {  
                return $_SESSION['user'] = $query->fetch(PDO::FETCH_ASSOC);
            } 
            
        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
}    