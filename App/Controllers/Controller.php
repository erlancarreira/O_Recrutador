<?php

include_once('config.php');

abstract class Controller
{
    protected $app;
    private $viewVar;
    private $messages;

    public function __construct($app)
    {
        $message = $this->getMessages();
        $this->setViewParam('nameController',$app->getControllerName());
        $this->setViewParam('nameAction',$app->getAction());
    }

    public function render($view)
    {
        $viewVar   = $this->getViewVar();       
        
        var_dump($this->getMessages());

        require_once PATH . '/App/views/layouts/header.php';
        require_once PATH . '/App/views/layouts/menu.php';
        require_once PATH . '/App/views/' . $view . '/index.php';
        require_once PATH . '/App/views/layouts/footer.php';
    }

    public function renderView($view)
    {
        $viewVar   = $this->getViewVar();
        require_once PATH . '/App/views/' . $view . '/index.php';
        
    }

    public function redirect($view)
    {
        $message = $this->getMessages();
        header('Location: ' . BASE . $view);
        exit;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function setMessage($value, $key) {

        $this->messages = function() {
            return new Message($value, $key);
        };
    }

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

    // public function getData() 
    // {
    //     return $this->data;
    // }

    // public function setData($data)
    // {
    //     $this->data = $data;
    // }
}