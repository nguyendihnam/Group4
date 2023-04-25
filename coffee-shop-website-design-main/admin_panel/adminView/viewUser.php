<div style="height: 620px; width: 1356px; overflow: scroll;">
  <h2>All User</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">Address</th>
        <th class="text-center">Password</th>
        <th class="text-center">Role</th>
        <th class="text-center">CreateDate</th>
        <th class="text-center">UpdateDate</th>
        <th class="text-center">Status</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="select
      u.ID, 
      u.UserName, 
      u.Email, 
      u.PhoneNumber, 
      u.Address, 
      u.Password,
      u.Deleted, 
      r.Name, 
      u.CreateDate,
      u.UpdateDate, 
      case when u.Deleted = 0 then 'Active' else 'Deactive' END as Status
      from user u 
      inner join Role r on u.RoleID = r.ID;
      ";
      $result=$conn-> query($sql);
      $count = 0;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
      $count++;
    ?>
    <tr>
      <td><?=$count?></td>
      <td style="overflow-wrap: anywhere;"><?=$row["UserName"]?></td>
      <td style="overflow-wrap: anywhere;"><?=$row["Email"]?></td>
      <td ><?=$row["PhoneNumber"]?></td>
      <td style="overflow-wrap: anywhere;"><?=$row["Address"]?></td>
      <td style="overflow-wrap: anywhere;"><?=$row["Password"]?></td>
      <td><?=$row["Name"]?></td>
      <td><?=$row["CreateDate"]?></td>
      <td><?=$row["UpdateDate"]?></td>
      <td><?=$row["Status"]?></td>
    <?php
      if($row['Deleted'] == '0') {
        $class = 'btn-danger'; // add danger class if deleted = 0
        $text = 'Delete';
      } else {
        $class = 'btn-primary'; // add primary class if deleted = 1
        $text = 'Revert';
      }

      if ($row['Name'] != 'Admin') {
    ?>
      <td class="text-center">
        <button class="btn <?=$class?>" onclick="<?php
            if($row['Deleted'] == '0') {
              echo "deactiveUser('{$row['ID']}')";
            } else {
              echo "revertUser('{$row['ID']}')";
            }
          ?>"><?= $text ?></button>
      </td>
    </tr>
    <?php
      }
    }
  }

    ?>
  </table>