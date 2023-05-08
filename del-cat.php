<?php

session_start();

if(!isset($_SESSION['userid'])){
    header("location: 1-login.php");
  exit();
}

// if(isset($_GET['id'])){
  
//     $catid = $_GET['id'];

//     include '1-db.php';
   
//     $update_cat_qry = "update category set categoryname='$catname' where id ='$catid'";

//     $action = mysqli_query($conn,$update_cat_qry );
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>

<?php

if(isset($_GET['id'])){
    include "1-db.php";
  $catid = $_GET['id'];

  $sqr = "select * from category where id='$catid'";

  $data = mysqli_query($conn, $sqr);

 while( $qr1 = mysqli_fetch_assoc($data)){
 ?>
    
<form action="del-cat.php" method="post">
    Category ID :<input type="text" name="id" readonly value="<?php echo $qr1['id'];?>"><br><br>
    Category Name :<input type="text" name="category" value="<?php echo $qr1['categoryname'];?>"><br><br>
    <input type="submit" name="submit" >
</form>

<?php

}
}

?>


<?php

if(isset($_POST['submit'])){

    include '1-db.php';
    $id = $_POST['id'];
    $cat = $_POST['category'];

    $update_cat_qry = "update category set categoryname='$cat' where id ='$id'";

    $action = mysqli_query($conn,$update_cat_qry );

    if($action){
        header("location: 1-category.php");
    }
    else{
        echo "error";
    }
}
?>
</body>
</html>