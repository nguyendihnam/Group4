
//Tú
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
//Tú
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
//Tú
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
//Tú
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
//Tú
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
//Tú
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
//Tú
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