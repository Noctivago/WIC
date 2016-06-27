<?php

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
        $codificada = hash('sha512', $password);
        $this->password = $codificada;
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
    }

    public function __destruct() {
        
    }

}
