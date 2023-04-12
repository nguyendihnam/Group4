

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

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function ChangePay(id){
    $.ajax({
       url:"./controller/updatePayStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Payment Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}


function showProducts() {
    $.ajax({
        url: "./adminView/viewProducts.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function UpdateProduct(id) {
    if (confirm("Are you sure Update Item Products ?")){
        $.ajax({
          url: "./controller/UpdateProducts.php",
          type: "post",
          data: {ID: id},
          success: function(data) {
            alert('The Products has been successlly update! .');
            showProducts();
          }
        }
    );  
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
        }
    );  
}
}

function deletedProduct(id) {
    if (confirm("Are you sure Deleted Item Products ?")){
        $.ajax({
            url: "./controller/deleteProduct.php",
            method: "post",
            data: { ID: id },
            success: function (data) {
                alert('The Products has been successlly deleted! .');
                showProducts();
            }
        });
    } 
}


//delete cart data
function cartDelete(id){
    $.ajax({
        url:"./controller/deleteCartController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id){
    $.ajax({
        url:"./view/viewEachDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{ID:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function ProductDelete(id){
    $.ajax({
        url:"./controller/deleteProduct.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showSizes();
        }
    });
}


//delete variation data
function variationDelete(id){
    $.ajax({
        url:"./controller/deleteVariationController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

//edit variation data
function variationEditForm(id){
    $.ajax({
        url:"./adminView/editVariationForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations(){
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateVariationController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showProductSizes();
      }
    });
}
function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id){ 
    $.ajax({
        url:"./controller/addQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id){
    $.ajax({
        url:"./controller/subQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout(){
    $.ajax({
        url:"./view/viewCheckout.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id){
    $.ajax({
        url:"./controller/removeFromWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id){
    $.ajax({
        url:"./controller/addToWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Added to wishlist');        
        }
    });
}