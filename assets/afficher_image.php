<?php
$conn = new PDO("mysql:host=localhost;dbname=ta_base", "username", "password");

if (isset($_GET['id'])) {
    $query = $conn->prepare("SELECT image_blob FROM livres WHERE id = ?");
    $query->execute([$_GET['id']]);
    $livre = $query->fetch(PDO::FETCH_ASSOC);

    header("Content-Type: image/jpeg"); // Adapté selon le type d’image stocké
    echo $livre['image_blob'];
}
?>
