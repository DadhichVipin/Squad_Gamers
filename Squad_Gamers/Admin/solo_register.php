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
    
<?php 
       include ("include/connection.php");

       $query = "SELECT * FROM `solo`";
       $query_run = mysqli_query($conn, $query);
       ?>

    <div class="card">
        <div class="card-header">
            <h5 class="text-light">USERS:</h5>
            <!-- <h3 class="card-title" style="color:white; font: size 24px; font-weight: bold;"><i class="fas fa-user"><sub><style>.fa-user {color: #fff;}</style></sub></i>&nbsp;Solo Users</h3> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                <th>Event Name</th>
                <th>Player Name</th>
                <th>Player Id</th>
                <th>Email ID</th>
                <th>Contact Number</th>
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
                    <th><?php echo $row['Event_Name']; ?></th>
                <th><?php echo $row['Player_Name']; ?></th>
                <th><?php echo $row['Player_Id']; ?></th>
                <th><?php echo $row['Email_Id']; ?></th>
                <th><?php echo $row['Contact_Number'];?></th>
                
                 <td>
                     <a href="del_item.php?pid=<?php echo $row['Player_Id']; ?>" name ="solo_btn" onclick='return checkdelete()' class ="btn btn-sm btn-danger">Delete</a>
                 </td>

                    </tr>
                    <?php
           }
        }else{
             echo "No Record Found";
            //  echo "<p style='color:red;'>".No Record Found."</p>";
           
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







