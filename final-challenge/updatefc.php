<?php


$id = $_GET['id'];

$conn = mysqli_connect ("localhost","root","","tdl");

if(mysqli_connect_errno()){
    echo "Koneksi Gagal"();
    exit();
}else{
    echo "Koneksi Berhasil";
}


$query = "UPDATE task SET status=1 WHERE id ='$id' ";

$sql = mysqli_query($conn,$query);
mysqli_close($conn);

if ($sql){
    echo "data berhasil diupdate" ;
    header ("Refresh:0; url=indexfc.php");
}else{
    echo "gagal update". mysqli_error($conn);
}

?>