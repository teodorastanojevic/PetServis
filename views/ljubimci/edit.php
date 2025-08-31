<?php require_once 'views/layout.php'; ?>

<h2>Izmena statusa ljubimca</h2>

<form method="POST" action="index.php?page=izmeni-status">
    <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">

    <div class="mb-3">
        <label for="status" class="form-label">Novi status:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="Izgubljen" <?= ($detalji['status'] === 'Izgubljen') ? 'selected' : '' ?>>Izgubljen</option>
            <option value="Pronađen" <?= ($detalji['status'] === 'Pronađen') ? 'selected' : '' ?>>Pronađen</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Sačuvaj promene</button>
</form>
