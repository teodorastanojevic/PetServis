<?php require_once 'views/layout.php'; ?>

<a href="index.php" class="btn btn-secondary mb-3">← Povratak na početnu</a>
<h2>Sve prijave ljubimaca</h2>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Vrsta</th>
            <th>Boja</th>
            <th>Lokacija</th>
            <th>Opis</th>
            <th>Kontakt</th>
            <th>Status</th>
            <th>Slika</th>
            <th>Datum prijave</th>
            <th>Akcija</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prijave as $prijava): ?>
            <tr>
                <td><?= $prijava['id'] ?></td>
                <td><?= htmlspecialchars($prijava['name']) ?></td>
                <td><?= htmlspecialchars($prijava['species']) ?></td>
                <td><?= htmlspecialchars($prijava['color']) ?></td>
                <td><?= htmlspecialchars($prijava['location']) ?></td>
                <td><?= nl2br(htmlspecialchars($prijava['description'])) ?></td>
                <td><?= htmlspecialchars($prijava['contact']) ?></td>
                <td><?= htmlspecialchars($prijava['status']) ?></td>
                <td>
                    <?php if (!empty($prijava['photo'])): ?>
                        <a href="uploads/<?= htmlspecialchars($prijava['photo']) ?>" target="_blank">Pogledaj</a>
                    <?php else: ?>
                        Nema slike
                    <?php endif; ?>
                </td>
                <td><?= $prijava['created_at'] ?></td>
                <td>
                    <a href="index.php?page=izmeni-status&id=<?= $prijava['id'] ?>" class="btn btn-sm btn-outline-primary">Izmeni</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
