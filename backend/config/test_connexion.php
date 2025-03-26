<?php
$serveur = "localhost"; // Adresse du serveur (souvent localhost en local)
$utilisateur = "root"; // Nom d'utilisateur MySQL (par défaut root sous XAMPP)
$mot_de_passe = ""; // Mot de passe MySQL (par défaut vide sous XAMPP)
$base_de_donnees = "biblio"; // Remplace par le nom de ta base de données

// Connexion à MySQL
$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
} else {
    echo "Connexion réussie à la base de données !";
}

$conn->close(); // Fermer la connexion
?>
