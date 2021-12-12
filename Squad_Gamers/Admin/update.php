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




<?php 
include ("include/connection.php");
if(isset($_GET['epid'])){
$epid = $_GET['epid'];
$record = mysqli_query($conn, "SELECT * FROM event WHERE E_Id=$epid");
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
                                    name="image" value="uploadimage/<?php echo $row['E_poster'];?>"><br>
                                    <img src="<?php echo $row['E_poster'];?>" width='200px' height='70px' alt=""></td>
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

<!-- code -->
<?php 
}
elseif(isset($_GET['wid'])){
    $wid = $_GET['wid'];
    $record = mysqli_query($conn, "SELECT * FROM winner WHERE Id=$wid");
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
                            <label for="">Winner Name</label>
                            <input type="text" name="w_name" value="<?php echo $row['w_name'];?>" id="" class="form-control form-control-sm"
                                placeholder="Winner Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Event Name</label>
                            <input type="text" name="we_name" value="<?php echo $row['w_ename'];?>" id="" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Winner Photo</label>
                            <input type="file" name="images" multiple id="E_img" class="form-control form-control-sm"
                                placeholder="" autocomplete="off" >
                                <img src="<?php echo $row['w_photo'];?>" width='200px' height='70px' alt="">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="wid" value="<?php echo $row['Id']; ?>">
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
elseif(isset($_GET['vdid'])){
    $vdid = $_GET['vdid'];
    $record = mysqli_query($conn, "SELECT * FROM videos WHERE Id=$vdid");
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
                            <label for="">Tital</label>
                            <input type="text" name="v_tital" value="<?php echo $row['v_tital'];?>"class="form-control form-control-sm"
                                placeholder="Winner Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Url</label>
                            <input type="text" name="video" value="<?php echo $row['video'];?>" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class=" form-group">
                         <label for="mark">Mark As</label>   
                        <select id="mark" name="mark" value="<?php echo $row['mark'];?>">
                            <option value="new">Mark As New</option>
                            <option value="old">Mark As old</option>
                            </div>
                        </select>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <input type="hidden" name="vdid" value="<?php echo $row['Id']; ?>">
                            <button type="submit" name="vd_update" class="btn btn-info">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}elseif(isset($_GET['adid'])){
    $adid = $_GET['adid'];
    $record = mysqli_query($conn, "SELECT * FROM admin_login WHERE Id=$adid");
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
                            <label for="">Admin Name</label>
                            <input type="text" name="ad_name" value="<?php echo $row['Name'];?>"class="form-control form-control-sm"
                                placeholder="Winner Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="ad_email" value="<?php echo $row['Email_Id'];?>" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="ad_pass" value="<?php echo $row['admin_Password'];?>" class="form-control form-control-sm"
                                placeholder="Event Name" autocomplete="off" >
                        </div>
                        <br>
                        <div class="modal-footer">
                            <input type="hidden" name="adid" value="<?php echo $row['Id']; ?>">
                            <button type="submit" name="ad_update" class="btn btn-info">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php

include("include/footer.php");
?>

<?php 
}else{
     header("Location: index.php");
     exit();
}

 ?>