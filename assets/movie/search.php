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
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/flash_message.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>TicketKinee</title>
    <link rel="icon" href="assets/logos/TicketKinee_favicon.png" type="image/ico">
</head>
<body>

    <!-- NAVBAR -->

    <?php
        include_once 'navbar.php';
    ?>

    <?php
        if (isset($_GET['name'])){
            $searchedName = $_GET['name'];

            $sqlMovie = "SELECT * FROM movie WHERE name LIKE '%$searchedName%';";
            $resultMovie = mysqli_query($conn ,$sqlMovie) ;
            $num = mysqli_num_rows($resultMovie);

            if ($num > 0){
    ?>


<!-- ---------------------------------------------------------------------------------------------------------- -->


<!-- MIDDLE -->

<!-- BANNER --> 
    <div class="middle">
        <h1 class="topic">Search Result for : <?php echo $searchedName ?></h1> <br>
        <div class="nowShowing">

            <?php
                while($rows = mysqli_fetch_assoc($resultMovie)){
            ?>


            <div class="hero-container">
                <div class="main-container">
                    <div class="poster-container">
                        <a href="movie_page.php?id=<?php echo $rows['id']?>">
                            <img src="images/uploads/<?php echo $rows['image'] ?>" class="poster">
                        </a>
                    </div>
                    <div class="ticket-container">
                        <div class="ticket__content">
                            <h4 class="ticket__movie-title"><a href="movie_page.php?id=<?php echo $rows['id']?>" ><?php echo $rows['name'] ?></a></h4>   
                            <p class="ticket__current-price">Rs. <?php echo $rows['price'] ?></p>
                            <p class="ticket_old-price"></p>
                            <a href="book.php?id=<?php echo $rows['id']?>">
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
    
    
    <?php
            }
            else{   
    ?>
            <div class="emptySearchResult">   
                <img src="images/noresult.png">
            </div>

        
    <?php            
            }
        }
        else
        {
            $_SESSION["errorMessage"] = "Invalid URL !";
            header("location: main.php");
            exit();
        }
    ?>

<!-- ---------------------------------------------------------------------------------------------------------- -->

<!-- FOOTER -->

<?php
    include_once 'footer.php';
?>

</body>
</html>