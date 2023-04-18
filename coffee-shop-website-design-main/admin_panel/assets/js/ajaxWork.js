

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


//Nam

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

function RestoredProduct(id) {
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
