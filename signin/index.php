<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'biblio');

   $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
   session_start();
   $error = '';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Sécurisation des entrées
       $myusername = mysqli_real_escape_string($db, $_POST['username']);
       $mypassword = mysqli_real_escape_string($db, $_POST['password']);

       // Vérification dans la table "admin"
       $sql_admin = "SELECT * FROM admin WHERE username = '$myusername' AND mot_de_passe = '$mypassword'";
       $result_admin = mysqli_query($db, $sql_admin);
       $row_admin = mysqli_fetch_assoc($result_admin);

       if ($row_admin) {
           $_SESSION['login_user'] = $myusername;
           $_SESSION['role'] = 'admin'; // Définition du rôle
           header("Location: http://localhost/admin12/admin12/test3/ind.php");
           exit();
       }

       // Vérification dans la table "utilisateur"
       $sql_user = "SELECT * FROM utilisateur WHERE username = '$myusername' AND mot_de_passe = '$mypassword'";
       $result_user = mysqli_query($db, $sql_user);
       $row_user = mysqli_fetch_assoc($result_user);

       if ($row_user) {
           $_SESSION['login_user'] = $myusername;
           $_SESSION['role'] = 'user'; // Définition du rôle
           header("Location: http://localhost/admin12/assets/index.php");
           exit();
       }

       // Si aucun compte trouvé
       $error = "Nom d'utilisateur ou mot de passe invalide";
   }
   // 🔹 Traitement du Sign-up (Inscription)
if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']); // Récupération du genre
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash du mot de passe

    // Vérifier si l'utilisateur existe déjà
    $check_sql = "SELECT * FROM utilisateur WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($db, $check_sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $error = "L'utilisateur existe déjà.";
    } else {
        // Insérer le nouvel utilisateur avec le genre
        $insert_sql = "INSERT INTO utilisateur (username, email, mot_de_passe, genre) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $insert_sql);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $genre);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['login_user'] = $username;
            $_SESSION['role'] = 'user'; 
            header("Location: http://localhost/admin12/assets/index.php"); // Redirection après inscription
            exit();
        } else {
            $error = "Erreur lors de l'inscription.";
        }
    }
}

   
   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wlc to Inkora</title>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="../signin/style.css">


</head>

<body>

    <div class="form-container">
        


        <div class="col col-1">
            <div class="image-layer">
                <img src="../signin/img/lines.png" class="form-image-main ">
                <img src="../signin/img/waves.png" class="form-image waves">
                <img src="../signin/img/circles.png" class="form-image circles">
                <img src="../signin/img/feather.png" class="form-image feather">
                <img src="../signin/img/stars.png" class="form-image stars">
                <img src="../signin/img/writing.png" class="form-image writing">
            </div>
            <p class="featured-words">Be Your Favorite Author From Now With <span>Inkora</span></p>
        </div>


        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-1" id="login">Sign In</button>
                <button class="btn btn-2" id="register">Sign Up</button>
            </div>

            <!-- ---------------- Login Form Container ---------------- -->

            <div class="login-form">
    <div class="form-title">
        <span>Sign In</span>
    </div>
    <div class="form-inputs">
        <form action="" method="post">
            <div class="input-box">
                <input placeholder="Username" class="input-field" type="text" name="username" />
                <i class="bx bx-user icon"></i>
            </div>
            <div class="input-box">
                <input placeholder="Password" class="input-field" type="password" name="password" />
                <i class="bx bx-lock-alt icon"></i>
            </div>
            <div class="input-box">
                <input class="input-submit" type="submit" value="Submit">
            </div>
        </form>
        <div style="font-size:11px; color:#cc0000; margin-top:10px">
            <?php echo isset($error) ? $error : ''; ?>
        </div>
    </div>
    <div class="social-login">
        <i class="bx bxl-google"></i>
        <i class="bx bxl-facebook"></i>
    </div>
</div>


            <!-- ---------------- Register Form Container ---------------- -->

            <div class="register-form">
    <div class="form-title">
        <span>Create Account</span>
    </div>

    <div class="form-inputs">
        <form action="" method="post">
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <i class="bx bx-envelope icon"></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" required>
                <i class="bx bx-user icon"></i>
            </div>
            
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <i class="bx bx-lock-alt icon"></i>
            </div>
            
            <!-- Add gender selection -->
            <div class="input-box">
                <select name="genre" class="input-field" id="gender" required>
                    <option  value="" disabled selected>Select Gender</option>
                    <option class="option" id="male" value="male">Male</option>
                    <option class="option" id="female" value="female">Female</option>
                    <option class="option" id="pnts" value="prefer not to say">Prefer not to say</option>
                </select>
                <i class="bx bx-user-circle icon"></i>
            </div>

            <div class="input-box">
                <button type="submit" name="signup" class="input-submit" id="next-register">
                    <span>done</span>
                    <i class="bx bx-right-arrow-alt"></i>
                </button>
            </div>
            
            <?php if(isset($error) && !empty($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</div>
            </div>


          




        </div>



    </div>

    <script src="../signin/main.js"></script>

</body>

</html>