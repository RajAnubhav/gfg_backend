<?php
    session_start();

    if(isset($_SESSION['teamname'])){
        session_destroy();
        echo"
            <script>
                window.location='index.php';
            </script>
        ";
    }
?>