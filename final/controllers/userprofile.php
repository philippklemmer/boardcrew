<?php

/**
 *
 */
class Userprofile extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('userprofile/index');
    }
}
