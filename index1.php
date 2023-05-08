<?php
session_start();

// include "config.php";
$conn = mysqli_connect("localhost", "root", "", "encrobytes") or die("Connection Failed!!!");
if(isset($_SESSION['userid']))
{
    echo $id = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Update</h3>
    <?php
    $result = mysqli_query($conn, "select * from users where id ='$id'");
    $row = mysqli_num_rows($result);
    $qq = mysqli_fetch_assoc($result);
    ?>
    <form action="db.php" method="post">
        <input type="text" name="name" value="<?php echo $qq['username'];?>">
        <input type="text" name="password" value="<?php echo $qq['password'];?>">
        <input type="submit" value="add" name="add">
    </form>
    <div>
        <h4>Delete Filed</h4>
        <table border="1">
            <tr>
                <td><b>username</b></td>
                <td><b>Password</b></td>
                <td><b>Action</b></td>
            </tr>
        <?php
        $result1 = mysqli_query($conn, "select * from users");
         while ($qq1 = mysqli_fetch_assoc($result1))
         {
            
        ?>
        <tr>
        <td><?php echo $qq1['username'];?></td>
        <td><?php echo $qq1['password'];?></td>
        <td><a href="db.php?id=<?php echo $qq1['id'];?>">Delete</a></td>
        <tr>
        <?php
         }
        ?>
        </table>
    </div>

</body>
<?php
}
else{
    header("location:login.php");
}
if(isset($_SESSION['msg']))
{
    print_r($_SESSION['msg']);
}
?>
</html>