<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html"); // Rediriger si l'utilisateur n'est pas connecté
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>