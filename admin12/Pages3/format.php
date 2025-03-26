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

    <style>
        .container-team {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            text-align: center;
            margin: 40px auto;
            position: relative;
        }

        .back-button-team {
            border: none;
            background: none;
            font-size: 24px;
            cursor: pointer;
            position: absolute;
            left: 20px;
            top: 20px;
        }

        .upload-section-team {
            text-align: center;
            margin-bottom: 20px;
        }

        .photo-placeholder-team {
            width: 100px;
            height: 100px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            overflow: hidden;
        }

        .photo-placeholder-team img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-text-team {
            display: none;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: space-between;
        }

        .input-group-team {
            display: flex;
            flex-direction: column;
            text-align: left;
            width: 48%;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        .submit-button-team {
            background-color: #00bfa5;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 50%;
            margin: 20px auto 0;
            display: block;
        }

        .popup-team {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
            z-index: 1000;
            width: 300px;
        }

        .popup-buttons-team {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .popup-buttons-team button {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .continue-button-team {
            background-color: #00bfa5;
            color: white;
        }

        .discard-button-team {
            background-color: #f44336;
            color: white;
        }

        @media (max-width: 768px) {
            form {
                flex-direction: column;
                align-items: center;
            }

            .input-group-team {
                width: 100%;
            }

            .submit-button-team {
                width: 80%;
            }
        }
    </style>
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
                    <h1>My Team</h1>
                </div>
            </div>

            <div class="container-team">
                <button class="back-button-team" onclick="showPopup()">&#8592;</button>
                <div class="form-container-team">
                    <div class="upload-section-team">
                        <label for="upload-photo-team" class="upload-label-team">
                            <div class="photo-placeholder-team" id="photo-preview-team"></div>
                        </label>
                        <input type="file" id="upload-photo-team" class="file-input-team" hidden accept="image/*">
                    </div>
                    <form>
                        <div class="input-group-team">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your first name">
                        </div>
                        <div class="input-group-team">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter your last name">
                        </div>
                        <div class="input-group-team">
                            <label>Email</label>
                            <input type="email" placeholder="Enter member email">
                        </div>
                        <div class="input-group-team">
                            <label>Phone Number</label>
                            <input type="tel" placeholder="Enter member phone number">
                        </div>
                        <div class="input-group-team">
                            <label>Position</label>
                            <input type="text" placeholder="Enter position">
                        </div>
                        <div class="input-group-team">
                            <label>Gender</label>
                            <select>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <button type="submit" class="submit-button-team">Add Now</button>
                    </form>
                </div>
            </div>
            <div class="popup-team" id="popup-team">
                <p>Do you really want to discard the form?</p>
                <div class="popup-buttons-team">
                    <button class="continue-button-team" onclick="hidePopup()">Continue</button>
                    <button class="discard-button-team" onclick="discardForm()">Discard</button>
                </div>
            </div>
            </div>
            </div>
        </main>
    </section>

    <script src="../test3/ind.js"></script>
    <script>
        function showPopup() {
            document.getElementById("popup-team").style.display = "block";
        }

        function hidePopup() {
            document.getElementById("popup-team").style.display = "none";
        }

        function discardForm() {
            window.location.href = "../Pages3/team.html"; // Redirect to the team page
        }

        document.getElementById("upload-photo-team").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("photo-preview-team").innerHTML = '<img src="' + e.target.result + '" alt="Uploaded Image">';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>