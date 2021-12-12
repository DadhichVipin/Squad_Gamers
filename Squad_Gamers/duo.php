<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "squad_gamers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
echo "Success....";
// get the post records
$duoevnt = $_POST['duoevnt'];
$dgrpnm = $_POST['dgrpnm'];
$dpnm = $_POST['dpnm'];
$dpid = $_POST['dpid'];
$dspnm = $_POST['dspnm'];
$dspid = $_POST['dspid'];

echo $duoevnt;
echo "<br>";

echo $dgrpnm; 
echo "<br>";

echo $dpnm; 
echo "<br>";

echo $dpid;
echo "<br>";

echo $dspnm;
echo "<br>";

echo $dspid;
echo "<br>";

$today = date("Y-M-D H:M:S");      
echo $today;

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



 //$sql = "INSERT INTO 'solo' ('Event_Name', 'Player_Name', 'Player_Id', 'Email_Id', 'Contact_Number') 
 //VALUES ('$Evname', '$pname', '$pid','$eid',$contact)";

$sql="INSERT INTO duo (Event_Name, Squad_Name, Player_Name,Player_Id, Second_Player_Name ,Second_Player_ID) VALUES ('$duoevnt', '$dgrpnm', ' $dpnm','$dpid', '$dspnm'  ,'$dspid');";
echo "<br>";

echo $sql;

 if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }

header("location: duo.html");
$conn->close();
?>