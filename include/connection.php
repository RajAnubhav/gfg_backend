<?php
    $connect = mysqli_connect("localhost", "root", "", "gfg");
    if(!$connect){
        die('Error'.mysqli_connect_error());
    }
?>