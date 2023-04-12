<div >
  <div class="outer">
    <h2>List Product</h2>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Name</th>
          <th class="text-center">CategoryID </th>
          <th class="text-center">Thumbnail</th>
          <th class="text-center">Description</th>
          <th class="text-center">CreatedDate</th>
          <th class="text-center">UpdatedDate</th>
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
            <td><?= $count  ?></td>
            <td><?= substr($row["Name"],0,10) ?></td>
            <td><?= $row["CategoryName"] ?></td>
            <td><?= substr($row["Thumbnail"],0,10) ?></td>
            <td><?= substr($row["Description"],0,10) ?></td>
            <td><?= substr($row["CreatedDate"],0,10)?></td>
            <td><?= substr($row["UpdatedDate"],0,10) ?></td>
            <td><?= $row["Status"] ?></td>
            <td><?= substr($row["Image"],0,10) ?></td>
            <td><?= $row["S"] ?></td>
            <td><?= $row["M"] ?></td>
            <td><?= $row["L"] ?></td>
            <td><button id="deletedProduct" class="btn btn-danger" style="height:60px" onclick="deletedProduct('<?= $count  ?>')">Delete</button></td>
            <td><button id="ProducRestoredt" class="btn btn-danger1" style="height:60px" onclick="RestoredProduct('<?= $count  ?>')">Revert</button> 
            <td><button id="UpdateProduct" class="btn btn-warning" style="height:60px" type="button" data-toggle="modal" data-target="#myModal_1">Update</a></button>
            
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
      
    </table>
  </div>
  <button type="button" class="btn btn-secondary" style="height:60px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>
<div>
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
                <label for="Name">Name:</label>
                <input type="text" class="form-control" id="Name" name="Name" required>
            </div>
            <div class="form-group">
              <label for="categoryID">Category ID:</label>
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
              <label for="thumbnail">Thumbnail:</label>
              <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
          <div class="form-group">
              <label for="createdDate">Created Date:</label>
              <input type="date" class="form-control" id="createdDate" name="createdDate" required>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <select class="form-control" id="status" name="status" required>
                <option value="0">Active</option>
                <option value="1">Deactive</option>
              </select>
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="text" class="form-control" id="image" name="image" required>
          </div>
          <div class="form-group">
              <label for="s">S:</label>
              <input type="number" class="form-control" id="s" name="s" required>
          </div>            <div class="form-group">
              <label for="m">M:</label>
              <input type="number" class="form-control" id="m" name="m" required>
          </div>
          <div class="form-group">
              <label for="l">L:</label>
              <input type="number" class="form-control" id="l" name="l" required>
            </div>
            <button type="button" class="btn btn-secondary" style="height:40px" onclick="confirmAddProduct()">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <script>
function confirmAddProduct() {
  if (confirm("Bạn có chắc chắn muốn thêm sản phẩm này?")) {
    // gửi dữ liệu form lên server
    document.getElementById("addProductForm").submit();
  }
}
</script>

<div>
  <div class="modal fade" id="myModal_1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="UpdateProductForm" enctype='multipart/form-data' action="./controller/UpdateProducts.php" method="post">
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?= $row["Name"] ?>" required>
            </div>
            <div class="form-group">
              <label for="categoryID">Category ID:</label>
              <select class="form-control" id="categoryID" name="categoryID" value="<?= $row["CategoryName"] ?> required>
                <?php
                include_once "../config/dbconnect.php";
                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="value="<?= $fields[0] ?>">value="<?= $fields[1] ?></option>
                <?php
                  }
                }
                ?>
              </select>
          </div>
          <div class="form-group">
              <label for="thumbnail">Thumbnail:</label>
              <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?= $row["Thumbnail"] ?>" required>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="description" name="description" rows="3" value="<?= $row["Description"] ?>" required></textarea>
          </div>
          <div class="form-group">
              <label for="createdDate">Created Date:</label>
              <input type="date" class="form-control" id="createdDate" name="createdDate" value="<?= $row["CreatedDate"] ?> "required>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <select class="form-control" id="status" name="status" value="<?= $row["Status"] ?>" required>
                <option value="0">Active</option>
                <option value="1">Deactive</option>
              </select>
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="text" class="form-control" id="image" name="image" value="<?= $row["Image"] ?>" required>
          </div>
          <div class="form-group">
              <label for="s">S:</label>
              <input type="number" class="form-control" id="s" name="s" value="<?= $row["S"] ?>" required>
          </div>            <div class="form-group">
              <label for="m">M:</label>
              <input type="number" class="form-control" id="m" name="m" value="<?= $row["M"] ?>" required>
          </div>
          <div class="form-group">
              <label for="l">L:</label>
              <input type="number" class="form-control" id="l" name="l" value="<?= $fields[11] ?>" required>
            </div>
            <button type="button" class="btn btn-secondary" style="height:40px" name="btnUpdate" onclick="UpdateProduct(<?= $count  ?>)">Update Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

