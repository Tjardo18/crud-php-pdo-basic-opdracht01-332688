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

        $sql = "UPDATE persoon SET 
                                firstname = :fn
                                ,infix = :infix
                                ,lastname = :ln
                                ,phonenumber = :pNr
                                ,streetname = :strn
                                ,housenumber = :hsnr
                                ,locality = :lcl
                                ,postalcode = :post
                                ,country = :land
                WHERE ID = :id;";

        // sql statement preparing + execute
        $yee = $pdo->prepare($sql);
        $yee->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $yee->bindValue(':fn', $_POST['voornaam'], PDO::PARAM_STR);
        $yee->bindValue(':infix', $_POST['tussenvoegsel'], PDO::PARAM_STR);
        $yee->bindValue(':ln', $_POST['achternaam'], PDO::PARAM_STR);
        $yee->bindValue(':pNr', $_POST['telefoonnummer'], PDO::PARAM_STR);
        $yee->bindValue(':strn', $_POST['straatnaam'], PDO::PARAM_STR);
        $yee->bindValue(':hsnr', $_POST['huisnummer'], PDO::PARAM_STR);
        $yee->bindValue(':lcl', $_POST['woonplaats'], PDO::PARAM_STR);
        $yee->bindValue(':post', $_POST['postcode'], PDO::PARAM_STR);
        $yee->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
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
$sql = "SELECT   ID
                ,firstname AS FN
                ,infix
                ,lastname AS LN
                ,phonenumber AS PNR
                ,streetname AS STRN
                ,housenumber AS HSNR
                ,locality AS LCL
                ,postalcode AS PLCE
                ,country AS CTRY
        FROM     persoon
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
    <link rel="stylesheet" href="../style.css">
    <title>Update</title>
</head>

<body>

    <main>
        <form action="update.php" method="post">
            <!-- Persoonlijke Informatie -->
            <fieldset>
                <legend>Persoonlijke Informatie Updaten</legend>
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
                <!-- Telefoonnummer -->
                <label for="telefoonnummer">
                    Telefoonnummer:
                    <input type="text" name="telefoonnummer" id="telefoonnummer" value="<?= $result->PNR ?>" required />
                </label>
                <!-- Straatnaam -->
                <label for="straatnaam">
                    Straatnaam:
                    <input type="text" name="straatnaam" id="straatnaam" value="<?= $result->STRN ?>" required />
                </label>
                <!-- Huisnummer -->
                <label for="huisnummer">
                    Huisnummer:
                    <input type="text" name="huisnummer" id="huisnummer" value="<?= $result->HSNR ?>" required />
                </label>
                <!-- Woonplaats -->
                <label for="woonplaats">
                    Woonplaats:
                    <input type="text" name="woonplaats" id="woonplaats" value="<?= $result->LCL ?>" required />
                </label>
                <!-- Postcode -->
                <label for="postcode">
                    Postcode:
                    <input type="text" name="postcode" id="postcode" value="<?= $result->PLCE ?>" required />
                </label>
                <!-- Land -->
                <label for="land">
                    Land:
                    <input type="text" name="land" id="land" value="<?= $result->CTRY ?>" required />
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