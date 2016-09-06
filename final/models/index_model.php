<?php

class Index_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    //testing
    public function say() {
        echo "hello";
    }
    
    public function registerUser($username, $mail, $password) {
        var_dump($username, $mail, $password);
        //Salt
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

        //Query ausführen, Usereingaben bei der Registrierung werden in der Datenbank gespeichert
        $query = "INSERT INTO bc_users ";
        $query .= "(user_username, user_mail, user_hash, user_salt, user_validation, user_valHash, user_regDate) ";
        $query .= "VALUES ";
        $query .= "('$username', '$mail', '$hashedPw', '$randomSalt', 0, '$validationHash', NOW())";

        //Query ausführen
        mysqli_query($db, $query);
        //Affected Rows gibt die Anzahl der 
        $affectedRows = mysqli_affected_rows($db);

        if ($affectedRows > 0) {
            //Validierungs Mail schicken
            sendValidationMail($mail, $validationHash);
            return true;
        } else {

            return false;
        }
    }

    // Check login
    public function login() {

        // Prepare SQL statement
        $obj = $this->db->prepare("
            SELECT id FROM user WHERE login = :login AND password = MD5(:password)
        ");

        // Save login and password from POST array
        $login = $_POST['login'];
        $pass = $_POST['password'];

        // Execute Statement
        $obj->execute(array(
            ':login' => $login,
            ':password' => $pass,
        ));

        // Count rows of SQL result (0: wrong login)
        $count = $obj->rowCount();

        // Check user login
        if ($count > 0) {

            // Get User id from database
            $data = $obj->fetchAll();
            $id_user = $data[0]['id'];

            // Set User session data
            Session::set('id_user', $id_user);
            Session::set('login', $login);

            // Go to schedule creation
            header('location: ' . URL . 'schedule');
        } else {

            // Debug: show login error in DEBUG area
            Debug::setValue('Login error for user ' . $login);

            //TODO: error handling, error page
        }
    }

}
