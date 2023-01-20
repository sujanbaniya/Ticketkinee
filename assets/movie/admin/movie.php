<?php
    session_start();
?>

<?php
    require_once '../connect.php';
    $sql = "SELECT * FROM movie ;";
    $result = mysqli_query($conn ,$sql) ;
    // $row = mysqli_fetch_assoc($result);
    // $all = mysqli_fetch_all($result , MYSQLI_ASSOC);
    // print_r($all);
    // $num = mysqli_num_rows($result);

?>

<?php
    if (isset($_SESSION['user_id']) ){
        if (($_SESSION['admin'] != "0") ){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/admin/movie.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="path-to-icons/fonts/style.css" />
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>

    <H4>Movie</H4>
    <div class="add_another_btn"><a href="add_movie.php">Add Movie</a></div>
    <div class="row">
        <table border="1px">
            <thead>
                <tr class="column-topic">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sub Discription</th>
                    <th>Language</th>
                    <th>Casts</th>
                    <th>Director</th>
                    <th>Duration</th>
                    <th>Genre</th>
                    <th>Release Date</th>
                    <th>Price</th>
                    <th>Youtube Video Id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['sub_description'] ?></td>
                        <td><?php echo $rows['language'] ?></td>
                        <td><?php echo $rows['casts'] ?></td>
                        <td><?php echo $rows['director'] ?></td>
                        <td><?php echo $rows['duration'] ?></td>
                        <td><?php echo $rows['genre'] ?></td>
                        <td><?php echo $rows['release_date'] ?></td>
                        <td><?php echo $rows['price'] ?></td>
                        <td><?php echo $rows['video_id_youtube'] ?></td>
                        <td class="icons">
                            <div class="delete"><a href="delete_movie.php?delete=<?php echo $rows['id'] ?>"><img src="../images/delete.svg" title="Delete"></a></div>
                            <div class="delete"><a href="edit_movie.php?edit=<?php echo $rows['id'] ?>"><img src="../images/edit.svg" title="Edit"></a></div>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>

        </table>

    </div>
       
<!-- ---------------------------------------------------------------------------------------------------------- -->

</body>
</html>

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