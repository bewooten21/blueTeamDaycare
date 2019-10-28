<?php
class user {
    private $ID, $fName, $lName, $email, $uName, $image, $pWord, $role;
    function __construct($ID, $fName, $lName, $email, $uName, $pWord, $image, role $role = null) {
        
        $this->ID = $ID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->uName = $uName;
        $this->pWord = $pWord;
        $this->image = $image;
        $this->role = $role ?: role(1,'user');
        
    }
    
    function getID() {
        return $this->ID;
    }

    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }

    function getEmail() {
        return $this->email;
    }

    function getUName() {
        return $this->uName;
    }
    
    function getPWord(){
        return $this->pWord;
    }
    
    function getImage() {
        return $this->image;
    }
    
    function getRole() {
        return $this->role;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUName($uName) {
        $this->uName = $uName;
    }
    
    function setPWord($pWord) {
        $this->pWord = $pWord;
    }
    
    function setImage($image) {
        $this->image = $image;
    }

    function setRole($role) {
        $this->role = $role;
    }

}
