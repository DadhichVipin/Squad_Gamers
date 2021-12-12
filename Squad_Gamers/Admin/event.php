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
                    <h5 class="modal-title" id="eventModalLabel">New Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="event-form" action="eventdb.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Event Name</label>
                            <input type="text" name="ev_name" id="" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" name="ev_start" id="" class="form-control form-control-sm" placeholder=""
                                autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" name="ev_end" id="" class="form-control form-control-sm" placeholder=""
                                autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Event Poster</label>
                            <input type="file" name="image" id="E_img" class="form-control form-control-sm"
                                placeholder="" autocomplete="off" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="ev_create" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <?php 
        include ("include/connection.php");

       $query_eve = "SELECT * FROM `event`";
       $query_eve_run = mysqli_query($conn, $query_eve);
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-light" style="color:black; font: size 24px; font-weight: bold;"><i
                    class="fas fa-1x fa-tasks" style=" color: #fff"></i>&nbsp; Events</h3>
            <button type="button" class="btn btn-success add-event btn-sm float-right " data-toggle="modal"
                data-target="#exampleModal">
                Add Event
            </button>
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
                        <th>Id</th>
                        <th>Post Date</th>
                        <th>Event Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Poster</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
            if(mysqli_num_rows($query_eve_run) > 0)
            {
            while($row = mysqli_fetch_assoc($query_eve_run))
            {
            ?>
                    <tr>
                        <th><?php echo $row['E_Id']; ?></th>
                        <th><?php echo $row['post_date']; ?></th>
                        <th><?php echo $row['E_Name']; ?></th>
                        <th><?php echo $row['E_start']; ?></th>
                        <th><?php echo $row['E_End']; ?></th>
                        <td><img src="<?php echo $row['E_poster'];?>" width='200px' height='70px' alt=""></td>
                        <td>
                          <a href="update.php?epid=<?php echo $row['E_Id']; ?>" class="btn btn-info">Update</a>
                        </td>
                        <td>
                        <a href="del_item.php?eName=<?php echo $row['E_Name']; ?>" class="btn btn-danger" onclick='return checkdelete()'>Delete</a>
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