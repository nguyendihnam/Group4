<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>UserName</th>
        <th>Note</th>
        <th>OrderDate</th>
        <th>Status</th>
        <th>Action</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="select 
      ord.ID, 
      us.UserName, 
      ord.Note,
      ord.OrderDate, 
      case when ord.Status = 0 then 'Waiting Approve' 
         when ord.Status = 1 then 'Approved' 
      end StatusOrder 
      from orders ord 
      inner join user us on ord.UserID = us.ID";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()){ 
    ?>
       <tr>
          <td><?=$row["ID"]?></td>
          <td><?=$row["UserName"]?></td>
          <td><?=$row["Note"]?></td>
          <td><?=$row["OrderDate"]?></td>
          <td><?=$row["StatusOrder"]?></td>
                    
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewOrderDetail.php?orderID=<?=$row['ID']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>