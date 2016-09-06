<?php

class Timeline extends Controller {
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('timeline', "loggedIn",1);
    }

}
