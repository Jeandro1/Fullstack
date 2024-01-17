<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index - Vakantiepark Verwoerd</title>
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

    <div class="filter" id="filterelement">
        <div class="filter3" id="filter2">
            <p class="filter-kop">Aantal personen:</p>
            <div class="filter-text">
                <label class="container1">4 Personen
                    <input type="radio" name="personen" id="personen4">
                    <span class="checkmark"></span>
                </label>
                <label class="container1">6 Personen
                    <input type="radio" name="personen" id="personen6">
                    <span class="checkmark"></span>
                </label>
                <label class="container1">8 Personen
                    <input type="radio" name="personen" id="personen8">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>


        <div style="display: none" id="filter3">
            <p class="filter-kop">Aantal slaapkamers:</p>
            <div class="filter-text">
                <label class="container1">3 Slaapkamers
                    <input type="radio" name="slaapkamers" id="slaapkamers3">
                    <span class="checkmark"></span>
                </label>
                <label class="container1">4 Slaapkamers
                    <input type="radio" name="slaapkamers" id="slaapkamers4">
                    <span class="checkmark"></span>
                </label>
            </div>

        </div>
        <label class="container1" id="filterbutton1">
            <button class="filterButton" onclick="filter1()">Verder</button>
        </label>
        <label style="display: none" class="container1" id="filterbutton2">
            <button class="filterButton" onclick="filter2()">Filter</button>
        </label>

    </div>

    <div class="outlinepage">
        <div class="bungalows" id="main1"></div>
        <div class="bungalows" id="main2"></div>
    </div>



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

<script src="index.js"></script>