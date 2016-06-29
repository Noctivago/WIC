<?php

include_once '../db/conn.inc.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Paulo . Cunha
 */
class User {

    private $username;
    private $password;
    private $email;
    private $accountEnabled;
    private $dateCreated;
    private $loginFailded;
    private $lastLogin;
    private $abussiveUser;
    private $goodUser;
    private $status;
    private $lastStatusOnline;

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getAccountEnabled() {
        return $this->accountEnabled;
    }

    function getDateCreated() {
        return $this->dateCreated;
    }

    function getLoginFailded() {
        return $this->loginFailded;
    }

    function getLastLogin() {
        return $this->lastLogin;
    }

    function getAbussiveUser() {
        return $this->abussiveUser;
    }

    function getGoodUser() {
        return $this->goodUser;
    }

    function getStatus() {
        return $this->status;
    }

    function getLastStatusOnline() {
        return $this->lastStatusOnline;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        #SHA512
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAccountEnabled($accountEnabled) {
        $this->accountEnabled = $accountEnabled;
    }

    function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    function setLoginFailded($loginFailded) {
        $this->loginFailded = $loginFailded;
    }

    function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    function setAbussiveUser($abussiveUser) {
        $this->abussiveUser = $abussiveUser;
    }

    function setGoodUser($goodUser) {
        $this->goodUser = $goodUser;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setLastStatusOnline($lastStatusOnline) {
        $this->lastStatusOnline = $lastStatusOnline;
    }

    function __construct() {
        $this->setAbussiveUser(0);
        $this->setAccountEnabled(1);
        $this->setGoodUser(0);
        #$this->setLastLogin($lastLogin);
        #$this->setLastStatusOnline($lastStatusOnline)
        $this->setStatus(0);
    }

    public function __clone() {
        
    }

    public function __destruct() {
        
    }

    function addUserIntoDB() {
        try {
            $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
            $stmt->bindParam(':u', $this->getUsername());
            $stmt->bindParam(':p', $this->getPassword());
            $stmt->bindParam(':m', $this->getEmail());
            $stmt->execute();
            return "USER " . $this->getUsername() . " ADDED! w/Password " . $this->getPassword();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getAllUsers() {
        $sql = "SELECT [Id]
      ,[Username]
      ,[Password]
      ,[Email]
      ,[Account_Enabled]
      ,[Date_Created]
      ,[Login_Failed]
      ,[Last_Login]
      ,[Abusive_User]
      ,[Good_User]
      ,[Status]
      ,[Last_Status_online]
	FROM [dbo].[User]";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $table = "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
        foreach ($result as $row) {
            $table . "<tr>";
            $table . "<td>" . $row['Id'] . "</td>";
            $table . "<td>" . $row['Username'] . "</td>";
            $table . "<td>" . $row['Password'] . "</td>";
            $table . "<tr>";
        }
        $table . "</table>";
        //return $table;
        return 'true';
    }

}
