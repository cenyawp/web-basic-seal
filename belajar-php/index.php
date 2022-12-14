<?php

$con = mysqli_connect ("localhost","root","","fakultas");

if(mysqli_connect_errno()){
    echo "Koneksi gagal". mysqli_connect_error();
}else{
    echo "Koneksi berhasil";
}

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query ($con,$query);
$mahasiswa = [];
if ($result){
    while($row = mysqli_fetch_assoc($result)) {
        $mahasiswa[] = $row;
    } 
    mysqli_free_result($result);
}
mysqli_close($con);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1" style="width:100%"> 
    <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php foreach ($mahasiswa as $row): ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['tempat_lahir'] ?></td>
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" >Edit</a> | 
                    <a href="delete.php?id=<?= $row['id'] ?>" >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>