
<div >
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
    <tr>
      <td><?=$count?></td>
      <td><?=$row["Name"]?></td>
      <td><?=$row["Email"]?></td>      
      <td><?=$row["PhoneNumber"]?></td> 
      <td><?=$row["SubjectName"]?></td>
      <td><?=$row["Message"]?></td>    
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

 
  
</div>
   