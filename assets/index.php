<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== FAVICON ===============-->
   <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

   <!--=============== SWIPER CSS ===============-->
   <link rel="stylesheet" href="../assets/swiper-bundle.min.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="../assets/styles.css">

   <title>InkoRa|Home</title>
</head>

<body>
   <!--==================== HEADER ====================-->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="#" class="nav_logo">
            <i class="ri-book-3-line"></i> InKoRa
         </a>

         <div class="nav_menu">
            <ul class="nav_list">
               <li class="nav_item">
                  <a href="../assets/index.php" class="nav_link">
                     <i class="ri-home-line active-link"></i>
                     <Span>Home</Span>
                  </a>
               </li>


               <li class="nav_item">
                  <a href="#" class="nav_link">
                     <i class="ri-message-3-line"></i>
                     <Span>Forum</Span>
                  </a>
               </li>



               <li class="nav_item">
                  <a href="#" class="nav_link">
                     <i class="ri-add-line"></i>
                     <Span>Add</Span>
                  </a>
               </li>



               <li class="nav_item">
                  <a href="#" class="nav_link">
                     <i class="ri-robot-line"></i>
                     <Span>ChatBot</Span>
                  </a>
               </li>



            </ul>
         </div>

         <div class="nav_actions">
            <!-- ---------Search Button------- -->
            <i class="ri-search-line search-button" id="search-button" onclick="window.location.href='../search/search.html'"></i>


            <!-- ---------Notification Button------- -->
            <div class="notification">
               <i class="ri-notification-3-line notification-button" id="notification-button"></i>
               <ul class="notification-link" id="notification-box">
                  <li>
                      <img src="https://i.pravatar.cc/50" alt="User">
                      <a href="#">Hamza BHM uploaded: أقوى طريقة بحث</a>
                  </li>
                  <li>
                      <img src="https://i.pravatar.cc/50?img=2" alt="User">
                      <a href="#">قصتي من 1 دولار إلى مليون دولار</a>
                  </li>
                  <li>
                      <img src="https://i.pravatar.cc/50?img=3" alt="User">
                      <a href="#">أخيرًا الحل 🔥 كيف تربح 100%</a>
                  </li>
                  <li>
                      <img src="https://i.pravatar.cc/50?img=4" alt="User">
                      <a href="#">دليل Etsy Fees 2025</a>
                  </li>
                  <li>
                     <img src="https://i.pravatar.cc/50" alt="User">
                     <a href="#">Hamza BHM uploaded: أقوى طريقة بحث</a>
                 </li>
                 <li>
                     <img src="https://i.pravatar.cc/50?img=2" alt="User">
                     <a href="#">قصتي من 1 دولار إلى مليون دولار</a>
                 </li>
              </ul>
            </div>
            <!-- ----------Profile Button----------- -->
            <div class="profile">
               <img class="profile-img" src="../assets/img/discount-book-1.png" alt="">
               <ul class="profile-link">
                  <li><a href="../profiles/profile.html"><i class='ri-user-3-line'></i> Profile</a></li>
                  <li><a href="#"><i class='ri-settings-4-line'></i> Settings</a></li>
                  <li><a href="#"><i class='ri-logout-box-r-line'></i> Logout</a></li>
               </ul>
            </div>



         </div>



      </nav>
   </header>

   <main class="main">
      <!--==================== HOME ====================-->
      <section class="home section" id="home">
         <div class="home_container container grid">
            <div class="home_data">
               <h1 class="home_title">
                  Welcome to <br> InKoRa
               </h1>

               <p class="home_description">
                  Enjoy writing reading and chating
                  with people around the world,
                  and Be your favorite author
                  with InKoRa.
               </p>

               <a href="#" class="button"> Read More </a>
            </div>

            <div class="home_images">
               <div class="home_swiper swiper">
                  <div class="swiper-wrapper">
                     <article class="home_article swiper-slide">
                        <img src="../assets/img/home-book-1.png" alt="image" class="home_img">
                     </article>
                     <article class="home_article swiper-slide">
                        <img src="../assets/img/home-book-2.png" alt="image" class="home_img">
                     </article>
                     <article class="home_article swiper-slide">
                        <img src="../assets/img/home-book-3.png" alt="image" class="home_img">
                     </article>
                     <article class="home_article swiper-slide">
                        <img src="../assets/img/home-book-4.png" alt="image" class="home_img">
                     </article>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!--==================== Popular Slide ====================-->
      <section class="featured section" id="featured">
         <h2 class="section_title">
            Popular Now
         </h2>

         <div class="featured_container container">
            <div class="featured_swiper swiper">
               <div class="swiper-wrapper">

               <?php
