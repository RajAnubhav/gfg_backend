<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include("include/connection.php");

// if ($_SESSION['teamname']) {
//     echo "
//             <script>
//                 window.location='sample.php';
//             </script>
//         ";
// }

// if($_SESSION['username']){
//     echo "
//             <script>
//                 window.location='sample.php';
//             </script>
//         ";
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamname = $_POST["teamname"];
    $leadername = $_POST["leadername"];
    $event = $_POST["event"];
    $score = 0;

    $search_query = "SELECT teamname FROM leaderboard WHERE teamname LIKE '$teamname'";

    if ($search_query == null) {
        echo "<script>
            alert('User already exists');   
        </script>";
    } else {
        $sql_query = "INSERT INTO `leaderboard` (`teamname`, `leadername`, `event`, `score`) VALUES ('$teamname', '$leadername', '$event', '$score')";
        $result = mysqli_query($connect, $sql_query);
        $_SESSION['teamname'] = $teamname; // setting the session for the user
        echo "
            <script>
                window.location='./sample.php';
            </script>
        ";
    }
}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Added the favicon of GFG-sit-web -->
    <link rel="shortcut icon" href="https://gfg-sit-web.web.app/images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            /* max-width: 360px; */
            /* margin: 0 auto 100px; */
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            font-weight: bold;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        #events {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            font-weight: bold;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: white;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before,
        .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }

        body {
            /* background: #76b852; */
            /* fallback for old browsers */
            /* background: rgb(141, 194, 111); */
            /* background: linear-gradient(90deg, rgba(141, 194, 111, 1) 0%, rgba(118, 184, 82, 1) 50%); */
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        @media (max-width: 560px) {
            body {
                margin-top: 100px;
            }

            .tag {
                padding-top: 50px;
            }
        }

        @media (max-width: 360px) {
            .form {
                position: relative;
                padding: 45px;
                background: none;
                text-align: center;
            }

            #navbarNav {
                display: none;
            }

            .tag {
                padding-top: 50px;
            }

        }
    </style>

    <link rel="stylesheet" href="./css/text.css">
    <link rel="icon" href="https://gfg-sit-web.web.app/images/icon.ico">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/unicons.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/all.css" />
    <link rel="stylesheet" href="./text.css">
    <link rel="stylesheet" href="./css/botton.css">
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/tooplate-style.css">
</head>

<body title="Developed by Anubhav">

    <!-- Navbar page -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light headroom headroom--not-bottom headroom--pinned headroom--top">
        <div class="container">
            <a class="navbar-brand">GeeksforGeeks SIT</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link"><span data-hover="Home">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="./login.php" class="nav-link"><span data-hover="Leaderboard">Leaderboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="./logingfg.php" class="nav-link"><span data-hover="GFG Members login">GFG Members login</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- official geeksforgeeks website login page -->

    <div class="login-page">
        <div class="heading">
            <h2 style="display: flex; justify-content: center; padding-bottom: 20px; margin-top: -50px;">Login</h2>
        </div>

        <div class="form">
            <form class="register-form" method="post" action="login.php">
                <input type="text" name="teamname" placeholder="Team Name" required='true' />
                <input type="text" name="leadername" placeholder="Leader Name" required='true' />
                <select name="event" id="events">
                    <option value="Wikispeedia">Wikispeedia</option>
                    <option value="Clash_of_memes">Clash of Memes</option>
                    <option value="FunMania">Fun Mania</option>
                    <option value="BloodWork">Blood Work</option>
                    <option value="WhatIf">What If</option>
                </select>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- Login page ends here -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>

</body>

</html>