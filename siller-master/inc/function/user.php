<?php
class user {
    
    private $database;

    function __construct() {
        try {
            $this->database = new PDO('mysql:host=' . DB_HOST . ';port='. DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (PDOException $e) {
            die('Cannot connect to database server!');
        }
    }

    function AdminCheck() {
        $check = $this->database->prepare("SELECT `Role` FROM `users` WHERE `ID` = :id");
        $check->execute(array(':id' => $_SESSION['ID']));
        $result = $check->fetchColumn(0);
        if($result == 1) {
            return true;
        } else {
            return false;
        }
    }

    function LoginCheck() {
        if(isset($_SESSION['Team_Number'], $_SESSION['ID'])) {
            return true;
        } else {
            return false;
        }
    }
}
?>