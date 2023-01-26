<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body * {
            box-sizing: border-box;
        }

        form {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        fieldset {
            display: flex;
            width: min-content;
            margin: .5em 0;
            /* flex-direction: row; */
            flex-wrap: wrap;
        }

        fieldset>label {
            width: 100%;
            margin-top: .5em;
        }

        label>input:not([type="radio"]):not([type="checkbox"]),
        label>textarea,
        label>select {
            display: block;
            /* width: 100%; */
            margin-top: .5em;
        }

        input[type="text"] {
            width: 200px;
        }
    </style>
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