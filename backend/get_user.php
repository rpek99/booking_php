<?php
include 'database.php';

if(count($_POST)>0){
        $user_id = $_POST['user_id'];

		$sql = "SELECT * FROM user WHERE id='$user_id'";

        $result = mysqli_query($conn, $sql);
        $userObj = mysqli_fetch_object($result);
        echo json_encode($userObj);

		mysqli_close($conn);
}



?>