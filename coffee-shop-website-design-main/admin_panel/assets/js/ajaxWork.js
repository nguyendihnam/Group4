

function showProductItems(){  
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showCategory(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showProducts(){  
    $.ajax({
        url:"./adminView/viewProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showContact(){  
    $.ajax({
        url:"./adminView/viewContact.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showUsers(){
    $.ajax({
        url:"./adminView/viewUser.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function viewDetailOrder(id){
    $.ajax({
        url:"./adminView/viewAllOrderDetail.php",
        method:"post",
        data:{orderID:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
//Tú
function UpdateStatuOrder(id){
    $.ajax({
        url:"./controller/updateOrderStatus.php",
        method:"POST",
        data:{ID : id},
        success:function(result){
            showOrders();
        }
    });
}

//delete user (Huy)
function deactiveUser(id){
    if(confirm('Are you sure to deactive this user?')){
        $.ajax({
            url:"./controller/deactiveUser.php",
            method:"post",
            data:{record:id},
            success:function(data){
                alert('User Successfully Deactive');
                showUsers();
            }
        });
    } 
}

//nam oc
function deleteProduct(ID) {
    if (confirm("Are you sure Deleted Item Products ?")){
        $.ajax({
            url: "./controller/deleteProduct.php",
            method: "post",
            data: { ID: ID },
            success: function (data) {
                alert('The Products has been successlly deleted! .');
                showProducts();
            }
        });
    } 
}

<<<<<<< HEAD
//revert delete user (HUY)
function revertUser(id){
    if(confirm('Are you sure to revert this user?')){
        $.ajax({
            url:"./controller/revertUser.php",
            method:"post",
            data:{record:id},
            success:function(data){
                alert('User revert successfull');
                showUsers();
            }
        });
    } 
}
=======
function deleteCategory(ID) {
    if (confirm("Are you sure Deleted Name?")){
        $.ajax({
            url: "./controller/deleteCategory.php",
            method: "post",
            data: { ID: ID },
            success: function (data) {
                alert('The Products has been successlly deleted! .');
                showProducts();
            }
        });
    } 
}


function RestoredItem(id) {
    if (confirm("Are you sure Revert Item Products ?")){
        $.ajax({
          url: "./controller/RestoredProduct.php",
          type: "post",
          data: {ID: id},
          success: function(data) {
            alert('The Products has been successlly update! .');
            showProducts();
          }
        });
    }  
}



function updateProduct(){
    var ID = $('#ID').val();
    var category = $('#categoryID').val();
    var Name = $('#Name').val();
    var Desc = $('#Description').val();
    var Thumbnail = $('#Thumbnail').val(); // Thêm giá trị của cột Thumbnail
    var Description = $('#Description').val(); // Thêm giá trị của cột Description
    var CreatedDate = $('#CreatedDate').val(); // Thêm giá trị của cột CreatedDate
    var UpdatedDate = $('#UpdatedDate').val(); // Thêm giá trị của cột UpdatedDate
    var Status = $('#Status').val(); // Thêm giá trị của cột Status
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var S = $('#S').val(); // Thêm giá trị của cột S
    var M = $('#M').val(); // Thêm giá trị của cột M
    var L = $('#L').val(); // Thêm giá trị của cột L

    $.ajax({
        url:"./controller/updateProduct.php", // Chỉnh sửa đường dẫn đến file xử lý update
        method:"POST",
        data: {ID: id},
        success:function(data){
            // Thực hiện các thao tác cần thiết sau khi cập nhật thành công
            showProducts(); // Ví dụ: sau khi cập nhật thành công, gọi hàm showProducts() để hiển thị danh sách sản phẩm đã được cập nhật
        }
    });
}

>>>>>>> Nam1
