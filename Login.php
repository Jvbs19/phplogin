<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitylogintpredes";

$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM usuario WHERE username = '" . $loginUser . "'";
//$salttest = "SELECT salt FROM usuario WHERE username = '" . $loginUser . "'";
$result = $conn->query($sql);

if($result->num_rows >0){
	
	while($row = $result->fetch_assoc()){
		
		//$loginhash = crypt($loginPass, $salttest);
		if($row["password"] == $loginPass){
		//if($row["password"] == $loginhash){
		
			
			echo "Login Success.";
	
}
else{ 

echo "Wrong Credentials.";
}}}
else{echo "Username does not exists.";
}
$conn->close();

?>