<?php
// Database configuratie (vervang de gegevens indien nodig)
$servername = "agatat-schooldatabse.db.transip.me";
$username = "agatat_user";
$password = "d@t@b@se123";
$dbname = "agatat_schooldatabse";

// Verbinding maken met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleren op fouten bij het verbinden
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Haal informatie op uit de Bungalows-tabel inclusief type en voorzieningen
$result = $conn->query("
    SELECT Bungalows.idBungalow, Bungalows.naam, Bungalows.prijs, Bungalows.foto, Type.type, GROUP_CONCAT(Voorzieningen.voorzieningen) as voorzieningen
    FROM Bungalows
    INNER JOIN Type ON Bungalows.idType = Type.idType
    LEFT JOIN BungalowVoorzieningen ON Bungalows.idBungalow = BungalowVoorzieningen.idBungalow
    LEFT JOIN Voorzieningen ON BungalowVoorzieningen.idVoorzieningen = Voorzieningen.idVoorzieningen
    GROUP BY Bungalows.idBungalow
");

// Sluit de databaseverbinding
$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weergave Bungalow Informatie</title>
</head>
<body>

<h2>Weergave Bungalow Informatie</h2>

<?php if ($result->num_rows > 0): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Foto</th>
            <th>Type</th>
            <th>Voorzieningen</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['idBungalow']; ?></td>
                <td><?= $row['naam']; ?></td>
                <td><?= $row['prijs']; ?></td>
                <td><img src="data:image/jpeg;base64,<?= base64_encode($row['foto']); ?>" width="100"></td>
                <td><?= $row['type']; ?></td>
                <td><?= $row['voorzieningen']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>Geen bungalowinformatie gevonden.</p>
<?php endif; ?>

</body>
</html>