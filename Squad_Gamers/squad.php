<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "squad_gamers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
echo "Success....";
// get the post records
$sqevnt = $_POST['sqevnt'];
$sqgrpnm = $_POST['sqgrpnm'];
$sqpnm = $_POST['sqpnm'];
$sqpid = $_POST['sqpid'];
$sqspnm = $_POST['sqspnm'];
$sqspid = $_POST['sqspid'];
$sqtpnm = $_POST['sqtpnm'];
$sqtpid = $_POST['sqtpid'];
$sqfpnm = $_POST['sqfpnm'];
$sqfpid = $_POST['sqfpid'];

echo $sqevnt;
echo "<br>";

echo $sqgrpnm; 
echo "<br>";

echo $sqpnm; 
echo "<br>";

echo $sqpid;
echo "<br>";

echo $sqspnm;
echo "<br>";

echo $sqspid;
echo "<br>";

echo $sqtpnm;
echo "<br>";

echo $sqtpid;
echo "<br>";
echo $sqfpnm;
echo "<br>";

echo $sqfpid;
echo "<br>";

$today = date("Y-M-D H:M:S");      
echo $today;

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



 //$sql = "INSERT INTO 'solo' ('Event_Name', 'Player_Name', 'Player_Id', 'Email_Id', 'Contact_Number') 
 //VALUES ('$Evname', '$pname', '$pid','$eid',$contact)";

$sql="INSERT INTO squad (Event_Name, Squad_Name, Player_Name,Player_Id, Second_Player_Name ,Second_Player_ID, Third_Player_Name , Third_Player_ID,Fourth_Player_Name, Fourth_player_ID) VALUES ('$sqevnt', '$sqgrpnm', ' $sqpnm','$sqpid', '$sqspnm'  ,'$sqspid', '$sqtpnm'  ,'$sqtpid','$sqfpnm'  ,'$sqfpid');";
echo "<br>";

echo $sql;

 if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }
header("location: squad.html");
$conn->close();
?>