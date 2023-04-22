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
document.querySelectorAll('.image-slider img').forEach(images => {
    images.onclick = () => {
        var src = images.getAttribute('src');
        document.querySelector('.main-home-image').src = src;
    };
});
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
//Huy
//Define variable
const userName = document.getElementById("userName");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const address = document.getElementById("address");
const pass = document.getElementById("pass");
const pass2 = document.getElementById("pass2");
const nameFull = document.getElementById("nameFull");
const subject = document.getElementById("subject");
const mess = document.getElementById("mess");
const id = document.getElementById("ID");

//Valid use for register (Huy)
function validInput() {
    const userNameVal = userName.value.trim();
    const emailVal = email.value.trim();
    const phoneVal = phone.value.trim();
    const addressVal = address.value.trim();
    const passVal = pass.value.trim();
    const pass2Val = pass2.value.trim();
    var valid = true;

    if (userNameVal == '') {
        setError(userName, 'Username is required');
        valid = false;
    } else if (userNameVal.length > 25 || userNameVal.length < 8) {
        setError(userName, 'Username max 25 characters and min 8 characters');
        valid = false;
    } else {
        setDefault(userName);
    }

    if (emailVal == '') {
        setError(email, 'Email is required');
        valid = false;
    } else if (!isValidEmail(emailVal)) {
        setError(email, 'Please enter a valid email address');
        valid = false;
    } else if (emailVal.length > 150) {
        setError(email, 'Max 150 characters');
        valid = false;
    } else {
        setDefault(email);
    }

    if (phoneVal == '') {
        setError(phone, 'Number is required');
        valid = false;
    } else if (!isValidNumber(phoneVal)) {
        setError(phone, 'Please enter valid phone number which is max 13 and min 10 digits include 0 at start');
        valid = false;
    } else {
        setDefault(phone);
    }

    if (addressVal == '') {
        setError(address, 'Address is required');
        valid = false;
    } else if (addressVal.length > 200) {
        setError(address, 'Max 200 characters');
        valid = false;
    } else {
        setDefault(address);
    }

    if (passVal == '') {
        setError(pass, 'Password is required');
        valid = false;
    } else if (passVal.length > 32 || passVal.length < 8) {
        setError(pass, 'Password max 32 characters and min 8 characters');
        valid = false;
    } else {
        setDefault(pass);
    }

    if (pass2Val == '') {
        setError(pass2, 'Please confirm your password');
        valid = false;
    } else if (pass2Val !== passVal) {
        setError(pass2, "Password doesn't match");
        valid = false;
    } else {
        setDefault(pass2);
    }

    return valid;
}



//Valid for update (Huy)
function validUpdate() {
    const emailVal = email.value.trim();
    const phoneVal = phone.value.trim();
    const addressVal = address.value.trim();
    var valid = true;

    if (emailVal == '') {
        setError(email, 'Email is required');
        valid = false;
    } else if (!isValidEmail(emailVal)) {
        setError(email, 'Please enter a valid email address');
        valid = false;
    } else if (emailVal.length > 150) {
        setError(email, 'Max 150 characters');
        valid = false;
    } else {
        setDefault(email);
    }

    if (phoneVal == '') {
        setError(phone, 'Number is required');
        valid = false;
    } else if (!isValidNumber(phoneVal)) {
        setError(phone, 'Please enter valid phone number which is max 13 and min 10 digits include 0 at start');
        valid = false;
    } else {
        setDefault(phone);
    }

    if (addressVal == '') {
        setError(address, 'Address is required');
        valid = false;
    } else if (addressVal.length > 200) {
        setError(address, 'Max 200 characters');
        valid = false;
    } else {
        setDefault(address);
    }

    return valid;
}



//Change password (Huy)
function changePass() {
    const pass = document.getElementById("pass");                   
    const passNew = document.getElementById("passNew");
    const pass2 = document.getElementById("pass2");

    const passValue = pass.value.trim();
    const passNewValue = passNew.value.trim();
    const pass2Value = pass2.value.trim();
    var valid = true;

    if(passValue == '') {
        setError(pass, 'This field must not be blank');
        valid = false;
    } else {
        setDefault(pass);
    }

    if(passNewValue == '') {
        setError(passNew, 'Please enter your new password');
        valid = false;
    } else if (passNewValue == passValue) {
        setError(passNew, 'Your new password can not be the same as old');
        valid = false;
    } else if (passNewValue.length > 32 || passNewValue.length < 8) {
        setError(passNew, 'Password only have max 32 characters and min 8 characters');
        valid = false;
    } else {
        setDefault(passNew);
    }

    if(pass2Value == '') {
        setError(pass2, 'Please confirm your new password');
        valid = false;
    } else if (pass2Value != passNewValue) {
        setError(pass2, 'Confirm password and new password field are not the same');
        valid = false;
    } else {
        setDefault(pass2);
    }

    //return false instead of true if there are errors, so that the form doesn't get submitted if the user cancels the SweetAlert dialog
    if (!valid) {
        return false;
    }

    return true;
}
//Huy
function showConfirmDialog() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you really want to change your password?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            if (changePass()) {
                document.getElementById("form").submit();
            }
        }
    });
}

