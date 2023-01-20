<?php
    require_once 'connect.php';

    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location: ../php/login.php');
    }

    $result = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $data=$result->fetch_assoc();
    $first_name=$data['user_first_name'];
    $email=$data['user_email'];

    if (isset($_POST)){

        $seats = $_POST["seats"];
        $hall = $_POST["hall"];
        $movieId = $_POST["movie"];
        $count = intval($_POST["count"]);
        $totalsss = $_POST["totalsss"];

        $pid= $first_name.rand(100, 999);

        $epay_url ="https://uat.esewa.com.np/epay/main";

    }

    $sql = "SELECT * FROM movie where id = $movieId ;";
    $results = mysqli_query($conn, $sql) ;  
    $rows = mysqli_num_rows($results);
    if ( $data_ret = mysqli_fetch_assoc($results) ){
        $name = $data_ret["name"];
    }

    $_SESSION['mov_name'] = $name;
    $_SESSION['mov_id'] = $movieId;
    $_SESSION['hall'] = $hall;
    $_SESSION['price'] = $totalsss;
    $_SESSION['seatsNo'] = $count;
    $_SESSION["seats"] = $seats;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/book.css">
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/flash_message.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" href="assets/logos/TicketKinee_favicon.png" type="image/ico">
    <title>Booking</title>
    <style>
        .nameofSeats{
            box-shadow: rgba(100, 100, 111, 0.5) 0px 7px 29px 0px;
        }
        
        .project {
            display: flex;
            flex-direction: column;
            background-color: steelblue;
            padding: 20px 40px;
            border-radius: 5px;
            box-shadow: rgba(100, 100, 111, 0.5) 0px 7px 29px 0px;
        }
        .edit {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 300px;
        }

        .edit label {
            width: 100%;
            color: black;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>  

        <!-- NAVBAR -->
        
        <?php
            include_once 'navbar.php';
        ?>

    <!-- ESewa -->
    <div class="seatsBooked" style="margin-top: auto; margin-bottom: auto;">

        <div class="nameofSeats" >
            <div class="project">
                <div class="edit">
                    <label style="align:center; font-size:20px;"><b><?php echo $name."</br>";?></b></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Number of Seats: <?php echo $count."</br>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Price: <?php echo $totalsss."</br>";?></label>
                </div>
            
        <form action=<?php echo $epay_url?> method="POST">
            <input type="text" name="seats" class="mySeats" value="<?php echo $seats ?>" hidden>&nbsp;
            <input type="text" name="hall" value="<?php echo $hall ?>" hidden>
            <input type="text" name="movie" value="<?php echo $id ?>" hidden>
            <input type="number" name="count" class="count" value="<?php echo $count ?>" hidden readonly>
            <input type="text" name="totalsss" class="totalRsss" value="<?php echo $totalsss ?>"hidden>

            <input value= "<?php echo $totalsss?>" name="tAmt" type="hidden">
            <input value= "<?php echo $totalsss?>" name="amt" type="hidden">
            <input value= "0" name="txAmt" type="hidden">
            <input value= "0" name="psc" type="hidden">
            <input value= "0" name="pdc" type="hidden">
            <input value="EPAYTEST" name="scd" type="hidden">
            <input value= "<?php echo $pid?>" name="pid" type="hidden">
            <input value="http://localhost/mainProject_TicketKinee/assets/movie/bookMovie.php?q=su&seats=<?php echo $seats;?>&hall=<?php echo $hall;?>&movie=<?php echo $movieId;?>&count=<?php echo $count?>&totalsss=<?php echo $totalsss?>&pid=<?php echo $pid?>" type="hidden" name="su">
            <input value="http://localhost/mainProject_TicketKinee/assets/php/eSewa_failure_redirect.php?q=fu" type="hidden" name="fu">

            <input value="Pay With eSewa" type="submit" name="submit" class="confirmEsewaBook">
        </form>
        </div>
    </div>
</div>
    <!-- ESewa -->
</body>
</html>