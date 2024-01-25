<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe Bungalow Toevoegen</title>
</head>
<body>

<h2>Nieuwe Bungalow Toevoegen</h2>

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

// Het toevoegen van een nieuwe bungalow
if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $typeID = $_POST['type'];
    $selectedVoorzieningen = isset($_POST['voorzieningen']) ? $_POST['voorzieningen'] : [];

    // Verwerking van geüploade foto
    $foto = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES['foto']['tmp_name'];
        $fotoName = $_FILES['foto']['name'];
        $fotoExtension = pathinfo($fotoName, PATHINFO_EXTENSION);
        $foto = file_get_contents($fotoTmpName);
    }

    // Voeg de nieuwe bungalow toe aan de Bungalows-tabel met prepared statement
    $stmt = $conn->prepare("INSERT INTO Bungalows (naam, prijs, foto, idType) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdsi", $naam, $prijs, $foto, $typeID);

    if ($stmt->execute()) {
        $bungalowID = $conn->insert_id; // Haal het ID op van de zojuist toegevoegde bungalow

        // Voeg geselecteerde voorzieningen toe aan de BungalowVoorzieningen-tabel met prepared statement
        $stmt = $conn->prepare("INSERT INTO BungalowVoorzieningen (idBungalow, idVoorzieningen) VALUES (?, ?)");
        $stmt->bind_param("ii", $bungalowID, $voorzieningID);

        foreach ($selectedVoorzieningen as $voorzieningID) {
            $stmt->execute();
        }

        echo "Bungalow toegevoegd!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Sluit het prepared statement
    $stmt->close();
}
?>

<form method="post" action="test.php" enctype="multipart/form-data">
    Naam: <input type="text" name="naam" required><br>
    Prijs: <input type="text" name="prijs" required><br>
    Foto: <input type="file" name="foto" accept="image/*" required><br>

    Type:
    <select name="type">
        <!-- Vul deze selectbox met de beschikbare types uit de Type-tabel -->
        <?php
        $result = $conn->query("SELECT * FROM Type");
        while ($row = $result->fetch_assoc()) {
            $selected = (isset($_POST['type']) && $_POST['type'] == $row['idType']) ? 'selected' : '';
            echo "<option value='" . $row['idType'] . "' $selected>" . $row['type'] . "</option>";
        }
        ?>
    </select><br>

    Voorzieningen:
    <?php
    $result = $conn->query("SELECT * FROM Voorzieningen");
    while ($row = $result->fetch_assoc()) {
        $checked = (isset($_POST['voorzieningen']) && in_array($row['idVoorzieningen'], $_POST['voorzieningen'])) ? 'checked' : '';
        echo "<input type='checkbox' name='voorzieningen[]' value='" . $row['idVoorzieningen'] . "' $checked>" . $row['voorzieningen'] . "<br>";
    }
    ?>

    <input type="submit" name="submit" value="Toevoegen">
</form>

<?php
// Sluit de databaseverbinding
$conn->close();
?>

</body>
</html>