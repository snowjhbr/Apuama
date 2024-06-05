<?php

  namespace app\Controllers;

  use app\controllers\Controller;

  class HomeController{
    
    public function index($params){

      $itens = ['carro 01', 'carro 02', 'carro 03'];

      var_dump($params);
      return Controller::view('home', ['itens' => $itens]);
    }

  }