<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Backend-Form</title>
</head>

<body>

    <main>
        <!-- Formulier dat naar insert.php leidt met een POST method -->
        <form action="client/create.php" method="POST">
            <!-- Persoonlijke Informatie -->
            <fieldset>
                <legend>Persoonlijke Informatie</legend>
                <!-- Voornaam -->
                <label for="voornaam">
                    Voornaam:
                    <input type="text" name="voornaam" id="voornaam" required />
                </label>
                <!-- Tussenvoegsel -->
                <label for="tussenvoegsel">
                    Tussenvoegsel:
                    <input type="text" name="tussenvoegsel" id="tussenvoegsel" />
                </label>
                <!-- Achternaam -->
                <label for="achternaam">
                    Achternaam:
                    <input type="text" name="achternaam" id="achternaam" required />
                </label>
                <!-- Telefoon nummer -->
                <label for="telefoonnummer">
                    Telefoon nummer:
                    <input type="text" name="telefoonnummer" id="telefoonnummer" placeholder="+31 6 12345678" required />
                </label>
                <!-- Straatnaam -->
                <label for="straatnaam">
                    Straatnaam:
                    <input type="text" name="straatnaam" id="straatnaam" required />
                </label>
                <!-- Huisnummer -->
                <label for="huisnummer">
                    Huisnummer:
                    <input type="text" name="huisnummer" id="huisnummer" required />
                </label>
                <!-- Woonplaats -->
                <label for="woonplaats">
                    Woonplaats:
                    <input type="text" name="woonplaats" id="woonplaats" required />
                </label>
                <!-- Postcode -->
                <label for="postcode">
                    Postcode:
                    <input type="text" name="postcode" id="postcode" required />
                </label>
                <!-- Land -->
                <label for="land">
                    Land:
                    <input type="text" name="land" id="land" required />
                </label>
            </fieldset>

            <div class="buttonss">
                <!-- Verstuurt het formulier -->
                <input type="submit" value="Verstuur">
                <!-- Reset het hele formulier -->
                <input type="reset">
            </div>
        </form>
    </main>
</body>

</html>