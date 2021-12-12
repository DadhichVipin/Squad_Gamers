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
                    <h5 class="modal-title" id="eventModalLabel">Add Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <form class="win-form" action="video_insert.php" method="POST" enctype="multipart/form-data">
                        
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tital</label>
                            <input type="text" name="v_tital" id="" class="form-control form-control-sm"
                                placeholder="Winner Name" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">video Url</label>
                            <input type="text" name="video" multiple id="E_img" class="form-control form-control-sm"
                                placeholder="" autocomplete="off" required>
                        </div>
                        <div class=" form-group">
                         <label for="mark">Mark As</label>   
                        <select id="mark" name="mark">
                            <option value="new">Mark As New</option>
                            <option value="old">Mark As old</option>
                            </div>
                        </select>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="v_add" class="btn btn-primary">Create</button>
                    </div>
                </form>
</div>
</div>
</div>
</div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-light" style="color:black; font-size : 24px; font-weight: bold;"><i
                    class="fab fa-youtube" style="color:#fff;"></i>&nbsp;&nbsp;Videos</h3><button type="button" class="btn btn-success add-event btn-sm  float-right " data-toggle="modal"
                    data-target="#exampleModal">
                    Add Video
                </button>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
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
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Video Title</th>
                        <th>VIdeo</th>
                        <th>Mark</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    include ("include/connection.php");

                $query = "SELECT * FROM `videos`";
                $query_run = mysqli_query($conn, $query);
                ?>
                 <?php
                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
                    <tr>
                        
                        <th><?php echo $row['Id']; ?></th>
                        <th><?php echo $row['v_tital']; ?></th>
                        <th><iframe width="200" height="100"
                        src="https://www.youtube.com/embed/<?php echo $row['video']; ?>">
                        </iframe></th>
                        <th><?php echo $row['mark']; ?></th>
                        <td>
                            <a href="update.php?vdid=<?php echo $row['Id']; ?>" class="btn btn-sm btn-success">Update</a>
                        </td>
                        <td>
                            <a href="del_item.php?vdid=<?php echo $row['Id']; ?>" class="btn btn-sm btn-danger"
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