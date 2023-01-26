<?php

// Maakt een console.log() functie.
require('lib/console_log.php');

require('config/config.php');

// Zet alle (oranje) error's uit.
error_reporting(0);


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

$idd = $_GET['id'];

$sql = "DELETE FROM persoon
        WHERE ID = $idd";

$statement = $pdo->prepare($sql);

// We vuren de query af op de MySQL-Database
$statement->execute();

if ($statement) {
    echo "Het verwijderen van de persoon met ID: $idd is gelukt!";
    header('Refresh:3; url=read.php');
} else {
    echo "<h1>Interne server-error</h1>
        <p>Het verwijderen van de persoon met ID: $idd is mislukt.</p>";
}
