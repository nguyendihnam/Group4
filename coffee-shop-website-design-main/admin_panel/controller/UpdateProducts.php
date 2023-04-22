
<?php
#1. Start session
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt timezone theo múi giờ địa phương của bạn

#4. Get Item Code from Read
if (!isset($_GET['ID'])):
    header("location:./adminView/viewProduct.php");
endif;
$id = $_GET['ID'];

include_once "../config/dbconnect.php";

#5. Execute query  (for old data reading by Item)
$query = "select * from product where ID = '{$id}'";
$rs = mysqli_query($conn, $query);
$row = mysqli_fetch_array($rs);
#6. Check form is submitted
if (isset($_POST['btnUpdate'])){
#7. Read new data from Input elements
    $id = $_POST['ID'];
    $name = $_POST['Name'];
    $categoryID = $_POST['categoryID'];
    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];
    $createdDate = date('createdDate');
    $updatedDate = date('Y-m-d H:i:s'); 
    $delete = 0; // Mặc định là chưa xóa
    $image = $_POST['image'];
    $s = $_POST['s'];
    $m = $_POST['m'];
    $l = $_POST['l'];
  
#8. Excute query (for update new data)
$query ="UPDATE product SET 
Name = '{$name}',
categoryID = '{$categoryID}',
thumbnail = '{$thumbnail}',
description = '{$description}',
createdDate = '{$createdDate}',
updatedDate = '$updatedDate',
deleted = '{$delete}',
image = '{$image}',
s = '{$s}',
m = '{$m}',
l = '{$l}'
where ID = '{$id}'";
$rs = mysqli_query($conn, $query);
if(!$rs){
  error_clear_last();
  echo'Nothing to update';
}else{
  header("location: ../index.php?Update=success" );
}
}
mysqli_close($conn);
?>
<body class="homebackground" >
<link rel="stylesheet" href="../assets/css/style.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container" class="modal fade" id="myModalUpdate" role="dialog">
    <h1 class="modal-title">Update Product</h1>
      <form method="post" >
          <table class="table table-borderedless">
          <div class="form-group">
                <input type="text" class="form-control" id="ID" name="ID" value="<?= $row[0] ?>" hidden>
            </div>
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?= $row[2] ?>" required>
            </div>
            <div class="form-group">
              <label for="categoryID">Category ID:</label>
              <input class="form-control" id="categoryID" name="categoryID" value="<?= $row[1] ?> "required>
            </div>
            <div class="form-group">
              <label for="thumbnail">Thumbnail:</label>
              <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?= $row[3] ?>" required>
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" id="description" name="description" value="<?= $row[4] ?>" required>
            </div>
            <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="text" class="form-control" id="image" name="image" value="<?= $row[8] ?>" required >
              </div>
            <div class="form-group">
              <label for="s">S:</label>
              <input type="number" class="form-control" id="s" name="s" value="<?= $row[9] ?>" required>
            </div>            <div class="form-group">
              <label for="m">M:</label>
              <input type="number" class="form-control" id="m" name="m" value="<?= $row[10] ?>" required>
            </div>
            <div class="form-group">
              <label for="l">L:</label>
              <input type="number" class="form-control" id="l" name="l" value="<?= $row[11] ?>" required>
            </div>
            <input type="submit" name="btnUpdate" class="btn btn-secondary" value="Update Item" onclick="return confirm('Are you sure to Update Item <?=$fields[0]?>?')" >
          </table>
        </form>
      </div>
  </body>
  
