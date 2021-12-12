<?php 
session_start();
include ("include/connection.php") ;
 
if(isset($_POST['admusr']) && isset($_POST['admpas'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $admusr = validate($_POST['admusr']);
	$admpas = validate($_POST['admpas']);

    
	if (empty($admusr)) {
		header("Location: index.php?error=Email Id is required");
	    exit();
	}else if(empty($admpas)){
        header("Location: index.php?error=Password is required");
	    exit();
    }else{
        // $admpas = md5($admpas);

      $sql=  "SELECT * FROM `admin_login` WHERE Email_Id ='$admusr' AND admin_Password='$admpas' ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) === 1) {
         $row = mysqli_fetch_assoc($result);
         if ($row['Email_Id'] === $admusr && $row['admin_Password'] === $admpas) {
            $_SESSION['Email_Id'] = $row['Email_Id'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Id'] = $row['Id'];
            header("Location:dashboard.php");
            exit();
      
      }else{
        header("Location: index.php?error=Incorect Email_Id or password");
        exit();
    }
}else{
    header("Location: index.php?error=Incorect User name or password");
    exit();
}
}

}else{
header("Location: index.php");
exit();
}
    
 

?>