  <!--- Model for Edit-->
  <div class="modal fade" id="#myModal2<?php echo $qr1['id'];?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
            <form action="1-category.php" method="post">
            <input type="hidden" name="id" value="<?php echo $qr1['id'];?>">
              <input type="text" name="cat_name" value="<?php echo $qr1['cat_name'];?>">
              
              <input type="submit" name="update_cat">

            </form> 
    <?php
        include '1-db.php';

        if(isset($_POST['update_cat'])){

          
           $catname = $_POST['cat_name'];
          $update_cat_qry = "update category set categoryname='$catname' where id ='$id'";

          $action = mysqli_query($conn,$update_cat_qry );

          if($action){
            header("location: 1-category.php");
          }
        }

    ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      </div>