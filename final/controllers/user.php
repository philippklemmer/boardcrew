    <?php

/**
 *
 */
class User extends Controller{
    function __construct(){
        parent::__construct();
         //js einbinden
        $this->view->js = array('timeline/js/timeline.js', 'user/js/user.js' );
        Auth::handleLogin();
    }
    /**
     * the profile of the user, if the user is logged in and goes to the "user"-controller 
     * the $name will be the name in the Session,
     * otherwise the function user/profile/name will be run
     * @param type $name
     */
    function index($name = false, $user_id = false){
        
        //get the user_id to load only the user posts for the user proifle
        if($name == false && $user_id == false){
            $name = Session::get("user_username");
            $user_id = Session::get("id_user");
        }
          
        $profilData = $this->model->profile($name);
        $timelineData = $this->model->getPosts("WHERE p.username_user_id = {$user_id}");
        
        $data = ["profileData" => $profilData, "posts" => $timelineData, "user_id" => $user_id];
        
        $this->view->setData($data); 
        
        $this->view->render('user', 'loggedIn');
       
        
    }
    /**
     * Function that select all profileData
     * @param type $name
     * @return type
     */
    public function profile($name){
        
        if($this->model->dataExists("user_username", $name) == FALSE){
            header("Location:" . URL . "timeline");
            return;
            
        }else{
            $profilData = $this->model->profile($name);
            $user_id = $profilData[0]["user_id"];
            $this->index($name, $user_id);
        }
        
    }
    
}
