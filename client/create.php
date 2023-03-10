<?php

// Maakt een console.log() functie.
require('lib/console_log.php');

require "config/config.php";
require "config/input.php";

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


$sql = "INSERT INTO persoon (ID
                            ,firstname
                            ,infix
                            ,lastname
                            ,phonenumber
                            ,streetname
                            ,housenumber
                            ,locality
                            ,postalcode
                            ,country)
        VALUES              (NULL
                            ,:fname
                            ,:infix
                            ,:lname
                            ,:phone
                            ,:street
                            ,:hNr
                            ,:lcl
                            ,:post
                            ,:land);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':fname', $fName, PDO::PARAM_STR);
$statement->bindValue(':infix', $infix, PDO::PARAM_STR);
$statement->bindValue(':lname', $lName, PDO::PARAM_STR);
$statement->bindValue(':phone', $pNr, PDO::PARAM_STR);
$statement->bindValue(':street', $street, PDO::PARAM_STR);
$statement->bindValue(':hNr', $houseNr, PDO::PARAM_STR);
$statement->bindValue(':lcl', $local, PDO::PARAM_STR);
$statement->bindValue(':post', $post, PDO::PARAM_STR);
$statement->bindValue(':land', $land, PDO::PARAM_STR);

$statement->execute();

echo 'Het invoeren is gelukt!';

header('Location: read.php');
