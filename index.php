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
            width: 50%;
            margin: .5em 0;
            flex-direction: row;
        }

        fieldset>label {
            width: 100%;
            margin-top: .5em;
        }

        label>input:not([type="radio"]):not([type="checkbox"]),
        label>textarea,
        label>select {
            width: 100%;
            margin-top: .5em;
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
            </fieldset>

            <div class="buttonss">
                <!-- Verstuurt het formulier -->
                <input type="submit" value="Verstuur">
                <!-- Reset het hele formulier -->
                <input type="reset">
            </div>
        </form>

        <br><br>

        <form action="#" method="POST">
            <fieldset>
                <legend>Inloggen</legend>
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" required />
                </label>
                <label for="wachtwoord">
                    Wachtwoord:
                    <input type="password" name="wachtwoord" id="wachtwoord" required />
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