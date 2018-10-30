<?php 
include_once("config.php");
/**
 * 
 */
class Helps 
{ 
	static public $db;

	public function __construct() { parent::__construct();}

	
	public static function getState() 
	{
	   $sql = "SELECT * FROM state";
	   $sql = self::$db->query($sql);
	   var_dump($sql); exit;
	   $sql->fetchAll();

	   var_dump($sql);

	}

	public static function getCity() 
	{

	}

}