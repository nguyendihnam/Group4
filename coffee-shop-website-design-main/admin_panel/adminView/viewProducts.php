

<div>
  
  <h2>Product Items</h2>
    <div class="outer" style="height: 600px; width: 1350px;">
      <table class="table ">
        <thead>
          <tr>
              <!-- <th class="text-center">ID</th> -->
              <th class="text-center">Name</th>
              <th class="text-center">CategoryID </th>
              <!-- <th class="text-center">Thumbnail</th>
              <th class="text-center">Description</th> -->
              <!-- <th class="text-center">CreatedDate</th>
              <th class="text-center">UpdatedDate</th> -->
              <th class="text-center">Status</th>
              <th class="text-center">Image</th>
              <th class="text-center">S</th>
              <th class="text-center">M</th>
              <th class="text-center">L</th>
              <th class="text-center" colspan="3" >Action</th>
            </tr>
        </thead>
    <?php
    #1. Start session
    session_start();
    include_once "../config/dbconnect.php";
    $sql = "SELECT 
    pr.ID,
    pr.Name,
    ct.Name as CategoryName,
    pr.Thumbnail,
    pr.Description,
    pr.CreatedDate,
    pr.UpdatedDate,
    CASE WHEN pr.Deleted = 0 THEN 'Active' ELSE 'Deactive' END as Status,
    pr.Image,
    pr.S,
    pr.M,
    pr.L
    FROM product pr
    INNER JOIN category ct ON pr.CategoryID = ct.ID";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <!-- <td><?= $row['ID'] ?></td> -->
        <td><?= substr($row["Name"],0,10) ?></td>
        <td><?= $row["CategoryName"] ?></td>
        <!-- <td><?= substr($row["Thumbnail"],0,10) ?></td>
        <td><?= substr($row["Description"],0,10) ?></td> -->
        <!-- <td><?= substr($row["CreatedDate"],0,10)?></td>
        <td><?= substr($row["UpdatedDate"],0,10) ?></td> -->
        <td><?= $row["Status"] ?></td>
        <td><img src=" .<?= $row["Image"]?>" style="height: 4rem; width: 8rem;" ></td>
        <td><?= $row["S"] ?> $</td>
        <td><?= $row["M"] ?> $</td>
        <td><?= $row["L"] ?> $</td>
        <td><button class="btn btn-danger" style="height:60px"  onclick="deleteProduct('<?= $row['ID'] ?>')">Delete</button></td>
        <td><button class="btn btn-danger1" style="height:60px" onclick="RestoredProduct('<?= $row['ID'] ?>')">Revert</button></td>
        <td><a class="btn btn-warning" style="height:60px; line-height: 48px;"  href="./controller/UpdateProducts.php?ID=<?=$row['ID']?>">Update</a></td>
    </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
  </div>
   <!-- Trigger the modal with a button -->
   <button type="button" class="btn btn-secondary " style="height:50px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>
<div id="AddproductItem" >
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <div class="modal-body">
            <form id="addProductForm" enctype='multipart/form-data' action="./controller/addProduct.php" method="POST">
              <div class="form-group">
                  <label for="Name">Name :</label>
                  <input type="text" class="form-control" id="Name" name="Name" required>
              </div>
              <div class="form-group">
                <label for="categoryID">Category ID :</label>
                <select class="form-control" id="categoryID" name="categoryID" required>
                  <?php
                  include_once "../config/dbconnect.php";
                  $sql = "SELECT * FROM category";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <option value="<?= $row['ID'] ?>"><?= $row['Name'] ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail :</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description" min="20" max="100" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="createdDate" name="createdDate" hidden>
            </div>
            <div class="form-group">
                <select class="form-control" id="status" name="status" hidden>
                  <option value="0">Active</option>
                  <option value="1">Deactive</option>
                </select>
            </div>
            <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="file" class="form-control" id="image" name="image">
                  
              </div>
            <div class="form-group">
                <label for="s">S :</label>
                <input type="number" class="form-control" min="1" max="10"  name="s" id="s" required>
            </div>            
            <div class="form-group">
                <label for="m">M :</label>
                <input type="number" class="form-control" min="1" max="10"  name="m" id="m" required>
            </div>
            <div class="form-group">
                <label for="m">L :</label>
                <input type="number" class="form-control" min="1" max="10"  name="l" id="l" required>
            </div>
              <div class="form-group">
                <button type="submit" name="btnAdd" class="btn btn-secondary" id="upload" style="height:40px" onclick="confirmAddProduct()" >Save</button>
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
<script>
function confirmAddProduct() {
  if (confirm("Are You sure Add Item Product :) ?")) {
    // gửi dữ liệu form lên server
    document.getElementById("addProductForm").submit();
  }
}
  function checks() {
    var input = document.getElementById('s');
    if (input.value < 1) {
        input.value = 1;
    } else if (input.value > 10) {
        input.value = 10;
    }
}

document.getElementById('s').addEventListener('input', checks);

function checkm() {
    var input = document.getElementById('m');
    if (input.value < 1) {
        input.value = 1;
    } else if (input.value > 10) {
        input.value = 10;
    }
}
document.getElementById('m').addEventListener('input', checkm);

function checkl() {
    var input = document.getElementById('l');
    if (input.value < 1) {
        input.value = 1;
    } else if (input.value > 10) {
        input.value = 10;
    }
}
document.getElementById('l').addEventListener('input', checkl);

</script>
</div>

</div>
