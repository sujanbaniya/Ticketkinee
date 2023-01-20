<?php
    session_start();
?>

<?php
    require_once '../connect.php';
    // $sql = "SELECT * FROM movie ;";
    // $result = mysqli_query($conn ,$sql) ;
    // $row = mysqli_fetch_assoc($result);
    // $all = mysqli_fetch_all($result , MYSQLI_ASSOC);
    // print_r($all);
    // $num = mysqli_num_rows($result);

?>

<?php
    if (isset($_SESSION['user_id']) ){
        if (($_SESSION['admin'] != "0") ){
?>

<?php
    if(isset($_POST['submit'])){
        $id = intval($_POST['id']);
        $name = $_POST["name"];
        $subDisc = $_POST["sub-disc"];
        $language = $_POST["language"];
        $duration = $_POST["duration"];
        $genre = $_POST["genre"];
        $releaseDate = $_POST["release-date"];
        $price = $_POST["price"];
        $sqlToupdate = "UPDATE `movie` SET `name` = '$name', `sub_description` = '$subDisc' , `language` = '$language' , `duration` = '$duration' , `genre` = '$genre' , `release_date` = '$releaseDate' , `price` = '$price' WHERE `id` = '$id';";
        $result = mysqli_query($conn ,$sqlToupdate) ;
        print_r($result);
        // $_SESSION["successMessage"] = "Edited Movie Successfully !";     
        // header("location: movie.php");
        // exit();
    }
    else{   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/admin/user_table.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="../css/admin/add_movie.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>
    <?php 
        $movieId = $_GET['edit'];
        $query = "SELECT * FROM movie WHERE id = '$movieId';";
        $resultMovie = mysqli_query($conn ,$query);
        $movie = mysqli_fetch_assoc($resultMovie);
    ?>
    <div class="topic">Edit Movie :</div>
    <form action="edit_movie.php" method="post">
        ID : <input type="text" name="id" readonly value="<?php echo $movieId ?>"><br>
        Name : <input type="text" name="name" value="<?php echo $movie['name']?>"><br>
        Sub Discription : <input type="text" name="sub-disc" value="<?php echo $movie['sub_description']?>"><br>
        Language : <input type="text" name="language" value="<?php echo $movie['language']?>"><br>
        Casts : <input type="text" name="casts" value="<?php echo $movie['casts']?>"><br>
        Director : <input type="name" name="director" value="<?php echo $movie['director']?>"><br>
        Duration : <input type="time" name="duration" value="<?php echo $movie['duration']?>"><br>
        Genre : <input type="text" name="genre" value="<?php echo $movie['genre']?>"><br> 
        Release Date : <input type="date" name="release-date" value="<?php echo $movie['release_date']?>"><br>
        Youtube Video Id : <input type="text" name="youbueId" value="<?php echo $movie['video_id_youtube']?>"><br>
        Price : <input type="number" name="price" value="<?php echo $movie['price']?>"><br>
        <input type="submit" name="submit" class="submit-btn"> 
    </form>
   
<!-- ---------------------------------------------------------------------------------------------------------- -->

</body>
</html>

<?php
    }
?>

<?php
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