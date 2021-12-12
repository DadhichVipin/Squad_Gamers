<?php 
session_start();
include ("include/connection.php");


if(isset($_POST['ev_create']))
{
    $ev_name  = $_POST['ev_name'];
    $ev_start = $_POST['ev_start'];
    $ev_end   = $_POST['ev_end'];
    $image  = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    

    move_uploaded_file($img_loc, 'uploadimage/'.$img_name);

        $query_eve = "INSERT INTO `event`(`E_Name`, `E_start`, `E_End`, `E_poster`) VALUES ('$ev_name','$ev_start','$ev_end','$img_des')";
        $query_eve_run = mysqli_query($conn, $query_eve);

        if ($query_eve_run) {
            
            $_SESSION['success']= "Event Added Success fully....  ";
            header("location: event.php");

            // echo "New record created successfully";
        } else {
            $_SESSION['success']= "somtiong went wrong Event Not Added try again";
            header("location: event.php");
            // echo "failed";
        }
}


// if(isset($_POST['ev_create'])){
    
//     $ev_name  = $_POST['ev_name'];
//     $ev_start = $_POST['ev_start'];
//     $ev_end   = $_POST['ev_end'];
//     $image  = $_FILES['image'];
//     $img_loc = $_FILES['image']['tmp_name'];
//     $img_name = $_FILES['image']['name'];
//     $img_des = "uploadimage/".$img_name;
//     $today = date("Y-m-d H:i:s"); 

//     move_uploaded_file($img_loc, 'uploadimage/'.$img_name);
//     // print_r($_FILES['image']);
//     $query ="INSERT INTO `event`(`Id`, `post_date`, `E_Name`, `E_start`, `E_End`, `E_poster`) VALUES (  '','$today',' $ev_name ',' $ev_start','$ev_end','$img_des')";
//    $query_run= mysqli_query($conn, $query);


// }

?>