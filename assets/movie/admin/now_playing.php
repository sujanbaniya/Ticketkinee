<?php
    session_start();
?>

<?php
    require_once '../connect.php';
    $sql = "SELECT * FROM nowplaying ;";
    $result = mysqli_query($conn ,$sql) ;
    $allMovies = "SELECT id ,name FROM movie ;";
    $result_1 = mysqli_query($conn ,$allMovies) ;
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
    <title>Now Playing</title>
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="../css/admin/user_table.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>

    <H4>Now Playing</H4>
    <div class="row">
        <table border="1px">
            <thead>
                <tr class="column-topic">
                    <th>ID</th>
                    <th>Movie</th>
                    <th>Hall</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td>
                            <?php
                                $idd = $rows['movie'];
                                $allMovie = "SELECT * FROM movie m where m.id = $idd ;";
                                $re = mysqli_query($conn ,$allMovie) ;
                                $rrr = mysqli_fetch_assoc($re);
                                echo $rrr['name'];
                            ?>
                        </td>
                        <td><?php echo $rows['hall'] ?></td>
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