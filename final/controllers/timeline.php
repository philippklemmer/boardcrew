<?php

class Timeline extends Controller {
    
    public $result;
    
    
    function __construct(){
        parent::__construct();
        Session::init();
        Auth::handleLogin();
    }

    function index(){
        $this->view->render('timeline', "loggedIn",1);
        //get posts for the timeline
//        $data = $this->model->getPosts();
//        var_dump($data);
       
        
    }
    
    public function addPost(){
        //checks on button click
        $formSubmit = filter_input(INPUT_POST, 'addPostSubmit', FILTER_SANITIZE_STRING);
        if (isset($formSubmit)) {
            
        //Eingaben in Variablen speichern
        $title = filter_input(INPUT_POST, 'postTitle', FILTER_SANITIZE_STRING);
        
        $profileImg = filter_var_array($_FILES);
        $videoUrl = filter_input(INPUT_POST, 'videoUrl', FILTER_SANITIZE_STRING);
        //checks if video or img passed
        if(!empty($profileImg) && empty($videoUrl)){
            // $_FILES enthält die Dates des hochgeladenen Bildes
            echo 'Peter';
            $imgName = filter_var($profileImg['imageUrl']['name'], FILTER_SANITIZE_STRING);                                   
            $imgTmpName = $profileImg['imageUrl']['tmp_name'];   // So heißt das Bild für PHP im Zwischenspeicher 
            $imgType = filter_var($profileImg['imageUrl']['type'],FILTER_SANITIZE_STRING);
            $imgSize = filter_var($profileImg['imageUrl']['size'],FILTER_SANITIZE_STRING);
            
            $mediaPath = [$imgName,"img"];
        }else{
            echo("Sandra");
            $mediaPath = $videoUrl;
            $imgTmpName = null;
        }
        
        $mainTag = filter_input(INPUT_POST, 'danceStyle', FILTER_SANITIZE_STRING);
        $additionalTags = filter_input(INPUT_POST, 'addAdditionalTags', FILTER_SANITIZE_STRING);
        //Ein leeres Fehler-Array anlegen
        $errors = [];
        debug($errors);
        // $title, $mediaPath, $imgTmpName = null, $mainTag, $additionalTags
        if(empty($errors)){
            $this->model->addPost($title, $mediaPath, $mainTag, $additionalTags, $imgTmpName);
        }
        
        }
    }
    
    public function getPosts(){
        $data = $this->model->getPosts();
        $this->view->setData($data); 
        
    }
   
    
    

}
