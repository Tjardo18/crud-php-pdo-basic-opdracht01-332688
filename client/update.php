<?php

// Maakt een console.log() functie.
require('lib/console_log.php');

// Database inlog
require('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if (!$pdo) {
        echo 'Interne Server Error, neem contact op met de Database Beheerder';
    }
} catch (PDOException $e) {
    // Laat de error in de console.log() zien.
    console_log('Interne Server Error, neem contact op met de Database Beheerder');
    console_log($e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $sql = "UPDATE persoon SET firstname = :fn, infix = :infix, lastname = :ln WHERE ID = :id;";

        // sql statement preparing + execute
        $yee = $pdo->prepare($sql);
        $yee->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $yee->bindValue(':fn', $_POST['voornaam'], PDO::PARAM_STR);
        $yee->bindValue(':infix', $_POST['tussenvoegsel'], PDO::PARAM_STR);
        $yee->bindValue(':ln', $_POST['achternaam'], PDO::PARAM_STR);
        $yee->execute();

        echo "Het updaten is gelukt!";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        // error
        echo "Het updaten is mislukt!";
        console_log($e->getMessage());
        header('Refresh:3; url=read.php');
    }

    exit();
}

// Dit zorgt ervoor dat het formulier al is ingevuld met de persoon die bewerkt gaat worden.
$sql = "SELECT ID, firstname AS FN, infix, lastname AS LN
        FROM persoon
        WHERE ID = :id";

// SQL Statement preparing + Execute
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
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

        legend {
            font-family: 'Montserrat';
            color: white;
            font-weight: bold;
            background-color: #00aeef;
        }

        p,
        label {
            font-family: 'Barlow Condensed';
        }

        input[type="submit"] {
            background-color: #00aeef;
            border-color: #0283b3;
            color: #ffffff;
        }

        input[type="submit"]:hover {
            background-color: #0283b3;
            border-color: #00aeef;
            color: #ffffff;
        }

        input[type="reset"] {
            background-color: #00aeef;
            border-color: #0283b3;
            color: #ffffff;
        }

        input[type="reset"]:hover {
            background-color: #0283b3;
            border-color: #00aeef;
            color: #ffffff;
        }

        input[type="button"]:hover {
            cursor: pointer;
        }

        .buttonss {
            display: flex;
            justify-content: center;
        }
    </style>
    <title>Update</title>
</head>

<body>

    <main>
        <form action="update.php" method="post">
            <!-- Persoonlijke Informatie -->
            <fieldset>
                <legend>Persoonlijke Informatie</legend>
                <!-- Voornaam -->
                <label for="voornaam">
                    Voornaam:
                    <input type="text" name="voornaam" id="voornaam" value="<?= $result->FN ?>" required />
                </label>
                <!-- Tussenvoegsel -->
                <label for="tussenvoegsel">
                    Tussenvoegsel:
                    <input type="text" name="tussenvoegsel" id="tussenvoegsel" value="<?= $result->infix ?>" />
                </label>
                <!-- Achternaam -->
                <label for="achternaam">
                    Achternaam:
                    <input type="text" name="achternaam" id="achternaam" value="<?= $result->LN ?>" required />
                </label>
            </fieldset>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

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