<?php
//piyushsuhalkaa
//MySQLi connection
$con =mysqli_connect('127.0.0.1','root','','hackathon');

// Check connection for any errors
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
session_start();

//echo $_SESSION["a"];
$id= $_SESSION["a"];
//echo $id;
    $sql = "SELECT * FROM table1 WHERE guide_id='$id'";

	//Executing the sql query with the connection
	$re = mysqli_query($con, $sql);

	//check to see if there is any record or row in the database if there is then the user exists
	if ($re->num_rows > 0) {
        $imgData = $re->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image'];
    // output data of each row
    
}
?>
