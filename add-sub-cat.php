<?php
        include '1-db.php';

        if(isset($_POST['add_subcat'])){
         
          $parentid = $_POST['parentid'];
          $subcatname = $_POST['subcat_name'];
          $insert_scat_qry = "insert into subcategory(parentid, subcategoryname) values('$parentid','$subcatname')";

          $action = mysqli_query($conn,$insert_scat_qry );

          if($action){
            header("location: 1-sub-category.php");
          }
        }

    ?>