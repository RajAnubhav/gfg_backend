<?php
include('./include/connection.php');

session_start();
if (!isset($_SESSION['role'])) {
    session_destroy();
    echo "
        <script>
            window.location='./index.php';
        </script>
    ";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['score']) {
    $score = $_POST['score'];
    $username = $_SESSION['name'];
    $result = mysqli_query($connect, "UPDATE leaderboard SET score='$score' , status=1 WHERE username='$username' ");

    echo "
    <script>
        window.location = './sample.php';
    </script>
";

    exit;
}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./resources_sark/main.css">

    <title>Leaderboard</title>
    <link rel="shortcut icon" href="https://gfg-sit-web.web.app/images/icon.ico" type="image/x-icon">

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


    <style>
        button {
            border: none;
            background-color: rgb(16, 163, 16);
            color: white;
            font-family: "Maven Pro", sans-serif;
            padding: 10px;
            border-radius: 5px;
            margin: 0px 0px 0px -75px;
        }
    </style>
</head>

<body class="page-leaderboard" title="Developed by Anubhav">


    <div id="contain-all" class=" slideout-panel">

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
                        <a href="./logout.php" class="nav-link"><span data-hover="Logout">Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <header class="header">
            <div class="header__navbar">
            </div>
        </header>
        <section class="hero hero--inverse">
        </section>
        <section class="leaderboard-progress">
            <div class="contain text-center">
                <h2 style="padding-top: 35px; color: rgb(16, 163, 16);">Geeks for Geeks Leaderboard</h2>
            </div>
        </section>
        <section class="ranking">
            <div class="contain">
                <div class="ranking-table">

                    <?php

                    function database($ranking, $row)
                    {
                        if ($ranking == 1) {
                            echo "
                            <div class='ranking-table-row-leader-1'>
                                <div class='ranking-table-data-leader-1'>
                                    <div class='medal-gold'></div>
                                </div>
                                <div class='ranking-table-data' style='margin-left:2%;'>
                                    {$row[1]}
                                </div>
                                <div class='ranking-table-data' style='padding-left:0%;'>
                                    {$row[4]}
                                </div>
                                <div class='ranking-table-data'> ";
                    ?>

                            <?php

                            if ($_SESSION['eventHandeler'] == $row[3]) {
                                echo "
                        <button data-toggle='modal' data-target='#exampleModal' class='editBtn' id='".$row[0].",".$row[1].",".$row[4]."'>Edit</button>
                        ";
                            }
                            ?>

                </div>
            </div>
        <?php
                            $ranking++;
                        } else if ($ranking == 2) {
                            echo "
                            <div class='ranking-table-row-leader-2'>
                                <div class='ranking-table-data-leader-2'>
                                    <div class='medal-silver'></div>
                                </div>
                                <div class='ranking-table-data' style='margin-left:2%;'>
                                {$row[1]}
                                </div>
                                <div class='ranking-table-data' style='padding-left:0%;'>
                                {$row[4]}
                                </div>
                                ";

        ?>
            <?php

                            if ($_SESSION['eventHandeler'] == $row[3]) {
                                echo "
    <button data-toggle='modal' data-target='#exampleModal' style='margin-right: 26px;' class='editBtn' id=' $row[0].','.$row[1].','.$row[4]; '>Edit</button>
    ";
                            }
            ?>
        <?php
                            echo "
                                </div>
                                ";
                            $ranking++;
                        } else if ($ranking == 3) {
                            echo "
                                <div class='ranking-table-row-leader-3'>
                                <div class='ranking-table-data-leader-3'>
                                <div class='medal-bronze'></div>
                                </div>
                                <div class='ranking-table-data' style='margin-left:2%;'>
                                {$row[1]}
                                </div>
                                <div class='ranking-table-data' style='padding-left:0%;'>
                                {$row[4]}
                                </div>
                                <div class='ranking-table-data'>
                                ";
        ?>
            <?php

                            if ($_SESSION['eventHandeler'] == $row[3]) {
                                echo "
    <button data-toggle='modal' data-target='#exampleModal' style='margin-right: 26px;' class='editBtn' id=' $row[0].','.$row[1].','.$row[4]; '>Edit</button>
    ";
                            }
            ?>
        <?php
                            echo "
                                </div>
                                </div>
                                ";
                            $ranking++;
                        } else {
                            echo "
                                <div class='ranking-table-body'>
                                <div class='ranking-table-row'>
                                <div class='ranking-table-data'>
                                {$ranking}
                                </div>
                                <div class='ranking-table-data' style='margin-left:2%;'>
                                {$row[1]}
                                </div>
                                <div class='ranking-table-data padding-4' style='padding-left:0%;'>
                                {$row[4]}
                                </div>
                                </div>
                                <div class='ranking-table-data'>

                                ";
        ?>
            <?php

                            if ($_SESSION['eventHandeler'] == $row[3]) {
                                echo "
    <button data-toggle='modal' data-target='#exampleModal' style='margin-right: 26px;' class='editBtn' id=' $row[0].','.$row[1].','.$row[4]; '>Edit</button>
    ";
                            }
            ?>

    <?php

                            echo "
                                </div>
                                </div>
                                ";
                            $ranking++;
                        }
                    }

                    $result = mysqli_query($connect, "SELECT * FROM leaderboard ORDER BY score DESC");
                    $gfgmember = mysqli_query($connect, "SELECT * FROM gfgmembers ");
                    $member_data = mysqli_fetch_all($gfgmember);

                    $data = mysqli_fetch_all($result);
                    /* Fetch Rows from the SQL query */
                    if (mysqli_num_rows($result)) {

                        $wiki_ranking = 1;
                        $com_ranking = 1;
                        $fm_ranking = 1;
                        $bw_ranking = 1;
                        $wi_ranking = 1;

                        foreach ($data as $row) {
                            if ($row[3] == "Wikispeedia" && $member_data[3] == "Wikispeedia") {
                                if ($wiki_ranking == 1) {
                                    echo "
                                    <br>
                                    <br>
                                    <h1 style='text-align:center;'>  Wikispeedia </h1>

                                    <div class='ranking-table-header-row'>
                                        <div class='ranking-table-header-data h6'>Rank</div>
                                        <div class='ranking-table-header-data h6'>Team Name</div>
                                        <div class='ranking-table-header-data h6'>Score</div>
                                    </div>
                                    ";
                                }
                                database($wiki_ranking++, $row);
                            }
                        }

                        foreach ($data as $row) {
                            if ($row[3] == "Clash_of_memes") {
                                if ($com_ranking == 1) {
                                    echo "
                                    <br>
                                    <br>
                                    <h1 style='text-align:center;'>  Clash of Memes </h1>

                                    <div class='ranking-table-header-row'>
                                        <div class='ranking-table-header-data h6'>Rank</div>
                                        <div class='ranking-table-header-data h6'>Team Name</div>
                                        <div class='ranking-table-header-data h6'>Score</div>
                                    </div>
                                    ";
                                }
                                database($com_ranking++, $row);
                            }
                        }
                        foreach ($data as $row) {
                            if ($row[3] == "FunMania") {
                                if ($fm_ranking == 1) {
                                    echo "
                                    <br>
                                    <br>
                                    <h1 style='text-align:center;'>  Fun Mania </h1>

                                    <div class='ranking-table-header-row'>
                                        <div class='ranking-table-header-data h6'>Rank</div>
                                        <div class='ranking-table-header-data h6'>Team Name</div>
                                        <div class='ranking-table-header-data h6'>Score</div>
                                    </div>
                                    ";
                                }
                                database($fm_ranking++, $row);
                            }
                        }
                        foreach ($data as $row) {
                            if ($row[3] == "BloodWork") {
                                if ($bw_ranking == 1) {
                                    echo "
                                    <br>
                                    <br>
                                    <h1 style='text-align:center;'>  Blood Work </h1>

                                    <div class='ranking-table-header-row'>
                                        <div class='ranking-table-header-data h6'>Rank</div>
                                        <div class='ranking-table-header-data h6'>Team Name</div>
                                        <div class='ranking-table-header-data h6'>Score</div>
                                    </div>
                                    ";
                                }
                                database($bw_ranking++, $row);
                            }
                        }
                        foreach ($data as $row) {
                            if ($row[3] == "WhatIf") {
                                if ($wi_ranking == 1) {
                                    echo "
                                    <h1 style='text-align:center;'>  What If </h1>
                                    
                                    <br>
                                    <br>
                                    ";
                                }
                                database($wi_ranking++, $row);
                            }
                        }
                    }
                    echo "<br>";
    ?>
    </div>

    </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 10000;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="margin: 0% 33%;">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="margin:0% 26%;">
                    <div class="form">
                        <form class="register-form" method="post" action="update.php">
                            <div>
                                <input type="number" name="score" placeholder="Score" id="score" />
                                <input type="hidden" name="id" id="Id">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="margin: 0px 65px 0px 0px;">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            let editBtn = document.getElementsByClassName('editBtn');
            Array.from(editBtn).forEach((e) => {
                e.addEventListener('click', () => {
                    document.getElementById('Id').value = e.id.split(',')[0];
                    document.getElementById('exampleModalLabel').innerHTML = e.id.split(',')[1];
                    document.getElementById('score').placeholder = e.id.split(',')[2];
                })
            })
        </script>
</body>

</html>