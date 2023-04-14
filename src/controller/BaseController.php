<?php

namespace controller;

class BaseController
{
    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require __DIR__ . '/../pages/' .$viewName . '.php';
//        require 'Views/'.$viewName.'.php';
    }

    public function errorMessage($messagem)
    {
        $_SESSION['errorMessage'] = $messagem;
    }

    public function sucessoMessage($messagem)
    {
        $_SESSION['sucessoMessage'] =$messagem;
    }
}