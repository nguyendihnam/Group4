
<div style="width: 1356px; height: 620px; overflow: scroll;">
  <h2>List Contact</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">SubjectName</th>
        <th class="text-center">Message</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from contact order by ID desc ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr id="<?php echo $row["ID"]?>">
      <td><?=$count?></td>
      <td><?=$row["Name"]?></td>
      <td><?=$row["Email"]?></td>      
      <td><?=$row["PhoneNumber"]?></td> 
      <td><?=substr($row["SubjectName"], 0, 8)?>...</td>
      <td><?=substr($row["Message"], 0 ,8)?>...</td>
      <td><button id="getContact" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row["ID"] ?>">Detail</button></td>    
    </tr>
      
      <?php
            $count=$count+1;
          }
        }
      ?>
       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="dynamic-content"></div>  
        </div>
      </div>
      
    </div>
  </div>
  </table>
</div> 
   