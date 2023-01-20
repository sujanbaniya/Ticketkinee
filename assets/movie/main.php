<?php
    session_start();
?>
<?php
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home_page_middle.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/flash_message.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>TicketKinee | Movie</title>
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
</head>
<body>

    <!-- NAVBAR -->

    <?php
        include_once 'navbar.php';
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
                        <img src="images/banner/theBatmanPoster.jpg" alt="">
                    </div>
                    <div class="slide first">
                        <img src="images/banner/kasmirFiles.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="images/banner/rrr.jpg" alt="">
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

        <h1 class="topic">Now Showing</h1> <br>
        <div class="nowShowing">

            <?php
                $sql = "SELECT * FROM nowplaying ;";
                $result = mysqli_query($conn ,$sql) ;

                while($rows = mysqli_fetch_assoc($result)){
                    $idd = $rows['movie'];
                    $sql_1 = "SELECT * FROM movie where id = $idd ;";
                    $re = mysqli_query($conn ,$sql_1) ;
                    $rrr = mysqli_fetch_assoc($re);
            ?>


            <div class="hero-container">
                <div class="main-container">
                    <div class="poster-container">
                        <a href="movie_page.php?id=<?php echo $rrr['id']?>">
                            <img src="images/uploads/<?php echo $rrr['image'] ?>" class="poster">
                        </a>
                    </div>
                    <div class="ticket-container">
                        <div class="ticket__content">
                            <h4 class="ticket__movie-title"><a href="movie_page.php?id=<?php echo $rrr['id']?>" ><?php echo $rrr['name'] ?></a></h4>   
                            <p class="ticket__current-price">Rs. <?php echo $rrr['price'] ?></p>
                            <p class="ticket_old-price"></p>
                            <a href="book.php?id=<?php echo $rrr['id']?>">
                                <button class="ticket__buy-btn">Book Now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php
                }
            ?>
    
            
        </div>
    </div>

<!-- ---------------------------------------------------------------------------------------------------------- -->

<!-- FOOTER -->

<?php
    include_once 'footer.php';
?>

</body>
</html>