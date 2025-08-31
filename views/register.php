<?php
session_start();
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Provera da li već postoji korisnik sa tim username-om
    $stmt = $conn->prepare("SELECT * FROM ts_korisnici WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $rez = $stmt->get_result();

    if ($rez->num_rows > 0) {
        $greska = "Korisnik sa tim korisničkim imenom već postoji.";
    } else {
        $hashLozinka = password_hash($password, PASSWORD_DEFAULT);

        // Podrazumevano svaki novi korisnik ima rolu 'user'
        $stmt = $conn->prepare("INSERT INTO ts_korisnici (username, password, role) VALUES (?, ?, 'user')");
        $stmt->bind_param("ss", $username, $hashLozinka);
        $stmt->execute();

        $_SESSION['user'] = [
            'id' => $stmt->insert_id,
            'username' => $username,
            'role' => 'user'
        ];

        header("Location: index.php?page=moje-prijave");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .btn-purple {
            background-color: #6f42c1;
            color: #fff;
            border: none;
        }
        .btn-purple:hover {
            background-color: #5a32a3;
            color: #fff;
        }
    </style>
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
        <h3 class="text-center mb-4">Registracija korisnika</h3>

        <?php if (isset($greska)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($greska) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=register">
            <div class="mb-3">
                <label for="username" class="form-label">Korisničko ime</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Lozinka</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-purple w-100">Registruj se</button>
        </form>

        <div class="mt-3 text-center">
            <small>Već imate nalog? <a href="index.php?page=login">Prijavite se</a></small>
        </div>
    </div>
</div>

</body>
</html>
