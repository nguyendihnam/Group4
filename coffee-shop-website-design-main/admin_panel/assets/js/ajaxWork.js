
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
