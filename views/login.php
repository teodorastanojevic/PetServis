<?php
session_start();
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $lozinka = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM ts_korisnici WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $rez = $stmt->get_result();

    if ($rez->num_rows === 1) {
        $korisnik = $rez->fetch_assoc();

        if (password_verify($lozinka, $korisnik['password'])) {
            $_SESSION['user'] = [
                'id' => $korisnik['id'],
                'username' => $korisnik['username'],
                'role' => $korisnik['role'] ?? 'user'
            ];

            header("Location: index.php?page=moje-prijave");
            exit;
        } else {
            $greska = "Pogrešna lozinka.";
        }
    } else {
        $greska = "Korisnik nije pronađen.";
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .btn-purple {
            background-color: #6a1b9a;
            color: #fff;
            border: none;
        }
        .btn-purple:hover {
            background-color: #4a148c;
            color: #fff;
        }
    </style>
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Prijava korisnika</h3>

        <?php if (isset($greska)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($greska) ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Korisničko ime</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Lozinka</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-purple w-100">Prijavi se</button>
        </form>

        <div class="mt-3 text-center">
            <small>Nemate nalog? <a href="index.php?page=register">Registrujte se</a></small>
        </div>
    </div>
</div>

</body>
</html>
