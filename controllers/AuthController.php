<?php
require_once 'config/db.php';

class AuthController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            global $conn;

            // Provera da li već postoji korisnik
            $check = $conn->prepare("SELECT * FROM ts_korisnici WHERE username = ?");
            $check->bind_param("s", $username);
            $check->execute();
            $result = $check->get_result();

            if ($result->num_rows > 0) {
                $error = "Korisnik sa tim korisničkim imenom već postoji.";
                include 'views/register.php';
                return;
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Podrazumevano unosimo kao 'user'
            $stmt = $conn->prepare("INSERT INTO ts_korisnici (username, password, role) VALUES (?, ?, 'user')");
            $stmt->bind_param("ss", $username, $hash);
            $stmt->execute();

            header("Location: index.php");
            exit();
        }

        include 'views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            global $conn;
            $stmt = $conn->prepare("SELECT * FROM ts_korisnici WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'] ?? 'user'
                    ];

                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Pogrešna lozinka.";
                }
            } else {
                $error = "Korisnik ne postoji.";
            }
        }

        include 'views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
