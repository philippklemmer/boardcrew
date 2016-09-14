<?php

class Search extends Controller {

    function __construct() {
        parent::__construct();
        //js einbinden
        $this->view->js = array('timeline/js/timeline.js');
        Auth::handleLogin();
    }

    function index(){
        //render the view
        $this->view->render('search',"loggedIn");
    }
    
    
}