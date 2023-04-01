<div >
  <h2>All User</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">Address</th>
        <th class="text-center">Password</th>
        <th class="text-center">RoleID</th>
        <th class="text-center">CreateDate</th>
        <th class="text-center">Status</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="select 
      u.UserName, 
      u.Email, 
      u.PhoneNumber, 
      u.Address, 
      u.Password, 
      r.Name, 
      u.CreateDate, 
      case when u.Deleted = 0 then 'Active' else 'Deactive' END as Status
      from user u 
      inner join Role r on u.RoleID = r.ID;
      ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["UserName"]?></td>
      <td><?=$row["Email"]?></td>
      <td><?=$row["PhoneNumber"]?></td>
      <td><?=$row["Address"]?></td>
      <td><?=$row["Password"]?></td>
      <td><?=$row["Name"]?></td>
      <td><?=$row["CreateDate"]?></td>
      <td><?=$row["Status"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>