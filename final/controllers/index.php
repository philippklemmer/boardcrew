<?php


class Index extends Controller{
    
    public $success = null;
    
    public function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/index.js');
    }
   
    public function index(){
        $this->view->render('index',1,1);
    }

    /**
     * RegisterController -> checking if format of the data past is valid
     * @return boolean if true go to timeline
     */
    public function registerUser(){
        
        $formSubmit = filter_input(INPUT_POST, 'registerSubmit', FILTER_SANITIZE_STRING);
        if (isset($formSubmit)) {
            //Eingaben in Variablen speichern
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $pwRepeat = filter_input(INPUT_POST, 'password-repeat', FILTER_SANITIZE_STRING);
            //Ein leeres Fehler-Array anlegen
            $errors = [];

            //Check on valid username
            if (empty($username)) {
                $errors['username'][] = 'Please type in an username';
            } else {
                $usernameExist = $this->model->dataExists("user_username",$username);
                if($usernameExist){
                    $errors['username'][] = 'The username you choose is allready given';
                }else{
                    //Check if username is valid
                    if( FormValidation::filterUsername($username) === false){
                        $errors['username'][] = 'Bitte geben Sie einen gültigen Username ein.';
                    }
                }
               
            }
            //Check on valid mail
            if (empty($mail)) {
                $errors['mail'][] = 'Please type in an email';
            } else {
                //checks if the type in mail is allready given
                $mailExists = $this->model->dataExists("user_mail",$mail);
                if ($mailExists) {
                    $errors['mail'][] = 'Your choosen Email is allready given';
                } else {
                    //checks if the mail format is correct
                    $validateMail = FormValidation::filterEmail($mail);
                    if ($validateMail === false) {
                        $errors['mail'][] = 'Bitte geben Sie eine gültige E-Mail Adresse ein';
                    }
                }
            }

            //check on valid password
            if (empty($password)) {
                $errors['password'][] = 'Please type in a Password';
            } else {
                //checks if the password format is correct
                $validatePassword = FormValidation::filterPasswort($password);
                if ($validatePassword === false) {
                    //checks if the password format is ok
                    $errors['password'][] = 'Your Password is to weak. Use one capital letters and it needs to be at least 6 letters long';
                }
                if ($validatePassword !== $pwRepeat) {
                    //checks if the passwords matches
                    $errors['password-repeat'][] = 'Die Passwörter müssen identisch sein.';
                }
            }
        }
        //Überprüfung des Fehler-Arrays: $error
        if (isset($errors) && empty($errors)) {
            //keine Fehler
            $saved = $this->model->registerUser($username, $mail, $password);
            
            if ($saved == true) {
                $success = 'Sie haben sich erfolgreich angemeldet';
                header('Location:' . URL . 'timeline');
                return true;
            } else {           
                $dbError = 'Der Benutzer konnte leider nicht angelegt werden';
                header('Location: ' . URL . 'index');
                return false;
            }
        } else {
            header('Location: ' . URL . 'index');
            return false;
        }
    }
    /**
     * Login in the user 
     * load model ->loginUser from index_model.php
     */
    public function loginUser(){
        
        
        $loginSubmit = filter_input(INPUT_POST, 'loginSubmit', FILTER_SANITIZE_STRING);
        if($loginSubmit){
            // filter the past data
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            
            $errors = [];
         
            //Checks if there was something typed in 
            if (empty($username)) {
                $errors['loginUser'][] = 'Bitte geben Sie ihren Benutzernamen ein';
                
            } else if ($this->model->dataExists("user_username",$username) === false) {
                $errors['loginUser'][] = 'Diesen Benutzer gibt es nicht';
            }
            
            //compare passwords and if it is correct
            if (FormValidation::filterPasswort($password) === false) {
                $errors['loginPassword'][] = 'Das Passwort ist ungültig';
            } else {
                
                $loginStatus = $this->model->loginUser($username, $password);
                if ($loginStatus === true) {
                    //if user data were valid go to timeline
                    header('Location:' . URL . 'timeline');
                } else {
                    //if userpassword is not equal to the one in the db 
                    if ($loginStatus == 'loginPassword') {
                        $errorMsg = 'Das angegebene Passwort ist falsch';
                    } else {
                        $errorMsg = 'Dieses Benutzerkonto ist noch nicht aktiviert';
                    }
                    //adding errormsg to array
                    $errors[$loginStatus][] = $errorMsg;
                }
            }
        }
        
        
        
        
        
        
    }
    
    /**
     * Loging out the User if logged in
     */
    public function logout(){
        // Logout user and go to home
        Session::destroy();
        header('Location: ' . URL . 'index' );
    }
    
}