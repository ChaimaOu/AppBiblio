<?php
session_start();
$db = new mysqli("localhost", "root", "", "biblio");

if ($db->connect_error) {
    die("Échec de la connexion : " . $db->connect_error);
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_admin'])) {
    header("Location: http://localhost/admin12/signin/index.php ");
    exit();
}

// Récupérer les informations de l'utilisateur
$id_admin = $_SESSION['id_admin'];
$sql = "SELECT email FROM Admin WHERE id_admin = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $id_admin);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Mettre à jour les informations
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update_email'])) {
        $new_email = $_POST['email'];
        $sql = "UPDATE Admin SET email = ? WHERE id_admin = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("si", $new_email, $id_admin);
        if ($stmt->execute()) {
            $message = "Email mis à jour avec succès.";
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
    } elseif (isset($_POST['update_password'])) {
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE Admin SET password = ? WHERE id_admin = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("si", $new_password, $id_admin);
        if ($stmt->execute()) {
            $message = "Mot de passe mis à jour avec succès.";
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Paramètres du compte</h2>
    <?php if ($message): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST">
        <h3>Modifier Email</h3>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <button type="submit" name="update_email">Mettre à jour</button>
    </form>

    <form method="POST">
        <h3>Modifier Mot de Passe</h3>
        <input type="password" name="password" required>
        <button type="submit" name="update_password">Mettre à jour</button>
    </form>

    <a href="dashboard.php">Retour au tableau de bord</a>
</body>
</html>
