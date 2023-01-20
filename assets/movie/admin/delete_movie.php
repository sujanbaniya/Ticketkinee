<?php
    session_start();
    require_once '../connect.php';
?>

<?php
    if (isset($_SESSION['user_id']) ){
        if (($_SESSION['admin'] != "0") ){
            $id = $_GET['delete'];
            $sql = "DELETE FROM movie WHERE id = '$id';";
            $result = mysqli_query($conn ,$sql) ;

            header("location: movie.php");
            exit();
        }
        else {
            header("location: ../main.php");
            exit();
        }   
    }
    else {
        header("location: ../main.php");
        exit();
    }
?>