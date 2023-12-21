<?php

    namespace App\Models;

    use App\DataBase\Connection;
    use App\Classes\Base;
    use PDO;

    class User extends Base
    {

        private $connexion;
        public function __construct($username, $email, $phone, $password)
        {
            $this->connexion = Connection::dbConnect();
            parent::__construct($username, $email, $phone, $password);
        }

        public function insertUser()
        {
            $stmt = $this->connexion->prepare("INSERT INTO users (username, email, phone, password) VALUES (:username, :email, :phone, :password)");
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":password", $this->password);
            $stmt->execute();

            $user_id = $this->connexion->lastInsertId();

            $stmt = $this->connexion->prepare("INSERT INTO users_roles (user_id, role_id) VALUES (:user_id, 1)");
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
        
            return $user_id;
        }

        public function getUerByEmail()
        {
            $stmt = $this->connexion->prepare("SELECT email FROM users WHERE email = :email");
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);;
            return $row;
        }
        public function selectUser()
        {
            $stmt = $this->connexion->prepare("SELECT username, email, password, role FROM users
                                               JOIN users_roles  ON users.id = users_roles.user_id 
                                               JOIN roles ON  users_roles.role_id = roles.id
                                               WHERE email = :email");
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        }

        public function deleteUser()
        {
            $stmt = $this->connexion->prepare("DELETE FROM users WHERE email = :email");
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();

            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                return true;
            } else {
                return false;
            }
        }
    }