<?php 
include ("include/connection.php");


if(isset($_POST['admin_create']))
{
    $ad_name  = $_POST['ad_name'];
    $ad_email = $_POST['ad_email'];
    $ad_pass  = $_POST['ad_pass'];    

  
        $query_ad = "INSERT INTO `admin_login`(`Email_Id`, `admin_Password`, `Name`) VALUES ('$ad_email','$ad_pass','$ad_name')";
        $query_run = mysqli_query($conn, $query_ad);

        if ($query_run) {
            
            $_SESSION['success']= "Event Added";
            header("location: admin_setting.php");

            // echo "New record created successfully";
        } else {
            $_SESSION['success']= "Event Not Added";
            header("location: admin_setting.php");
            // echo "failed";
        }
    }
?>