$sql = "SELECT L.id_livre, L.titre, L.couverture, AVG(E.score) AS moyenne_score
        FROM Livre L
        JOIN Evaluation E ON L.id_livre = E.id_livre
        GROUP BY L.id_livre
        ORDER BY moyenne_score DESC
        LIMIT 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="featured_card swiper-slide">';
        echo '<img src="' . $row["couverture"] . '" alt="image" class="featured_img">';
        echo '<h2 class="featured_title">' . $row["titre"] . '</h2>';
        echo '<button class="button">Read</button>';
        echo '</article>';
    }
} else {
    echo "0 results";
}
?>

               </div>

               <div class="swiper-button-prev">
                  <i class="ri-arrow-left-s-line"></i>
               </div>

               <div class="swiper-button-next">
                  <i class="ri-arrow-right-s-line"></i>
               </div>

            </div>
         </div>


      </section>




      <!--==================== Recommandation Slide ====================-->
      <section class="featured section" id="featured">
         <h2 class="section_title">
            Recommended For You
         </h2>

         <div class="featured_container container">
            <div class="featured_swiper swiper">
               <div class="swiper-wrapper">

               <?php
$sql = "SELECT L.id_livre, L.titre, L.couverture, COUNT(F.id_livre) AS nombre_favoris
        FROM Livre L
        LEFT JOIN Favoris F ON L.id_livre = F.id_livre
        GROUP BY L.id_livre
        ORDER BY nombre_favoris DESC
        LIMIT 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="featured_card swiper-slide">';
        echo '<img src="' . $row["couverture"] . '" alt="image" class="featured_img">';
        echo '<h2 class="featured_title">' . $row["titre"] . '</h2>';
        echo '<button class="button">Read</button>';
        echo '</article>';
    }
} else {
    echo "0 results";
}
?>

               </div>

               <div class="swiper-button-prev">
                  <i class="ri-arrow-left-s-line"></i>
               </div>

               <div class="swiper-button-next">
                  <i class="ri-arrow-right-s-line"></i>
               </div>

            </div>
         </div>


      </section>



      <!--==================== Followings Slide ====================-->
      <section class="featured section" id="featured">
         <h2 class="section_title">
            Followings
         </h2>

         <div class="featured_container container">
            <div class="featured_swiper swiper">
               <div class="swiper-wrapper">

               <?php
// Supposons que l'ID de l'utilisateur connecté est stocké dans une session ou une variable
$id_utilisateur = 1; // Remplacez par l'ID de l'utilisateur connecté

$sql = "SELECT L.id_livre, L.titre, L.couverture
        FROM Livre L
        JOIN Abonnement A ON L.id_auteur = A.id_cible
        WHERE A.id_abonne = $id_utilisateur
        ORDER BY L.date_publication DESC
        LIMIT 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="featured_card swiper-slide">';
        echo '<img src="' . $row["couverture"] . '" alt="image" class="featured_img">';
        echo '<h2 class="featured_title">' . $row["titre"] . '</h2>';
        echo '<button class="button">Read</button>';
        echo '</article>';
    }
} else {
    echo "0 results";
}
?>

               </div>

               <div class="swiper-button-prev">
                  <i class="ri-arrow-left-s-line"></i>
               </div>

               <div class="swiper-button-next">
                  <i class="ri-arrow-right-s-line"></i>
               </div>

            </div>
         </div>


      </section>



      <!--==================== Continue Reading Slide ====================-->
      <section class="featured section" id="featured">
         <h2 class="section_title">
            Continue Reading
         </h2>

         <div class="featured_container container">
            <div class="featured_swiper swiper">
               <div class="swiper-wrapper">

               <?php
