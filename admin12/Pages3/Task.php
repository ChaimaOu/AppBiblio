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
        <a href=" ../Pages3/inbox.php" class="nav-link">
          <i class="fas fa-inbox"></i>
          <span class="text">Inbox</span>
        </a>
      </li>
      <li class="active">
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
          <h1>Tasks List</h1>
        </div>
      </div>

      <div class="box-info">
        <div class="filter-bar">
          <button class="filter-btn">
            <i class="fas fa-filter"></i>
          </button>
          <span>Filter By</span>

          <!-- Date Picker -->
          <div class="date-picker-container">
            <input type="text" id="filter-date" placeholder="Select Date" readonly>
            <i class="fas fa-calendar-alt calendar-icon"></i>
          </div>

          <select id="filter-type">
            <option value="">Type</option>
            <option value="Chapter-Upload">Chapter Upload</option>
            <option value="Book-Upload">Book Upload</option>
            <option value="Forbiden-Words">Forbiden Words</option>
            <option value="Bad-Comments">Bad Comments</option>
          </select>
          <select id="filter-status">
            <option value="">Status</option>
            <option value="finished">Finished</option>
            <option value="in-progress">In Progress</option>
            <option value="pending">Rejected</option>
            <option value="on-hold">On Hold</option>
          </select>

          <button id="apply-filter" class="apply-btn">
            <i class="fas fa-filter"></i>Apply
          </button>

          <button id="reset-filter" class="reset-btn">
            <i class="fas fa-redo"></i> Reset Filter
          </button>
        </div>
      </div>

      <!-- Include Flatpickr Library -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

      <script>
        // Initialize Flatpickr for Date Selection
        flatpickr("#filter-date", {
          enableTime: false,
          dateFormat: "d M Y",
          onClose: function (selectedDates, dateStr, instance) {
            console.log("Selected Date: ", dateStr);
          }
        });
      </script>


      <!---------------------------------Users Table---------------------------------->
      <div class="table-data-task">
        <div class="order-task">


          <table>
            <thead>
              <tr>
                <th>USER ID</th>
                <th>USER NAME</th>
                <th>DATE</th>
                <th>TYPE</th>
                <th>BOOK NAME</th>
                <th>STATUS</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>00125 </td>
                <td>
                  <p>@nervada00</p>
                </td>
                <td>
                  <p>01 Sep 2024</p>
                </td>
                <td>
                  <p id="Chap-Upload">Chapter Upload</p>
                </td>
                <td>
                  <p>Glitch</p>
                </td>
                <td>
                  <div class="status-container">
                      <span class="status-label completed">Finished</span>
                      <select class="status-select">
                          <option value="completed">Finished</option>
                          <option value="in-process">In Progress</option>
                          <option value="rejected">Rejected</option>
                          <option value="on-hold">On Hold</option>
                      </select>
                  </div>
              </td>
                <td>
                  <button class="check-work-btn">Check Work</button>
                </td>
              </tr>




            </tbody>
          </table>
        </div>
      </div>
      </div>
    </main>
  </section>



  <script src="../test3/ind.js"></script>
</body>

</html>