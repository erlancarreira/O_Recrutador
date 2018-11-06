<?php  

class Profile
{
    // Propriedades de Profile
    private $idProfile;
    private $idUser;
    private $career;
	private $name;
	private $age;
	private $gender;
	private $description;

	// Propriedades de Address
	private $idAddress;
	private $address;
	private $number;
	private $city;
	private $state;
	private $zip;

    public function getIdProfile() 
	{
		return $this->idProfile;
	}

	public function setIdProfile($idProfile) 
	{
		$this->idProfile = $idProfile;
	}

	public function getIdUser() 
	{
		return $this->idUser;
	}

	public function setIdUser($idUser) 
	{
		$this->idUser = $idUser;
	}

	public function getCareer() 
	{
		return $this->career;
	}

	public function setCareer($career) 
	{
		$this->career = strtolower($career);
	}

	public function getName() 
	{
        return $this->name;
	}

	public function setName($name) 
	{
		$this->name = strtolower($name);
	}
	
	public function getAge() 
	{
		return $this->age;
	}

	public function setAge($age) 
	{
		$this->age = $age;
	}

	public function getGender() 
	{
        return $this->gender;
	}

	public function setGender($gender)
	{
		$this->gender = strtolower($gender);
	}

	public function getDescription() 
	{
		return $this->description;
	}

	public function setDescription($description) 
	{
		$this->description = strtolower($description);
	}

	//END PROFILE

	// ADDRESS

	public function getIdAddress() 
	{
        return $this->idAddress;
	}

	public function setIdAddress($idAddress) 
	{
		$this->idAddress = $idAddress;
	}

	public function getAddress() 
	{
        return $this->address;
	}

	public function setAddress($address)
	{
		
		$this->address = strtolower($address);
	}

	public function getNumber() 
	{
		return $this->number;
	}

	public function setNumber($number) 
	{
		$this->number = $number;
	}	
	
	public function getCity() 
	{
		return $this->city;
	}

	public function setCity($city) 
	{
		$this->city = $city;
	}

	public function getState() 
	{
		return $this->state;
	}

	public function setState($state) 
	{
		$this->state = $state;
	}

	public function getZip() 
	{
		return $this->zip;
	}

	public function setZip($zip) 
	{
		$this->zip = preg_replace("/[^0-9]/", "", $zip);
	}

	//END ADDRESS
	
}