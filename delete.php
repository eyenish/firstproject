<?php

include( 'dbconnect.php' );
if ( isset( $_GET['del'] ) ) {

    $id = $_GET['del'];

    $record = mysqli_query( $db, "SELECT * FROM info WHERE id=$id" );
    if ( mysqli_num_rows( $record ) == 1 ) {
        $n = mysqli_fetch_array( $record );
        $image = $n['image'];

    }
    mysqli_query( $db, "DELETE FROM info WHERE id=$id" );

    
    $path = $_SERVER['DOCUMENT_ROOT'].'\/images\/'.$image;
    unlink( $path );
    $_SESSION['message'] = 'Address deleted!';

    header( 'location: homepage.php' );
}
    ?>