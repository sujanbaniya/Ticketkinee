<?php
    session_start();
?>
<?php
    require_once '../connect.php';
    $sql = "SELECT * FROM hall ;";
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
    <title>Hall</title>
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/admin/user_table.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>

    <H4>Hall</H4>
    <div class="row">
        <table border="1px">
            <thead>
                <tr class="column-topic">
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
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