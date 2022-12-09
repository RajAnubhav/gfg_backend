<!DOCTYPE html>

<?php
include('./include/connection.php');
if (isset($_POST['score'])) {
    
    $id = $_POST['id'];
   
    $score = $_POST['score'];
    $query = "UPDATE `leaderboard` SET `score` = '$score' WHERE `id` = '$id' ";
    $res = mysqli_query($connect, $query);
    echo "<script>window.location='./editsample.php'</script>";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <style>
        .form{
            display: flex;
            background-color: rgb(16, 163, 16);
            vertical-align: middle;
        }
    </style>

</head>

<body>


    


        <script>
            let query =window.location.search;
            const urlParams = new URLSearchParams(query);
            const id = urlParams.get('id')
            document.getElementById('Id').value=id;
        </script>
</body>

</html>