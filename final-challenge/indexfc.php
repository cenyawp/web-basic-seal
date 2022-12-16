<?php

  $conn = mysqli_connect ("localhost","root","","tdl");

    if(mysqli_connect_errno()){
      echo "Koneksi Gagal"();
      exit();
}else{
      //echo "Koneksi berhasil";
}


    $query = "SELECT * FROM task";

    $items = [];

    if($result = mysqli_query($conn,$query)){
      while($row = mysqli_fetch_assoc($result)){
      $items[] = $row;
  } 
      mysqli_free_result($result);
}

    if(isset($_POST['item'])){
      $item = $_POST['item'];
  
      $query = "INSERT INTO task (item) values ('$item')";


    if (mysqli_query($conn,$query)){
      echo "data baru berhasil disimpan";
      header("Refresh:0");
    }else{
      echo "Error".mysqli_error ($conn);
    }
  }
   mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do List</title>
  <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">To Do App</h4>

            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action=""method='post'>
              <div class="col-12">
                <div class="form-outline">
                  <input type="text" id="form1" class="form-control" name="item" placehorder="Enter task here"/>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($items as $key=> $value) : ?>
                <tr>
                  <th scope="row"><?php echo $key+1;?></th>
                  <td><?php echo $value['item'];?></td>
                  <td><?php echo($value['status']==0) ? "in progress" : "finished"; ?></td>
                  <td>
                    <a href="<?php echo 'deletefc.php?id='. $value ['id']; ?>" type="submit" class="btn btn-danger">Delete</a>
                    <a href="<?php echo 'updatefc.php?id=' . $value['id']; ?>" type="submit" class="btn btn-success ms-1">Finished</a>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
 <body>
 <html> 