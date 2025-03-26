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
                 <form action = "" method = "post">
            <div class="input-box">
              <input  placeholder="Username"  class="input-field" type = "text" name = "username" class = "box"/><br /><br />
            </div>
            <div class="input-box">
               <input placeholder="Password" class="input-field" type = "password" name = "password" class = "box" /><br/><br />
            </div>
            <div class="input-box">
               <input class="input-submit" type = "submit" value = " Submit ">
            </div>
            
             </form>
             <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
             </div>
             <div class="social-login">
                    <i class="bx bxl-google"></i>
                    <i class="bx bxl-facebook"></i>
                </div>
             </div>
        </div>

             
            
         </div>
         
   </div>


            <!-- ---------------- Register Form Container ---------------- -->

            <div class="register-form">
                <div class="form-title">
                    <span>Create Account</span>
                </div>

                <div class="form-inputs">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Email" required>
                        <i class="bx bx-user icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Username" required>
                        <i class="bx bx-envelope icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Password" required>
                        <i class="bx bx-lock-alt icon"></i>
                    </div>

                    <div class="input-box">
                        <button class="input-submit" id="next-register">
                            <span>done</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </div>
               
            </div>
            
            </div>


            <!-- ---------------- Register Form Container 2 ---------------- -->

            <!-- <div class="next-register-form">
                <div class="form-title">
                    <span>Informations</span>
                </div>

                <div class="form-inputs">
                    <div class="input-box">
                        <select class="input-field" placeholder="Gender" id="gender" required>
                            <option class="option" id="male" value="Male">Male</option>
                            <option class="option" id="female" value="Female">Female</option>
                            <option class="option" id="pnts" value="PNTS">Prefer Not to Say</option>
                        </select>
                        <i class="bx bx-male-female icon"></i>
                    </div>

                    <div class="input-box">
                        <select class="input-field" placeholder="Country" id="country" required>
                            <option value="" class="option">country</option>
                            <option value="AF" class="option">Afghanistan</option>
                            <option value="AX" class="option">Åland Islands</option>
                            <option value="AL" class="option">Albania</option>
                            <option value="DZ" class="option">Algeria</option>
                            <option value="AS" class="option">American Samoa</option>
                            <option value="AD" class="option">Andorra</option>
                            <option value="AO" class="option">Angola</option>
                            <option value="AI" class="option">Anguilla</option>
                            <option value="AQ" class="option">Antarctica</option>
                            <option value="AG" class="option">Antigua and Barbuda</option>
                            <option value="AR" class="option">Argentina</option>
                            <option value="AM" class="option">Armenia</option>
                            <option value="AW" class="option">Aruba</option>
                            <option value="AU" class="option">Australia</option>
                            <option value="AT" class="option">Austria</option>
                            <option value="AZ" class="option">Azerbaijan</option>
                            <option value="BS" class="option">Bahamas</option>
                            <option value="BH" class="option">Bahrain</option>
                            <option value="BD" class="option">Bangladesh</option>
                            <option value="BB" class="option">Barbados</option>
                            <option value="BY" class="option">Belarus</option>
                            <option value="BE" class="option">Belgium</option>
                            <option value="BZ" class="option">Belize</option>
                            <option value="BJ" class="option">Benin</option>
                            <option value="BM" class="option">Bermuda</option>
                            <option value="BT" class="option">Bhutan</option>
                            <option value="BO" class="option">Bolivia (Plurinational State of)</option>
                            <option value="BA" class="option">Bosnia and Herzegovina</option>
                            <option value="BW" class="option">Botswana</option>
                            <option value="BV" class="option">Bouvet Island</option>
                            <option value="BR" class="option">Brazil</option>
                            <option value="IO" class="option">British Indian Ocean Territory</option>
                            <option value="BN" class="option">Brunei Darussalam</option>
                            <option value="BG" class="option">Bulgaria</option>
                            <option value="BF" class="option">Burkina Faso</option>
                            <option value="BI" class="option">Burundi</option>
                            <option value="CV" class="option">Cabo Verde</option>
                            <option value="KH" class="option">Cambodia</option>
                            <option value="CM" class="option">Cameroon</option>
                            <option value="CA" class="option">Canada</option>
                            <option value="BQ" class="option">Caribbean Netherlands</option>
                            <option value="KY" class="option">Cayman Islands</option>
                            <option value="CF" class="option">Central African Republic</option>
                            <option value="TD" class="option">Chad</option>
                            <option value="CL" class="option">Chile</option>
                            <option value="CN" class="option">China</option>
                            <option value="CX" class="option">Christmas Island</option>
                            <option value="CC" class="option">Cocos (Keeling) Islands</option>
                            <option value="CO" class="option">Colombia</option>
                            <option value="KM" class="option">Comoros</option>
                            <option value="CG" class="option">Congo</option>
                            <option value="CD" class="option">Congo, Democratic Republic of the</option>
                            <option value="CK" class="option">Cook Islands</option>
                            <option value="CR" class="option">Costa Rica</option>
                            <option value="HR" class="option">Croatia</option>
                            <option value="CU" class="option">Cuba</option>
                            <option value="CW" class="option">Curaçao</option>
                            <option value="CY" class="option">Cyprus</option>
                            <option value="CZ" class="option">Czech Republic</option>
                            <option value="CI" class="option">Côte d'Ivoire</option>
                            <option value="DK" class="option">Denmark</option>
                            <option value="DJ" class="option">Djibouti</option>
                            <option value="DM" class="option">Dominica</option>
                            <option value="DO" class="option">Dominican Republic</option>
                            <option value="EC" class="option">Ecuador</option>
                            <option value="EG" class="option">Egypt</option>
                            <option value="SV" class="option">El Salvador</option>
                            <option value="GQ" class="option">Equatorial Guinea</option>
                            <option value="ER" class="option">Eritrea</option>
                            <option value="EE" class="option">Estonia</option>
                            <option value="SZ" class="option">Eswatini (Swaziland)</option>
                            <option value="ET" class="option">Ethiopia</option>
                            <option value="FI" class="option">Finland</option>
                            <option value="FR" class="option">France</option>
                            <option value="DE" class="option">Germany</option>
                            <option value="GH" class="option">Ghana</option>
                            <option value="GR" class="option">Greece</option>
                            <option value="GT" class="option">Guatemala</option>
                            <option value="HN" class="option">Honduras</option>
                            <option value="HU" class="option">Hungary</option>
                            <option value="IN" class="option">India</option>
                            <option value="ID" class="option">Indonesia</option>
                            <option value="IE" class="option">Ireland</option>
                            <option value="IT" class="option">Italy</option>
                            <option value="JP" class="option">Japan</option>
                            <option value="KE" class="option">Kenya</option>
                            <option value="MY" class="option">Malaysia</option>
                            <option value="MX" class="option">Mexico</option>
                            <option value="MA" class="option">Morocco</option>
                            <option value="NL" class="option">Netherlands</option>
                            <option value="NZ" class="option">New Zealand</option>
                            <option value="NG" class="option">Nigeria</option>
                            <option value="NO" class="option">Norway</option>
                            <option value="PK" class="option">Pakistan</option>
                            <option value="PH" class="option">Philippines</option>
                            <option value="PL" class="option">Poland</option>
                            <option value="PT" class="option">Portugal</option>
                            <option value="RU" class="option">Russian Federation</option>
                            <option value="SA" class="option">Saudi Arabia</option>
                            <option value="ZA" class="option">South Africa</option>
                            <option value="ES" class="option">Spain</option>
                            <option value="SE" class="option">Sweden</option>
                            <option value="CH" class="option">Switzerland</option>
                            <option value="TH" class="option">Thailand</option>
                            <option value="TR" class="option">Turkey (Türkiye)</option>
                            <option value="UA" class="option">Ukraine</option>
                            <option value="AE" class="option">United Arab Emirates</option>
                            <option value="GB" class="option">United Kingdom</option>
                            <option value="US" class="option">United States</option>
                            <option value="VN" class="option">Vietnam</option>
                            <option value="ZM" class="option">Zambia</option>
                            <option value="ZW" class="option">Zimbabwe</option>

                        </select>
                        <i class="bx bx-map icon"></i>
                    </div>

                    <div class="input-box">
                        <input type="date" class="input-field" placeholder="Birth" required>
                        <i class="bx bx-calendar-alt icon"></i>
                    </div>

                    <div class="input-box">
                        <button class="input-submit" id="create">
                            <span>Create</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </div>
            </div>

 -->


            <!-- ---------------- Category Cards ---------------- -->

            <!-- <div class="category">
                <div class="cat-title">
                    <span>Choose at least one category</span>
                </div>

                <div class="form-inputs">
                    <div class="container-bubbles">
                        <div class="bubble" id="mystery">Mystery</div>
                        <div class="bubble" id="thriller">Thriller</div>
                        <div class="bubble" id="romance">Romance</div>
                        <div class="bubble" id="sci-fi">Sci-Fi</div>
                        <div class="bubble" id="fantasy">Fantasy</div>
                        <div class="bubble" id="horror">Horror</div>
                        <div class="bubble" id="historical">Historical</div>
                        <div class="bubble" id="biography">Biography</div>
                        <div class="bubble" id="self-help">Self-Help</div>
                        <div class="bubble" id="graphic-novels">Graphic Novels</div>
                        <div class="bubble" id="classics">Classics</div>
                        <div class="bubble" id="poetry">Poetry</div>
                    </div>

                    <div class="input-box">
                        <button class="input-submit" id="finish">
                            <span>Next</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </div>

            </div> -->





        </div>



    </div>

    <script src="../signin/main.js"></script>

</body>

</html>