<div>
  <h3>List Product</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">CategoryID </th>
        <th class="text-center">Thumbnail</th>
        <th class="text-center">Description</th>
        <th class="text-center">CreatedDate</th>
        <th class="text-center">Status</th>
        <th class="text-center">Image</th>
        <th class="text-center">S</th>
        <th class="text-center">M</th>
        <th class="text-center">L</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT 
      pr.ID,
      pr.Name,
      ct.Name as CategoryName,
      pr.Thumbnail,
      pr.Description,
      pr.CreatedDate,
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
          <td><?= $count ?></td>
          <td><?= $row["Name"] ?></td>
          <td><?= $row["CategoryName"] ?></td>
          <td><?= $row["Thumbnail"] ?></td>
          <td><?= $row["Description"] ?></td>
          <td><?= $row["CreatedDate"] ?></td>
          <td><?= $row["Status"] ?></td>
          <td><?= $row["Image"] ?></td>
          <td><?= $row["S"] ?></td>
          <td><?= $row["M"] ?></td>
          <td><?= $row["L"] ?></td>
          <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
          <td><button class="btn btn-danger" style="height:40px" onclick="sizeDelete('<?= $row['ID'] ?>')">Delete</button></td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form id="addProductForm" enctype='multipart/form-data' action="./controller/addProduct.php" method="POST">
          <div class="form-group">
              <label for="productName">Name:</label>
              <input type="text" class="form-control" id="productName" name="productName" required>
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
            </div>
            <div class="form-group">
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
  <script>
function confirmAddProduct() {
  if (confirm("Bạn có chắc chắn muốn thêm sản phẩm này?")) {
    // Nếu người dùng đồng ý, gửi dữ liệu form lên server
    document.getElementById("addProductForm").submit();
  }
}
function sizeDelete(id) {
    if (confirm("Are you sure you want to delete this product?")) {
      window.location.href = "./controller/deleteProduct.php?id=" + id;
    }
  }
</script>


</div>

