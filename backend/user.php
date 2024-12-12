<?php

class User{
    private $firstname;
    private $lastname;
    private $birthDate;
    private $email;
    private $password;
    private $id;
    private $gender;

    public Function  __construct ($firstname,$lastname,$email,$birthdate,$password,$id,$gender){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->birthDate = $birthdate;
        $this->password = $password;
        $this->id = $id;
        $this->gender = $gender;        
    }

    public Function getFirstName():string{
        return $this->firstname;
    }
    public Function getLastName():string{
        return $this->lastname;
    }
    public Function getEmail():string{
        return $this->email;
    }
    public Function getBirthDate():string{
        return $this->birthDate;
    }
    public Function getId():string{
        return $this->id;
    }
    public Function getgender():string{
        return $this->gender;
    }



    public function setFirstName($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastName($lastname) {
        $this->lastname = $lastname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setBirthDate($birthdate) {
        $this->birthDate = $birthdate;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function saveUser(): bool {
        include("../backend/databaseConnection.php");
        $query = $db->prepare("UPDATE user SET firstname=?, lastname=?, birthdate=?, gender=? WHERE email=?");
        $query->execute([$this->firstname, $this->lastname, date('Y-m-d', strtotime($this->email)), $this->gender, $this->email]);
        return $query->rowCount()==1 ;
    }
    

    public function getUserById($id): bool {
        include_once("../backend/databaseConnection.php");
    
        $query = $db->prepare("SELECT * FROM user WHERE id_user = ?");
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($query->rowCount()==1) {
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->email = $user['email'];
            $this->birthDate = $user['birthdate'];
            $this->password = $user['password'];
            $this->id = $user['id_user'];
            $this->gender = $user['gender'];
            return true; // Return true indicating success
        } else {
            return false; // Return false indicating user not found
        }
    }

    public function getUserByEmail(string $email): bool {
        include_once("../backend/databaseConnection.php");
    
        // Prepare and execute the SELECT query
        $query = $db->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");
        $query->execute([$email]);
    
        // Fetch user data from the database
        $user = $query->fetch(PDO::FETCH_ASSOC);
    
        // If user data is found, populate the object properties
        if ($user) {
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->email = $user['email'];
            $this->birthDate = $user['birthdate'];
            $this->password = $user['password'];
            $this->id = $user['id_user'];
            $this->gender = $user['gender'];
            return true; // Return true indicating success
        } else {
            return false; // Return false indicating user not found
        }
    }
    
    
}

?>