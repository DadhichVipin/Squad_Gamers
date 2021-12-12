<?php 
session_start();
include ("include/connection.php");
if (isset($_SESSION['Id']) && isset($_SESSION['Email_Id'])) {
?>

<?php
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");

$epid = $_GET['epid'];
$record = mysqli_query($conn, "SELECT * FROM `event` WHERE E_Id=$epid");
$row =mysqli_fetch_array($record);
?>

<div class="content-wrapper">
    <div class="updat" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Update Info</h5>
                </div>
                <form action="evedb.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="background-color:grey;">
                        <div class="form-group">
                            <label for="">Event Name</label>
                            <input type="text" value="<?php echo $row['E_Name'] ?>" name="ev_name" id=""
                                class="form-control form-control-sm" placeholder="Event Name" autocomplete="off"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" name="ev_start" value="<?php echo $row['E_start']; ?>"
                                class="form-control form-control-sm" placeholder="" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" name="ev_end" value="<?php echo $row['E_End']; ?>" id=""
                                class="form-control form-control-sm" placeholder="" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Event Poster</label>
                            <td><input type="file" class="form-control form-control-sm" 
                                    name="image" value="<?php echo $row['E_poster']['tmp_name']?>"><br><img
                                    src="<?php echo $row['E_poster'];?>" width='200px' height='70px' alt=""></td>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="epuid" value="<?php echo $row['E_Id']; ?>">
                            <button type="submit" name="up_add" class="btn btn-info">Add</button>
                        </div>
                    </div>

                </form>
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