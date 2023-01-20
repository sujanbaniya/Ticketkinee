<?php
    session_start();
?>

<?php
    require_once '../connect.php';
    // $sql = "SELECT * FROM users ;";
    // $result = mysqli_query($conn ,$sql) ;
    // $row = mysqli_fetch_assoc($result); 
    // $all = mysqli_fetch_all($result , MYSQLI_ASSOC);
    // $num = mysqli_num_rows($result);

?>

<?php
    if (isset($_SESSION['user_id']) ){
        if (($_SESSION['admin'] != "0") ){
?>

<?php
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $subDisc = $_POST["sub-disc"];
        $language = $_POST["language"];
        $duration = $_POST["duration"];
        $genre = $_POST["genre"];
        $releaseDate = $_POST["release-date"];
        $casts = $_POST["casts"];
        $price = $_POST["price"];
        $director = $_POST["director"];
        $youtubeId = $_POST["youtubeId"];

        $image = $_FILES["image"]['name'];
        $imageTmpName = $_FILES["image"]["tmp_name"];
        $fileFormat = explode('.' , $image);
        $fileExt = strtolower($fileFormat[1]);

        $imageNewName = uniqid('',true).".".$fileExt;
        $fileDestination = '../images/uploads/'.$imageNewName;

        move_uploaded_file($imageTmpName , $fileDestination);

        $banner = $_FILES["banner"]['name'];
        $bannerTmpName = $_FILES["banner"]["tmp_name"];
        $fileFormatBanner = explode('.' , $banner);
        $bannerExt = strtolower($fileFormatBanner[1]);

        $bannerNewName = uniqid('',true).".".$bannerExt;
        $bannerFileDestination = '../images/uploads/'.$bannerNewName;

        move_uploaded_file($bannerTmpName , $bannerFileDestination);
        
        $sql = "INSERT INTO movie (name , sub_description , language , duration , genre , release_date , casts, price,director,video_id_youtube , image , banner ) VALUES ('$name' , '$subDisc' , '$language' , '$duration' , '$genre' , '$releaseDate' , '$casts','$price','$director','$youtubeId' ,'$imageNewName' , '$bannerNewName');";
        $result = mysqli_query($conn ,$sql) ;

        $_SESSION["successMessage"] = "Movie Added Successfully !";
        header("location: movie.php");
        exit();
    }
    else{   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
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
    <div class="topic">Add Movie :</div>
    <form action="add_movie.php" method="post" enctype="multipart/form-data">
        Name : <input type="text" name="name"><br>
        Sub Discription : <input type="text" name="sub-disc"><br>
        Language : <input type="text" name="language"><br>
        Casts : <input type="text" name="casts"><br>
        Director : <input type="text" name="director"><br>
        Duration : <input type="time" value="01:00" name="duration"><br>
        Genre : <input type="text" name="genre"><br> 
        Release Date : <input type="date" name="release-date"><br>
        Price : <input type="number" name="price"><br>
        Youtube Id : <input type="text" name="youtubeId"><br>
        Image : <input type="file" name="image"><br>
        Banner : <input type="file" name="banner"><br>
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