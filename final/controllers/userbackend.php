<?php

/**
 *
 */
class Userbackend extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('userbackend/index');
    }
}
