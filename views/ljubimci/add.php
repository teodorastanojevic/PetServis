<?php require_once 'views/layout.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <a href="index.php" class="btn btn-secondary mb-3">
                &larr; Povratak na početnu
            </a>

            <h2 class="mb-4 text-center">Prijavi izgubljenog ljubimca</h2>

            <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0 bg-white">

                <div class="mb-3">
                    <label for="name" class="form-label">Ime ljubimca (ako je poznato):</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="species" class="form-label">Vrsta:</label>
                    <input type="text" name="species" id="species" class="form-control" placeholder="npr. Pas, Mačka" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Boja:</label>
                    <input type="text" name="color" id="color" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Lokacija gde je izgubljen/viđen:</label>
                    <input type="text" name="location" id="location" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Opis:</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Kontakt (telefon ili email):</label>
                    <input type="text" name="contact" id="contact" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Slika (opcionalno):</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-success w-100">Pošalji prijavu</button>
            </form>

        </div>
    </div>
</div>
