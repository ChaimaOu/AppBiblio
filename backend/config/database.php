<?php
$host = "localhost"; // Changez si nécessaire
$dbname = "biblio"; // Nom de votre base de données
$username = "root"; // Changez si nécessaire
$password = ""; // Changez si nécessaire

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>