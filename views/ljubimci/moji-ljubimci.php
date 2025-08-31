<?php require_once 'views/layout.php'; ?>

<a href="index.php" class="btn btn-secondary mb-3">
    &larr; Povratak na početnu
</a>

<h2>Moji ljubimci</h2>

<?php if (empty($prijave)): ?>
    <p>Još uvek niste prijavili nijednog ljubimca.</p>
<?php else: ?>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Ime</th>
                <th>Vrsta</th>
                <th>Boja</th>
                <th>Lokacija</th>
                <th>Status</th>
                <th>Slika</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prijave as $pr): ?>
                <tr>
                    <td><?= htmlspecialchars($pr['name']) ?></td>
                    <td><?= htmlspecialchars($pr['species']) ?></td>
                    <td><?= htmlspecialchars($pr['color']) ?></td>
                    <td><?= htmlspecialchars($pr['location']) ?></td>
                    <td><?= htmlspecialchars($pr['status']) ?></td>
                    <td>
                        <?php if (!empty($pr['photo'])): ?>
                            <a href="uploads/<?= htmlspecialchars($pr['photo']) ?>" target="_blank">Pregled</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
