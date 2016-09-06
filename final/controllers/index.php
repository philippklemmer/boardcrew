<?php

class Index extends Controller{

    public function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/index.js');
    }
   
    public function index(){
        $this->view->render('index/index');
    }

    public function sayHello(){
        $this->model->say();        
    }
    
    public function register(){
        
       $formSubmit = filter_input(INPUT_POST, 'registerSubmit', FILTER_SANITIZE_STRING);
        if ($formSubmit) {
            //Eingaben in Variablen speichern
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $pwRepeat = filter_input(INPUT_POST, 'password-repeat', FILTER_SANITIZE_STRING);
            //Ein leeres Fehler-Array anlegen
            $errors = [];

            //Überprüfung des Username
            if (empty($username)) {

                $errors['username'][] = 'Bitte geben Sie einen Username ein.';
            } else {
                //Es wurde ein Username eingeben
                //Überprüfe, ob der Benutzername schon vergeben ist:
               if(Validation::filterUsername($username) === false){
                    //Überprüfen, ob der eingegebene Name unserem gültigen Muster für Benutzernamen entspricht
                        $errors['username'][] = 'Bitte geben Sie einen gültigen Username ein.';
                }
            }
            //Überprüfung der Mail
            if (empty($mail)) {

                $errors['mail'][] = 'Bitte geben Sie eine E-Mail Adresse ein';
            } else {

                if (select($db, 'user_id', 'users', array('user_mail' => $mail))) {

                    $errors['mail'][] = 'Ein Benutzer mit dieser E-Mail Adresse ist bereits registriert';
                } else {
                    $validateMail = filterEmail($mail);

                    if ($validateMail === false) {

                        $errors['mail'][] = 'Bitte geben Sie eine gültige E-Mail Adresse ein';
                    }
                }
            }

            //Überprüfung des Passworts
            if (empty($password)) {

                $errors['password'][] = 'Bitte gib ein Passwort ein.';
            } else {

                $validatePassword = filterPasswort($password);
                if ($validatePassword === false) {

                    $errors['password'][] = 'Ihr Passwort muss mind. 6 Zeichen lang sein und mind. einen Groß- und Kleinbuchstaben, sowie eine Zahl enthalten.';
                }

                if ($validatePassword !== $pwRepeat) {

                    $errors['password-repeat'][] = 'Die Passwörter müssen identisch sein.';
                }
            }
        }
        //Überprüfung des Fehler-Arrays: $error
        if (isset($errors) && empty($errors)) {
            //keine Fehler
            //Die Eingaben des Users könnnen gespeichert werden.
            //Todo: In DB speichern(INSERT INTO)
            $saved = $this->model->register($username, $mail, $password);
            if ($saved) {

                $success = 'Sie haben sich erfolgreich angemeldet';
                return true;
            } else {

                $dbError = 'Der Benutzer konnte leider nicht angelegt werden';
                return false;
            }
        } else {

            return false;
        }
    }
    
    
}