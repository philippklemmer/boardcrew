<?php

class Index_Model extends Model {

    function __construct() {
        parent::__construct();
    }


    public function registerUser($username, $mail, $password) {

        //explode whitespace and form the $username into lower case
        $username = str_replace(" ", "", strtolower($username));
        
        //Eine einzigartige Zeichenkette vom Programm erstellen lassen
        $randomSalt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        //Hash - In eine Richtung, d.h wenn einmal gehashed wurde,
        // kann nicht mehr zurückgesetzt werden
        //hier werden der salt und der Hash zusammengeführt
        $hashedPw = hash('sha512', $password . $randomSalt);

        // Zufälligen Hash erzeugen für die Automatische Email zum aktivieren des Accounts
        $randomHash = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Jetzt wird die gesalzene Email ertellt für den Validierungsprozess
        $validationHash = hash('sha512', $mail . $randomHash);
        try {
            $this->db->beginTransaction();
            //insert data
            $sql  = "INSERT INTO bc_users ";
            $sql .= "(`user_username`, `user_mail`, `user_hash`, `user_salt`, `user_validation`, `user_valHash`, `user_regDate` )";
            $sql .= "VALUES (:username, :mail, :hash, :salt, :validation, :valHash, NOW())";
            //preparing the pdo statement
            $sth = $this->db->prepare($sql);
            //if all is correct -> execute
            $sth->execute(array(
                "username" => "$username",
                "mail" => "$mail",
                "hash" => "$hashedPw",
                "salt" => "$randomSalt",
                "validation" => 0,
                "valHash" => "$validationHash",
            ));
            
            $lastId = $this->db->lastInsertId();
            
            $sql = "INSERT INTO bc_profiles (users_user_id) VALUES(:user_id) ";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(
                ":user_id" => "{$lastId}"
            ));
            
            $this->db->commit();
                
        } catch (Exception $ex) {
            $this->db->rollBack();
            echo 'Failed: ' . debug($e);
        }
        
        $result = $sth->rowCount();
        if ($result > 0) {
            //Validierungs Mail schicken
            //sendValidationMail($mail, $validationHash);
            return true;
        } else {
            return false;
        }
    }

    // Check login
    public function loginUser($username, $password) {

        // Prepare SQL statement
        $sth = $this->db->prepare("SELECT * FROM bc_users WHERE user_username = :username ");

        // Execute Statement
        $sth->execute(array(
            ':username' => "$username"
        ));
        // Count rows of SQL result (0: wrong login)
        $count = $sth->rowCount();

        try{
            if ($count > 0) {

                // Get User from database
                $data = $sth->fetch(PDO::FETCH_ASSOC);
                //rebuild the saved password for the user
                $hashedPassword = hash('sha512', $password . $data['user_salt']);
                //check if the passwords are equal
                if($hashedPassword === $data['user_hash']){
                    
                    //insert into data
                    
                    
                    //Set User session data
                    Session::set('status', "loggedIn");
                    Session::set('id_user', $data['user_id']);
                    Session::set('user_username', $data['user_username']);
                    // Go to schedule creation
                    header('location: ' . URL . 'timeline');
                    return true;
                }else{
                    ErrorHandling::setError("login", "Passwörter stimmen nicht überein");
                    header('location: ' . URL . 'index');
                    return false;
                }
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }

}
