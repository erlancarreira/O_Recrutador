<?php 
/**
 * 
 */
class Message 
{
	private $previous;
	private $key = 'donwsMessages';
	private $storage;
	
	public function __construct() 
	{
		$this->storage = &$_SESSION;

		if (isset($this->storage[$this->key]) && is_array($this->storage[$this->key])) {
			$this->previous = $this->storage[$this->key];
		}

		$this->storage[$this->key] = [];
	}

	public function setMessage($key, $message) 
	{
        if(!isset($this->storage[$this->key][$key])) {
       	    $this->storage[$this->key][$key] = $message;
        }
	}

	public function getMessage($key) 
	{
        if($this->has($key)) {
       	    return $this->previous[$key];
        }

        return null;
	}

	
    public function has($key) 
    {
    	return isset($this->previous[$key]);
    } 
}