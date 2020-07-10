<?php 
include('dbconnect.php');
// initialize variables
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
    </div>
    <?php endif ?>
    <form method="post" action="insert.php">

        <input type="hidden" name="id">

        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label>Address</label>
            <input type="text" name="address">
        </div>
        <div class="input-group">


            <button class="btn" type="submit" name="save">Save</button>

        </div>
    </form>
</body>

</html>