//Valid for contact (Huy)
function sendContact() {
    const nameValue = nameFull.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phone.value.trim();
    const subjectValue = subject.value.trim();
    const messValue = mess.value.trim();
    var valid = true;

    if(nameValue == '') {
        setError(nameFull, 'Name is required');
        valid = false;
    } else if(!/^[A-Za-z]+$/.test(nameValue)) {
        setError(nameFull, 'Name must be only characters');
        valid = false;
    } else if(nameValue.length > 50) {
        setError(nameFull, 'Max 50 characters');
        valid = false;
    } else {
        setDefault(nameFull);
    }

    if(emailValue == '') {
        setError(email, 'Email is required');
        valid = false;
    } else if(!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        valid = false;
    } else if(emailValue.length > 150) {
        setError(email, 'Max 150 characters');
        valid = false;
    } else {
        setDefault(email);
    }

    if(phoneValue == '') {
        setError(phone, 'Phone is required');
        valid = false;
    } else if(!isValidNumber(phoneValue)) {
        setError(phone, 'Please enter valid phone number which is max 13 and min 10 digits include 0 at start');
        valid = false;
    } else {
        setDefault(phone);
    }

    if(subjectValue == '') {
        setError(subject, 'Subject is required');
        valid = false;
    } else if(subjectValue.length > 200) {
        setError(subject, 'Max 200 characters');
        valid = false;
    } else {
        setDefault(subject);
    }

    if(messValue == '') {
        setError(mess, 'Message is required');
        valid = false;
    } else if(messValue.length > 500) {
        setError(mess, 'Message max 500 characters');
        valid = false;
    } else {
        setDefault(mess);
    }

    if(valid) {
        $.ajax({
            url:"contact_process.php",
            method:"POST",
            data:{  txtName: nameFull.value,
                    txtEmail: email.value,
                    txtPhone: phone.value,
                    txtSubject: subject.value,
                    txtMess: mess.value
                },
                success:function(result){
                    if(result > 0) {
                        Swal.fire({
                            tilte: 'Success',
                            icon: 'success',
                            text: 'Successfully sent! we will contact later',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'index.php';      
                            }
                        })                      
                    }
                }
        });
    }
}


//Valid for register (Huy)
function Register() {
    if(validInput()){
        $.ajax({
            url:"register_process.php",
            method:"POST",
            data:{  txtUserName: userName.value,
                    txtEmail: email.value,
                    txtPhone: phone.value,
                    txtAddress: address.value,
                    txtPassword: pass.value
                },
            success:function(result){
                switch(result) {
                    case '1' :
                        Swal.fire({
                            tilte: 'Success',
                            icon: 'success',
                            text: 'Success register',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'Signin.php';      
                            }
                        })   
                        break;
                    case '2' :
                        setError(userName, 'UserName is already taken');
                        break;
                    case '3' :
                        setError(email, 'Email is already taken');
                        break;                     
                }
            }
        });
    }
}

//Edit infor user (Email, address, phone) (Huy)
function editInfo(){       
    Swal.fire({
        title: 'Are you sure to update new infomation?',
        text: "You won't able to revert this",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Yes, update it",
        icon: 'warning',
        cancelButtonText: "Cancel",
        customClass: "sweet-alert-custom class-button-sweet",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            if (validUpdate()) {
                $.ajax({
                    url:"edit-info-user_process.php",
                    method:"post",
                    data:{  txtID: id.value,
                            txtEmail: email.value,
                            txtPhone: phone.value,
                            txtAddress: address.value
                        },
                    success:function(rs){
                        switch(rs) {
                            case '1' :
                                Swal.fire({
                                    tilte: 'Success',
                                    icon: 'success',
                                    text: 'Success update',
                                    showConfirmButton: true
                                }).then((rs) => {
                                    if (rs.value) {
                                        window.location = 'index.php';      
                                    }
                                })   
                                break;
                            case '0' :
                                setError(email, 'Email is already taken');
                                break;                     
                        }
                    }
                });
            }
        }
    });
}
//--end Huy

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
    Swal.fire({                  
        title: 'Confirm',
        text: 'Are you sure you want to update?',
        showConfirmButton: true,
        showCancelButton : true
      }).then((result) => {
        if (result.value) {
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
                text: 'Update Order Sucess',
                showConfirmButton: false
            }).then(() =>{
                window.location = "Order.php";
            })
        
            }
        });
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

//huy
//Valid email
function isValidEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

//Valid number will match phone numbers that start with 0, have between 9 and 12 digits, and do not contain any digit that repeats more than 8 times in a row. 
function isValidNumber(number) {
    const pattern = /^0(?!.*(\d)\1{8})\d{9,12}$/;
    return pattern.test(number);
}
  
//-end huy

//Tú
function CheckNumber(count){
    var id = "myNumber_" + count;
    var QtyNumber = document.getElementById(id).value;
    if(QtyNumber > 30){
      Swal.fire({                  
        title: 'Fail',
        text: 'Please fill number max 30',
        showConfirmButton: false
      }).then((result) =>{
        document.getElementById(id).value = 30;
          
      })
    }
  }