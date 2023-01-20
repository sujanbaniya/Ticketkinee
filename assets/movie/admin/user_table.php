<?php
    session_start();
?>


<?php
    require_once '../connect.php';
    $sql = "SELECT * FROM users ;";
    $result = mysqli_query($conn ,$sql) ;
    // $row = mysqli_fetch_assoc($result);
    // $all = mysqli_fetch_all($result , MYSQLI_ASSOC);
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
    <title>User Table</title>
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/admin/user_table.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>

    <H4>USERS</H4>
    <!-- <div class="add_another_btn"><a href="add_user.php">Add User</a></div> -->
    <div class="row">
        <table border="1px">
            <thead>
                <tr class="column-topic">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $rows['user_id'] ?></td>
                        <td><?php echo $rows['user_first_name'] ?></td>
                        <td><?php echo $rows['user_email'] ?></td>

                        <?php 
                            if ($rows['user_contact_no'] == '0' || $rows['user_contact_no'] == ''){
                        ?>
                            <td>***</td>
                        <?php
                            }
                            else
                            {
                        ?>
                            <td><?php echo $rows['user_contact_no'] ?></td>
                        <?php 
                            }
                        ?>  
                        <?php 
                            if ($rows['user_type'] == 'normal'){
                        ?>
                            <td>Customer</td>
                        <?php
                            }
                            else
                            {
                        ?>
                            <td>Admin</td>
                        <?php 
                            }
                        ?>   
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