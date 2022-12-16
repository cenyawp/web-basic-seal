<?php 

$id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","tdl");

    if (mysqli_connect_errno()) {
        echo "Koneksi Gagal";
        exit();
    }else{
        echo "Koneksi Berhasil";
    }

    $sql = "DELETE FROM task WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "Delete data berhasil" ;
    header ("Refresh:0; url=indexfc.php");
}else{
    echo "Error". mysqli_error($conn);}
      
    
    mysqli_close($conn);


?>