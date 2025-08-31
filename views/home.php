<?php require_once 'views/layout.php'; ?>

<div class="container text-center mt-5">

    <h1 class="fw-bold display-4" style="color:#512da8;">PetServis</h1>
    <p class="lead mb-5">Prijavite izgubljenog ljubimca i pomozite zajednici da ga pronađe.</p>

    <?php if (isset($_SESSION['user'])): ?>
        <div class="row g-4 justify-content-center">

            <div class="col-md-3">
                <a href="index.php?page=prijava-ljubimca" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card bg-light-green">
                        <div class="card-body py-5">
                            <h3 class="card-title text-success">Nova prijava</h3>
                            <p class="text-muted">Prijavite izgubljenog ljubimca sa svim detaljima.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?page=moje-prijave" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card bg-light-blue">
                        <div class="card-body py-5">
                            <h3 class="card-title text-primary">Moji ljubimci</h3>
                            <p class="text-muted">Pregledajte sve ljubimce koje ste prijavili.</p>
                        </div>
                    </div>
                </a>
            </div>

            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <div class="col-md-3">
                <a href="index.php?page=admin-ljubimci" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card bg-light-orange">
                        <div class="card-body py-5">
                            <h3 class="card-title text-warning">Admin panel</h3>
                            <p class="text-muted">Upravljajte svim prijavama i pogledajte statistiku.</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <div class="col-md-3">
                <a href="index.php?page=logout" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm hover-card bg-light-red">
                        <div class="card-body py-5">
                            <h3 class="card-title text-danger">Odjava</h3>
                            <p class="text-muted">Bezbedno se odjavite.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    <?php else: ?>
        <div class="mt-5">
            <p class="fs-4">Da biste prijavili izgubljenog ljubimca, potrebno je da se prijavite ili registrujete.</p>
            <a href="index.php?page=login" class="btn btn-lg btn-purple me-3">Prijavi se</a>
            <a href="index.php?page=register" class="btn btn-lg btn-outline-secondary">Registruj se</a>
        </div>
    <?php endif; ?>
</div>

<style>
    .hover-card:hover {
        transform: scale(1.05);
        transition: 0.3s ease-in-out;
    }
    .bg-light-green { background: #eafaf1; }
    .bg-light-blue { background: #e9f2ff; }
    .bg-light-orange { background: #fff3e6; }
    .bg-light-red { background: #fdeaea; }
    body { font-family: 'Poppins', sans-serif; }

    
    .btn-purple {
        background-color: #9370DB; 
        color: #fff;
        border: none;
    }
    .btn-purple:hover {
        background-color: #7A5DC7; 
        color: #fff;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
