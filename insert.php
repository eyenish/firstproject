<?php
include('dbconnect.php');
if ( isset( $_POST['save'] ) ) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $image_name ="";
    if(isset($_FILES['image'])){
        $errors= array(); //
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        
        
        $extensions= array("jpeg","jpg","png"); //
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);

        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
           
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$file_name); // this function upload the file
           $image_name = $file_name;
        }else{
           print_r($errors);
        }
     }


    mysqli_query( $db, "INSERT INTO info (name, address, image) VALUES ('$name', '$address','$image_name')" );

    $_SESSION['message'] = 'Data is saved';
    header('Refresh: 1; URL=homepage.php');
}
?>