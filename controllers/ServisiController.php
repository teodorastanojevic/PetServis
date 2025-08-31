<?php
require_once 'models/Servis.php';

class ServisiController {

    public function prijavaLjubimca() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ime      = $_POST['name'] ?? null;
            $vrsta    = $_POST['species'];
            $boja     = $_POST['color'];
            $lokacija = $_POST['location'];
            $opis     = $_POST['description'];
            $kontakt  = $_POST['contact'];
            $slika    = null;

            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['photo']['tmp_name'];
                $original_name = basename($_FILES['photo']['name']);
                $ext = pathinfo($original_name, PATHINFO_EXTENSION);
                $slika = uniqid('pet_', true) . '.' . $ext;
                move_uploaded_file($tmp_name, 'uploads/' . $slika);
            }

            Servis::kreirajPrijavu(null, $ime, $vrsta, $boja, $lokacija, $opis, $kontakt, $slika);

            header("Location: index.php?page=moje-prijave");
            exit();
        } else {
            include 'views/ljubimci/add.php';
        }
    }

    public function userList() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit();
        }

        global $conn;
        $rezultat = $conn->query("SELECT * FROM ts_ljubimci ORDER BY created_at DESC");
        $prijave = $rezultat->fetch_all(MYSQLI_ASSOC);

        include 'views/ljubimci/moji-ljubimci.php';
    }

    public function adminList() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit();
        }

        global $conn;
        $rezultat = $conn->query("SELECT * FROM ts_ljubimci ORDER BY created_at DESC");
        $prijave = $rezultat->fetch_all(MYSQLI_ASSOC);

        include 'views/ljubimci/list.php';
    }

    public function azurirajStatus() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $status = $_POST['status'];

            Servis::updateStatus($id, $status);

            header("Location: index.php?page=admin-ljubimci");
            exit();
        } else {
            if (!isset($_GET['id'])) {
                echo "Greška: nedostaje ID ljubimca.";
                return;
            }

            $id = intval($_GET['id']);
            $detalji = Servis::getById($id);

            include 'views/ljubimci/edit.php';
        }
    }

    public function statistika() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit();
        }

        // Dodato
        $ukupno = Servis::countAll();
        $poStatusima = Servis::countByStatus();

        include 'views/ljubimci/statistika.php';
    }
}
