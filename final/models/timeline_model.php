<?php

class Timeline_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function addPost($title, $mediaPath, $mainTag, $additionalTags, $imgTmpName = null){
        
        //checks if $mediaPath is a video or Image to check if there needs to be an additional directory
        if($mediaPath[1] == "img"){
            //create foldername == name of the user
            $folderName = strtolower(Session::get("user_username")); 
            // checks if there is allready an directory for the user
            if (!file_exists($folderName)) {
                //if there is no foldername called like the user
                mkdir("userFiles/" . $folderName . "/" ,0755);
            }
            //move file to directory or create a new one
            $imgUploadPath = "/userFiles/" . $folderName . "/" . str_replace('/', '_', $mediaPath[0]);
            $uploaded = move_uploaded_file($imgTmpName, $imgUploadPath);
            $mediaPath = $mediaPath[0];
        }
        //get users_user_id from session
        $users_user_id = Session::get("id_user");

        //insert data
        $sql  = "INSERT INTO bc_posts ";
        $sql .= "(`username_user_id`,`posts_title`,`posts_mediaPath`,`posts_mainTag`,`posts_additionalTags`,`posts_date` )";
        $sql .= "VALUES (:user_id, :title, :mediaPath, :mainTag, :additionalTags, NOW())";
        //preparing the pdo statement
        $sth = $this->db->prepare($sql);
        //if all is correct -> execute
        $sth->execute(array(
            "user_id" => "$users_user_id",
            "title" => "$title",
            "mediaPath" => "$mediaPath",
            "mainTag" => "$mainTag",
            "additionalTags" => "$additionalTags"
        ));
        $result = $sth->rowCount();
        if ($result > 0) {
            //Validierungs Mail schicken
            //sendValidationMail($mail, $validationHash);
            return true;
        } else {
            return false;
        }
    }
    
    public function getPosts(){
        $sql  = "SELECT u.user_username, p.posts_title, p.posts_mediaPath, p.posts_mainTag, p.posts_additionaltags, p.posts_date, p.likeCount, bc_profiles.profile_profileImg ";
        $sql .= "FROM bc_users AS u ";
        $sql .= "INNER JOIN bc_posts AS p ON u.user_id=p.username_user_id ";
        $sql .= "INNER JOIN bc_profiles ON p.username_user_id=bc_profiles.users_user_id ";
        return $this->db->select($sql,array());    
    }
}