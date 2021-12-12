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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="event-form" action="add_admin.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Admin Name</label>
                            <input type="text" name="ad_name" id="" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="ad_email" id="" class="form-control form-control-sm" placeholder=""
                                autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="ad_pass" id="" class="form-control form-control-sm" placeholder=""
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="admin_create" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <?php 
        include ("include/connection.php");

       $query_ad = "SELECT * FROM `admin_login`";
       $query_ad_run = mysqli_query($conn, $query_ad);
    ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title text-light" style="color:black; font: size 24px; font-weight: bold;"><i
                    class="fas fa-users-cog" style=" color: #fff"></i>&nbsp; setting</h2>
            <button type="button" class="btn btn-success add-event btn-sm float-right " data-toggle="modal"
                data-target="#exampleModal">
                Add Admin
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
            if(mysqli_num_rows($query_ad_run) > 0)
            {
            while($row = mysqli_fetch_assoc($query_ad_run))
            {
            ?>
                    <tr>
                        <th><?php echo $row['Name']; ?></th>
                        <th><?php echo $row['Email_Id']; ?></th>
                        <th><?php echo $row['admin_Password']; ?></th>
                        <td>
                          <a href="update.php?adid=<?php echo $row['Id']; ?>" class="btn btn-info">Update</a>
                        </td>
                        <td>
                        <a href="del_item.php?adid=<?php echo $row['Id']; ?>" class="btn btn-danger" onclick='return checkdelete()'>Delete</a>
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


<?php
include("include/footer.php");
?>

<?php 
}else{
     header("Location: index.php");
     exit();
}

 ?>