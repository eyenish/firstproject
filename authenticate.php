  
<?php 
include('dbconnect.php');  
	if (isset($_POST['login'])) {
$username = $_POST['username'];
$password = $_POST['password'];
		$record = mysqli_query($db, "SELECT * FROM user WHERE username='$username' and password='$password'");
		if ( mysqli_num_rows($record) == 1 ) { 
			$_SESSION['user_login'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
    
		    header('Refresh: 1; URL=homepage.php'); 
} else {
	$_SESSION['message'] = "username or password incorrect";
	header('Refresh: 1; URL=login.php'); 
}

    }
?>