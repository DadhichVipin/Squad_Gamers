<?php 
 
session_start();
 if(isset($_GET['pid']))
 {
    include ("include/connection.php");
    $soloid = $_GET['pid'];
    $query = "DELETE FROM `solo` WHERE `Player_Id`= '$soloid'" ;
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted...";
        header("location:solo_register.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location:solo_register.php");
    }
   
 }
 elseif(isset($_GET['dpid'])){
    include ("include/connection.php");
    $duoid = $_GET['dpid'];
    $query = "DELETE FROM `duo` WHERE `Player_Id`= '$duoid'" ;
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted";
        header("location:duo_register.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location:duo_register.php");
    }
   
 }
 elseif(isset($_GET['sname'])){
    include ("include/connection.php");
    $squad_name = $_GET['sname'];
    
    $query = "DELETE FROM `squad` WHERE `Squad_Name`='$squad_name'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted";
        header("location: squad_register.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location:squad_register.php");
    }
   
 }
 elseif(isset($_GET['eName'])){
    include ("include/connection.php");
    $event_name = $_GET['eName'];
    
    $query = "DELETE FROM `event` WHERE `E_Name`='$event_name'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted";
        header("location: event.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location:event.php");
    }
   
 }
 elseif(isset($_GET['dwid'])){
    include ("include/connection.php");
    $win_id = $_GET['dwid'];
    
    $query = "DELETE FROM `winner` WHERE `Id`='$win_id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted";
        header("location: winp.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location:winp.php");
    }   
 }
 elseif(isset($_GET['vdid'])){
    include ("include/connection.php");
    $vd_id = $_GET['vdid'];
    
    $query = "DELETE FROM `videos` WHERE `Id`='$vd_id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted";
        header("location: video_url.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location:video_url.php");
    }   
 }
 elseif(isset($_GET['adid'])){
    include ("include/connection.php");
    $ad_id = $_GET['adid'];
    
    $query = "DELETE FROM `admin_login` WHERE `Id`='$ad_id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        $_SESSION['success']= "Your Data Deleted";
        header("location: admin_setting.php");
    }else{
        $_SESSION['success']= "Data detetaion failed...";
        header("location: admin_setting.php");
    }   
 }
 
?>







