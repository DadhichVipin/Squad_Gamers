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


<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php 
                                    $query_solo = "SELECT Player_Id FROM solo ORDER BY Player_Id ";
                                    $query_solo_run= mysqli_query($conn, $query_solo);
                                    $row_solo = mysqli_num_rows($query_solo_run);
                                ?>
                                <p style="color:white; font-size:22px; font-weight:bold;">Solo Registers </p>
                                <h3 style="color:white; font-size:23px;font-weight:bold; "><?php echo $row_solo; ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"><sub>
                                        <style>
                                        .fa-user {
                                            color: #fff;
                                        }
                                        </style>
                                    </sub></i>
                            </div>
                            <a href="solo_register.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php 
                                $query_duo = "SELECT Player_Id FROM duo ORDER BY Player_Id ";
                                $query_duo_run= mysqli_query($conn, $query_duo);
                                $row_duo = mysqli_num_rows($query_duo_run);
                                ?>
                                <p style="color:white; font-size:22px; font-weight:bold ">Duo registers</p>
                                <h3 style="color:white; font-size:22px; font-weight:bold"><?php echo "$row_duo" ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"><sub>
                                        <style>
                                        .fa-user-friends {
                                            color: #fff;
                                        }
                                        </style>
                                    </sub></i>
                            </div>
                            <a href="duo_register.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php 
                                $query_squad = "SELECT Player_Id FROM squad ORDER BY Player_Id ";
                                $query_squad_run= mysqli_query($conn, $query_squad);
                                $row_squad = mysqli_num_rows($query_squad_run);
                                ?>
                                <p style="color:white; font-size:22px; font-weight:bold ">Squad Registers</p>
                                <h3 style="color:white; font-size:22px; font-weight:bold "><?php echo "$row_squad" ?>
                                </h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"><sub>
                                        <style>
                                        .fa-users {
                                            color: #fff;
                                        }
                                        </style>
                                    </sub></i>
                            </div>
                            <a href="squad_register.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                                <?php 
                                $query_squad = "SELECT E_Id FROM event ORDER BY E_Id ";
                                $query_squad_run= mysqli_query($conn, $query_squad);
                                $row_squad = mysqli_num_rows($query_squad_run);
                                ?>
                            <div class="inner">
                                <p style="color:white; font-size:22px; font-weight:bold ">Total Events </p>
                                <h3 style="color:white; font-size:22px; font-weight:bold "><?php echo "$row_squad" ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-1x fa-tasks"><sub>
                                        <style>
                                        .fa-tasks {
                                            color: #fff;
                                        }
                                        </style>
                                    </sub></i>
                            </div>
                            <a href="event.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <br>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <h5>USERS:</h5>
                        <hr>
                        <div class="card card-body">
                            <a class="btn btn-primary  btn-sm btn-block" href="winp.php">View All Users</a>
                            <table class="table table-sm">
                                <tr>
                                    <th>winner Name</th>
                                    <th>Event</th>
                                </tr>
                                <?php 
                                $query_eve = "SELECT * FROM `winner` order by Id DESC LIMIT 3";
                                $query_eve_run = mysqli_query($conn, $query_eve);
                                ?> 
                                <?php
                                if(mysqli_num_rows($query_eve_run) > 0)
                                {
                                     while($row = mysqli_fetch_assoc($query_eve_run))
                                     {
                                         ?>
                                <tr>
                                    <td><?php echo $row['w_name']; ?></td>
                                    <td><?php echo $row['w_ename']; ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <h5>LAST 5 Events</h5>
                        <hr>
                        <div class="card card-body">
                        <table class="table table-sm">
                        <tr>
                                    <th>Event Name</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                        </tr>
                        
                             <?php 
                       $query_eve = "SELECT * FROM `event` order by E_Id DESC LIMIT 5";
                      $query_eve_run = mysqli_query($conn, $query_eve);
                      ?> 
                            
                                <?php
                                if(mysqli_num_rows($query_eve_run) > 0)
                                {
                                     while($row = mysqli_fetch_assoc($query_eve_run))
                                     {
                                         ?>
                                

                                <tr>

                                    <td><?php echo $row['E_Name']; ?></td>
                                    <td><?php echo $row['E_start']; ?></td>
                                    <td><?php echo $row['E_End']; ?></td>
                                    <td> <a href="update.php?epid=<?php echo $row['E_Id']; ?>" class="btn btn-info">Update</a> </td>
                                    <td>
                                    <a href="del_item.php?eName=<?php echo $row['E_Name']; ?>" class="btn btn-danger" onclick='return checkdelete()'>Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>

                            </table>
                        </div>
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