<?php
class User {
    public $id;
    public $username;
    public $password;
    public $role;

    
    public static function findByUsername($username) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM ts_korisnici WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($username, $password, $role = 'user') {
        global $conn;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO ts_korisnici (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hash, $role);
        return $stmt->execute();
    }
}
