<?php

/**
 * Description of User
 *
 * @author Paulo . Cunha
 */
require_once '../config/conn.inc.php';

class User {

    //put your code here
    private $username;
    private $password;
    private $email;
    private $account_enabled;
    private $date_created;
    private $login_failed;
    private $abusive_user;
    private $good_user;
    private $status;
    private $last_status_online;

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getAccount_enabled() {
        return $this->account_enabled;
    }

    function getDate_created() {
        return $this->date_created;
    }

    function getLogin_failed() {
        return $this->login_failed;
    }

    function getAbusive_user() {
        return $this->abusive_user;
    }

    function getGood_user() {
        return $this->good_user;
    }

    function getStatus() {
        return $this->status;
    }

    function getLast_status_online() {
        return $this->last_status_online;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        #$codificada = hash('sha512', $password);
        #$this->password = $codificada;
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAccount_enabled($account_enabled) {
        $this->account_enabled = $account_enabled;
    }

    function setDate_created($date_created) {
        $this->date_created = $date_created;
    }

    function setLogin_failed($login_failed) {
        $this->login_failed = $login_failed;
    }

    function setAbusive_user($abusive_user) {
        $this->abusive_user = $abusive_user;
    }

    function setGood_user($good_user) {
        $this->good_user = $good_user;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setLast_status_online($last_status_online) {
        $this->last_status_online = $last_status_online;
    }

    function __construct() {
        $this->account_enabled = false;
        $this->login_failed = false;
        $this->abusive_user = false;
        $this->setLast_status_online = false;
    }

    public function __destruct() {
        
    }

    public function __clone() {
        
    }

    //stripslashes

    public function createUser($User) {
        $Utilizador = new User();
        $Utilizador = $User;
        try {
            $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, 'm')");
            $stmt->bindParam(':u', $Utilizador->getUsername());
            $stmt->bindParam(':p', $utilizador->getPassword());
            #$stmt->bindParam(':p', $Utilizador->getPassword());
            #$stmt->bindParam(':m', $Utilizador->getEmail());
            $stmt->execute();
            //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
            echo "USER " . $Utilizador->getUsername() . " ADDED! w/Password " . $Utilizador->getPassword();
        } catch (Exception $ex) {
            //retorna 0 para no sucesso do ajax saber que foi um erro
            echo "ERROR!";
        }
    }

    public function readUser($User) {
        
    }

    public function readAllUsers() {
        
    }

    public function updateUser($User) {
        
    }

    public function deleteUser($User) {
        
    }

}
