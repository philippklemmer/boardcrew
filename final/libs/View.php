<?php

class View {
    
    // Extra data of view
    private $view_data;

    // Get extra view data
    public function getData() {
        return $this->view_data;
    }

    // Set extra view Data
    public function setData($data) {
        $this->view_data = $data;
    }

    // Check status of view
    public function isActive($name) {
        if ($this->view_name == $name) echo 'class="active"';
    }
    
    function render($name, $nav = null, $footerPartial = null){
        
        require_once 'views/partials/header.php';
        //if user is on view where he is logged in 
        if($nav === "loggedIn"){
            require_once 'views/partials/loggedInNav.php';
        }
        //if there is or there is not another navpartial for the view
        if($nav !== null){
            require_once "views/$name/inc/nav.php";
        }
        
        require_once "views/$name/index.php";
        //if there is or there is not another footerpartial for the view
        if($footerPartial !== null){
            require_once "views/$name/inc/footer.php";
        }
        
        require_once 'views/partials/footer.php';
    }
    
}