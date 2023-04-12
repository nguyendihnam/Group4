// let menu = document.querySelector('#menu-btn');
// let navbar = document.querySelector('.navbar');

/* This is a function that toggles the class `fa-times` and `active` on the menu and navbar when the
user clicks on the menu button. */
// menu.onclick = () => {
//     menu.classList.toggle('fa-times');
//     navbar.classList.toggle('active');
// };

/* This is a function that removes the class `fa-times` and `active` from the menu and navbar when the
user scrolls. */
// window.onscroll = () => {
//     menu.classList.remove('fa-times');
//     navbar.classList.remove('active');
// };

/* This is a function that changes the main image when the user clicks on the thumbnail image. */
// document.querySelectorAll('.image-slider img').forEach(images => {
//     images.onclick = () => {
//         var src = images.getAttribute('src');
//         document.querySelector('.main-home-image').src = src;
//     };
// });
function GetDetailOrder(id){
    $.ajax({
    url:"viewOrderDetail.php",
    method:"POST",
    data:{orderID: id},
    success:function(data){
            $('#OrderDetail').html(data);
    }
});
}
function Signin(){
    var vali = true;
    var UsernameVal = document.getElementById("UserName");
    setDefault(UsernameVal);
    var PasswordVal = document.getElementById("Password");
    setDefault(PasswordVal);
    if(UsernameVal.value == "")
    {
      setError(UsernameVal,"Username cannot be empty");
      vali = false;
    }
      
    if(PasswordVal.value == "")
    {
      setError(PasswordVal,"Password cannot be empty");  
      vali = false;
    }
    if(vali){
      $.ajax({
        url:"Sign_in_process.php",
        method:"POST",
        data:{UserName: UsernameVal.value,
          Password : PasswordVal.value},
        success:function(result){
            if(result > 0){
              window.location = 'menu.php'
            }else{
              Swal.fire({                  
                title: 'Fail',
                text: 'Wrong UserName Or Password'
              });
            }
        }
      });
    }
      
    
}
function SendOrder(){
    var noteData = $("#txtNote").val();
    $.ajax({
    url:"Send_Order.php",
    method:"POST",
    data:{Note: noteData},
    success:function(result){
        if(result > 0){
            Swal.fire({                  
                title: 'Sucess',
                text: 'Send Order Sucess',
                showConfirmButton: true
              }).then((result) => {
                if (result.value) {
                  window.location = 'UserOrder.php';
                }
              });
        }
        else if(result == 0){
            Swal.fire({                  
                title: 'Fail',
                text: 'Please add products',
                showConfirmButton: true
              })
        }
    }
});
}
function AddOrder(id){
    var activeElement = document.querySelector('div.active');
    var activeSizeValue = activeElement.id;
    var qty = $("#Qty").val();
    $.ajax({
        url:"Add_Order.php",
        method:"POST",
        data: {
            ProductID : id,
            Size : activeSizeValue,
            Qty : qty

        },
        success:function(result){
            if(result > 0){
                Swal.fire({                  
                    title: 'Sucess',
                    text: 'Add Order Sucess',
                    showConfirmButton: false,
                    timer: 1000
                  })
            }
            else {
                Swal.fire({                  
                    title: 'Fail',
                    text: 'Add Order Fail',
                    showConfirmButton: false,
                    timer: 1000
                  })
            }
        },
        error:function(error){
           
        }
    })
}
function UpdateQuantity(count,id){
    var Qty = "myNumber_" + count;
    var QtyNumber = document.getElementById(Qty).value;
    $.ajax({
    url:"UpdateOrder.php",
    method:"POST",
    data:{ID: id,
          Qty : QtyNumber
        },
    success:function(result){
        Swal.fire({                  
            title: 'Sucess',
            text: 'Add Order Sucess',
            showConfirmButton: false,
            timer: 1000
          })
        window.location = "Order.php";
    }
});
}
function DeleteOrder(id){
    Swal.fire({                  
        title: 'Confirm',
        text: 'Are you sure you want to delete?',
        showConfirmButton: true,
        showCancelButton : true
      }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"DeleteOrder.php",
                method:"POST",
                data:{ID: id
                    },
                success:function(result){
                    Swal.fire({                  
                        title: 'Sucess',
                        text: 'Delete Sucess',
                        showConfirmButton: false,
                        timer: 1000
                      }).then((result) =>{
                        window.location = "Order.php";
                      })
                   
                }
            });
        }
      });
}
function CheckNumber(count){
  var id = "myNumber_" + count;
  var QtyNumber = document.getElementById(id).value;
  var Qty = document.getElementById(id);
  if(QtyNumber > 30){
    Swal.fire({                  
      title: 'Fail',
      text: 'Please fill number below 31',
      showConfirmButton: false
    }).then((result) =>{
      document.getElementById(id).value = 30;
        
    })
  }
}
function setError(element, message) {
  var inputControl = element.parentElement;
  var errorDisplay = inputControl.querySelector('.error');

  errorDisplay.innerText = message;
  inputControl.classList.add('error');
  inputControl.classList.remove('success')
}
function setDefault(element) {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');
  errorDisplay.innerText = '';
  inputControl.classList.remove('error');
};
