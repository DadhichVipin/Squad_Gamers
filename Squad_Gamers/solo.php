<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "squad_gamers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

// get the post records
$Evname = $_POST['Evname'];
$pname = $_POST['pname'];
$pid = $_POST['pid'];
$eid = $_POST['eid'];
$contact = $_POST['contact'];

echo $Evname;
echo "<br>";

echo $pname; 
echo "<br>";

echo $pid; 
echo "<br>";

echo $eid;
echo "<br>";

echo $contact;
echo "<br>";


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



 
 
 $sql="INSERT INTO solo (Event_Name,Player_Name,Player_Id, Email_Id, Contact_Number) VALUES ('$Evname', '$pname', '$pid','$eid',$contact);";
echo "<br>";

echo $sql;

 if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }

 header("location: solo.html");
$conn->close();

?>