<?php

class Model {

    public function __construct() {
        $this->db = new Database();
    }
    
    /**
     * Checks if there the email allready exists
     * @param type $type
     * @param type $input
     * @return type
     */
    public function dataExists($type, $input) {
        $sth = $this->db->prepare("SELECT {$type} from bc_users WHERE {$type} = :{$type} ");
        $sth->execute(array(
            ":{$type}" => "{$input}"
        ));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Checks if the user has allready liked the video
     * @param int as string $post_id
     * @param int as string $user_id
     * @return BOOL
     */
    public function userAllreadyLiked($post_id, $user_id){
        $sql = "SELECT * FROM bc_user_has_liked WHERE post_id = :post_id AND user_id = :user_id";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ":post_id" => "{$post_id}",
            ":user_id" => "{$user_id}"
        ));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Check if the user followed the user allready
     * @param type $user_id
     * @param type $follower_user_id
     * @return type
     */
    public function allreadyFollowed($user_id, $follower_user_id){
        $sql = "SELECT * FROM bc_user_has_followers WHERE `user_id`= :user_id AND `follower_id`= :follower_user_id ";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ":user_id" => "{$user_id}",
            ":follower_user_id" => "{$follower_user_id}"
        ));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    
    /**
     * TODO change that you 
     * @param string $order
     * @param type $limit
     * @return string
     */
    public function getPosts($order = "p.posts_date", $limit = '2', $orderStyle = "DESC"){
        if(!in_array($order, array( 'p.posts_date','likeCount' ))){
            $where = $order;
            $order = 'p.posts_date';
        }
        
        /**
         * Timeline filter on TopEntrys -> showing the most wanted posts of all
         * count the likeCount for each post and update them in the post table
         */
        if($order == "likeCount"){
            try{
                //autocommit off
                $this->db->beginTransaction();
                //selecting the likes from each post
                $likeCount = $this->db->select("SELECT  l.post_id, COUNT(l.post_id) AS likes FROM bc_user_has_liked AS l GROUP BY l.post_id ",array());
                // prepare an insert with likes into the posts table to get the newest likeCount
                foreach ($likeCount as $val ){
                    // selecting all the post_ids and likes
                    $post_id = $val["post_id"];
                    $amountOfLikes = $val["likes"];
                    
                    $sql = "UPDATE bc_posts SET `likeCount`=:like WHERE bc_posts.posts_id={$post_id}";
                    $sth = $this->db->prepare($sql);
                    $sth->execute(array(
                        ":like" => "{$amountOfLikes}"
                    ));
                }
                //autocommit on
                $this->db->commit();
                //if the insert did worked
            } catch (Exception $ex) {
                $this->db->rollBack();
                echo 'Failed: ' . debug($e);
            }
        }
        
        $sql  = "SELECT u.user_username,p.posts_id, p.username_user_id, p.posts_title, p.posts_mediaPath, p.posts_mediaPathCheck ,p.posts_mainTag, p.posts_additionaltags, p.posts_date, bc_profiles.profile_profileImg ";
        $sql .= "FROM bc_users AS u ";
        $sql .= "INNER JOIN bc_posts AS p ON u.user_id=p.username_user_id ";
        $sql .= "INNER JOIN bc_profiles ON p.username_user_id=bc_profiles.users_user_id ";
        
        if(isset($where) && is_string($where)){
            $sql .= "{$where} ";
        }
        if($order == "like_Count"){
            $sql .= "ORDER BY {$order} ";
        }else{
            $sql .= "ORDER BY {$order} ";
        }
        
        $sql .= "{$orderStyle} LIMIT {$limit}; ";
        //select the posts
        $result = $this->db->select($sql,array());
        //explode the addtional tags string to get each tag
        $array = [];
        
        foreach($result as $k => $v){

            $exploded = explode("," , $v['posts_additionaltags']);
            foreach($exploded as $key => $value){
                //$trimmed = trim($value["posts_additionaltags"]);
                $trim  = ["#" , ","];

                $trimmed = str_replace($trim , "", trim($value));
                $array[$k][] = $trimmed;
            }
             $ids[] = $result[$k]["posts_id"];
             $result[$k]["posts_additionaltags"] = $array;
             unset($array);
        }
        
        //count likes from the post
        foreach($ids as $i => $d ){
            //Selecting the likes for each post
            intval($d);
            $likeCount[$i] = $this->db->select("SELECT bc_user_has_liked.user_id, COUNT(bc_user_has_liked.post_id) AS likes FROM bc_user_has_liked WHERE bc_user_has_liked.post_id={$d} GROUP BY bc_user_has_liked.post_id  LIMIT {$limit}",array());           
            array_push($result[$i], $likeCount[$i]);
            
        }
        
        return $result;
    }
    /**
     * 
     * @param type $postid
     */
    public function likePost($postid){
        //User clicks on btn 
        //insert into user_has_liked used_id + posts_id
        $user_id = (Session::get('id_user'));
        
        $sql  = "INSERT INTO bc_user_has_liked (`user_id`, `post_id`) VALUES(:user, :post)";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ":user" => "$user_id",
            ":post" => "$postid",
        ));
    }
    /**
     * Function to update the likeCount of the post
     * @param type $post_id
     * @return type
     */
    public function updateLike($post_id){
        $sql = "SELECT COUNT(*) FROM bc_user_has_liked WHERE post_id = $post_id";
        $result = $this->db->select($sql, array());
        return $result;
    }
    /**
     * Function that users can follow other users
     * @param (string)int $user_id
     * @param (string)int $follower_user_id
     */
    public function followUser($user_id,$follower_user_id){
        $sql = "INSERT INTO bc_user_has_followers (user_id, follower_id) VALUES(:user_id, :follower_id)";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ":user_id" => "{$user_id}",
            ":follower_id" => "{$follower_user_id}",
        ));
    }
    /**
     * Functions that deletes unfollow an user
     * @param (string)int $user_id
     * @param (string)int $follower_user_id
     */
    public function unfollowUser($user_id, $follower_user_id){
        $sql = "DELETE FROM `bc_user_has_followers` WHERE `user_id`=:user_id AND `follower_id`=:follower_id ";
        $sth = $this->db->prepare($sql);
        $sth->execute(array(
            ":user_id" => "{$user_id}",
            ":follower_id" => "{$follower_user_id}",
        ));
    }
    
    
    
    
}