<?php
    session_start();
?>

<?php

if (isset($_SESSION['seats'])){

    $seats = $_GET["seats"];
    $hall = $_GET["hall"];
    $movieId = $_GET["movie"];
    $count = intval($_GET["count"]);
    $totalsss = $_GET["totalsss"];
    $refId = $_GET["refId"];
    $pid = $_GET["pid"];
   
    
    $seat = explode(" ; ",$seats);
    require_once 'connect.php';

    if($count == 0){
        $_SESSION["errorMessage"] = "Please book a valid seat !";     
        header("location: main.php");
        exit();
    }

    // $emailtosend = $_SESSION['email'];
    // print_r($count);
    // echo "<br>";
    // print_r(explode(" ; ", $seats));

    // $sql = "SELECT * FROM seat where hall = $hall ;";
    // $result = mysqli_query($conn ,$sql) ;  
    // $row = mysqli_num_rows($result);

    // if ($row){
                

    // }

    $seatNamessss = '';
    $totalSeats = 0;
    $loggedUserId = $_SESSION['user_id'];
    for ( $r = 0 ; $r < $count ; $r++){
        $seatname = $seat[$r];
        $seatToFind = str_replace(' ','',$seatname);
        $seatNamessss .= ' ' .  $seatToFind;
        $totalSeats += 1;
        $sql = "UPDATE seat set occupied = '1' where hall = $hall and name = '$seatToFind' ;";
        $result = mysqli_query($conn ,$sql);
        $sql_12 = "UPDATE seat set user = '$loggedUserId' where hall = $hall and name = '$seatToFind' ;";
        $result_12 = mysqli_query($conn ,$sql_12);
    }

    $userId = $_SESSION['user_id'] ;
    $sqlll = "INSERT INTO bookings (user , movie , hall , seat , totalSeats, totalPrice ) VALUES ('$userId' , '$movieId' , '$hall' , '$seatNamessss' , '$totalSeats' , '$totalsss') ;";
    $result1 = mysqli_query($conn ,$sqlll);

    header("location: http://localhost/mainProject_TicketKinee/assets/movie/esewa_success_movie_qr.php?&refId=$refId&pid=$pid");
    exit();

} else {
    header("location: main.php");
    exit();
}

?>