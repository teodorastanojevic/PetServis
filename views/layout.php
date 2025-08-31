<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>PetServis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Poppins', sans-serif; 
        }

        /* Ljubičasti navbar */
        .custom-navbar {
            background: #ede7f6; /* svetla ljubičasta */
            border-bottom: 1px solid #d1c4e9;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .custom-navbar .nav-link {
            color: #333 !important;
            margin-left: 15px;
            transition: 0.2s;
        }
        .custom-navbar .nav-link:hover {
            color: #7e57c2 !important; /* hover ljubičasta */
        }
        .custom-navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #512da8 !important; /* logo tamno ljubičast */
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-4 py-2 custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PetServis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">

                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=prijava-ljubimca">Prijavi ljubimca</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=moje-prijave">Moji ljubimci</a></li>
                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?page=admin-ljubimci">Admin panel</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?page=statistika">Statistika</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link fw-semibold text-danger" href="index.php?page=logout">Odjavi se</a></li>
                    <li class="nav-item ms-3"><span class="nav-link disabled text-muted">Dobrodošao/la, <?= htmlspecialchars($_SESSION['user']['username']) ?></span></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=login">Prijava</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=register">Registracija</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<!-- Glavni sadržaj -->
<main class="container mt-4">
    <!-- Ovde će ići sadržaj svake stranice -->
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
