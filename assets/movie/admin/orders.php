<?php
    session_start();
?>
<?php
    require_once '../connect.php';
    $sql = "SELECT * FROM bookings ;";
    $result = mysqli_query($conn ,$sql) ;
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
    <title>Bookings</title>
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/admin/user_table.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>

    <H4>Bookings</H4>
    <div class="row">
        <table border="1px">
            <thead>
                <tr class="column-topic">
                    <th>ID</th>
                    <th>User</th>
                    <th>Hall</th>
                    <th>Movie</th>
                    <th>Seat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <?php
                            $hallId = $rows['hall'];
                            $sql_1 = "SELECT * FROM hall where id = $hallId ;";
                            $result_1 = mysqli_query($conn ,$sql_1) ;
                            $forHall = mysqli_fetch_assoc($result_1);
                            
                            $movieId = $rows['movie'];
                            $sql_2 = "SELECT * FROM movie where id = $movieId ;";
                            $result_2 = mysqli_query($conn ,$sql_2) ;
                            $forMovie = mysqli_fetch_assoc($result_2);

                            $userId = $rows['user'];
                            $sql_3 = "SELECT * FROM users where user_id = $userId ;";
                            $result_3 = mysqli_query($conn ,$sql_3) ;
                            $forUser = mysqli_fetch_assoc($result_3);
                        ?>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $forUser['user_first_name'] ?></td>
                        <td><?php echo $forHall['name'] ?></td>
                        <td><?php echo $forMovie['name'] ?></td>
                        <td><?php echo $rows['seat'] ?></td>
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