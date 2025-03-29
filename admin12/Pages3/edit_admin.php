<?php
session_start();
$db = new mysqli("localhost", "root", "", "biblio");

if ($db->connect_error) {
    die("Échec de la connexion : " . $db->connect_error);
}

// Vérifier si un ID est passé dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID invalide.");
}

$id = intval($_GET['id']);

// Récupérer les infos actuelles de l'admin
$sql = "SELECT * FROM Admin WHERE id_admin = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

if (!$admin) {
    die("Admin non trouvé.");
}

// Traitement du formulaire de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysqli_real_escape_string($db, $_POST['nom']);
    $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    
    // Vérifier si un fichier a été uploadé
    if (!empty($_FILES['photo']['name'])) {
        $photo = "uploads/" . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    } else {
        $photo = $admin['photo']; // Garde l'ancienne photo si aucune nouvelle n'est envoyée
    }

    // Mettre à jour les informations de l'admin
    $sql = "UPDATE Admin SET nom = ?, prenom = ?, email = ?, position = ?, photo = ? WHERE id_admin = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssssi", $nom, $prenom, $email, $position, $photo, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Modification réussie !'); window.location.href = 'team.php';</script>";
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Admin</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ajoute ton fichier CSS ici -->
</head>
<body>
    <h2>Modifier Admin</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($admin['nom']) ?>" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($admin['prenom']) ?>" required>

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($admin['email']) ?>" required>

        <label>Position :</label>
        <input type="text" name="position" value="<?= htmlspecialchars($admin['position']) ?>" required>

        <label>Photo de profil :</label>
        <input type="file" name="photo">

        <img src="<?= $admin['photo'] ?>" width="100" alt="Photo actuelle">

        <button type="submit">Enregistrer</button>
        <a href="team.php">Annuler</a>
    </form>
</body>
</html>
