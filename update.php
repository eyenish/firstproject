<?php 
include('dbconnect.php');
    if ( isset( $_POST['update'] ) ) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $image_name = "";

        $record = mysqli_query( $db, "SELECT * FROM info WHERE id=$id" );
        if ( mysqli_num_rows( $record ) == 1 ) {
            $n = mysqli_fetch_array( $record );
            $image = $n['image'];

        }
        if($_FILES['image']['size'] != 0){                
                    $path = $_SERVER['DOCUMENT_ROOT'].'\/images\/'.$image;
            unlink( $path );  // delete path of old image


            //upload new image
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            
            
            $extensions= array("jpeg","jpg","png");
            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must not exceed 2 MB';
            }
            
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"images/".$file_name);
               $image_name = $file_name;
               echo "Success".$file_name;
            }else{
               print_r($errors);
            }
         }else{
             $image_name = $image;
         }
     
         mysqli_query( $db, "UPDATE info SET name='$name', address='$address', image= '$image_name' WHERE id=$id" );
         $_SESSION['message'] = 'Data updated!';
         header('Refresh: 1; URL=homepage.php');
    }
?>