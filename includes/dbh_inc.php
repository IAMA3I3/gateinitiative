<?php

$host = 'localhost';
$dbname = 'gateinitiative';
$dbusername = 'aziz';
$dbpassword = 'Abdulazeez1998';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}