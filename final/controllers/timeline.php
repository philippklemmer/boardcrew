<?php

class Timeline extends Controller {

    public $result;

    function __construct(){
        parent::__construct();
        //js einbinden
        $this->view->js = array('timeline/js/timeline.js');
        Auth::handleLogin();
    }

    function index(){
        //get posts for the timeline
        $data = $this->model->getPosts();
        $this->view->setData($data);

        //render the view
        $this->view->render('timeline', "loggedIn", 1);

    }

    public function add(){
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
                $imgName = filter_var($profileImg['imageUrl']['name'], FILTER_SANITIZE_STRING);
                $imgTmpName = $profileImg['imageUrl']['tmp_name'];   // So heißt das Bild für PHP im Zwischenspeicher
                $imgType = filter_var($profileImg['imageUrl']['type'],FILTER_SANITIZE_STRING);
                $imgSize = filter_var($profileImg['imageUrl']['size'],FILTER_SANITIZE_STRING);

                $mediaPath = [$imgName,"img"];
            }else{
                $mediaPath = $videoUrl;
                $imgTmpName = null;
            }

            $mainTag = filter_input(INPUT_POST, 'danceStyle', FILTER_SANITIZE_STRING);
            $additionalTags = filter_input(INPUT_POST, 'addAdditionalTags', FILTER_SANITIZE_STRING);
            //Ein leeres Fehler-Array anlegen
            $errors = [];
            //debug($errors);
            // $title, $mediaPath, $imgTmpName = null, $mainTag, $additionalTags
            $this->model->userPost($title, $mediaPath, $mainTag, $additionalTags, $imgTmpName);

        }
    }
}
