
<div >
  <h3>List Product</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>       
        <th class="text-center" >CategoryID </th>
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
      $sql="select 
      pr.ID,
      pr.Name,
      ct.Name as CategoryName,
      pr.Thumbnail,
      pr.Description,
      pr.CreatedDate,
      case when pr.Deleted = 0 then 'Active' else 'Deactive' END as Status,
      pr.Image,
      pr.S,
      pr.M,
      pr.L
      from product pr
      inner join category ct on pr.CategoryID = ct.ID";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["Name"]?></td>
      <td><?=$row["CategoryName"]?></td>
      <td><?=$row["Thumbnail"]?></td>
      <td><?=$row["Description"]?></td>
      <td><?=$row["CreatedDate"]?></td>
      <td><?=$row["Status"]?></td>
      <td><?=$row["Image"]?></td>
      <td><?=$row["S"]?></td>
      <td><?=$row["M"]?></td>
      <td><?=$row["L"]?></td>
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-danger" style="height:40px" onclick="sizeDelete('<?=$row['ID']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
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
          <form  enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
            <div class="form-group">
              <label for="size">Size Number:</label>
              <input type="text" class="form-control" name="size" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Size</button>
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
   