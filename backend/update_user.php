<?php
include 'database.php';

if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$surname=$_POST['surname'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$sql = "UPDATE `user` SET `name`='$name',`surname`='$surname',`phone`='$phone',`email`='$email' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>