// Supposons que l'ID de l'utilisateur connecté est stocké dans une session ou une variable
$id_utilisateur = 1; // Remplacez par l'ID de l'utilisateur connecté

$sql = "SELECT L.id_livre, L.titre, L.couverture, LL.progression
        FROM Lecteur_Livre LL
        JOIN Livre L ON LL.id_livre = L.id_livre
        WHERE LL.id_utilisateur = $id_utilisateur
        ORDER BY LL.date_lecture DESC
        LIMIT 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="featured_card swiper-slide">';
        echo '<img src="' . $row["couverture"] . '" alt="image" class="featured_img">';
        echo '<h2 class="featured_title">' . $row["titre"] . '</h2>';
        echo '<button class="button">Read</button>';
        echo '</article>';
    }
} else {
    echo "0 results";
}
?>


               </div>

               <div class="swiper-button-prev">
                  <i class="ri-arrow-left-s-line"></i>
               </div>

               <div class="swiper-button-next">
                  <i class="ri-arrow-right-s-line"></i>
               </div>

            </div>
         </div>


      </section>

   </main>

   <!--==================== FOOTER ====================-->
   <footer class="footer">
      <div class="footer_container container grid">
         <div>
            <a href="#" class="footer_logo">
               <i class="ri-book-3-line"></i> InKoRa
            </a>

            <p class="footer_discription">
               Enjoy reading and discover new books <br>
               Here You can Be a Writer with us <br>
               Now is the time to be your favorite Author.
            </p>
         </div>

         <div class="footer_data grid">

            <div>
               <h3 class="footer_title">About</h3>

               <ul class="footer_links">
                  <li>
                     <a href="#" class="footer_link">Awards</a>
                  </li>
                  <li>
                     <a href="#" class="footer_link">FAQs</a>
                  </li>
                  <li>
                     <a href="#" class="footer_link">Privacy Policy</a>
                  </li>
                  <li>
                     <a href="#" class="footer_link">Terms of users</a>
                  </li>
               </ul>
            </div>



            <div>
               <h3 class="footer_title">Company</h3>

               <ul class="footer_links">
                  <li>
                     <a href="#" class="footer_link">Community</a>
                  </li>
                  <li>
                     <a href="#" class="footer_link">Our Team</a>
                  </li>
                  <li>
                     <a href="#" class="footer_link">Help center</a>
                  </li>
                  <li>
                     <a href="#" class="footer_link"></a>
                  </li>
               </ul>
            </div>


            <div>
               <h3 class="footer_title">Contact</h3>

               <ul class="footer_links">
                  <li>
                     <address class="footer_info">
                        Rue Oued Ziz <br>
                        B.P 33/S, Agadir, Morocco
                     </address>
                  </li>
                  <li>
                     <address class="footer_info">
                        inkora@gmail.com <br>
                        inkora.helpcenter@gmail.com
                     </address>
                  </li>
               </ul>
            </div>



            <div>
               <h3 class="footer_title">Social</h3>

               <div class="footer_social">
                  <a href="https://www.facebook.com" target="_blank" class="footer_social-link">
                     <i class="ri-facebook-circle-line"></i>
                  </a>

                  <a href="https://www.instagram.com" target="_blank" class="footer_social-link">
                     <i class="ri-instagram-line"></i>
                  </a>

                  <a href="https://www.x.com" target="_blank" class="footer_social-link">
                     <i class="ri-twitter-x-line"></i>
                  </a>

               </div>
            </div>



         </div>
      </div>

      <span class="footer_copy">
         &#169; All rights reserved By InKoRa.
      </span>
   </footer>

   <!--========== SCROLL UP ==========-->
   <a href="#" class="scrollup" id="scroll-up">
      <i class="ri-arrow-up-line"></i>
   </a>

   <!--=============== SCROLLREVEAL ===============-->
   <script src="../assets/scrollreveal.min.js"></script>

   <!--=============== SWIPER JS ===============-->
   <script src="../assets/swiper-bundle.min.js"></script>

   <!--=============== MAIN JS ===============-->
   <script src="../assets/main.js"></script>
</body>

</html>

