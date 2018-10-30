<?php 

class User
{
	
	private $idUser;
	private $userName;
	private $email;
	private $password;

	public function getIdUser() 
	{
        return $this->idUser;
	}

	public function setIdUser($idUser) 
	{
		$this->idUser = $idUser;
	}
	
	public function getUserName() 
	{
		return $this->userName;
	}

	public function setUserName($userName) 
	{
		$this->userName = $userName;
	}

	public function getEmail() 
	{
        return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword() 
	{
		return $this->password;
	}

	public function setPassword($password) 
	{
		$this->password = $password;
	}
}