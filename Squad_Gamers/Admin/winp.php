<?php 
session_start();
include ("include/connection.php");
if (isset($_SESSION['Id']) && isset($_SESSION['Email_Id'])) {
?>

<?php
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");
?>

<div class="content-wrapper">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
        aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Add Winners</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <form class="win-form" action="win.php" method="POST" enctype="multipart/form-data">
                        
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Winner Name</label>
                            <input type="text" name="w_name" id="" class="form-control form-control-sm"
                                placeholder="Winner Name" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Event Name</label>
                            <input type="text" name="we_name" id="" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Winner Photo</label>
                            <input type="file" name="images" multiple id="E_img" class="form-control form-control-sm"
                                placeholder="" autocomplete="off" required>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="w_add" class="btn btn-primary">Create</button>
                    </div>
                </form>
</div>
</div>
</div>
</div>

    <!-- Modal -->
  
           

         
    <?php 
        include ("include/connection.php");

       $query = "SELECT * FROM `winner`";
       $query_run = mysqli_query($conn, $query);
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-light" style="color:black; font: size 24px; font-weight: bold;"><i
                    class="fas fa-trophy" style="color:#fff;"></i>&nbsp;Winners</h3><button type="button" class="btn btn-success add-event btn-sm  float-right " data-toggle="modal"
                    data-target="#exampleModal">
                    Add Winner
                </button>
        </div>
        <!-- <div class="error-msg">
        <?php 
                        if(isset($_GET['error'])){
                            $error = $_GET['error'];
                        }
                         ?>
            <p><?php echo $error; ?></p> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php 
            if(isset($_SESSION['success']))
            {  
            ?>
            <div class="alert alert-info text-center" role="alert">
            <?php echo $_SESSION['success'];?>
            </div>
            <?php
                unset($_SESSION['success']);
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Winner Name</th>
                        <th>Event Name</th>
                        <th>Photo</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            if(mysqli_num_rows($query_run) > 0)
            {
            while($row = mysqli_fetch_assoc($query_run))
            {
            ?>
                    <tr>
                        <th><?php echo $row['Id']; ?></th>
                        <th><?php echo $row['w_name']; ?></th>
                        <th><?php echo $row['w_ename']; ?></th>
                        <th><img src="<?php echo $row['w_photo']; ?>" width='200px' height='70px' alt=""></th>
                        
                        <td>
                            <a href="update.php?wid=<?php echo $row['Id']; ?>" class="btn btn-sm btn-success">Update</a>
                        </td>
                        <td>
                            <a href="del_item.php?dwid=<?php echo $row['Id']; ?>" class="btn btn-sm btn-danger"
                                onclick='return checkdelete()'>Delete</a>
                        </td>
                    </tr>
                    <?php
           }
        }else{
            echo "No record Found.";
                
          }
        ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
        
    
<?php
include("include/footer.php");
?>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>