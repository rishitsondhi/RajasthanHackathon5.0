<?php

	$con =mysqli_connect('127.0.0.1','root','','hackathon');
	
	if (!$con)
	{
		echo 'Not Connected To Server';
	}
	
	if (!mysqli_select_db($con,'hackathon'))
	{
		echo 'Database Not Selected';
	}
    session_start();
    $guide_id = $_POST['guide_id'];
    $_SESSION["transfer"] =$guide_id ;
	$guide_name = $_POST['guide_name'];
    $sql = "SELECT * FROM table1 WHERE guide_id='$guide_id'";

	//Executing the sql query with the connection
	$re = mysqli_query($con, $sql);

	//check to see if there is any record or row in the database if there is then the user exists
	if ($re->num_rows > 0) {
    // output data of each row
    while($row = $re->fetch_assoc()) {
        echo "ID already Exists";
    }
}
else{
	
    mysqli_query($con,"INSERT INTO table1(guide_id,guide_name) VALUES ('$guide_id','$guide_name')");
				
	if(mysqli_affected_rows($con) > 0){
	echo "<p> Inserted</p>";
    } else {
	echo "NOT Inserted<br />";
	echo mysqli_error ($con);
}
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
 mysqli_query($con,"UPDATE table1 SET image='$imgContent' WHERE guide_id ='$guide_id'");
        if(mysqli_affected_rows($con) > 0){
	echo "<p> Inserted</p>";
    echo '<a href="index.php">Check</a>';
    echo '<a href="QRGeneration.php">Click here to generate the QRCode</a>';
    } else {
	echo "NOT Inserted<br>";
	echo mysqli_error ($con);
}
}}
}

    
?>