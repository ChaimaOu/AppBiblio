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
      <li class="active">
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
      <li>
        <a href="../Pages3/team.php" class="nav-link">
          <i class="fas fa-people-group"></i>
          <span class="text">Team</span>
        </a>
      </li>
    </ul>

    <ul class="side-menu">
      <li>
        <a href="#">
          <i class="fas fa-cog"></i>
          <span class="text">Settings</span>
        </a>
      </li>
      <li>
        <a href="#" class="logout">
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
          <h1>Dashboard</h1>
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

        <a href="#" class="download-btn">
          <i class="fas fa-cloud-download-alt"></i>
          <span class="text">Download Report</span>
        </a>
      </div>

      <div class="box-info">
        <li>
          <i class="fas fa-users-between-lines"></i>
          <span class="text">
            <h3>50.8K</h3>
            <p>Total Users</p>
          </span>
        </li>
        <li>
          <i class="fas fa-download"></i>
          <span class="text">
            <h3>1M</h3>
            <p>Downloads</p>
          </span>
        </li>
        <li>
          <i class="fas fa-book-open"></i>
          <span class="text">
            <h3>90k</h3>
            <p>Total Books</p>
          </span>
        </li>
      </div>


      <!---------------------------------diagram---------------------------------->


      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Ads Revenue</h3>
          </div>

        </div>
      </div>


      <!---------------------------------Slidder Section---------------------------------->

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Popularity</h3>
          </div>


          <div class="main-container-cards">
            <!-- Popular Writers Section -->
            <div class="container-cards">
              <h2>Popular Writers</h2>
              <div class="cards-grid-writers">
                <div class="card">
                  <img src="../image/profile2.jpg" alt="Writer">
                  <p>Steve LionKing</p>
                </div>
                <div class="card">
                  <img src="../image/profile1.avif" alt="Writer">
                  <p>John Doe</p>
                </div>
                <div class="card">
                  <img src="../image/profile2.jpg" alt="Writer">
                  <p>Jane Austen</p>
                </div>
              </div>
            </div>

            <!-- Popular Books Section -->
            <div class="container-cards">
              <h2>Popular Books</h2>
              <div class="cards-grid-books">
                <div class="card">
                  <img src="../image/HarryPotter.jpg" alt="Book">
                  <p>How to Kill Your Family</p>
                  <small>By Bella Mackie</small>
                </div>
                <div class="card">
                  <img src="../image/HarryPotter.jpg" alt="Book">
                  <p>The Great Novel</p>
                  <small>By Jane Smith</small>
                </div>
                <div class="card">
                  <img src="../image/HarryPotter.jpg" alt="Book">
                  <p>Another Bestseller</p>
                  <small>By Mark Twain</small>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>






      <!---------------------------------Table / ToDo Section---------------------------------->
      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Country</h3>
          </div>

        </div>


        <div class="todo">
          <div class="head">
            <h3>Age Diagram</h3>
          </div>






        </div>
      </div>

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Users</h3>
          </div>





        </div>
      </div>
    </main>
  </section>

  <script src="../test3/ind.js"></script>
</body>

</html>