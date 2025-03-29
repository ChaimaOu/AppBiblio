<<?php
session_start();
$db = new mysqli("localhost", "root", "", "biblio");

if ($db->connect_error) {
    die("Échec de la connexion : " . $db->connect_error);
}

// Récupérer les admins
$sql = "SELECT id_admin, nom, prenom, username, email, position FROM Admin";
$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--css file-->
    <link rel="stylesheet" href="../test3/ind.css" />

</head>

<body>


    <!---------------------------------SIDEBAR---------------------------------->


    <section class="sidebar">
        <a href="#" class="logo">
            <i class="fas fa-pen-nib"></i>
            <span class="text">InQora</span>
        </a>

        <ul class="side-menu top">
            <li>
                <a href="../test3/ind.php" class="nav-link">
                    <i class="fas fa-border-all"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-p"></i>
                    <span class="text">Premium</span>
                </a>
            </li>
            <li>
                <a href="../Pages3/inbox.php" class="nav-link">
                    <i class="fas fa-inbox"></i>
                    <span class="text">Inbox</span>
                </a>
            </li>
            <li>
                <a href="../Pages3/Task.php" class="nav-link">
                    <i class="fas fa-calendar"></i>
                    <span class="text">Task Lists</span>
                </a>
            </li>
            <li>
                <a href="../Pages3/books3.php" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span class="text">Books</span>
                </a>
            </li>
            <li>
                <a href="../Pages3/users3.php" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li class="active">
                <a href="../Pages3/team.php" class="nav-link">
                    <i class="fas fa-people-group"></i>
                    <span class="text">Team</span>
                </a>
            </li>
        </ul>

        <ul class="side-menu">
        <li>
    <a href="settings.php">
        <i class="fas fa-cog"></i>
        <span class="text">Settings</span>
    </a>
</li>

            <li>
    <a href="logout.php" class="logout">
        <i class="fas fa-right-from-bracket"></i>
        <span class="text">Logout</span>
    </a>
</li>

        </ul>
    </section>




    <section class="content">

        <!---------------------------------NAVBAR---------------------------------->

        <nav>
            <i class="fas fa-bars menu-btn"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="search..." />
                    <button class="search-btn">
                        <i class="fas fa-search search-icon"></i>
                    </button>
                </div>
            </form>

            <input type="checkbox" hidden id="switch-mode" />
            <label for="switch-mode" class="switch-mode"></label>

            <a href="#" class="notification">
                <i class="fas fa-bell"></i>
                <span class="num">28</span>
            </a>

            <a href="#" class="profile">
                <img src="profile.png" alt="" />
            </a>
        </nav>


        <!---------------------------------MAIN---------------------------------->

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>My Team</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <i class="fas fa-chevron-right"></i>
                        <li>
                            <a href="#" class="active">Home</a>
                        </li>
                    </ul>
                </div>

                <a href="../Pages3/format.php" class="download-btn">
                    <i class="fas fa-add"></i>
                    <span class="text">Add Member</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                <section class="team-section">
    <div class="team-container">
        <?php
        // Requête pour récupérer tous les admins
        $sql = "SELECT id_admin, nom, prenom, email, position, photo FROM Admin";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="team-card">
                        <img src="' . $row['photo'] . '" alt="Team Member" class="profile-pic">
                        <h3>' . htmlspecialchars($row['nom']) . ' ' . htmlspecialchars($row['prenom']) . '</h3>
                        <p>' . htmlspecialchars($row['position']) . '</p>
                        <p>' . htmlspecialchars($row['email']) . '</p>
                        <div class="card-buttons">
                            <a href="edit_admin.php?id=' . $row['id_admin'] . '" class="edit-btn">Edit</a>
                            <a href="delete_admin.php?id=' . $row['id_admin'] . '" class="remove-btn" onclick="return confirm(\'Voulez-vous vraiment supprimer cet administrateur ?\');">Remove</a>
                        </div>
                    </div>';
            }
        } else {
            echo "<p>Aucun administrateur trouvé.</p>";
        }
        ?>
    </div>
</section>



                </div>


            </div>
            </div>
            </div>
        </main>
    </section>


    <script src="../test3/ind.js"></script>
</body>

</html>