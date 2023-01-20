<?php
    session_start();
?>
<?php
    require_once 'database_configure.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/booked_panel.css">
    <link rel="stylesheet" href="../movie/css/style.css">
    <link rel="stylesheet" href="../movie/css/home_page_middle.css">
    <link rel="stylesheet" href="../movie/css/footer.css">
    <link rel="stylesheet" href="../movie/css/banner.css">
    <link rel="stylesheet" href="../movie/css/flash_message.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>TicketKinee | Bus Tickets</title>
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
</head>
<body>

    <!-- NAVBAR -->

    <?php
        include_once 'bus_navbar.php';
    ?>


<!-- ---------------------------------------------------------------------------------------------------------- -->


<!-- MIDDLE -->

<!-- BANNER --> 
    <div class="middle">
        <div class="banner">
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" class="changeBtn" id="radio1">
                    <input type="radio" name="radio-btn" class="changeBtn" id="radio2">
                    <input type="radio" name="radio-btn" class="changeBtn" id="radio3">
                    <!-- <input type="radio" name="radio-btn" class="changeBtn" id="radio4"> -->

                    <div class="slide">
                        <img src="../ads/Ad8.png" alt="">
                    </div>
                    <div class="slide first">
                        <img src="../ads/Ad8.png" alt="">
                    </div>
                    <div class="slide">
                        <img src="../ads/Ad8.png" alt="">
                    </div>
                    <!-- <div class="slide">
                        <img src="images/nimsdai.jpg" alt="">
                    </div> -->

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <!-- <div class="auto-btn4"></div> -->
                    </div>

                </div>  

                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <!-- <label for="radio4" class="manual-btn"></label> -->
                </div>
            </div>
            <script type="text/javascript">
                document.getElementById("radio1").checked = true;
                
                var counter = 2;
                
                setInterval(function(){
                    document.getElementById('radio' + counter).checked = true;
                    counter++;
                    if(counter > 3){
                        counter = 1;
                    }
                } , 3000);
            
            </script>
        </div>


<!-- ---------------------------------------------------- -->

        <h1 class="topic">Available Tickets</h1> <br>
        <div class="nowShowing">

            <?php
                $i = 1;
                $sql = "SELECT * FROM flight_lists ;";
                $result = mysqli_query($conn, $sql) ;

                while($rows = mysqli_fetch_assoc($result)){
                    while($i < 5){
                        $idd = $rows['airlines_id'];
                        $sql_1 = "SELECT * FROM airlines where id = $idd ;";
                        $re = mysqli_query($conn ,$sql_1) ;
                        $rrr = mysqli_fetch_assoc($re);
                        $i++;
            ?>
            <div class="nowShowing">
                <div class="mainDiv">
                    <div class="photoDiv">
                        <img src="<?php echo $rrr['airlines_logo_path']?>" alt="">
                    </div>
                    <div class="detailsDiv" id="deeeta">
                        <div class="location">
                            Price: <?php echo $rows['price'] ?> 
                        </div>
                        <div class="date">
                            From: <?php echo $rows['location_from'] ?>
                        </div>
                        <div class="date">
                            To: <?php echo $rows['destination'] ?>
                        </div>
                        <?php 
                            if($rows['arrival_datetime']!=""){?>
                            <div class="date">Arrival Date: <?php echo $rows['arrival_datetime'] ?></div>
                            <div class="priceDiv">
                            Two Way
                            </div>
                            <?php }else{
                                ?>
                                <div class="priceDiv">
                                One Way
                                </div>
                            <?php
                            }
                            ?>
                        <div class="date">
                        Price: <?php echo $rows['price'] ?>
                        </div>
                        <div class="bookNow" id="boookdd">
                            <a href="bus_oneway_form.php"><button>BOOK NOW</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            let divBook = document.getElementById('boookdd');
            let detailsDiv = document.getElementById('deeeta');
            detailsDiv.addEventListener('mouseover' , function(e){
                divBook.style.display = "flex";
                divBook.style.top = "0%";
            })

            detailsDiv.addEventListener('mouseout' , function(e){
                divBook.style.top = "103%";
            })

        </script>
        
            <?php
                }
            }
            ?>
    
            
        </div>
    </div>
    <h1 class="topic">Type of Tickets</h1> <br>
    <div class="nowShowing">
        <div class="mainDiv">
            <div class="photoDiv">
                <img src="../icons/two-way.png" alt="Shark">
            </div>
            <div class="detailsDiv" id="deeeta">
                <div class="location">
                    Domestic Flight 
                </div>
                <div class="location">
                    Anywhere in Nepal. 
                </div>
                <div class="priceDiv">
                    One Way
                </div>

                <div class="bookNow" id="boookdd">
                    <a href="bus_oneway_form.php"><button>BOOK NOW</button></a>
                </div>
            </div>
        </div>
        <script>
            let divBook = document.getElementById('boookdd');
            let detailsDiv = document.getElementById('deeeta');
            detailsDiv.addEventListener('mouseover' , function(e){
                divBook.style.display = "flex";
                divBook.style.top = "0%";
            })

            detailsDiv.addEventListener('mouseout' , function(e){
                divBook.style.top = "103%";
            })

        </script>
    </div>

<!-- ---------------------------------------------------------------------------------------------------------- -->

<!-- FOOTER -->

<?php
    include_once 'footer.php';
?>

</body>
</html>