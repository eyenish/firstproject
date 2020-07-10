  
<?php 
include('dbconnect.php');  
	if (isset($_POST['register'])) {
$username = $_POST['username'];
$password = $_POST['password'];
        mysqli_query( $db, "INSERT INTO user (username, password) VALUES ('$username', '$password')" );
		$_SESSION['message'] = 'Account registered sucessfully!!!';
    header('Refresh: 1; URL=register.php'); 


    }
?>  