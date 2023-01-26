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

$sql = "TRUNCATE persoon";

$statement = $pdo->prepare($sql);

// We vuren de query af op de MySQL-Database
$statement->execute();

header('Location: read.php');
