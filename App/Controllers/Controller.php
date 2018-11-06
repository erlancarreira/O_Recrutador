<?php

include_once('config.php');

abstract class Controller 
{
    protected $app;
    private $viewVar;
    private $alert;
    

    public function __construct($app)
    {
        
        $this->setViewParam('nameController',$app->getControllerName());
        $this->setViewParam('nameAction',$app->getAction());
        // $this->alert = new Message();
    }

    public function render($view)
    {
        $viewVar   = $this->getViewVar();       
        $alert     = new Message();

        require_once PATH . '/App/views/layouts/header.php';
        require_once PATH . '/App/views/layouts/menu.php';
        require_once PATH . '/App/views/' . $view . '/index.php';
        require_once PATH . '/App/views/layouts/footer.php';
    }

    public function renderView($view)
    {
        
        $viewVar                   = $this->getViewVar();
        $alert                     = new Message();
        require_once PATH . '/App/views/' . $view . '/index.php';
        
    }

    public function redirect($view)
    {
        header('Location: ' . BASE . $view);
        exit;
    }

    // public function getMessages()
    // {
    //     return $this->messages;
    // }

    // public function setMessage($value, $key) {

    //     $this->messages = function() {
    //         return new Message($value, $key);
    //     };
    // }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }

    // public function getAlert()
    // {   
       
    //     return $this->alert;
    // }
    
    // }

    // public function setAlert($name, $alert, $msg)
    // {   
    //     $alertMsg = [ 'alert' => $name, 'alertClass' => $alert, 'alertMsg' => $msg ];
    //     if ($name != "" && $alert != "" && $msg != "") {
    //         $this->alert = $alertMsg;
    //     }
    // }
     
    
}