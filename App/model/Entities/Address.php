<?php 

class Address
{
	
	private $idAddress;
	private $idProfile;
	private $address;
	private $number;
	private $city;
	private $state;
	private $zip;

	public function getIdAddress() 
	{
        return $this->idAddress;
	}

	public function setIdAddress($idAddress) 
	{
		$this->idAddress = $idAddress;
	}

	public function getIdProfile() 
	{
		return $this->idProfile;
	}

	public function setIdprofile($idProfile) 
	{
		$this->idProfile = $idProfile;
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
		$this->city = strtolower($city);
	}

	public function getState() 
	{
		return $this->state;
	}

	public function setState($state) 
	{
		$this->state = strtolower($state);
	}

	public function getZip() 
	{
		return $this->zip;
	}

	public function setZip($zip) 
	{
		$this->zip = $zip;
	}
}