<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registreren - Vakantiepark Verwoerd</title>
  <link rel="icon" type="image/png" href="Vlogo.png">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <div class="navbar-img navbar-container navbar-top navbar">
    <div class="nav-item"><a href="index.php">
        <p class="navbar-text">Reserveren</p>
      </a></div>
    <div class="nav-item"><a href="login.php">
        <p class="navbar-text">Inloggen</p>
      </a></div>
    <div class="nav-item"><a href="register.php">
        <p class="navbar-text">Registreren</p>
      </a></div>
  </div>

  <!-- ----------------------------------------------------------------------------------------------------------- -->

  <form action="response.php" method="post">
    Voornaam* <br><input type="text" name="voornaam" value=""><br>
    Tussenvoegsel(s) <br><input type="text" name="tussenvoegsels" value=""><br>
    Achternaam* <br><input type="text" name="achternaam" value=""><br>
    Straat* <br><input type="text" name="straat" value=""><br>
    Huisnummer* <br><input type="text" name="huisnummer" value=""><br>
    Toevoeging <br><input type="text" name="toevoeging" value=""><br>
    Plaats* <br><input type="text" name="plaats" value=""><br>
    Email-adres* <br><input type="text" name="email" value=""><br>
    Telefoonnummer* <br><input type="text" name="telefoonnummer" value=""><br>
    Wachtwoord* <br><input type="password" name="wachtwoord" value=""><br>
    Herhaal wachtwoord* <br><input type="password" name="herhaalWachtwoord" value=""><br>
    <input type="submit" name="registreer" value="Registreer">
  </form>

  <a href="login.php">
    <p class="blacktext">Heb je al een account? Log hier in!</p>
  </a>

  <!-- ----------------------------------------------------------------------------------------------------------- -->

  <footer>
    <div class="nav-item"><a href="index.php">
        <p class="navbar-text">Reserveren</p>
      </a></div>
    <div class="nav-item">
      <p class="navbar-text">Locatie: Domberg</p>
    </div>
  </footer>
</body>