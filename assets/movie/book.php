<?php
    session_start();
?>

<?php
    if (isset($_SESSION['user_id']) ){
        $userIdNo = $_SESSION['user_id'];
?>

<?php

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    
    require_once 'connect.php';

    $epay_url ="https://uat.esewa.com.np/epay/main";

    $sql = "SELECT * FROM movie where id=$id ;";
    $result = mysqli_query($conn ,$sql) ;  
    $rows = mysqli_num_rows($result);
    if ( $rows ){
        $rrr = mysqli_fetch_assoc($result);
        $sqlll = "SELECT * FROM nowplaying where movie= $id ;";
        $res = mysqli_query($conn ,$sqlll) ;  
        $sss = mysqli_fetch_assoc($res);  
        $halId = $sss['hall'] ;
        $sql_for_hall = "SELECT * FROM hall where id= $halId ;";
        $response = mysqli_query($conn ,$sql_for_hall) ;  
        $dat = mysqli_fetch_assoc($response);


        // ............................
        // FOR TAKING DATA OF SEATS

        $seatss = "SELECT * FROM seat where hall= $halId ;";
        $response_of_seats = mysqli_query($conn ,$seatss) ;  
        $rrrrrrrr = mysqli_num_rows($response_of_seats);
        $allSeats = mysqli_fetch_assoc($response_of_seats);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/book.css">
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/flash_message.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
    <title>Booking</title>
</head>
<body>  

    <!-- NAVBAR -->
    
    <?php
        include_once 'navbar.php';
    ?>


<div class="bookingBody">
        <div class="hallnameText">   
            <span class="hallText">Hall : <?php echo $dat['name'] ?></span>
        </div>
        <div class="movie-container">
            <label>Movie</label>
            <select id="movie">
                <option value="<?php echo $rrr['price'] ?>"><?php echo $rrr['name'] ?></option>
            </select>
        </div>
        <ul class="showcase">
            <li>
                <div class="seat"></div>
                <small>Available</small>
            </li>

            <li>
                <div class="seat booked"></div>
                <small>My Booked Seats</small>
            </li>
    
            <li>
                <div class="seat selected"></div>
                <small>Selected</small>
            </li>
    
            <li>
                <div class="seat occupied"></div>
                <small>Occupied</small>
            </li>
        </ul>
    
        <div class="container">
            <div class="screen"><div class="screenN">SCREEN</div></div>
                <div class="seatName">
                    <div class="seatAlpha"></div> 
                    <div class="row" id="number">
                        <div class="seatNum">1</div>
                        <div class="seatNum">2</div>
                        <div class="seatNum">3</div>
                        <div class="seatNum">4</div>
                        <div class="seatNum">5</div>
                        <div class="seatNum">6</div>
                        <div class="seatNum">7</div>
                        <div class="seatNum">8</div>
                    </div>
                </div>
                
        
                <?php
                    for ($x = 65 ; $x <= 71 ; $x++){
                ?>
                        <div class="seatName">
                            <div class="seatAlpha"><?php echo chr($x) ?></div> 
                            <div class="row" id="<?php echo chr($x) ?>">
                                
                <?php
                            for ($y = 1 ; $y <= 8 ; $y++){
                                
                                $seatNameT = chr($x).$y;
                                $seatDb = "SELECT * FROM seat where hall= $halId and name = '$seatNameT' ;";
                                $seatResp = mysqli_query($conn ,$seatDb) ;  
                                $dd = mysqli_fetch_assoc($seatResp);

                                if ($dd['occupied'] && $dd['user'] == $userIdNo ){
                ?>
                                    <div class="<?php echo chr($x).$y ?> seat occupied booked"></div>
                <?php
                                }
                                elseif ($dd['occupied']){
                ?>
                                    <div class="<?php echo chr($x).$y ?> seat occupied"></div>
                <?php
                                } 
                                else
                                {
                ?>
                                    <div class="<?php echo chr($x).$y ?> seat"></div>
                <?php
                                }
                            }
                ?>
                            </div>
                        </div>
                <?php
                    }
                ?>


        </div>
        
        <p class="text">
            You have selected <span id="count">0</span> for the price of Rs. <span id="total">0</span>.
        </p>
    
        <div class="seatsBooked">
            <form id="bookingSeatForm" action="esewa_tran.php" method="post">
                <div class="nameofSeats">
                    <h2 style="margin-right: 8px;">Selected Seats:</h2>
                    <!-- <div class="mySeats"></div> -->
                    <input type="text" name="seats" class="mySeats" readonly>&nbsp;
                    <input type="text" name="hall" value="<?php echo $halId ?>" hidden>
                    <input type="text" name="movie" value="<?php echo $id ?>" hidden>
                    <input type="number" name="count" class="count" hidden readonly>
                    <input type="text" name="totalsss" class="totalRsss" hidden>
                </div>
                <div class="confirm-button">
                    <input type="submit" name="submit" value="Confirm Booking"  class="confirmEsewaBook" readonly>
                </div>
                
            </form>
            <!-- <button name="submit" id="payment-button">Pay with Khalti</button> -->
            <!-- <textarea class="mySeats" id="autoresizing"></textarea> -->
        </div>
    </div>


    <!-- KHALTI_PAYMENT -->
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_598abb360151489193b3abdecb37a778",
            "productIdentity": "<?php echo $id ?>",
            "productName": "<?php echo $sss['hall'] ?>",
            "productUrl": "http://localhost/Project/Ticketing/main.php",
            "paymentPreference": [
                "KHALTI",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    document.getElementById("bookingSeatForm").submit();
                    // console.log(form);
                    // // hit merchant api for initiating verfication
                    // form.submit();
                    // console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        const tttotal = document.getElementById('total');
        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        var form = document.getElementsByClassName(".bookingSeatForm")
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: parseInt(tttotal.innerText) * 100 });
        }
    </script>
    
<!-- ---------------------------------------------------------------------------------------------------------- -->
   

    <!-- FOOTER -->

    <?php
        include_once 'footer.php';
    ?>
    
    <script src="js/book.js"></script>
</body>
</html>


<?php
            }
            else{
                header("location: main.php");
                exit();    
            }
        }
        else{
            header("location: main.php");
            exit();   
        }
    }
    else {
        header("location: ../index.php");
        exit();
    }
?>