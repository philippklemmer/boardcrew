<?php

class Timeline_Model extends Model {

    function __construct() {
        parent::__construct();
    }


    public function userPost($title, $mediaPath, $mainTag, $additionalTags, $imgTmpName = null){
        //if mediapath is an video == 2
        $mediaPathCheck = 2;
        //checks if $mediaPath is a video or Image to check if there needs to be an additional directory
        if($mediaPath[1] == "img"){

            //get the fileextension
            $ext = explode(".", $mediaPath[0]);
            $fileExt = strtolower(end($ext));

            //create new filename
            $uniqFileName = uniqid();
            $mediaPath[0] = $uniqFileName . "." . $fileExt;

            //create foldername == name of the user
            $folderName = strtolower(Session::get("user_username"));
            $uploadPath = USERPROFILE . "/userFiles/{$folderName}";

            // checks if there is allready an directory for the user
            if (!file_exists($uploadPath)) {
                //if there is no foldername called like the user
                mkdir("{$uploadPath}/" ,0755, true);
            }

            //move file to directory or create a new one
            $imgUploadPath = "{$uploadPath}/" . str_replace('/', '_', $mediaPath[0]);
            move_uploaded_file($imgTmpName, $imgUploadPath);
            $mediaPath = $mediaPath[0];
            $mediaPathCheck = 1;
        }else{
            //complete video url
            $youtubeVideo = explode("=",$mediaPath);
            //explod the videoid
            $videoId = $youtubeVideo[1];
            // create new video id for embed player
            $embedVideoUrl = "https://www.youtube.com/embed/{$videoId}";
            $mediaPath = $embedVideoUrl;
        }
        //get users_user_id from session
        $users_user_id = Session::get("id_user");

        //insert data
        $sql  = "INSERT INTO bc_posts ";
        $sql .= "(`username_user_id`,`posts_title`,`posts_mediaPath`,`posts_mediaPathCheck`,`posts_mainTag`,`posts_additionalTags`,`posts_date` )";
        $sql .= "VALUES (:user_id, :title, :mediaPath, :posts_mediaPathCheck , :mainTag, :additionalTags, NOW())";
        //preparing the pdo statement
        $sth = $this->db->prepare($sql);
        //if all is correct -> execute
        $sth->execute(array(
            "user_id" => "$users_user_id",
            "title" => "$title",
            "mediaPath" => "$mediaPath",
            "posts_mediaPathCheck" => "$mediaPathCheck",
            "mainTag" => "$mainTag",
            "additionalTags" => "$additionalTags"
        ));
        $result = $sth->rowCount();
        
        if ($result > 0) {
            header("location:" . URL ."timeline");
            return true;
        } else {
            return false;
        }
    }
    
    
}
