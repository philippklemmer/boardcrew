<?php
/**
 * Xhr -> Ajax Controller
 */
class Xhr extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index(){
            echo 'false';
    }
    
    /**
     * Select Data for Timelines | View->Timeline,Userprofile
     * @param type $param -> none or part of the array: $array
     * @param type $limit (Optional)
     * @return type
     */
    public function filterTimeline($param = false, $limit = '2', $user_id = false){
        
        // checks if the request is manipulated
//        if(!isset($_POST['auth']) || $_POST['auth'] !== "abc" || !$param){
//            header("Location:" .URL.  "timeline");
//            return;
//        }
        if(!$user_id){
            $user_id = Session::get("id_user");
        }
        //decide which filtermethod 
        $array = [
            "recentEntry" => "p.posts_date",
            "topEntry" => "likeCount",
            "buddyEntry" => "follower",
            "userTimelineDESC" => "WHERE p.username_user_id = {$user_id}",            
            "userTimelineASC" => "WHERE p.username_user_id = {$user_id}"            
        ];
        
        if(!isset($array[$param])){
            $this->index();
            return;
        }
        //get posts for the timeline
        $this->loadModel("Timeline");
        //userprofile Timelinefilter method showing input ASC
        if($param == "userTimelineASC"){
            $data = $this->model->getPosts($array[$param], $limit, "ASC");
        }else{
            $data = $this->model->getPosts($array[$param], $limit);
        }
        
        $this->view->setData($data);
        //render the view
        $this->view->renderTimeline();
        return;

    }
    /**
     * Function that checks if the posts was liked allready
     * and if not like it and update the view
     * @param type $post_id
     * @return type
     */
    public function likePost($post_id){
        
        if(!isset($_POST['auth']) || $_POST['auth'] !== "abc"){
            header("Location:" .URL.  "timeline");
            return;
        }
        
        $user_id = Session::get("id_user");
        $this->loadModel("Timeline");
        
        if($this->model->userAllreadyLiked($post_id, $user_id) == True){
            echo 'gibt es schon';
            return;
        }else{
            echo 'gibt es noch nicht';
            //insert a new like±
            if($this->model->likePost($post_id) === True){
                // if insert true update the view like
                $this->model->updateLike($post_id);
            }
        }
    }
    /**
     * Functions to follower the user
     * @param type $follower_user_id
     * @return type
     */
    public function followUser($follower_user_id){
        
        if(!isset($_POST['auth']) || $_POST['auth'] !== "abc"){
            header("Location:" .URL.  "timeline");
            return;
        }
        
        $user_id = Session::get("id_user");
        $this->loadModel("User");
        
        if($this->model->allreadyFollowed($user_id, $follower_user_id)){
            echo 'this user is allready in your friendlist';
            return;
        }else{
            echo "this user is not in your friendlist";
            $this->model->followUser($user_id,$follower_user_id);
        }
            
    }
    /**
     * Functions to unfollow the User
     * @param type $follower_user_id
     * @return type
     */
    public function unfollowUser($follower_user_id){
        
       if(!isset($_POST['auth']) || $_POST['auth'] !== "abc"){
            header("Location:" .URL.  "timeline");
            return;
        }
        
        $user_id = Session::get("id_user");
        $this->loadModel("User");
        
        echo 'erfolgreich gelöscht';
        
        $this->model->unfollowUser($user_id, $follower_user_id);
        
    }
    
}
