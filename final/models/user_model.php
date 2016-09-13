<?php

class User_Model extends Model{

    function __construct() {
        parent::__construct();
    }
    /**
     * Select Profile for the loggedIn User
     * @param type $name
     * @return type
     */
    public function profile($name){
    
        try {
            
            //autocommit off
            $this->db->beginTransaction();
            
            
            $sql  = "SELECT u.user_id, u.user_username, p.profile_id, p.users_user_id, p.profile_profileImg, p.profile_backgroundImg, p.profile_gender, p.profile_style, p.profile_country, p.profile_city ";
            $sql .= "FROM bc_users AS u ";
            $sql .= "INNER JOIN bc_profiles AS p ON u.user_id = p.users_user_id ";
            $sql .= "WHERE u.user_username = '{$name}'; ";
        
            $sth = $this->db->select($sql, array());
            //header("location:" .URL."user");
            //Get the follower Count
            $followerQuery = "SELECT COUNT(`user_id`) AS followedUser FROM `bc_user_has_followers` WHERE user_id={$sth[0]['user_id']} GROUP BY user_id";
            $follower = $this->db->select($followerQuery, array());
            
            
            //Get the amount of people following this user
            $followingQuery = "SELECT COUNT(`follower_id`) AS followingUsers FROM `bc_user_has_followers` WHERE follower_id={$sth[0]['user_id']} GROUP BY follower_id";
            $following = $this->db->select($followingQuery, array());
            
            $following = [$follower, $following];
            
            $sth[0]["following"] = $following;
            //concat the results of the query and add them to $sth 
            
            //autocommit on
            $this->db->commit();
            
            return $sth;
            
        } catch (Exception $e) {
            debug($e);
        }
        
        
        
    }
}