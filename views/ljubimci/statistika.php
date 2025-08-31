<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Statistika - Izgubljeni ljubimci</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            margin-top: 30px;
            font-size: 18px;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h2>Statistika izgubljenih ljubimaca</h2>

    <form>
        <button onclick="window.print()">Izvezi kao PDF</button>
    </form>

    <p><strong>Ukupan broj prijava:</strong> <?= $ukupno ?></p>

    <h3>Broj prijava po statusu:</h3>
    <ul>
        <?php while ($row = $poStatusima->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['status']) ?>: <?= $row['broj'] ?></li>
        <?php endwhile; ?>
    </ul>

</body>
</html>
