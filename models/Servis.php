<?php

class Servis {


    public static function kreirajPrijavu($korisnik_id, $ime, $vrsta, $boja, $lokacija, $opis, $kontakt, $slika = null) {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO ts_ljubimci 
                (name, species, color, location, description, contact, photo, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 'Izgubljen')
        ");
        $stmt->bind_param("sssssss", $ime, $vrsta, $boja, $lokacija, $opis, $kontakt, $slika);
        $stmt->execute();
    }


    public static function getFiltered($status = '') {
        global $conn;
        $sql = "SELECT * FROM ts_ljubimci WHERE 1=1";

        if (!empty($status)) {
            $sql .= " AND status = '" . $conn->real_escape_string($status) . "'";
        }

        $sql .= " ORDER BY created_at DESC";
        return $conn->query($sql);
    }


    public static function updateStatus($id, $status) {
        global $conn;
        $stmt = $conn->prepare("UPDATE ts_ljubimci SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }


    public static function getById($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM ts_ljubimci WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }


    public static function countAll() {
        global $conn;
        $result = $conn->query("SELECT COUNT(*) AS ukupno FROM ts_ljubimci");
        return $result->fetch_assoc()['ukupno'];
    }

    public static function countByStatus() {
        global $conn;
        return $conn->query("
            SELECT status, COUNT(*) AS broj 
            FROM ts_ljubimci 
            GROUP BY status
        ");
    }
}
