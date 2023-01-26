<link rel="stylesheet" href="../style.css">

<?php

// Maakt een console.log() functie.
require('lib/console_log.php');

require('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if (!$pdo) {
        echo 'Interne Server Error, neem contact op met de Database Beheerder';
    }
} catch (PDOException $e) {
    // Laat de error in de console.log() zien.
    console_log($e->getMessage());
}

$sql = "SELECT   ID
                ,firstname
                ,infix
                ,lastname
                ,phonenumber
                ,streetname
                ,housenumber
                ,locality
                ,postalcode
                ,country
        FROM persoon
        ORDER BY ID";


// We bereiden de query voor met de method prepare()
$statement = $pdo->prepare($sql);

// We vuren de query af op de MySQL-Database
$statement->execute();

// We stoppen het resultaat van de query in de variabele $result
$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->ID</td>
                <td>$info->firstname</td>
                <td>$info->infix</td>
                <td>$info->lastname</td>
                <td>$info->phonenumber</td>
                <td>$info->streetname</td>
                <td>$info->housenumber</td>
                <td>$info->locality</td>
                <td>$info->postalcode</td>
                <td>$info->country</td>
                <td>
                    <a href='delete.php?id={$info->ID}'>
                        <img src='img/b_drop.png' alt='drop'>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$info->ID}'>
                        <img src='img/b_edit.png' alt='edit'>
                    </a>
                </td>
             </tr>";
}
?>
<table>
    <thead>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Telefoonnummer</th>
        <th>Straatnaam</th>
        <th>Huisnummer</th>
        <th>Woonplaats</th>
        <th>Postcode</th>
        <th>Land</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <tr>
            <?php echo $rows; ?>
        </tr>
    </tbody>
</table>
<br>
<a href="../index.php"><input type="button" id="normal" value="Nieuw Persoon"></a>
<a href="truncate.php"><input type="button" id="alert" value="Empty Table"></a>