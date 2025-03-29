<?php
$db = new mysqli("localhost", "root", "", "biblio");

if ($db->connect_error) {
    die("Échec de la connexion : " . $db->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Supprimer l'admin
    $sql = "DELETE FROM Admin WHERE id_admin = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Administrateur supprimé avec succès !'); window.location.href = 'team.php';</script>";
    } else {
        echo "<script>alert('Erreur lors de la suppression.'); window.location.href = 'team.php';</script>";
    }
}
?>
