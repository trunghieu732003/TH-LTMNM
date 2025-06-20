<?php
class AccountModel {
    private $conn;
    private $table_name = "account";
    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAccountByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function save($data, $role = 'user') {
        if ($this->getAccountByUsername($data['username'])) {
            return false;
        }
        $query = "INSERT INTO " . $this->table_name . " 
            (username, fullname, password, role, email, phone, avatar) 
            VALUES (:username, :fullname, :password, :role, :email, :phone, :avatar)";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($data['username']));
        $fullName = htmlspecialchars(strip_tags($data['fullname']));
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $role = htmlspecialchars(strip_tags($role));
        $email = htmlspecialchars(strip_tags($data['email'] ?? ''));
        $phone = htmlspecialchars(strip_tags($data['phone'] ?? ''));
        $avatar = htmlspecialchars(strip_tags($data['avatar'] ?? ''));

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":fullname", $fullName);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":avatar", $avatar);

        return $stmt->execute();
    }
    
}
?>